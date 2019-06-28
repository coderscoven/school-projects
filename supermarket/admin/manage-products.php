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
  <!-- bootstrap.min.css dataTables -->
  <link rel="stylesheet" type="text/css" href="../plugins/datatables/dataTables.bootstrap.min.css">
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
<!--  bootstrap-editable css -->
<link rel="stylesheet" href="plugins/bootstrap-editable/css/bootstrap-editable.css">
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- /. bootbox plugin -->
<script src="../assets/js/bootbox.min.js"></script>
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
        <small>Products Management</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Mgmt</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

            <!-- Main row -->
      <div class="row">

          <!-- col-lg-12 -->
        <section class="col-lg-12">

          <!-- Chat box -->
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Product Inventory</h3>
            </div>
            <div class="box-body" id="">
            <?php 
            $sql = $link->query("SELECT smkt_id,
                                        smkt_category,
                                        smkt_subcategory,
                                        smkt_name,
                                        product_code,
                                        smkt_price,
                                        smkt_qty,
                                        smkt_brand,
                                        smkt_color,
                                        smkt_size,
                                        date_format(date,'%d-%m-%Y') as date_reg

             FROM supermarket_products");
            if($sql->num_rows > 0){

            ?>
              <table class="table product_table table-bordered table-hover">
                <thead>
                    <tr class="success">
                      <th>No.</th>
                      <th>Category</th>
                      <th>Sub-category</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Brand</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Date</th>
                      <th>Action</th>
                 </tr>
                </thead>

                <tbody>
                  <?php 
                  $rw = 1;
                  while($row = mysqli_fetch_assoc($sql)){       
                          
                      $pass_code = $row['product_code'];
                      $pass_name = $row['smkt_name'];
                    ?>
                    <tr class="Rowcontent2">
                      <td><?php echo $rw; ?></td>
                      <td><?php echo $row['smkt_category']; ?></td>
                      <td><?php echo $row['smkt_subcategory']; ?></td>
                      <td>
                        <a href="#" class="w3_special_class w3_update_name required_field" data-name='smkt_name' data-type="text" data-pk="<?php echo $row['smkt_id']; ?>" data-title="Edit name" data-placeholder="Required"><?php echo $row['smkt_name']; ?></a>
                      </td>
                      <td>
                        <a href="#" class="w3_special_class w3_update_price required_field" data-name='smkt_price' data-type="text" data-pk="<?php echo $row['smkt_id']; ?>" data-title="Edit Price" data-placeholder="Required"><?php echo $row['smkt_price']; ?></a>
                      </td>
                      <td>
                        <a href="#" class="w3_special_class w3_update_qty required_field" data-name='smkt_qty' data-type="text" data-pk="<?php echo $row['smkt_id']; ?>" data-title="Edit qty" data-placeholder="Required"><?php echo $row['smkt_qty']; ?></a>
                      </td>
                      <td>
                        <a href="#" class="w3_special_class w3_update_brand" data-name='smkt_brand' data-type="text" data-pk="<?php echo $row['smkt_id']; ?>" data-title="Edit brand"><?php echo $row['smkt_brand']; ?></a>
                      </td>
                      <td>
                        <a href="#" class="w3_special_class w3_update_color" data-name='smkt_color' data-type="text" data-pk="<?php echo $row['smkt_id']; ?>" data-title="Edit color"><?php echo $row['smkt_color']; ?></a>
                      </td>
                      <td>
                        <a href="#" class="w3_special_class w3_update_size" data-name='smkt_size' data-type="text" data-pk="<?php echo $row['smkt_id']; ?>" data-title="Edit size"><?php echo $row['smkt_size']; ?></a>
                      </td>
                      <td><?php echo $row['date_reg']; ?></td>
                      <td>
                        <a href="#" id="<?php echo $row['smkt_id']; ?>" class="w3_products_delete"><span class="label label-warning">Delete</span></a>
                      </td>
                    </tr>
                    <?php $rw++; } ?>
                  
                </tbody>

              </table>

              <?php } ?>
            </div>
          </div>

        </section>
       
        

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


<!-- Bootstrap 3.3.6 -->
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
<!--  bootstrap-editable js -->
<script src="plugins/bootstrap-editable/js/bootstrap-editable.min.js"></script>
<script type="text/javascript">     
  $(document).ready(function () {
    // edit
    $('.w3_special_class').editable({
      url: "_edit_products.php",
      name: $(this).attr('data-name'),
      ajaxOptions: {
          type: 'POST'
        },
          success: function (response, newValue) {
              alert(response)
          }
    });
    $('.required_field').editable('option','validate', function (v) {
            if ($.trim(v) == '') { return 'Required field!'; }
        });
  });
</script>
<!-- bootstrap dataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

<script> 

  $(document).ready(function () {

    // datatable configuration
    $('.product_table').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": false,
      "autoWidth": false
    });

    // delete product
    $(".w3_products_delete").click(function(){
      var element = $(this);
      var del_id = element.attr("id");
      var info = 'idProd=' + del_id;
      if(confirm("Are you sure you want to delete this product?"))
      {
        $.ajax({
          type: "POST",
          url: "_database_scripts.php",
          data: info,
          success: function(data){
              bootbox.alert(data);
            }
        });
        $(this).parents(".Rowcontent2").animate({
          backgroundColor: "#DCDCDC" }, "slow")
          .animate({opacity: "hide" }, "slow");
      }
      return false;
    });


  });
</script>
<!--  enhance smooth scrolling  -->    
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

</body>
</html>
