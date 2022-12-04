<?php
session_start();

define('BURL', 'http://localhost:8080/project_3/');
define('BURLA', 'http://localhost:8080/project_3/admin/');
define('ASSETS', 'http://localhost:8080/project_3/assets/');

define('DIRA', __DIR__ . '/admin/');
define('DIR', __DIR__ . '/');


##connect to database...
require_once(DIR.'func/db.php');


