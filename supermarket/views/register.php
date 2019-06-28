<?php include_once('session-variables.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="" />
    <meta name="description" content="welcome to the registration page, enter your details like email, username, phone contact, password" />
    <meta name="keywords" content="ecommerce, register, signup here" />
    <title>Register | E-Commerce</title>
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

<body>

    <!--	/.	include header -->
    <?php include_once 'header.php'; ?>

    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Register</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <h2 class="title text-center">Register</h2>
            </div>
        </div>
    </div>


    <?php	
			// show potential errors / feedback (from registration object)
			if (isset($registration)) {
				if ($registration->errors) {
					foreach ($registration->errors as $error) {
						?>
        <script>
            $(document).ready(function() {
                bootbox.alert("<?php echo $error; ?>");
            });
        </script>
        <?php
					}
				}
				if ($registration->messages) {
					foreach ($registration->messages as $message) {
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


            <section class="login-page">
                <!--form-->
                <div class="container">
                    <div class="row">
                        <div class="login-form">
                            <!--login form-->
                            <h2>Create you account here</h2>
                            <form method="post" action="register.php" id="registerformid">
                                <!--
				<input placeholder="Your email (Optional)" type="email" name="input_user_email"  title="Your email (Optional)" autocomplete="off">
				-->
                                <input type="text" placeholder="Enter Your mobile Number" name="input_user_phone" maxlength="13" title="Your mobile Number" autocomplete="off">

                                <input name="input_user_name" required type="text" placeholder="your username" title="your username" autocomplete="off">

                                <input type="password" placeholder="Enter Your Password (minimum of 8 characters)" name="user_password_new" pattern=".{8,}" required autocomplete="off" title="Your Password (minimum of 8 characters)">

                                <input type="password" placeholder="Renter Your Password (minimum of 8 characters)" name="user_password_repeat" pattern=".{8,}" required autocomplete="off" title="Repeat your Password (minimum of 8 characters)">

                                <input type="submit" class="btn btn-default" id="button-login" name="registerUser" value="Register">

                                <div class="forgot">
                                    <a href="#">Forgot Password?</a>
                                </div>
                            </form>

                        </div>
                        <!--/login form-->

                        <h6> Have an Account? <a href="login.php">Sign In Now »</a> </h6>
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