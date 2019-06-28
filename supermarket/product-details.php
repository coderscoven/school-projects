<?php include_once('session-variables.php'); 	
 // user session name for recently viewed items
 // user not logged in


if(isset($_GET['passcode'])){

	$session_prod_code = $_GET['passcode'];

	// if the cookie exists, read it and unserialize it. If not, create a blank array
	if(array_key_exists('recentviews', $_COOKIE)) {
	    $cookie = $_COOKIE['recentviews'];
	    $cookie = unserialize($cookie);
	} else {
	    $cookie = array();
	}

	// add the value to the array and serialize
if(!in_array($session_prod_code, $cookie)){
	$cookie[] = $session_prod_code;
	$cookie = serialize($cookie);

	// save the cookie
	setcookie('recentviews', $cookie, time() + (86400 * 30), "/");
}

	/*
	$check_value_exists = $link->query("select * from recently_viewed where user_id='$guest'");
	//$checkQ = mysqli_fetch_assoc($check_value_exists);
    if ($check_value_exists->num_rows == 0) {
	    $insert_into_query = $link->query("insert into recently_viewed(user_id, product_code) values('$guest', '$session_prod_code')");
	} 
	else{
	$check_value_exists2 = $link->query("select * from recently_viewed where user_id='$guest' and product_code='$session_prod_code'");
	if ($check_value_exists2->num_rows == 0) { 
	    	$insert_into_query = $link->query("insert into recently_viewed(user_id, product_code) values('$guest', '$session_prod_code')");
		}
	}
	*/
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Product Details | E-Commerce</title>
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
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-picZoomer.css">
	    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owlcarousel/assets/owl.theme.default.min.css">

    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script><!-- jQuery library -->

    <script src="plugins/owlcarousel/owl.carousel.js"></script><!-- content carousel -->
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
    <script src="assets/js/cart.js"></script><!-- handle cart -->
   	<!-- jQuery UI - js -->
	<script src = "plugins/jQueryUI/jquery-ui.js"></script>
</head><!--/head-->

<body>

	<!--	/.	include header -->
	<?php include_once 'header.php'; ?>
	
	<section>
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="index.php">Home</a></li>
				  <li class="active">Product Information</li>
				</ol>
			</div>
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Product <strong>Details</strong></h2>    	
				</div>			 		
			</div>

			<div class="row"><!-- second row -->
				<div class="left-sidebar">
					<div class="col-sm-3">									
						<div class="brands_products"><!--brands_products-->
							<h2>Your Cart</h2>
								<div class="brands-name uri_sample_cart_items">
									<span id="load_external_cart"></span>

							</div>
						</div><!--/brands_products-->
				
						
					</div>
				</div>			
						
			
				<div class="col-sm-9 padding-right">
		
		<?php 		
						
			if((isset($_GET['passcode']))&&(isset($_GET['passname'])) && (isset($_GET['urlString'])))
			{	

			$passcode = mysqli_real_escape_string($link,$_GET['passcode']);
			$passname = mysqli_real_escape_string($link,$_GET['passname']);
			$encrypt = mysqli_real_escape_string($link,$_GET['urlString']);	
			

			$results = $link->query("SELECT * FROM supermarket_products WHERE product_code = '$passcode' AND smkt_name = '$passname'");

					if ($results) { 
					while($obj = $results->fetch_object()) {						
				
						?>
					
						<form class="product-form" role="form">
						
					<div class="product-details"><!--product-details-->					
			
						<div class="col-sm-5">
							<div class="view-product picZoomer" id="zoom">
								<img src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>"  alt=""  id="large-image-id" />
								
							</div>
						<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">

										<div class="item active">
							
<a href=""><img src="<?php echo file_exists("admin/admin_uploads/".$obj->image_two) ? 'admin/admin_uploads/'.$obj->image_two :'views/no-thumb.png';?>" alt="<?php echo $obj->image_two;?>"  onmouseover="document.getElementById('large-image-id').src=this.src;document.getElementById('large-image-id1').src=this.src;" width="85px" height="84px"></a>

<a href=""><img src="<?php echo file_exists("admin/admin_uploads/".$obj->image_three) ? 'admin/admin_uploads/'.$obj->image_three :'views/no-thumb.png' ;?>" alt="<?php echo $obj->image_three;?>" onmouseover="document.getElementById('large-image-id').src=this.src;document.getElementById('large-image-id1').src=this.src;" width="85px" height="84px"></a>

<a href=""><img src="<?php echo file_exists("admin/admin_uploads/".$obj->image_four) ? 'admin/admin_uploads/'.$obj->image_four :'views/no-thumb.png' ;?>" alt="<?php echo $obj->image_four;?>" onmouseover="document.getElementById('large-image-id').src=this.src;document.getElementById('large-image-id1').src=this.src;" width="85px" height="84px"></a>

										</div>
										<div class="item">
<a href=""><img src="<?php echo file_exists("admin/admin_uploads/".$obj->image_five)  ? 'admin/admin_uploads/'.$obj->image_five :'views/no-thumb.png';?>" alt="<?php echo $obj->image_five;?>" onmouseover="document.getElementById('large-image-id').src=this.src;document.getElementById('large-image-id1').src=this.src;" width="85px" height="84px"></a>

<a href=""><img src="<?php echo file_exists("admin/admin_uploads/".$obj->image_six) ? 'admin/admin_uploads/'.$obj->image_six:'views/no-thumb.png' ;?>" alt="<?php echo $obj->image_six;?>" onmouseover="document.getElementById('large-image-id').src=this.src;document.getElementById('large-image-id1').src=this.src;" width="85px" height="84px"></a>

<a href=""><img src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>" alt="<?php echo $obj->image_one;?>" onmouseover="document.getElementById('large-image-id').src=this.src;document.getElementById('large-image-id1').src=this.src;" width="85px" height="84px"></a>
										</div>
										
									</div>
								  <!-- Wrapper for slides -->

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">

							<div class="product-information"><!--/product-information-->
		
								<h2><?php echo $obj->smkt_name;?></h2>
								<p>Product ID:&nbsp;<b><?php echo $obj->product_code;?></b></p>
								<span>
									<span>Price:&nbsp;<?php echo $currency.' '.number_format($obj->smkt_price); ?></span>
									<br>
									<span>Qty Remaining:&nbsp;<label class="label_qty"><?php echo $obj->smkt_qty; ?></label></span>
								</span>
								<br>
								<p>
								<span><label class="w3_specify_qty">Specify Qty:</label>

									<input type="hidden" value="<?php echo $obj->smkt_qty; ?>" id="hidden_data_user_qty_input">
									<input name="product_code" type="hidden" value="<?php echo $obj->product_code; ?>">

									<input type="text" onkeypress="return IsNumeric(event);" ondrop="return false;" onpaste="return false;" name="product_qty" id="data_user_qty_input" required autocomplete="off" onkeyup="keyupFunctioin('<?php echo $obj->smkt_price; ?>')" placeholder='Qty' name="product_qty">
								
									<button type="submit"  class="btn btn-default" id="w3_btn_add_to_cart" title="Add to cart">
										<i class="fa fa-shopping-cart"></i> Add to cart
									</button>
								<span>
									<span>Amount:&nbsp;<label class="total_cost_label"><?php echo number_format($obj->smkt_price); ?></label></span>
								</p>
								<p class="text-warning" id="display_qty_error"></p>
							</div><!--/product-information-->
						
						</div>
			
					</div><!--/product-details-->
	
			</form>		
			
					</div><!--	/.	col-sm-9 padding-right -->							
			</div><!-- second row -->
			
			<div class="uri_product_details_panel"><!--category-tab-->
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-default">
						  <div class="panel-heading panel_custom_header text-white"><span>Detailed Description</span></div>
						  <div class="panel-body">
							<p>	<?php echo $obj->smkt_description; ?> </p>
						  </div>
						</div>
					</div>
				</div>
			</div>	
			<?php 
			} // while loop
		} // check fetch query	
						
	} // isset // get
?>

    <div class="row" style="padding-top: 1em; margin-top: 1em;">
        <div class="col-md-12">  		  
		  	<div class="recommended_items">
          <h2 class="title text-center">Recently <strong>Viewed</strong></h2> 

			

				<div class="owl-carousel owl-theme">
					<?php 
      // if the cookie exists, read it and unserialize it. If not, create a blank array
          if(array_key_exists('recentviews', $_COOKIE)) {

              $cookie = $_COOKIE['recentviews'];
              $cookie = unserialize($cookie);

          } else {
            $cookie = array();
          }

          // -------- loop through cookie array getting the product codes	
        foreach ($cookie as $key => $value) {   

        $get_supermarket_prod = $link->query("select * from supermarket_products where product_code='$value' limit 4");
        
        if ($get_supermarket_prod->num_rows > 0) {

        while ($row = $get_supermarket_prod->fetch_assoc()) {

            $pass_code = $row['product_code'];
            $pass_name = $row['smkt_name'];
            $fields_a = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
            $urlN = "product-details.php?".http_build_query($fields_a,'',"&");  
			
					?>
						<div class="product-image-wrapper">
							<div class="single-products">
					            <img class="owl-lazy img-responsive" data-src="<?php echo 'admin/admin_uploads/'.$row['image_one'];?>" alt="recently-viewed-image" style="height:200px">

								<h2><?php echo $currency.' '.number_format($row['smkt_price']);?></h2>
								<p><?php echo $row['smkt_name'];?></p>
								<a href="<?php echo $urlN;?>" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>View</a>
							</div>
						</div>
          			<?php          
			}
          }
        }
		?>
          		</div>
		</div><!--/recently-viewed-items-->	
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
            <!-- most-popular-ads --               
      <div class="trending-ads">
        <!-- slider --
        <div class="agile-trend-ads">
            <ul id="flexiselDemo1">
          
                <li>
      <?php 
      // if the cookie exists, read it and unserialize it. If not, create a blank array
          if(array_key_exists('recentviews', $_COOKIE)) {

              $cookie = $_COOKIE['recentviews'];
              $cookie = unserialize($cookie);

          } else {
            $cookie = array();
          }

          // -------- loop through cookie array getting the product codes

        foreach ($cookie as $key => $value) {   

        $get_supermarket_prod = $link->query("select * from supermarket_products where product_code='$value' limit 4");
        
        if ($get_supermarket_prod->num_rows > 0) {

        while ($row = $get_supermarket_prod->fetch_assoc()) {

            $pass_code = $row['product_code'];
            $pass_name = $row['smkt_name'];
            $fields_a = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
            $urlN = "product-details.php?".http_build_query($fields_a,'',"&");  
            ?>  
              <div class="col-md-3 biseller-column">
                <a href="<?php echo $urlN;?>">
                  <img src="<?php echo 'admin/admin_uploads/'.$row['image_one'];?>" alt="recently-viewed-image" height="200px" width="200px" />
                  <span class="price"><?php echo $currency.' '.number_format($row['smkt_price']);?></span>
                </a> 
                <div class="w3-ad-info">
                  <h5><?php echo $row['smkt_name'];?></h5>
                  <span></span>
                </div>
              </div>
            <?php 
            }
          }
        }

      /*}
        else {
            ?>
                    <h4>No view history currently available!</h4>
                  <?php   
        }
        */
          ?>
                </li>
            </ul>
          </div>   
      <!-- //slider --     
      </div>-->




        </div>
      </div>




		</div><!-- container -->
	</section>

			
  

	<!--	. include footer page	-->
	<?php include 'footer.php'; ?>
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
    <script>

    	function keyupFunctioin(argsv){


				var user_qty    = parseInt($("#data_user_qty_input").val());
				var qty_avail 	= parseInt($("#hidden_data_user_qty_input").val());
    			var price       = parseInt(argsv);

				if(user_qty > qty_avail){
					
					//$(".label_qty").html(qty_avail - user_qty);
					$(".total_cost_label").html(user_qty * price);

					$("#display_qty_error").html("Info: Excess available quantity entered!");
					$("#w3_btn_add_to_cart").prop("disabled", true);
				}
				
				else if (user_qty == 0){

					//$(".label_qty").html(qty_avail - user_qty);
					$(".total_cost_label").html(user_qty * price);

					$("#display_qty_error").html ("Info: Invalid quantity entered!");
					$("#w3_btn_add_to_cart").prop("disabled", true);					
				}
				
				else {
					//$(".label_qty").html(qty_avail - user_qty);
					$(".total_cost_label").html(user_qty * price);

					$("#display_qty_error").html ("");
					$("#w3_btn_add_to_cart").prop("disabled", false);
				}
				if ($("#data_user_qty_input").val() == '') {
					$(".total_cost_label").html(price);				
				}
    	}


    function refreshInterval(){
        
        $.ajax({
			url:"_brief_cart.php",
			cache:false,
			success:function(data){
				$("#load_external_cart").html(data);
				}
			});
		}
	var_interval = setInterval(refreshInterval,3000);

    </script>

        
	<!--	. scripts at the bottom for faster page loading	-->
	<!--/. -- flexisel-js -->
		<script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>	
			<script type="text/javascript">
				
				 $(window).load(function() {
					$("#flexiselDemo3").flexisel({
						visibleItems:1,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 5000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems:1
							}, 
							landscape: { 
								changePoint:640,
								visibleItems:1
							},
							tablet: { 
								changePoint:768,
								visibleItems:1
							}
						}
					});					
				});
				
			   </script>
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.picZoomer.js"></script>
        <script>
	        $(function() {
	            $('.picZoomer').picZoomer();
			});
    	</script>
    <script src="assets/js/bootbox.min.js"></script>
	<script src="js/price-range.js"></script>
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