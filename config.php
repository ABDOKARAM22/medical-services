<?php
session_start();

define('BURL', 'http://localhost/New_folder/medical-services/');
define('BURLA', 'http://localhost/New_folder/medical-services/admin/');
define('ASSETS', 'http://localhost/New_folder/medical-services/assets/');

define('DIRA', __DIR__ . '/admin/');
define('DIR', __DIR__ . '/');


##connect to database...
require_once(DIR . 'func/db.php');
