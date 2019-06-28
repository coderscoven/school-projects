<?php 
    // include database connection files and other global variables
    // hide notice
    error_reporting(E_ALL & ~E_NOTICE);

    // start session 
    session_start();

    // database connection
    include_once('modules/config/connect.php');

    // url iles
    include_once('modules/config/links-encryption.php');

    // ugandan currency symbol
    $currency = 'Ugx.'; 

    // time zone +3
    $timezone = new DateTimeZone("Africa/Nairobi");

    // current date/time method
    $dt = new DateTime();

    // each symbol
    $each = '@';

    // globals
    define("NEW_ORDER", "New order");
    define("OLD_ORDER", "Old order");
    define("PAID", "Paid");
    define("NOT_PAID", "Not Paid");
    define("DELIVERED", "Delivered");
    define("PICKED", "Picked");
    
    
/*

 

//---------------------
// if the cookie exists, read it and unserialize it. If not, create a blank array
    if(array_key_exists('recentviews', $_COOKIE)) {
        $cookie = $_COOKIE['recentviews'];
        $cookie = unserialize($cookie);
            } else {$cookie = array();}

    // grab the values from the original array to use as needed
    $recent3 = $cookie[0];
    $recent2 = $cookie[1];
    $recent1 = $cookie[2];

    */
 



   

?>