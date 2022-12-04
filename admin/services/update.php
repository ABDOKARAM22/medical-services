<?php
require "../../config.php";
require DIR . "Func/validat.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $serv_name = $_POST['name'];
    $id = $_POST['id'];
    if (!is_empty($serv_name)) {
        if (!length_minmum($serv_name, 4)) {
            $row = get_row("services", "serv_id", $id);
            if ($row) {

                $done = update("UPDATE `services` SET `serv_name`='$serv_name' WHERE `serv_id`='$id'");
                if ($done){
                    header("location:" . BURLA . "services/all.php");
                } else {
                    echo "error data";
                    $_SESSION["err_edit"] ="Faild add";
                    header("location:" . BURLA . "services/all.php");
                }
            }
        } else {
            echo "error chars";

            $_SESSION["err_edit"] = "the name of serv must be more than 4 chars";
            header("location:" . BURLA . "services/all.php");
        }
    } else {
        echo "error requir";

        $_SESSION["err_edit"] = "the name is require";
        header("location:" . BURLA . "services/all.php");
    }
} else {
    echo "error men alawl";
    
    header("location:" . BURLA . "services/all.php");
}
