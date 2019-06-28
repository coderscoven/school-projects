<?php
// DATABASE CONFIGURATION

// define database configuration
define("DB_HOST", "localhost");
define("DB_NAME", "lastpriceug");
define("DB_USER", "root");
define("DB_PASS", "");

// using the new mysqli (mysql is deprecated) for database connection though PDO is encouraged
$link = mysqli_connect(DB_HOST, DB_USER, "", DB_NAME);

// Check connection*/
if($link === false){
	die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>