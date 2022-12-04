<?php
require "../../config.php";
require DIR . "Func/validat.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $admin_name = $_POST['name'];
    $admin_email = $_POST['email'];
    $id = $_POST['id'];
    if (!is_empty($admin_name)) {
        if (!length_minmum($admin_name, 3)) {
            if(valid_email($admin_email)){


                $row = get_row("admin", "admin_id", $id);
                if ($row) {
    
                    $done = update("UPDATE `admin` SET `admin_name`='$admin_name',`admin_email`='$admin_email'  WHERE `admin_id`='$id'");
                    if ($done) { 
                        header("location:" .BURLA . "setting/all_admin.php");                    
                    } else {
                        $_SESSION["err_edit"] = "Error";
                        header("location:" . BURLA . "setting/all_admin.php");
                    }
                }

            }else{

                $_SESSION["err_edit"] = "Enter a valid email";
                header("location:" . BURLA . "setting/all_admin.php");
            }
        } else {
            $_SESSION["err_edit"] = "the name of admin must be more than 3 chars";
            header("location:" . BURLA . "setting/all_admin.php");

        }
    } else {

        $_SESSION["err_edit"] = "the name is require";
        header("location:" . BURLA . "setting/all_admin.php");

    }
}else{
    header("location:" . BURLA . "setting/all_admin.php");

}
