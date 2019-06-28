<?php require_once '../session-variables.php'; if(isset($_SESSION['input_login_name'])){ $input_login_name = $_SESSION['input_login_name'];} else { header('Location: login.php'); } ?>
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
</head>

<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="?" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ad</b>m</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Dash</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/avatar.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $input_login_name; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $input_login_name; ?> - Web Developer
                  <small>Administrator</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="login.php?logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hi, <?php echo $input_login_name; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">NAVIGATION MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

        <li><a href="orders.php"><i class="fa fa-reorder"></i> <span>Orders</span></a></li>

        <li><a href="customers.php"><i class="fa fa-group"></i> <span>Customers</span></a></li>          
        <li class="treeview">
          <a href="#"><i class="fa fa-gears"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left right_align"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add-products.php">Add Products</a></li>
            <li><a href="manage-products.php">Manage Products</a></li>
          </ul>
        </li> 
        <li class="header">OTHER</li>
        <li><a href="login.php?logout"><span class="glyphicon glyphicon-log-out"></span> <span>Signout</span></a></li>


      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Praise Supermarket
        <small>Dashboard Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Mgmt</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      
     <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->        
          <?php 
            // get number of orders users
          $get_new_orders_q = $link->query("select count(id) as num_of_new_orders from grouped_orders where order_status='New Order' and payment_status='Not Paid'");
          $get_new_orders =  $get_new_orders_q->fetch_object();
        ?>
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $get_new_orders->num_of_new_orders;?></h3>

              <p>New Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->     
          <?php 
            // get sales
          $get_sales_q = $link->query("select count(id) as sales_rate from grouped_orders where payment_status='PAID'");
          $get_sales_rate =  $get_sales_q->fetch_object();
        ?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $get_sales_rate->sales_rate;?><sup style="font-size: 20px">%</sup></h3>

              <p>Sales Rate</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <?php 
            // get number of registered users
          $get_reg_q = $link->query("select count(Cmplx_id) as num_of_users from all_users_login_details");
          $get_reg =  $get_reg_q->fetch_object();
        ?>
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $get_reg->num_of_users;?></h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
          </div>
        </div>        
        <!-- ./col -->
      </div>
      <!-- /.row -->    


      <!-- Main row -->
      <div class="row">

          <!-- col-lg-12 -->
        <section class="col-lg-12">


        <div class="col-lg-7">
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>
            </div>
            <?php 
                $fetch_orders_query = $link->query("select 
                      id, 
                      customer_username,
                      full_names,
                      order_receipt,
                      order_status,
                      payment_status,
                      date_format(date_time, '%d-%m-%Y %h:%i') as ordered_date                     
                  from grouped_orders
                  where order_status = 'New order' limit 7");


            ?>

            <!-- /.box-header -->
            <div class="box-body">
              <?php 

               if ( $fetch_orders_query->num_rows > 0 ) {
              
              ?>

              <div class="table-responsive">

                 <table class="table table-bordered table-hover no-margin table-condensed orders_table">
                      <thead>
                          <tr class="success">
                            <th>No</th>
                            <th>Date-Time</th>
                            <th>Username</th>
                            <th>Full Names</th>
                            <th>Order Receipt</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $rt = 1;
                        while ($row = $fetch_orders_query->fetch_assoc()) {
                        ?>
                        <tr class="Rowcontent2">
                          <td><?php echo $rt; ?>                      </td>
                          <td><?php echo $row['ordered_date']; ?>     </td>
                          <td><?php echo $row['customer_username']; ?></td>
                          <td><?php echo $row['full_names']; ?></td>
                          <td><?php echo $row['order_receipt']; ?>    </td>
                        </tr>
                    <?php $rt++; } ?>
                      </tbody>

                    </table>               
              </div>
              <!-- /.table-responsive -->
              <?php } else { echo "<p class='text-center text-info'>No Latest Orders Available</p>"; }?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="orders.php?option=allorders" class="btn btn-sm btn-primary btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        </div>


        <div class="col-lg-5">
                      <?php 
            $recently_added_products_query = $link->query("SELECT smkt_id,
                                        smkt_category,
                                        smkt_subcategory,
                                        smkt_name,
                                        image_one,
                                        smkt_description,
                                        product_code,
                                        smkt_price,
                                        smkt_qty,
                                        smkt_brand,
                                        smkt_color,
                                        smkt_size,
                                        date_format(date,'%d-%m-%Y') as date_reg

             FROM supermarket_products order by date limit 4");


            ?>
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Recently Added Products</h3>     
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <ul class="products-list product-list-in-box">
                <?php 
                  if($recently_added_products_query->num_rows > 0){

                        while ($row = $recently_added_products_query->fetch_assoc()) {
                ?>
                <li class="item">
                  <div class="product-img">               
                    <img src="<?php echo 'admin_uploads/'.$row['image_one'];?>" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title"><?php echo $row['smkt_name']; ?>
                      <span class="label label-warning pull-right"><?php echo $currency.' '.number_format($row['smkt_price']); ?></span></a>
                        <span class="product-description">
                         <?php echo  $row['smkt_description'];?>
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <?php } /* loop */ } /* check query */  else { echo "<p class='text-center text-info'>No Recently Added Product Available</p>"; }?>
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="manage-products.php?option=manage_products" class="uppercase">View All Products</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

        </div>



    
      </section>
    
    </div>


    <div class="row">
      <section class="col-lg-12">
          
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Orders</h3>
            </div>
            <?php 
                $fetch_orders_query = $link->query("select 
                      id, 
                      customer_username,
                      full_names,
                      order_receipt,
                      order_status,
                      payment_status,
                      date_format(date_time, '%d-%m-%Y %h:%i') as ordered_date                     
                  from grouped_orders
                  where order_status = 'New order' limit 7");


            ?>

            <!-- /.box-header -->
            <div class="box-body">
              <?php 

               if ( $fetch_orders_query->num_rows > 0 ) {
              
              ?>

              <div class="table-responsive">

                 <table class="table table-bordered table-hover no-margin table-condensed orders_table">
                      <thead>
                          <tr class="success">
                            <th>No</th>
                            <th>Date-Time</th>
                            <th>Username</th>
                            <th>Full Names</th>
                            <th>Order Receipt</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $rt = 1;
                        while ($row = $fetch_orders_query->fetch_assoc()) {
                        ?>
                        <tr class="Rowcontent2">
                          <td><?php echo $rt; ?>                      </td>
                          <td><?php echo $row['ordered_date']; ?>     </td>
                          <td><?php echo $row['customer_username']; ?></td>
                          <td><?php echo $row['full_names']; ?></td>
                          <td><?php echo $row['order_receipt']; ?>    </td>
                        </tr>
                    <?php $rt++; } ?>
                      </tbody>

                    </table>               
              </div>
              <!-- /.table-responsive -->
              <?php } else { echo "<p class='text-center text-info'>No Latest Orders Available</p>"; }?>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="orders.php?option=allorders" class="btn btn-sm btn-primary btn-flat pull-right">View All Orders</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->


      </section>
    </div>






        

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
     Praise Supermarket
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?php echo date('Y'); ?>.</strong> All rights reserved.
  </footer>

 
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a93c62bb155fb04"></script>


<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jQueryUI/jquery-ui.min.js"></script>
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
