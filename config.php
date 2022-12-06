<?php
session_start();

define('BURL', 'http://localhost:8080/medical-project/');
define('BURLA', 'http://localhost:8080/medical-project/admin/');
define('ASSETS', 'http://localhost:8080/medical-project/assets/');

define('DIRA', __DIR__ . '/admin/');
define('DIR', __DIR__ . '/');


##connect to database...
require_once(DIR . 'func/db.php');
