	
	<footer id="w3_footer"><!--Footer-->		
		<div class="footer-widget">
			<div class="container">
				<div class="row"><!--/ stacked row -->
					<div class="col-md-12"><!--/ col-md-12 -->					
					
					<div class="col-sm-4">
						<div class="single-widget">
							<h2 class="text-center">Quick-Links</h2>
							<ul class="footer-ul">
							<?php 
							if(isset($_SESSION['user_name']) == false){
							?>
								<li><a href="login.php">Login</a></li>
								<li><a href="register.php">Register</a></li>

							<?php 
							}else{
							?>
								<li><a href="login.php?logout">Logout</a></li>
								<li><a href="profile.php">My Account</a></li>
							<?php 
							}
							?>
								<li><a href="contact-us.php">Contact us</a></li>								
							</ul>
						</div>
					</div>
					
					<div class="col-sm-4">
						<div class="single-widget">
							<h2 class="text-center">Quick Shop</h2>
							<ul class="footer-ul" style="float:left;">
								<li class=""><a href="<?php echo $urls1;?>" >Home Appliances</a></li>
								<li class=""><a href="<?php echo $urls5;?>">Stationary</a></li>
								<li class=""><a href="<?php echo $urls2;?>">Food Store</a></li>
							</ul>		

							<ul class="footer-ul" style="float:left;">
								<li class=""><a href="<?php echo $urls4;?>">&nbsp;&nbsp;Personal Health</a></li>
								<li class=""><a href="<?php echo $urls3;?>">&nbsp;Beverages</a></li>
								<li class=""><a href="shop.php">&nbsp;More</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-4">
						<div class="single-widget">
							<h2 class="text-center">Social</h2>
						<div class="social-icons-edited">
							<ul class="pull-left">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i>Facebook</a></li>
								<li><a href="https://www.twitter.com/"><i class="fa fa-twitter"></i>Twitter</a></li>
							</ul>							
							<ul class="pull-left">
								<li><a href="https://www.google.com/"><i class="fa fa-google-plus"></i>Google-plus</a></li>
								<li><a href="https://www.Linkedin.com/"><i class="fa fa-linkedin"></i>Linkedin</a></li>
							</ul>
						</div>
						</div>
					</div>
					
					
					</div><!--/ col-md-12 -->
				</div><!--/ stacked row -->
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright &copy; <?php echo date('Y'); ?></p>
					<p class="pull-right">Praise Supermarket</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	    <!--	/. scroll to top	-->
    <script>
		   $(document).ready(function(){
			$(function () {
				$.scrollUp({
			        scrollName: 'scrollUp', // Element ID
			        scrollDistance: 300, // Distance from top/bottom before showing element (px)
			        scrollFrom: 'top', // 'top' or 'bottom'
			        scrollSpeed: 300, // Speed back to top (ms)
			        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
			        animation: 'fade', // Fade, slide, none
			        animationSpeed: 200, // Animation in speed (ms)
			        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
							//scrollTarget: false, // Set a custom target element for scrolling to the top
			        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
			        scrollTitle: false, // Set a custom <a> title if required.
			        scrollImg: false, // Set true to use image
			        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			        zIndex: 2147483647 // Z-Index for the overlay
				});
			});
		});
    </script>

    <!--	/.	JQueryUI Autocomplete-->
    <script>
    	$(document).ready(function($){
    		$('#input_search_id').autocomplete({
				source:'_search.php', 
				minLength:2,
				select: function(event,ui){
					var searchterm = ui.item.searchTerm;
					if(searchterm != '') {
						location.href = 'load_search_results.php?userSearchTerm=' + searchterm;
					}
				}
    		});
		});
    </script>