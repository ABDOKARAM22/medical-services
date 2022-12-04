<?php
require "../../config.php";
require DIR . "Func/validat.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $city_name = $_POST['name'];
    $id = $_POST['id'];
    if (!is_empty($city_name)) {
        if (!length_minmum($city_name, 3)) {
            $row = get_row("city", "city_id", $id);
            if ($row) {

                $done = update("UPDATE `city` SET `city_name`='$city_name' WHERE `city_id`='$id'");
                if ($done) { ?>
                    <?php $_SESSION["done"] = "Edit Done";
                    header("location:" . BURLA . "city_setting/edit.php");
                } else {
                    $_SESSION["err_edit"] = "Faild add";
                    header("location:" . BURLA . "city_setting/edit.php");
                }
            }
        } else {
            $_SESSION["err_edit"] = "the name of city must be more than 3 chars";
            header("location:" . BURLA . "city_setting/edit.php");
        }
    } else {

        $_SESSION["err_edit"] = "the name is require";
        header("location:" . BURLA . "city_setting/edit.php");
    }
}else{
    header("location:" . BURLA . "city_setting/city.php");

}
