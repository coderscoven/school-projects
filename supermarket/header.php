  <style>
  .ui-autocomplete {
    max-height: 100px;
    overflow-y: auto;
    /* prevent horizontal scrollbar */
    overflow-x: hidden;
  }
  /* IE 6 doesn't support max-height
   * we use height instead, but this forces the menu to always be this tall
   */
  * html .ui-autocomplete {
    height: 100px;
 }
  .ui-autocomplete-loading {
    background: white url("assets/images/search.gif") right center no-repeat;
}
  .ui-autocomplete.ui-widget {
  	font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
  	font-size: 12px;
}
  </style>
<header id="header"><!--header-->
<div class="header_top"><!--header_top-->
<div class="container">
<div class="row">
	<div class="col-sm-6">
		<div class="contactinfo">
			<ul class="nav nav-pills">
				<li><a href="#"><i class="fa fa-phone"></i> +256 772 00 00 00</a></li>
				<li><a href="#"><i class="fa fa-envelope"></i> praise.supermarket@gmail.com</a></li>
			</ul>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="social-icons pull-right">
			<ul class="nav navbar-nav">
				<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
				<li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a></li>
				<li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
			</ul>
		</div>
	</div>
</div>
</div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
<div class="container">
<div class="row">
	<div class="col-md-6">
		<div class="logo">
			<a href="index.php">
				<img src="assets/images/logo.png" alt="site-logo" class="img-responsive" />
			</a>
		</div>
		<div class="btn-group pull-right">			
		</div>
	</div>
	<div class="col-md-6">
		<div class="shop-menu pull-right">
			<ul class="nav navbar-nav">
				
				<?php 							
					if(isset($_SESSION['user_name'])){
					?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" class="active"><i class="fa fa-user" aria-hidden="true"></i> Welcome, <?php echo $_SESSION['user_name'];?><i class="fa fa-angle-down"></i></a>
						<ul class="dropdown-menu">
							<li><a href="user-account.php">My Profile</a></li> <br>
							<li><a href="login.php?logout">Logout</a></li>
						</ul> 
					</li> 

					<?php 
						}else{
					?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i> My Account<i class="fa fa-angle-down"></i></a>
				<ul class="dropdown-menu">
					<li><a href="login.php">Login </a></li> <br>
					<li><a href="register.php">Sign Up</a></li>
				</ul> 
			</li> 
			<?php } ?>	

			<!--	/.	cart	-->
			<li class="w3_cart_header_class"><a href="cart.php" class="cart-counter" id="cart-info" title="View cart"><i class="fa fa-shopping-cart"></i> Cart &nbsp;<span class="label label-danger w3_float cart-item" id="cart-container">
			<?php 
				if(isset($_SESSION["products"])){
					echo count($_SESSION["products"]); 
				} else {
					echo 0; 
				}
			?>
			</span></a></li>
			<!--	/.	cart	-->
				
			</ul>
		</div>
	</div>
</div>
</div>
</div><!--/header-middle-->

<div class="header-bottom"><!--header-bottom-->
<div class="container">
<div class="row">
	<div class="col-sm-9">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="mainmenu pull-left">
			<ul class="nav navbar-nav collapse navbar-collapse">
				<li><a href="index.php" class="active">Home</a></li>				
				<li><a href="shop.php">Shop</a></li>
				<li><a href="cart.php">Cart</a></li>
				<li><a href="contact-us.php">Contact</a></li>
			</ul>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="search_box pull-right">
			<form action='' method='get' id="search_form">
				<div class="input-group">
					<input type="text" class="form-control urs_search_box" placeholder="Search..." id="input_search_id" name="search" title="Search">
					<div class="input-group-btn">
						<button class="btn urs_search_button" type="button" id=""><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
</div><!--/header-bottom-->
</header><!--/header-->


<div class="header-three"><!-- header-three -->
<div class="container">
<div class="move-text">
<div class="marquee">
		<a href="#"> 
				&#8594; We update our products regularly to issue quantity availability...... 
			<span>
				&#8594; Get extra 10% off on purchases above Ugx. 150,000
			</span> 
			<span> 
				&#8594; We allow returns and 100% refund on product(s) damaged during delivery or pick-up
			</span>
		</a>
</div>

</div>
</div>
</div>









