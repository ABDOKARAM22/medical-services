<?php
require("../../config.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
$row = get_row("city", "city_id", $_GET["id"]);
if ($row) {

$city_id = $row["city_id"];
    $sql = "DELETE FROM city WHERE `city`.`city_id` ='$city_id'";
    delet($sql);
    header("location:" . BURLA . "city_setting/city.php");

} else {
header("location:" . BURLA);
}
} else {
header("location:" . BURLA);
}