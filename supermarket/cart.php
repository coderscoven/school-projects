<?php include_once('session-variables.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cart | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- bootstrap-CSS -->
	<link href="assets/css/main.css" rel="stylesheet">
    <link href="plugins/font_awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/price-range.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
	 <!-- jQuery UI - CSS -->
  	 <link href = "plugins/jQueryUI/jquery-ui.css" rel = "stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/home/favicon.ico">
	    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owlcarousel/assets/owl.theme.default.min.css">

    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script><!-- jQuery library -->

    <script src="plugins/owlcarousel/owl.carousel.js"></script><!-- content carousel -->
    <script src="assets/js/jquery-scrolltofixed-min.js" type="text/javascript"></script>
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
    <script src="assets/js/cart.js"></script><!-- handle cart -->
   	<!-- jQuery UI - js -->
	<script src = "plugins/jQueryUI/jquery-ui.js"></script>
</head><!--/head-->

<body>

	<!--	/.	include header -->
	<?php include_once 'header.php'; ?>

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			
			<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center"><i class="fa fa-shopping-cart"></i>&nbsp;<strong>Cart
					(<span id="cart-items-count"><?PHP if(isset($_SESSION["products"])){echo count($_SESSION["products"]); } ?></span>)
					</strong></h2>    	
				</div>			 		
			</div>

<div class="table-responsive cart_info">
	<table class="table table-condensed" id="shopping-cart-results">
		<thead>
			<tr class="cart_menu">
				<th class="image">Item</th>
				<td class="description"></td>
				<th class="price">Price</th>
				<th class="quantity">Quantity</th>
				<th class="total">Total</th>
				<th class="action">Action</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php		
			
			if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) {
			
				$cart_box = '<ul class="cart-products-loaded">';
				$total = 0;
				foreach($_SESSION["products"] as $product){					
					$product_name 	= $product["smkt_name"]; 
					$product_price 	= $product["smkt_price"];
					$product_code 	= $product["product_code"];
					$product_qty 	= $product["product_qty"];
					//$product_image 	= $product["image_one"];
					$product_color 	= $product["smkt_color"];					
					$subtotal 		= ($product_price * $product_qty);
					$total 			= ($total + $subtotal);

					$get_prod_image = $link->query("select image_one from supermarket_products where product_code='$product_code'");
					//$get_prod_image->bindValue(':smkt_ref',$product_code, PDO::PARAM_STR);
					//$get_prod_image->execute();
					$get_prod_image_obj = $get_prod_image->fetch_Object();
			?>
				<tr>
					<td class="cart_product">
						<img src="<?php echo 'admin/admin_uploads/'.$get_prod_image_obj->image_one;?>" alt="" width="70px" height="70px" />
					</td>
					<td class="cart_description">
						<h4><a href=""><?php echo $product_name;?></a></h4>
						<p></p>
					</td>
					<td class="cart_price">
						<p><?php echo $currency.' '.number_format($product_price);?></p>
					</td>
					<td class="cart_quantity">
						<div class="cart_quantity_button">
						<input type="text" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" data-code="<?php echo $product_code; ?>" class="cart_quantity_input quantity" value="<?php echo $product_qty; ?>" size="2">	
						</div>				
					</td>
					<td class="cart_total">
						<a href="#" class="cart_total_price"><?php echo $currency.' '.number_format($product_price * $product_qty); ?></a>
					</td>
					<td class="cart_delete">
					<a href="#" title="Remove item" class="cart_quantity_delete remove-item" data-code="<?php echo $product_code; ?>"><i class="fa fa-times"></i></a>							
					</td>				
				</tr>					
			 <?php 
				 }	
				?>
					</tbody>	
					<tfoot>
					<tr>
					<td colspan="2"></td>
					<th colspan="2" class="cart_price"><p>TOTAL AMOUNT</p></th>
							<?php 
					if(isset($total)) {
					?>	
					<th class="cart-products-total cart_price">
						<p class="">
							<?php echo $currency.' '.number_format($total); ?>
						</p>
					</th>
					<th></th>
					<?php } ?>
				</tr>
					</tfoot>
					<?php 
						} 
			else {
			echo "<tr colspan='6'><td>Your Cart is empty</td></tr>";
		}		
		?>
				</table>
			</div>		
			
		</div>
	</section> <!--/#cart_items-->

<section>
		<div class="container">
			<div class="heading">
				<?php 
					if(isset($_SESSION['user_name'])){
				?>
				<h3>What would you like to do next?</h3>
				<h4>Proceed to&nbsp;<a href="checkout.php">Checkout!</a>
				<?php } else { ?>

				<h3>Inorder to checkout, you must be logged in?</h3>
				<h4>Proceed to <a href="login.php">Login</a> Or <a href="register.php">Register</a></h4>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
                            <li></li>
                        </ul>
							
					</div>
				</div>					
			</div>
		</div>
</section>
		
<div class="container">
<div class="row">
<div class="col-sm-12">

	<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

				<div class="owl-carousel owl-theme">
					<?php 
						$sql_recom_items = $link->query("SELECT * FROM supermarket_products where recommended = 'Yes' and not smkt_qty = 0  order by date desc");
						while($obj = $sql_recom_items->fetch_object()){
													
						$pass_code = $obj->product_code;
						$pass_name = $obj->smkt_name;
						$fields = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
						$url = "product-details.php?".http_build_query($fields,'',"&");		
					?>
						<div class="product-image-wrapper">
							<div class="single-products">
					            <img class="owl-lazy" data-src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>" width="150px" height="134px" alt="">
								<h2><?php echo $currency.' '.number_format($obj->smkt_price);?></h2>
								<p><?php echo $obj->smkt_name;?></p>
								<a href="<?php echo $url;?>" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>View</a>
							</div>
						</div>
          			<?php } ?>
          		</div>

					</div><!--/recommended_items-->	
		</div>
	</div>
</div>

	<!--	. include footer page	-->
	<?php include 'footer.php'; ?>
	
	<!--	. scripts at the bottom for faster page loading	-->
	          <script>
            jQuery(document).ready(function($) {
              $('.owl-carousel').owlCarousel({
                items: 4,
                lazyLoad: true,
                loop: true,
                margin: 10,                
			    autoplay:true,
			    autoplayTimeout:3000,
			    autoplayHoverPause:true
              });
            });
          </script>
    <script src="plugins/marquee/jquery.marquee.min.js"></script>
	<script>
		$(function (){ 
			$('.marquee').marquee({ pauseOnHover: true, startVisible: true, duration: 10500 });
			$('.marquee_viewed').marquee({ pauseOnHover: true, direction: 'up', duration: 10000, startVisible: true });
			//@ sourceURL=pen.js
		});
	</script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
	<script src="assets/js/functions.js"></script>

    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
	//It restrict the non-numbers
	var specialKeys = new Array();
	specialKeys.push(8,46); //Backspace
	function IsNumeric(e) {
		var keyCode = e.which ? e.which : e.keyCode;
		console.log( keyCode );
		var ret = ((keyCode >= 48 && keyCode <= 57) || specialKeys.indexOf(keyCode) != -1);
		return ret;
	}
</script>
</body>
</html>