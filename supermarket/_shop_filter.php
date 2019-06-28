<?php 
	#	----------------	HANDLE SERVER-SIDE REQUESTS FOR shop.php CONCERNING FITERING AND SORTING AND PAGINATION

	require_once "session-variables.php"; # database connection

	require_once "_shop_functions.php"; # shop functions

	//	-----------------------------------

	require_once("pagination.class.php"); # pagination class
	$perPage       = new sbpagination();; # create a pagination method


	$eprice						= "";
	$textbox_filter_search  	= "";
	$input_select_category		= "";
	$input_select_subcategory	= "";
	$input_sort_price			= "";
	$input_sort_recent			= "";

	$sprice 					= isset($_REQUEST['sprice'])?$_REQUEST['sprice']:"";
	$eprice 					= isset($_REQUEST['eprice'])?$_REQUEST['eprice']:"";
	$textbox_filter_search 		= isset($_REQUEST['textbox_filter_search'])?$_REQUEST['textbox_filter_search']:"";
	$input_select_category 		= isset($_REQUEST['input_select_category'])?$_REQUEST['input_select_category']:"";
	$input_select_subcategory 	= isset($_REQUEST['input_select_subcategory'])?$_REQUEST['input_select_subcategory']:"";
	$input_sort_price 			= isset($_REQUEST['input_sort_price'])?$_REQUEST['input_sort_price']:"";
	$input_sort_recent 			= isset($_REQUEST['input_sort_recent'])?$_REQUEST['input_sort_recent']:"";



	#	-----------------	---------------	-------------------	---------------

/*	if (isset($_GET['input_scategory_hidden'])) {
	
	$grocery_store = mysqli_real_escape_string($link, $_GET['input_scategory_hidden']);

	$sqlquery = "select * from supermarket_products where smkt_category='$grocery_store' and not smkt_qty = '0'";  # fetch query

	$page = 1; # first page numbering starts
	if(!empty($_GET["page"])) {
		$page = $_GET["page"];
	}
	$start 	  = ($page-1)*$perPage->perpage;
	if($start < 0) $start = 0;

	# ----------------------------------- query concatenation starts here
		
		// category			  
		if(!empty($input_select_category)){
			$sqlquery  .= " and smkt_category = '$input_select_category'";	
		}
		// sub-category			  
		if(!empty($input_select_subcategory)){
			$sqlquery  .= " and smkt_subcategory = '$input_select_subcategory'";	
		}
		// price low-2-high | high-2-low	  
		  if(!empty($input_sort_price)){
			if($input_sort_price == 'low_high'){
				$sqlquery  .= " order by smkt_price asc";	
			} else if($input_sort_price == 'high_low'){
				$sqlquery  .= " order by smkt_price desc";				
			}
		  }
	  
		// most recent	  
		  if(!empty($input_sort_recent)){
			if($input_sort_recent == 'most_recent'){
				$sqlquery  .= " order by date asc";	
			} else if($input_sort_recent == 'old_items'){
				$sqlquery  .= " order by date desc";				
			}
		  }
		  
		// textbox
		if(!empty($textbox_filter_search)){
		  $sqlquery  .= " and smkt_name like '%$textbox_filter_search%'";	  
		}
	  
		// price range slider
		if(!empty($sprice) && !empty($eprice)){
		  $sqlquery .= " and (smkt_price >='$sprice' and smkt_price <='$eprice')";
		}
  	# ----------------------------------- query concatenation ends here


	$query   =  $sqlquery . " limit " . $start . "," . $perPage->perpage; 
	$getData = runQuery($link,$query);

	$rowcount      = numRows($link,$sqlquery);
	$showpagination = $perPage->getAllPageLinks($rowcount);	
	
	$output = '';


	if($rowcount > 0)	{	# did the query return and results; if so load the information
 	 
 	foreach($getData as $product_data){
 		$output .= "
<form class='product-form'>
		<div class='col-md-3 product-grids'> 
			<div class='agile-products'>
				<a href=".$urlVar."><img src='admin/admin_uploads/".$product_data['image_one']."' class='img-responsive' alt='img' 
					 style='height: 183px'></a>
				<div class='agile-product-text'>              
					<h5><a href=".$urlVar.">".$product_data['smkt_name']."</a></h5> 
					<h6>".$currency." ".number_format($product_data['smkt_price'])."</h6> 
					<input name='product_code' type='hidden' value=".$product_data['product_code'].">
					<input type='hidden' value='1' name='product_qty'>	
						<button type='submit' class='w3ls-cart pw3ls-cart'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add to cart</button>
					</div>
			</div> 
		</div>
</form>"; 

 		} // foreac looping through results 

 }  else { 
 	echo "<h3 class='text-center text-warning'>No Results were found</h3>";
 } # query didnot return any results

	if(!empty($showpagination))
	{
		$output .= "
	<div class='clearfix'> </div><div class='w3_pagination_s'><ul class='pagination'>".$showpagination."</ul></div>";
	}
	echo $output;

	die();
} */ 


	#else {


	$sqlquery = "select * from supermarket_products where not smkt_qty = '0'";  # fetch query

	$page = 1; # first page numbering starts
	if(!empty($_GET["page"])) {
		$page = $_GET["page"];
	}
	$start 	  = ($page-1)*$perPage->perpage;
	if($start < 0) $start = 0;

	# ----------------------------------- query concatenation starts here
		
		// category			  
		if(!empty($input_select_category)){
			$sqlquery  .= " and smkt_category = '$input_select_category'";	
		}
		// sub-category			  
		if(!empty($input_select_subcategory)){
			$sqlquery  .= " and smkt_subcategory = '$input_select_subcategory'";	
		}
		// price low-2-high | high-2-low	  
		  if(!empty($input_sort_price)){
			if($input_sort_price == 'low_high'){
				$sqlquery  .= " order by smkt_price asc";	
			} else if($input_sort_price == 'high_low'){
				$sqlquery  .= " order by smkt_price desc";				
			}
		  }
	  
		// most recent	  
		  if(!empty($input_sort_recent)){
			if($input_sort_recent == 'most_recent'){
				$sqlquery  .= " order by date desc";	
			} else if($input_sort_recent == 'old_items'){
				$sqlquery  .= " order by date asc";				
			}
		  }
		  
		// textbox
		if(!empty($textbox_filter_search)){
		  $sqlquery  .= " and smkt_name like '%$textbox_filter_search%'";	  
		}
	  
		// price range slider
		if(!empty($sprice) && !empty($eprice)){
		  $sqlquery .= " and (smkt_price >='$sprice' and smkt_price <='$eprice')";
		}
  	# ----------------------------------- query concatenation ends here


	$query   =  $sqlquery . " limit " . $start . "," . $perPage->perpage; 
	$getData = runQuery($link,$query);

	$rowcount      = numRows($link,$sqlquery);
	$showpagination = $perPage->getAllPageLinks($rowcount);	
	
	$output = '';


	if($rowcount > 0)	{	# did the query return and results; if so load the information
 	 
 	foreach($getData as $product_data){
 		$output .= "
<form class='product-form'>
		<div class='col-md-3 product-grids'> 
			<div class='agile-products'>
				<a href=".$urlVar."><img src='admin/admin_uploads/".$product_data['image_one']."' class='img-responsive' alt='img' 
					 style='height: 183px'></a>
				<div class='agile-product-text'>              
					<h5><a href=".$urlVar.">".$product_data['smkt_name']."</a></h5> 
					<h6>".$currency." ".number_format($product_data['smkt_price'])."</h6> 
					<input name='product_code' type='hidden' value=".$product_data['product_code'].">
					<input type='hidden' value='1' name='product_qty'>	
						<button type='submit' class='w3ls-cart pw3ls-cart'><i class='fa fa-cart-plus' aria-hidden='true'></i> Add to cart</button>
					</div>
			</div> 
		</div>
</form>"; 

 		} // foreac looping through results 

 }  else { 
 	echo "<h3 class='text-center text-warning'>No Results were found</h3>";
 } # query didnot return any results

	if(!empty($showpagination))
	{
		$output .= "
	<div class='clearfix'> </div><div class='w3_pagination_s'><ul class='pagination'>".$showpagination."</ul></div>";
	}
	echo $output;
	
	die();
#}
?>