<?php

if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, a PHP version smaller than 5.3.7 is required!");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../modules/libraries/password_compatibility_library.php");
}
// load the database connection
require_once("../modules/config/connect.php");
// load the login class
require_once("classes/Login.php");
$login = new Login();
// redirect on successful login or remain on same page and display errors
if ($login->isUserLoggedIn() == true) {
	include("dashboard.php");
} else {
    include("views/login.php");
}

?>

