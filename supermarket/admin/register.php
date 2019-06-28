<?php
// REGISTRATION CONFIGURATION
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, a PHP version smaller than 5.3.7 is required!");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    require_once("../modules/libraries/password_compatibility_library.php");
}
// require database connection
require_once("../modules/config/connect.php");
// require registration class
require_once("classes/Registration.php");
// load registraion method
$registration = new Registration();
// load registraion template
include("views/register.php");
?>













