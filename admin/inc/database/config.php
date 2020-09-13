<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'twick');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
session_start();
error_reporting(0);
require('dbFunc.php');
require('adminFunc.php');
