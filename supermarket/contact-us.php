<?php include_once('session-variables.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="welcome to contact page, you can get in touch with us here by using our email 
	services or sending us a message or giving us a call">
    <meta name="author" content="">
    <title>Contact Us | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-CSS -->
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
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
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
    <!-- jQuery UI - js -->
    <script src = "plugins/jQueryUI/jquery-ui.js"></script>
</head>
<!--/head-->

<body>


    <!--	/.	include header -->
    <?php include_once 'header.php'; ?>

    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Contact Us</li>
            </ol>
        </div>
    </div>

    <div id="contact-page" class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Contact <strong>Us</strong></h2>
                    <!--<div id="gmap" class="contact-map">
					</div>-->

                </div>
            </div>
            <div class="col-md-12" style="margin-top:50px;">

            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="contact-form">
                        <h2 class="title text-center">Get In Touch</h2>
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form row" name="contact-form" method="post">
                            <div class="form-group col-md-6">
                                <input type="text" name="name" class="form-control" required="required" placeholder="Name">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" name="email" class="form-control" required="required" placeholder="Email">
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" name="subject" class="form-control" required="required" placeholder="Subject">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your Message Here"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="contact-info">
                        <h2 class="title text-center">Contact Info</h2>
                        <address class="uri_address_details">
							<p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<span>Location:</span> &nbsp;Wakiso - Uganda</p>
							<p><i class="fa fa-mobile-phone"></i>&nbsp;&nbsp;&nbsp;<span>Mobile:</span> &nbsp;0772 00 00 00 </p>
							<p><i class="fa fa-phone"></i>&nbsp;<span>Office:</span> &nbsp;0392 00 00 00</p>
							<p><i class="fa fa-envelope"></i>&nbsp;<span>Email:</span> praise.supermarket@gmail.com</p>
	    				</address>
                        <div class="social-networks">
                            <h2 class="title text-center">Social Networking</h2>
                            <ul>
                                <li>
                                    <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.twitter.co/"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.google-plus.com"><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href="https://www.linkedin.com"><i class="fa fa-linkedin"></i></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/#contact-page-->

    <!--	/. map	-->
    <div class="uri_w2_maps">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <iframe width="100%" height="350px" class="googlemaps" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.9503398796587!2d-73.9940307!3d40.719109700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1441710758555"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!--	. include footer page	-->
    <?php include 'footer.php'; ?>


    <!--	. scripts at the bottom for faster page loading	-->
    <script src="assets/js/bootbox.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/marquee/jquery.marquee.min.js"></script>
    <script>
        $(function (){ 
            $('.marquee').marquee({ pauseOnHover: true, startVisible: true, duration: 10500 });
            $('.marquee_viewed').marquee({ pauseOnHover: true, direction: 'up', duration: 10000, startVisible: true });
            //@ sourceURL=pen.js
        });
    </script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="assets/js/gmaps.js"></script>
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/jquery.prettyPhoto.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>