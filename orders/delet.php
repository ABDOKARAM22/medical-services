<?php
require("../config.php");
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $row = get_row("orders", "order_id", $_GET["id"]);
    if ($row) {

        $order_id = $row["order_id"];
        $sql = "DELETE FROM orders WHERE `orders`.`order_id` ='$order_id'";
        delet($sql);
        header("location:" . BURL . "orders/order.php");
    } else {
        header("location:" . BURL);
    }
} else {
    header("location:" . BURL);
}
