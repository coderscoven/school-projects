<?php 
	#	----	DATABASE CRUD SCRIPTS

	// database connection
	require_once '../session-variables.php'; 
?>
<?php 

if(isset($_POST)) {

	$dataCol			=	$_POST['name'];
	$item_column_value	=	$_POST['value'];
	$item_table_id		=	$_POST['pk'];
	
$update_query = $link->query("update supermarket_products set $dataCol = '".$item_column_value."' WHERE smkt_id='".$item_table_id."'");
if ($update_query) {
	echo "Info: Information successfully updated!";
}
else {
	echo "Error: Failed to udate information!!";
}

}
?>