<?php 
 session_start();

define('SITEURL' ,'http://localhost/salah-clien/');
define('DB_LOCLAHOST' ,'localhost');
define('DB_USER' ,'root');
define('DB_PASSWORD' ,'');
define('DB_NAME' ,'salah_cl');

$conn =mysqli_connect(DB_LOCLAHOST, DB_USER ,DB_PASSWORD) or die(mysqli_error());
$db_select=mysqli_select_db($conn , DB_NAME) or die(mysqli_error());
?>