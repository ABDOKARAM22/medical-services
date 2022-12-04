<?php
require "../config.php";
if(isset($_SESSION["admin_is_log"])){
    unset($_SESSION["admin_is_log"]);
    session_destroy();
    header("location:".BURLA."login.php");
}else{
    header("location:".BURLA."login.php");
}