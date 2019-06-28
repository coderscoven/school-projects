<?php include_once('session-variables.php'); 
	// should only be viewed when items are in cart

	if(!isset($_SESSION["products"]) && count($_SESSION["products"])<0) {
		header('Location: index.php');
	} else if (!isset($_SESSION['user_name'])) {
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- bootstrap-CSS -->
	<link href="assets/css/main.css" rel="stylesheet"><!-- main-CSS -->
    <link href="plugins/font_awesome/css/font-awesome.min.css" rel="stylesheet"><!-- font awesome-CSS -->
    <link href="assets/css/animate.css" rel="stylesheet"><!-- animate-CSS -->
	<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" /><!-- flexslider-CSS -->
	<link href="assets/css/responsive.css" rel="stylesheet"><!-- responsive-CSS -->
	 <!-- jQuery UI - CSS -->
  	 <link href = "plugins/jQueryUI/jquery-ui.css" rel = "stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/home/favicon.ico">
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
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
    <script src="assets/js/jquery-scrolltofixed-min.js"></script>
	<script src="assets/js/bootbox.min.js"></script>
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
				  <li><a href="#">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div><!--/breadcrums-->

	<form role="form" id="checkout_form_id" class="">

			<div class="register-req">
				<p>Please check and make sure all information is in order</p>
			</div><!--/register-req-->

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-4">
						<div class="shopper-info">
							<p>Review your Information</p>
								<input type="text" name="checkout_full_names" id="checkout_full_names" placeholder="your full Names" title="Enter your full names" required autocomplete="off">

								<input type="text" value="<?php echo $_SESSION['user_name'];?>" disabled>
								<input type="hidden" name="checkout_username" id="checkout_username" value="<?php echo $_SESSION['user_name'];?>">

								<input type="text" value="<?php echo $_SESSION['user_phone']; ?>" disabled>
								<input type="hidden" name="checkout_phone_contact" id="checkout_phone_contact" value="<?php echo $_SESSION['user_phone']; ?>">
							
						</div>
					</div>
					<div class="col-sm-4 clearfix">
						<div class="bill-to">
							<p>Delivery</p>
							
									<select id="checkout_delivery_method" name="checkout_delivery_method" required>
										<option selected disabled>-- select delivery method --</option>
										<option value="Delivery">Delivery</option>
										<option value="In-person">In-person</option>
									</select>
									<p style="font-size: 14px;padding:5px 0; margin-top: 5px; font-weight: 700" class="text-info">If delivery option (above), please state your location below: (Be precise and exact)</p>
									<textarea id="checkout_location" name="checkout_location"  placeholder="your location (100 characters ONLY)" maxlength="100" rows="5"></textarea>
								
						</div>
					</div>
					<div class="col-sm-4">
						<div class="order-message">
							<p>Notes on your order(s) - Optional</p>
							<textarea name="checkout_notes" id="checkout_notes" maxlength="150" placeholder="Notes about your order (150 characters)" rows="4"></textarea>
						</div>	
					</div>					
				</div>
			</div>
			<div class="review-payment">
				<h2>Review &amp; Payment</h2>
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
				<!--<th class="action">Action</th>-->
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
		$product_color 	= $product["smkt_color"];					
		$subtotal 		= ($product_price * $product_qty);
		$total 			= ($total + $subtotal);

		$get_prod_image = $link->query("select image_one from supermarket_products where product_code='$product_code'");
		$get_prod_image_obj = $get_prod_image->fetch_Object();
			?>
			<!--/. hidden cart inputs	./-->
			<input type="hidden" name="checkout_item_name[]" value='<?php echo $product_name;?>'>
			<input type="hidden" name="checkout_item_qty[]" value='<?php echo $product_qty;?>'>
			<input type="hidden" name="checkout_item_tcost[]" value='<?php echo ($product_price * $product_qty);?>'>
			<input type="hidden" name="checkout_item_code[]" value='<?php echo $product_code;?>'>			
			
			<!--/. hidden cart inputs	./-->
			
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
								<?php echo $product_qty; ?>
						</div>				
					</td>
					<td class="cart_total">
						<a href="#" class="cart_total_price"><?php echo $currency.' '.number_format($product_price * $product_qty); ?></a>
					</td>
					<!--
					<td class="cart_delete">
					<a href="#" title="Remove item" class="cart_quantity_delete remove-item" data-code="<?php echo $product_code; ?>"><i class="fa fa-times"></i></a>							
					</td>	
					-->			
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
					<input type="hidden" value="<?php echo $total; ?>" name="input_total_orders">
				<?php 
			} 		
		?>
				</table>
			</div>
		<div class="checkout_notice_block">
			<span><span class="text-danger">*</span>Have an identification when receiving your orders</span>
		</div>
			<div class="checkout_button_block">
					<button type="submit" id="checkout_button" name="checkout_button" class="btn btn-primary">Confirm Checkout</button>
			</div>

			<?php 
	// better you just use ajax here 
	/*
	if(isset($_POST['checkout_button'])){
		
		// initialize variables from form 
		$checkout_full_names 	  = $_POST['checkout_full_names'];
		$checkout_username 		  = $_POST['checkout_username'];
		$checkout_phone_contact   = $_POST['checkout_phone_contact'];
		$checkout_delivery_method = $_POST['checkout_delivery_method'];
		
		$checkout_location 		  = $_POST['checkout_location'];
		$checkout_notes		 	  = $_POST['checkout_notes'];
		
		$checkout_item_name 		= $_POST['checkout_item_name'];
		$checkout_item_qty		 	= $_POST['checkout_item_qty'];
		$checkout_item_tcost 		= $_POST['checkout_item_tcost'];
		$checkout_item_code		 	= $_POST['checkout_item_code'];
		
		// custom variables 
		$checkout_Sinsertion = 1;
		$checkout_Einsertion = 1;
		$checkout_Scounter = array();
		$checkout_Ecounter = array();
		$boolvalue = false;
		
		if(empty($checkout_full_names)){
		?>
			<script>
				$(document).ready(function(){
					bootbox.alert("Error: Please enter your full names!");
				});
			</script>
		<?php 
		}
		else if(strlen($checkout_full_names) < 4){
		?>
			<script>
				$(document).ready(function(){
					bootbox.alert("Error: Invalid full names entered!");
				});
			</script>
			<?php 		
		}
		else if(($checkout_delivery_method == 'Delivery') && empty($checkout_location )) {
			?>
			<script>
				$(document).ready(function(){
					bootbox.alert("Info: Please enter your Location since you selected Delivery!");
				});
			</script>
			<?php 
		}
		else {
			// generate an orders receipt
			$random_id_length = 7;
			$rnd_id = crypt(uniqid(rand(),1));
			$rnd_id = strip_tags(stripslashes($rnd_id));
			$rnd_id = str_replace(".","",$rnd_id);
			$rnd_id = strrev(str_replace("/","",$rnd_id));
			$order_receipt = substr($rnd_id,0,$random_id_length);
		
			// cart items are in array format
			
			foreach($checkout_item_name as $key=>$n){
				
				// save in single orders table 
				$checkout_single_orders = $link->query("insert into customer_orders 
				(
				customer_username,
				full_names,
				product_code,
				item_name,
				item_price,
				item_qty,
				location,
				delivery,
				payment_status,
				order_status,
				order_receipt,
				notes) values 				
				(
				'$checkout_username',
				'$checkout_full_names',
				'$checkout_item_code[$key]',
				'$n',
				'$checkout_item_tcost[$key]',
				'$checkout_item_qty[$key]',
				'$checkout_location',
				'$checkout_delivery_method',
				'Not Paid',
				'New order',
				'$order_receipt',
				'$checkout_notes')");
				
				if($checkout_single_orders) {
					//$checkout_Scounter[] = $checkout_Sinsertion++;
					$boolvalue = true;
				} else { 
					//$checkout_Ecounter[] = $checkout_Einsertion++;
					$boolvalue = false;
				} // else check
				
			}// foreach
				
			
			// check insertion query counter
			if($boolvalue == true) {

			// save in group orders table 
			$checkout_grouped_orders = $link->query("insert into grouped_orders 
				(
				customer_username,
				order_receipt,
				order_status,
				payment_status,
				full_names) values 				
				(
				'$checkout_username',
				'$order_receipt',
				'New order',
				'Not Paid',
				'$checkout_full_names')");
			
				// reduce quantity of products from supermarket_products inventory
			 foreach($checkout_item_code as $keyy=>$nn){
				$update_products_store_query = $link->query("update supermarket_products set smkt_qty = smkt_qty - '$checkout_item_qty[$keyy]' where product_code = '$nn'");
			}
				?>
			<script>
				$(document).ready(function(){
					alert("Info: Your checkout was successful: Note that you can view your checkout history under the account link!");
					
				});
			</script>
			<meta http-equiv="refresh" content="1;url=index.php" />
			<?php 	
				
				
				// unset the cart session 
				//if (isset($_SESSION["products"])) {
							unset($_SESSION["products"]); 
				//}
				
				
			} else {
				?>
			<script>
				$(document).ready(function(){
					bootbox.alert("Error: There was error during your checkout!");
				});
			</script>
		<?php 
			// delete any insertions that went through
			$delete_q = $link->query("delete from customer_orders where order_receipt = '$order_receipt'");
			$delete_q = $link->query("delete from grouped_orders where order_receipt = '$order_receipt'");
			
			} // else error occurred during insertion
			
		}// else validation
		
	}
	*/
	// isset // post // submit // button			
	?>
		</form>
		</div>
	</section> <!--/#cart_items-->
	<script>
		$(function(){
			$("#checkout_form_id").on("submit", function(e){

				e.preventDefault();

					$.ajax({
					  url: "_checkout.php", 
					  type: "POST",       
					  data: new FormData(this),
					  contentType: false,   
					  cache: false,         
					  processData:false, 
					  success: function(data)
					  {
						bootbox.alert(data);
					  }
				});	
			});
		});
	</script>

	<!--	. include footer page	-->
	<?php include 'footer.php'; ?>	  

	<!--	. scripts at the bottom for faster page loading	-->

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