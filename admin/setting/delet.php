<?php
require("../../config.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $row = get_row("admin", "admin_id", $_GET["id"]);
    if ($row) {

        $admin_id = $row["admin_id"];
        $sql = "DELETE FROM `admin` WHERE `admin`.`admin_id` ='$admin_id'";
        delet($sql);
        header("location:" . BURLA . "setting/all_admin.php");
    } else {
        header("location:" . BURLA);
    }
} else {
    header("location:" . BURLA);
}
