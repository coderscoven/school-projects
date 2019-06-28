<?php include_once('session-variables.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="welcome to praise supermarket uganda..your online shopping center where you can view and purchase products
	with ease..register with us and enjoy numerous the numerous services we have to offer" />
	<meta name="keywords" content = "supermarket, category-products, login, register, products, cart, sub-category"/>
    <title>Home | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- bootstrap-CSS -->
	<link href="assets/css/main.css" rel="stylesheet"><!-- main-CSS -->
    <link href="plugins/font_awesome/css/font-awesome.min.css" rel="stylesheet"><!-- font awesome-CSS -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet"><!-- animate-CSS -->
    <!--
	<link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />-- flexslider-CSS -->
	<link href="assets/css/responsive.css" rel="stylesheet"><!-- responsive-CSS -->
	 <!-- jQuery UI - CSS -->
  	 <link href = "plugins/jQueryUI/jquery-ui.css" rel = "stylesheet">
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/home/favicon.ico"><!-- favicon  -->
	    <!-- Owl Stylesheets -->
    <link rel="stylesheet" href="plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/owlcarousel/assets/owl.theme.default.min.css">

    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script><!-- jQuery library -->

    <script src="plugins/owlcarousel/owl.carousel.js"></script><!-- content carousel -->

    <script src="assets/js/jquery-scrolltofixed-min.js"></script><!-- make header fixed on scroll down -->
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
	<!--
	<link href="assets/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider --
    <script src="assets/js/owl.carousel.js"></script>!-- content carousel -->
</head><!--/head-->

<body>


	<!--	/.	include header -->
	<?php include_once 'header.php'; ?>

	<!--	/.	slider	starts here -->
	<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Praise</span> Supermarket</h1>
									<h2>Welcome</h2>
									<p>Your E-Commerce supermarket is now opened; buy products with no hurdles and puddles!</p>
								</div>
								<div class="col-sm-6">
									<img src="assets/images/home/c1.jpg" class="girl img-responsive" alt="supermarket-front" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Praise</span> Supermarket</h1>
									<h2>Quick Access &amp; Convenient</h2>
									<p>Shopping has never been this easy. Find what you want at your own comfort from your phone or PC</p>
								</div>
								<div class="col-sm-6">
									<img src="assets/images/home/c2-1.jpg" class="girl img-responsive" alt="phone-pc-cart" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Praise</span> Supermarket</h1>
									<h2>Everything you need</h2>
									<p>From food stuffs to beverages to clothing; we got it all!</p>
								</div>
								<div class="col-sm-6">
									<img src="assets/images/home/c3.jpg" class="img-responsive" alt="aisle-1" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
												
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title w3_accordian_panel_title"><a href="shop.php?category=all">All</a></h4>
								</div>
							</div>
							
								<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title w3_accordian_panel_title"><a href="<?php echo $url1;?>">Grocery Store&nbsp;<span class="badge bg-teal pull-right"><?php echo $Cat1_counter->grocery_store_count; ?></span></a></h4>
								</div>
							</div>						
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title w3_accordian_panel_title"><a href="<?php echo $url2;?>">Electronics&nbsp; <span class="badge bg-teal pull-right"><?php echo $Cat2_counter->electronic_store_count; ?></span></a></h4>
								</div>
							</div>

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title w3_accordian_panel_title"><a href="<?php echo $url3;?>">Health &amp; Beauty&nbsp; <span class="badge bg-teal pull-right"><?php echo $Cat3_counter->healthbeauty_count; ?></span></a></h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title w3_accordian_panel_title"><a href="<?php echo $url4;?>">Photos, Gifts &amp; office&nbsp; <span class="badge bg-teal pull-right"><?php echo $Cat4_counter->giftsphotosoffice_count; ?></span></a></h4>
								</div>
							</div>

						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Sub-Category</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li class="w3_accordian_panel_title"><a href="<?php echo $urls1;?>">Home Appliances&nbsp; <span class="badge bg-teal pull-right"><?php echo $Scat3_counter->selectronic_store_count; ?></span></a></li>
									<li class="w3_accordian_panel_title"><a href="<?php echo $urls2;?>">Food store&nbsp; <span class="badge bg-teal pull-right"><?php echo $Scat1_counter->sfood_store_count; ?></span></a></li>
									<li class="w3_accordian_panel_title"><a href="<?php echo $urls3;?>">Beverages store&nbsp; <span class="badge bg-teal pull-right"><?php echo $Scat2_counter->sbeverages_store_count; ?></span></a></li>
									<li class="w3_accordian_panel_title"><a href="<?php echo $urls4;?>">Personal Health&nbsp; <span class="badge bg-teal pull-right"><?php echo $Scat4_counter->shealthbeauty_count; ?></span></a></li>
									<li class="w3_accordian_panel_title"><a href="<?php echo $urls5;?>">Office stationary&nbsp; <span class="badge bg-teal pull-right"><?php echo $Scat5_counter->sgiftsphotosoffice_count; ?></span></a></li>
								</ul>
													


							</div>
						</div><!--/brands_products-->
						<br />

						<h2>Viewed</h2>
						<div class="w3_recently_viewed marquee_viewed">

							<div class="">
				        	
				        		<ul class="">
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
				            <li class="">
				                <a href="<?php echo $urlN;?>">
				                  <img src="<?php echo 'admin/admin_uploads/'.$row['image_one'];?>" alt="recently-viewed-image" height="50px" width="50px" />				                  
				                  <span><?php echo $row['smkt_name'];?></span>&nbsp;@
				                  <span><?php echo number_format($row['smkt_price']);?></span>
				                </a> 
				              </li>
				              <hr />
				            <?php 
				            }
				          }
        				}
          			?>
          		</ul>
						</div>
			</div>

						<div class="shipping">
							<h2>Adverts</h2>
							<div class="shipping text-center"><!--shipping-->
							
								<img src="assets/images/home/shipping.jpg" alt="adverts" class="img-responsive" />
							</div><!--/shipping-->
						</div>
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
						<h2 class="title text-center">Featured Items</h2>
							<script>
					            $(document).ready(function() {
									$("#owl-demo5").owlCarousel({							 
									  autoPlay: 5000, //Set AutoPlay to 5 seconds							 
									  items :4,           
									  lazyLoad: true,  
								      autoplay:true,
									  itemsDesktop : [640,5],
									  itemsDesktopSmall : [414,4],
									  //navigation : true		
								      autoplayHoverPause:true					 
									});	
					            });
						</script>
				<div id="owl-demo5" class="owl-carousel owl-theme">					
						<?php 		
				
						$sql = $link->query("SELECT * FROM supermarket_products where not smkt_qty = 0");
						if($sql){

						while($obj = $sql->fetch_object()){
													
						$pass_code = $obj->product_code;
						$pass_name = $obj->smkt_name;
						$fieldsV = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
						$urlVar = "product-details.php?".http_build_query($fieldsV,'',"&");	
							
					?>			

			<!--<div class="col-sm-4">-->
				<div class="product-image-wrapper">
					<div class="single-products">

						<form class="product-form">
							<div class="productinfo text-center">
								<img class="owl-lazy" data-src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>" alt="featured-items-gallery" width="100px" height="120px" />
								<h2><?php echo $currency.' '.number_format($obj->smkt_price);?></h2>
								<p class="uri_prod_name"><?php echo $obj->smkt_name;?></p>
							</div>
								<input name="product_code" type="hidden" value="<?php echo $obj->product_code; ?>">
								<input type="hidden" value="1" name="product_qty">	

								<div class="product-overlay">
									<div class="overlay-content">
										<!--<img src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>" alt="" class="img-circle" />-->
										<p class="uri_prod_title"><?php echo $obj->smkt_name;?></p>
										<p class="uri_prod_price"><?php echo $currency.' '.number_format($obj->smkt_price);?></p>
										<p>											
											<button type="submit" class="btn btn-default add_to_cart_btn w3_cart_add_btn" title="Add to cart"><i class="fa fa-shopping-cart"></i></button>												
										</p>
									</div>
								</div>
						</form>
							
					</div>					
					<div class="choose">								
						<ul class="nav nav-pills nav-justified">
							<li><a href="<?php echo $urlVar; ?>" class="btn btn-warning uri_view_btn">View</a></li>					
						</ul>
					</div>
		
				</div>	
			<?php 							
					}
				}						
			?>
				<!--</div>--features_items-->
			</div><!--owl carousel-->
					

										<div class="category-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#beverages_tab_id" data-toggle="tab">Beverages</a></li>
								<li><a href="#foodstore_tab" data-toggle="tab">Food Store</a></li>
								<li><a href="#stationary_tab" data-toggle="tab">Stationary</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="beverages_tab_id" >

			<?php 				
							
				$beverages_sql = $link->query("SELECT * FROM supermarket_products WHERE smkt_subcategory='Beverages' and not smkt_qty = 0 LIMIT 4");
				while($obj_beverages = $beverages_sql->fetch_object()){
													
				$pass_code = $obj_beverages->product_code;
				$pass_name = $obj_beverages->smkt_name;
				$fields = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
				$Aurl = "product-details.php?".http_build_query($fields,'',"&");	
				
				?>
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="<?php echo 'admin/admin_uploads/'.$obj_beverages->image_one;?>" alt="" height="137px" />
								<h2><?php echo $currency.$obj_beverages->smkt_price;?></h2>
								<p><?php echo $obj_beverages->smkt_name;?></p>
									<a href="<?php echo $Aurl;?>"  class="btn btn-warning uri_view_btn w3_tabs_btn">View</a>									
								</div>
							
						</div>
					</div>
				</div>
			<?php 
			}
		?>

							</div>
							
							<div class="tab-pane fade" id="foodstore_tab" >

				<?php 
									
				$food_store_sql = $link->query("SELECT * FROM supermarket_products WHERE smkt_subcategory='Food Store' and not smkt_qty=0 LIMIT 4");
				while($food_store = $food_store_sql->fetch_object()){
																																	
				$pass_code = $food_store->product_code;
				$pass_name = $food_store->smkt_name;
				$fields = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
				$Burl = "product-details.php?".http_build_query($fields,'',"&");
					
							?>
					<div class="col-sm-3">
						<div class="product-image-wrapper">
							<div class="single-products">
								<div class="productinfo text-center">
									<img src="<?php echo 'admin/admin_uploads/'.$food_store->image_one;?>" alt="" height="137px" />
									<h2><?php echo $currency.$food_store->smkt_price;?></h2>
									<p><?php echo $food_store->smkt_name;?></p>
										<a href="<?php echo $Burl;?>" class="btn btn-warning uri_view_btn w3_tabs_btn">View</a>
								</div>
								
							</div>
						</div>
					</div>
			<?php 		
			}
		?>

							</div>
							
							<div class="tab-pane fade" id="stationary_tab" >

			<?php 

		$office_stat_sql = $link->query("SELECT * FROM supermarket_products WHERE smkt_subcategory='Office Stationary' and not smkt_qty = 0 LIMIT 4");
		while($obj = $office_stat_sql->fetch_object()){

			$pass_code = $obj->product_code;
			$pass_name = $obj->smkt_name;
			$fields = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
			$Curl = "product-details.php?".http_build_query($fields,'',"&");
							?>
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>" alt="" height="137px" />
								<h2><?php echo $currency.$obj->smkt_price;?></h2>
								<p><?php echo $obj->smkt_name;?></p>
								<a href="<?php echo $Curl;?>" class="btn btn-warning uri_view_btn w3_tabs_btn">View</a>
							</div>
							
						</div>
					</div>
				</div>
	<?php 		
		}
	?>

							</div>														

						</div>
					</div><!--/category-tab-->



<!-- best sellers -->

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
<!--
					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
					<?php 

						$sql_recom_items = $link->query("SELECT * FROM supermarket_products where recommended = 'Yes' and not smkt_qty = 0  order by date desc");
						while($obj = $sql_recom_items->fetch_object()){
													
						$pass_code = $obj->product_code;
						$pass_name = $obj->smkt_name;
						$fields = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
						$url = "product-details.php?".http_build_query($fields,'',"&");		
						?>
					<div class="col-sm-4">
						<div class="product-image-wrapper">
							<div class="single-products">

								<div class="productinfo text-center">
									<img src="<?php echo 'admin/admin_uploads/'.$obj->image_one;?>" class="owl-lazy" alt="" width="150px" height="134px" />
									<h2><?php echo $currency.' '.number_format($obj->smkt_price);?></h2>
									<p><?php echo $obj->smkt_name;?></p>
									<a href="<?php echo $url;?>" class="btn btn-default add-to-cart"><i class="fa fa-star"></i>View</a>
								</div>
								
							</div>
						</div>
					</div>
					<?php } ?>
								</div>
							</div>

							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>	

						</div>
						./ -->

					</div><!--/recommended_items-->	



<!--
	<button type="button" class="btn btn-default add_to_cart_btn" id="mybtn"><i class="fa fa-shopping-cart myadd"></i>Add</button>
-->





				</div><!--end of padding-right-->
			</div>
		</div>

								

			<!-- //slider -->				
			</div>
	</section>

	<!--	. include footer page	-->
	<?php include 'footer.php'; ?>	  

	<!--	. scripts at the bottom for faster page loading	-->
          <script>
            jQuery(document).ready(function($) {
              $('.owl-carousel').owlCarousel({
                items: 3,
                lazyLoad: true,
                loop: true,
                margin: 10,                
			    autoplay:true,
			    autoplayTimeout:5000,
			    autoplayHoverPause:true
              });
            });
          </script>
	<!--<script src="assets/js/functions.js"></script>-->
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--
	<script type="text/javascript" src="assets/js/jquery.flexisel.js"></script>-- flexisel-js -->	
			<script type="text/javascript">
				/*
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
				*/
			   </script>

	<script type="text/javascript" src="assets/js/function.js"></script>		   
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

</body>
</html>