<?php include_once('session-variables.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="last price login page, enter your username and password to enjoy some of our great services..">
    <meta name="author" content="">
    <title>Login | E-Commerce</title>
    <link href="plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap-CSS -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- main-CSS -->
    <link href="plugins/font_awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- font awesome-CSS -->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!-- animate-CSS -->
    <link rel="stylesheet" href="assets/css/flexslider.css" type="text/css" media="screen" />
    <!-- flexslider-CSS -->
    <link href="assets/css/responsive.css" rel="stylesheet">
     <!-- jQuery UI - CSS -->
     <link href = "plugins/jQueryUI/jquery-ui.css" rel = "stylesheet">
    <!-- responsive-CSS -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="assets/images/home/favicon.ico">
    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
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
    <!-- jQuery UI - js -->
    <script src = "plugins/jQueryUI/jquery-ui.js"></script>
</head>
<!--/head-->

<body>



    <!--	/.	include header -->
    <?php include_once 'header.php'; ?>

    <?php
			// show potential errors / feedback (from login object)
			if (isset($login)) {
				if ($login->errors) {
					foreach ($login->errors as $error) {
						?>
        <script>
            $(document).ready(function() {
                bootbox.alert("<?php echo $error; ?>");
            });
        </script>
        <?php
					}
				}
				if ($login->messages) {
					foreach ($login->messages as $message) {
					?>
            <script>
                $(document).ready(function() {
                    bootbox.alert("<?php echo $message;?>");
                });
            </script>
            <?php
					}
				}
			}
?>
            <div class="container">
                <div class="breadcrumbs">
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Login</li>
                    </ol>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="title text-center">Login</h2>
                    </div>
                </div>
            </div>

            <section class="login-page">
                <!--form-->
                <div class="container">
                    <div class="row">
                        <div class="login-form">
                            <!--login form-->
                            <h2>Login to your account</h2>
                            <form method="post" action="login.php" name="loginform" id="loginForm">

                                <input name="user_name" required="required" type="text" id="email" placeholder="your username or phone number" />
                                <input name="user_password" required="required" type="password" placeholder="Your Password.." autocomplete="off" />
                                <input type="hidden" value="<?php echo $guest; ?>" name="guest_login" >
                                <input type="submit" class="btn btn-default" id="button-login" name="login" id="waitMe_ex_effect" value="Login">

                                <div class="forgot">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </form>

                        </div>
                        <!--/login form-->

                        <h6> Not a Member? <a href="register.php">Sign Up Now »</a> </h6>
                    </div>
                </div>
            </section>
            <!--/form-->



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