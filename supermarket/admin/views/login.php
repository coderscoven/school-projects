<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | E-Commerce</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/font_awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../plugins/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/admin_template.min.css">
    <link rel="stylesheet" href="dist/css/skins/skin-red.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <!--  /. favicon  -->
    <link rel="shortcut icon" href="../assets/images/home/favicon.ico">
    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!--    bootbox alert -->
    <script src="../assets/js/bootbox.min.js"></script>
</head>

<body class="hold-transition login-page">
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
            <div class="login-box">
                <div class="login-logo">
                    <a href="?"><b>Praise</b>-Supermarket</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Sign in!</p>

                    <form action="login.php" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Email or Username" required name="input_login_session" autocomplete="off">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Password" required name="user_password" autocomplete="off">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <!-- /.col -->
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <br>
                    <p>Have no account?
                        <a href="register.php" class="text-center"> Register here!</a>
                    </p>
                </div>
                <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->


            <!-- Bootstrap 3.3.6 -->
            <script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
            <!--  enhance smooth scrolling  -->
            <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
            <!-- FastClick -->
            <script src="../plugins/fastclick/fastclick.js"></script>
            <!-- AdminLTE App -->
            <script src="dist/js/app.min.js"></script>
</body>

</html>