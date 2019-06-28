<?php 
	include_once('session-variables.php'); 
	require_once "_shop_functions.php"; # shop functions 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="welcome to praise supermarket uganda..your online shopping center where you can view and purchase products
	with ease..register with us and enjoy numerous the numerous services we have to offer" />
	<meta name="keywords" content = "supermarket, category-products, login, register, products, cart, sub-category"/>
    <title>Shop | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- bootstrap-CSS -->
	<link href="assets/css/main.css" rel="stylesheet"><!-- main-CSS -->
    <link href="plugins/font_awesome/css/font-awesome.min.css" rel="stylesheet"><!-- font awesome-CSS -->
    <link href="assets/css/animate.css" rel="stylesheet"><!-- animate-CSS -->
	<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" /><!-- flexslider-CSS -->
	<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all" /> 
	<link href="assets/css/responsive.css" rel="stylesheet"><!-- responsive-CSS -->
	 <!-- jQuery UI - CSS -->
  	 <link href = "plugins/jQueryUI/jquery-ui.css" rel = "stylesheet">
	<!-- page specific custom style -->
  	<link rel="stylesheet" href="assets/css/shop_style.css">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/home/favicon.ico">
	<link href="assets/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="assets/js/owl.carousel.js"></script>
    <script src="assets/js/jquery-scrolltofixed-min.js"></script>
	<script>
	    $(document).ready(function() {
	        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

	        $('.header-middle').scrollToFixed();  
	        // previous summary up the page.

	        var summaries = $('.summary');
	        summaries.each(function(i) {
	            var summary = $(summaries[i]);
	            var next = summaries[i + 1];

	            summary.scrollToFixed({
	                marginTop: $('.header-middle').outerHeight(true) + 10, 
	                zIndex: 999
	            });
	        });
	    });
	</script>
    <script src="assets/js/bootbox.min.js"></script>
   	<!-- jQuery UI - js -->
	<script src = "plugins/jQueryUI/jquery-ui.js"></script>
    <script src="assets/js/cart.js"></script><!-- handle cart -->
</head><!--/head-->

<body>

	<!--	/.	include header -->
	<?php include_once 'header.php'; ?>		
	
		<div class="container">		
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Products</li>
				</ol>
			</div>	
			<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"><strong>Browse products</strong></h2>    	
				</div>			 		
			</div>
		</div>
	
	<section>
		<div class="container">

		<div class="w3_filter_controls_container"><!--	/. container | filter controls	-->
			<form action="" role="form" class="">

			<div class="row"><!--	/. top row | filter controls	-->
				<div class="col-md-4">
					<div class="form-group">		
						<label class="text-info" for="filter_price_slider">Price Filter</label>	                  
							<input type="hidden" class="price1" value="0" >
			                <input type="hidden" class="price2" value="500000"  >
							<p id="priceshow"></p>
			                <div id="slider-range"></div>
	          		</div>					
				</div>

				<div class="col-md-4">
					<div class="form-group">		
						<label class="text-info" for="input_select_category_id">Category</label>
						<?php 
		                      $get_category = $link->query('select category from category order by category asc');
		                  ?>
		                  <select class="form-control input_select_category" id="input_select_category_id" required>
		               
		                    <option selected disabled>-- filter category --</option>
		                    <?php while($row = $get_category->fetch_object()) {?>
		                    <option value="<?php echo $row->category; ?>"><?php echo $row->category; ?></option>
		                    <?php } ?>
		                  </select>
	          		</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">		
						<label class="text-info" for="input_select_subcategory_id">Sub-category</label>
		                  <?php 
		                      $get_subcategory = $link->query('select scategory from sub_category order by scategory asc');
		                  ?>
		                  <select class="form-control input_select_subcategory" id="input_select_subcategory_id" required>
		               
		                    <option selected disabled>-- filter subcategory --</option>
		                    <?php while($row = $get_subcategory->fetch_object()) {?>
		                    <option value="<?php echo $row->scategory; ?>"><?php echo $row->scategory; ?></option>
		                    <?php } ?>
		                  </select>
	          		</div>
				</div>
			</div><!--	/. top row | filter controls	-->

			<div class="row"><!--	/. second row | filter controls	-->
				<div class="col-md-4">
					<div class="form-group">		
						<label class="text-info" for="input_sort_price_id">Sort by Price</label>
						<select class="form-control input_sort_price" id="input_sort_price_id">		               
		                    <option selected disabled>-- Sort Price --</option>
		                    <option value="low_high">Lowest - Highest</option>
		                    <option value="high_low">Highest - Lowest</option>
		                  </select>
	          		</div>
				</div>	
				<div class="col-md-4">
					<div class="form-group">		
						<label class="text-info" for="input_sort_recent_id">Sort by Recent</label>
		                  <select class="form-control input_sort_recent" id="input_sort_recent_id">		               
		                    <option selected disabled>-- Sort by recent --</option>
		                    <option value="most_recent">Most Recent</option>
		                    <option value="old_items">Old Items</option>
		                  </select>
	          		</div>
				</div>	
				<div class="col-md-4">
					<div class="form-group">
						<label class="text-info" for="textbox_filter_search_id">Search</label>
						<input type="text" class="form-control textbox_filter_search" id="textbox_filter_search_id" placeholder="search items">
					</div>
				</div>	
			</div><!--	/. second row | filter controls	-->

			</form>
		</div><!--	/. container | filter controls	-->

		</div><!--	/. container	-->
	</section><!--	/. section	-->	


	<!-- products -->
<div class="shop_products">	 
	<div class="container">

	<?php 
	// require pagination.class
	require_once "pagination.class.php";
	
	// initiate the pagination method
	$perPage       	= new sbpagination();				    

	// normal querying of displaying all information where quantity is not not zero			    
	$sqlquery 		= "SELECT * FROM supermarket_products where not smkt_qty = '0'";
	$query 			= $sqlquery." limit 0," . $perPage->perpage;
	$getData       	= runQuery($link,$query);
	$rowcount      	= numRows($link,$sqlquery);
	$showpagination = $perPage->getAllPageLinks($rowcount);
	?>
<div class="col-md-12">
	<div id="overlay"><div><img src="assets/images/loader.gif" width="100px" height="100px"/></div></div>
		<div class="products-row">               
            <div class="pagination-result">
                <div class="row product-data">
			<?php 
				foreach($getData as $obj){
									
				$pass_code = $obj['product_code'];
				$pass_name = $obj['smkt_name'];
				$fieldsV = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
				$urlVar = "product-details.php?".http_build_query($fieldsV,'',"&");	

			?>
<form class="product-form">
	<div class="col-md-3 product-grids"> 
		<div class="agile-products">
			<a href="<?php echo $urlVar; ?>"><img src="<?php echo 'admin/admin_uploads/'.$obj['image_one'];?>" class="img-responsive" alt="img" 
				 style=" height: 183px"></a>
			<div class="agile-product-text">              
				<h5><a href="<?php echo $urlVar; ?>"><?php echo $obj['smkt_name'];?></a></h5> 
				<h6><?php echo $currency.' '.number_format($obj['smkt_price']);?></h6> 
				<input name="product_code" type="hidden" value="<?php echo $obj['product_code']; ?>">
				<input type="hidden" value="1" name="product_qty">	
				<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>			
			</div>
		</div> 
	</div>
</form>
	<?php } ?>
	<div class="clearfix"> </div><div class='w3_pagination_s'>
						<?php
							if(!empty($showpagination))
								{
						?>
								<ul class="pagination">
									<?php echo $showpagination; ?>
								</ul>
							<?php
								}
						?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="clearfix"> </div>
	</div><!--// container-->
</div> <!--// shop_products-->

		
        <!--	. include footer page	-->
        <?php include 'footer.php'; ?>

        <!--	. scripts at the bottom for faster page loading	-->
        <script src="assets/js/shop_filter.js"></script><!-- /. handle filter and sorting controls-->
        <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/marquee/jquery.marquee.min.js"></script>
			<script>
				$(function (){ 
			$('.marquee').marquee({ pauseOnHover: true, startVisible: true, duration: 10500 });
			$('.marquee_viewed').marquee({ pauseOnHover: true, direction: 'up', duration: 10000, startVisible: true });
			//@ sourceURL=pen.js
		});
		</script>
        <script src="assets/js/jquery.scrollUp.min.js"></script>
        <script src="assets/js/jquery.prettyPhoto.js"></script>
        <script src="assets/js/main.js"></script>
		
    </body>
</html>