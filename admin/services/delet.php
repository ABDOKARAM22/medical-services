<?php
require("../../config.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $row = get_row("services", "serv_id", $_GET["id"]);
    if ($row) {

        $serv_id = $row["serv_id"];
        $sql = "DELETE FROM `services` WHERE `services`.`serv_id` ='$serv_id'";
        delet($sql);
        header("location:" . BURLA . "services/all.php");
    } else {
        header("location:" . BURLA);
    }
} else {
    header("location:" . BURLA);
}
