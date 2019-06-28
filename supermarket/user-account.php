<?php include_once('session-variables.php'); 
if(isset($_SESSION['user_name'])){ $logged_in_user = $_SESSION['user_name']; } else { header('Location: register.php'); } ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="welcome to praise supermarket uganda..your online shopping center where you can view and purchase products with ease..register with us and enjoy numerous the numerous services we have to offer" />
    <meta name="keywords" content = "supermarket, category-products, login, register, products, cart, sub-category"/>
    <title>Account | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"><!-- bootstrap-CSS -->
    <link href="assets/css/main.css" rel="stylesheet"><!-- main-CSS -->
    <!-- bootstrap.min.css dataTables -->
    <link rel="stylesheet" type="text/css" href="plugins/datatables/dataTables.bootstrap.min.css">
    <link href="plugins/font_awesome/css/font-awesome.min.css" rel="stylesheet"><!-- font awesome-CSS -->
    <link href="assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet"><!-- animate-CSS -->
    <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" /><!--- flexslider-CSS -->
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
    <script src="assets/js/bootbox.min.js"></script>
    <!-- jQuery UI - js -->
  <script src = "plugins/jQueryUI/jquery-ui.js"></script>
</head><!--/head-->

<body>


  <!--  /.  include header -->
  <?php  include_once 'header.php'; ?>

              <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">My Account Settings</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title text-center">My Account</h2>
                    </div>
                </div>
            </div>


  
  <section class="w3_account_settings">
    <div class="container">

          <div class="row"><!--category-tab-->
            <div class="col-sm-12">
              <ul class="nav nav-tabs">
                <li><a href="#edit_account_information" data-toggle="tab">EDIT ACCOUNT INFORMATION</a></li>
                <li class="active"><a href="#view_order_history" data-toggle="tab">ORDERS</a></li>
              </ul>
            </div>
            <div class="tab-content">


              <!--  edit account information tab   -->
              <div class="tab-pane fade in" id="edit_account_information">
        <?php 
    $get_account_information = $link->query("select Cmplx_username, Cmplx_id, Cmplx_phone, Cmplx_email from all_users_login_details where Cmplx_username= '$logged_in_user'");
        if($get_account_information){
        $get_account_infor = $get_account_information->fetch_object();
        ?>
                <br><br>
                <div class="" style="margin: 2em 0">
                  <!--<a href="#" id="allow_editing" class="" data-toggle="tooltip" title="click to enable field editing">Edit Fields</a>-->
                </div>
                  <form action="" class="form-horizontal" id="" >
                    <!--
                    <div class="form-group">
                      <label class="label-control col-sm-3" for="input_username">User name</label>
                      <div class="col-sm-6">-->
                      <input type="hidden" name="input_username" class="form-control input_field_class" id="input_username" autocomplete="off" required placeholder="your username" value="<?php echo $get_account_infor->Cmplx_username; ?>" disabled>
                   <!-- </div>
                    </div>-->
                    <div class="form-group">
                      <label class="label-control col-sm-3"  for="input_mobile_contact">Mobile Contact</label>
                      <div class="col-sm-6">
                      <input type="text" name="input_mobile_contact" class="form-control input_field_class" id="input_mobile_contact" autocomplete="off" required placeholder="your mobile contact" value="<?php echo $get_account_infor->Cmplx_phone; ?>">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="label-control col-sm-3"  for="input_email_add">Email</label>
                      <div class="col-sm-6">
                      <input type="email" name="input_email_add" class="form-control input_field_class" id="input_email_add" autocomplete="off" placeholder="your email address (optional)" title="your email address (optional)">
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-6 col-sm-offset-3">
                      <input type="button" class="btn btn-success" id="input_account_btn" value="Update">
                    </div>
                    </div>

                  </form>
          <?php } ?>
          <script>
            $(function(){
                $("#input_account_btn").on("click", function(){
                    var input_username        = $("#input_username").val();
                    var input_mobile_contact  = $("#input_mobile_contact").val();
                    var input_email_add       = $("#input_email_add").val();

                    if (input_username == '' || input_mobile_contact == '') {
                        bootbox.alert("Error: Please fill in the required fields!");
                    }
                    else {
                          $.post("_custom.php",{
                            input_username: input_username,
                            input_mobile_contact: input_mobile_contact,
                            input_email_add: input_email_add
                          }, function(data){
                                bootbox.alert(data);
                          });
                    }
                });
            });
          </script>
              </div>

              <!--  view order history tab   -->
              <div class="tab-pane fade in active" id="view_order_history">

                  <h3 class="text-center text-info" style="padding: 1em 0; text-transform: uppercase; margin-top: 1em;">Your orders</h3>
                  <?php 
                  $get_order_history = $link->query("select 
                      id,
                      customer_username,
                      order_receipt,
                      order_status,
                      payment_status,
                      date_format(date_time,'%d-%m-%Y') as o_date,
                      total_amount,
                      full_names FROM grouped_orders where customer_username = '$logged_in_user' order by date_time asc");
                    /*
                      $get_order_history = $link->query("select 
                          id, 
                          customer_username,
                          product_code,
                          item_name,
                          item_price,
                          item_qty,
                          item_size,
                          item_color,
                          item_brand,
                          location,
                          date_format(date_ordered, '%d-%m-%Y') as ordered_date,
                          delivery,
                          payment_status,
                          order_status,
                          order_receipt,
                          notes
                          from customer_orders
                          where customer_username = '$logged_in_user'");
                        */
                      if ($get_order_history->num_rows > 0) {
                        ?>
                    <table class="table table-bordered table-hover table-condensed orders_table">
                      <thead>
                            <tr class="success">
                              <th>Date</th>
                              <th>Order Receipt</th>
                              <th>Total Amount</th>
                              <th>Action</th>
                          </tr>
                      </thead>

                      <tbody>
                        <?php 
                            while ($row = $get_order_history->fetch_assoc()) {
                              ?>
                              <tr>
                                <td><?php echo $row['o_date']; ?></td>
                                <td><?php echo $row['order_receipt']; ?></td>
                                <td><?php echo number_format($row['total_amount']); ?></td>
                                <td>
                                  <a href="#load_order_list_modal" onclick="fetchOrderListFunction(this, '<?php echo $row['order_receipt']; ?>')" data-toggle="modal" title="View this Order List">View Order</a>
                                </td>
                              </tr>
                              <?php 
                            }
                        ?>
                      </tbody>                      
                    </table>
                        <?php                         
                      }
                      else {

                          echo "<p class='text-center text-danger'>You have no order history </p>";

                      }
                  ?>

              </div>

            </div>

          </div>

    <div class="row" style="padding-top: 3em; margin-top: 2em;">
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

      </div>
</section>


                        <!--  . include footer page -->
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
  <!--/. -- flexisel-js -->
    <script type="text/javascript" src="assets/js/jquery.flexisel.js"></script> 
      <script type="text/javascript">
        
         $(window).load(function() {
          $("#flexiselDemo1").flexisel({
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
          <!--  . scripts at the bottom for faster page loading -->
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
          
          <!-- bootstrap dataTables -->
          <script src="plugins/datatables/jquery.dataTables.min.js"></script>
          <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
          <script>
              $(document).ready(function () {
                  // datatable configuration
                  $('.orders_table').DataTable({
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": false,
                    "autoWidth": true
                  });
              });
                
                // onclick order list event
                function fetchOrderListFunction(argsx, argsy) {

                  var order_receipt_var = argsy;
                  $.post("_custom.php",{
                    order_receipt_var: order_receipt_var
                  }, function(data){
                      $("#data_load_orders_wrapper").html(data);
                  });
                }

          </script>

          <!--  /. modal  -->
<div class="modal fade" id="load_order_list_modal" role="dialog" tabindex="-1" role="dialog" aria-labelledby="Order_ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
           <h2 class="modal-title text-center text-primary" id="Order_ModalLabel">Your List Of Order</h2>
        </div>
        <div class="modal-body">
          <p id="data_load_orders_wrapper"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
          <!--  /. modal  -->



</body>
</html>