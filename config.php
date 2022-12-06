<?php
session_start();

define('BURL', 'https://abdokaram22.github.io/medical-services/');
define('BURLA', 'https://abdokaram22.github.io/medical-services/admin/');
define('ASSETS', 'https://abdokaram22.github.io/medical-services/assets/');

define('DIRA', __DIR__ . '/admin/');
define('DIR', __DIR__ . '/');


##connect to database...
require_once(DIR.'func/db.php');
