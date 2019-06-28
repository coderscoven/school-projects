<?php include_once('session-variables.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="welcome to praise supermarket uganda..your online shopping center where you can view and purchase products
	with ease..register with us and enjoy numerous the numerous services we have to offer" />
	<meta name="keywords" content = "supermarket, category-products, login, register, products, cart, sub-category"/>
    <title>Search Results | E-Commerce</title>
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
	<link href="assets/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script><!-- jQuery library -->
    <script src="assets/js/owl.carousel.js"></script><!-- content carousel -->
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
</head><!--/head-->

<body>


	<!--	/.	include header -->
	<?php include_once 'header.php'; ?>

<section>

	<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Search results</li>
				</ol>
			</div><!--/breadcrums-->
		<div class="row">
			<div class="col-md-12">
						<h2 class="title text-center">Search Results:</h2>

				

<?php

if (isset($_GET['userSearchTerm'])) {
	# code...
	$userSearchTerm = $_GET['userSearchTerm'];

	$fetch_search_results = $link->query("select * from supermarket_products where smkt_name = '$userSearchTerm'");
	if ($fetch_search_results->num_rows > 0) {
    while($row = $fetch_search_results->fetch_assoc()) {
    	
    	$pass_code = $row['product_code'];
		$pass_name = $row['smkt_name'];
		$fieldsV = array('passcode'=>$pass_code, 'passname'=>$pass_name, 'urlString'=>$urlString);
		$urlVar = "product-details.php?".http_build_query($fieldsV,'',"&");	

    	?>
       <!-- echo "Name: " . $row["smkt_name"]. " Price: " . $row["smkt_price"]. "<br>";-->

			<div class="col-sm-3 col-lg-3 col-md-3 w3_grid_layout">
					<div class="w3-single-products">
						<form class="product-form">
							<a href="<?php echo $urlVar; ?>">
							<div class="text-center">

							<div class="w3_image_container">
								<img src="<?php echo 'admin/admin_uploads/'.$row['image_one'];?>" alt="featured-items-gallery" width="268px" height="134px" />
							</div>

							<div class="w3_image_info_container">
								<h3 class="uri_prod_name"><?php echo $row['smkt_name'];?></3>
								<h4><?php echo $currency.' '.number_format($row['smkt_price']);?></h4>
							</h3>

							</div>
								<input name="product_code" type="hidden" value="<?php echo $row['product_code']; ?>">
								<input type="hidden" value="1" name="product_qty">	
							</a>
						</form>
							
					</div>		
				</div>	


        <?php 
    	}
	} else {
	    echo "0 results";
	}

} // isset //get

?>			
		</div>
	</div>

</section>











	<!--	. include footer page	-->
	<?php include 'footer.php'; ?>	  

	<!--	. scripts at the bottom for faster page loading	-->
	<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
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
