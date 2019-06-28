<?php
require_once "session-variables.php";
/* prevent direct access to this page */
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
  $user_error = 'Access denied - direct call is not allowed...';
  trigger_error($user_error, E_USER_ERROR);
}
ini_set('display_errors',1);
 
/* if the 'term' variable is not sent with the request, exit */
if ( !isset($_REQUEST['term']) ) {
	exit;
}
 
/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
/* replace multiple spaces with one */
$term = preg_replace('/\s+/', ' ', $term);
 
$a_json = array();
$a_json_row = array();
 
$a_json_invalid = array(array("searchTerm" => $term, "label" => "Only letters and digits are permitted..."));
$json_invalid = json_encode($a_json_invalid);
 
/* SECURITY HOLE *************************************************************** */
/* allow space, any unicode letter and digit, underscore and dash                */
if(preg_match("/[^\040\pL\pN_-]/u", $term)) {
  print $json_invalid;
  exit;
}
/* ***************************************************************************** */

/* retrieve the search term that autocomplete sends */
$term = trim(strip_tags($_GET['term'])); 
$a_json = array();
$a_json_row = array();
if ($data = $link->query("SELECT * FROM supermarket_products WHERE smkt_name LIKE '%$term%' ORDER BY smkt_category, smkt_subcategory, smkt_name")) {

	while($row = mysqli_fetch_array($data)) {
		
		$smkt_name 				= htmlentities(stripslashes($row['smkt_name']));
		$smkt_category			= htmlentities(stripslashes($row['smkt_category']));
		$smkt_subcategory		= htmlentities(stripslashes($row['smkt_subcategory']));
		$code 					= htmlentities(stripslashes($row['product_code']));
		//$a_json_row["id"] 		= $code;
		$a_json_row["searchTerm"] 	= $smkt_name; //.'-'.$smkt_category.'-'.$smkt_subcategory;
		$a_json_row["label"] 	= $smkt_name; //.'-'.$smkt_category.'-'.$smkt_subcategory;
		
		array_push($a_json, $a_json_row);
	}
}
		// jQuery wants JSON data
		echo json_encode($a_json);
	flush();
$link->close();
?>