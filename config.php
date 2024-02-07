<?php
session_start();

$db_host = "localhost";
$db_user="root";
$db_password="";
$db_name="lookcook";
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);

// site url
define('SITE_URL',"http://localhost/lookook/");
//  set timezone of kolkata
$tz = 'Asia/Kolkata';   
date_default_timezone_set($tz);