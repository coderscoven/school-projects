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
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
    <!-- select2 plugin -->
    <link href="plugins/select2/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plugins/select2/select2-bootstrap.css">
    <!--  /. fine uploader css -->
    <link rel="stylesheet" href="plugins/fineUploader/fine-uploader-new.css">
    <!-- jQuery 2.2.3 -->
    <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!--  /. bootbox -->
    <script type="text/javascript" src="../assets/js/bootbox.min.js"></script>
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
        <li><a href="dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>

        <li><a href="orders.php"><i class="fa fa-reorder"></i> <span>Orders</span></a></li>

        <li><a href="customers.php"><i class="fa fa-group"></i> <span>Customers</span></a></li>    

        <li class="treeview"  class="active">
          <a href="#"><i class="fa fa-gears"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left right_align"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="add-products.php">Add Products</a></li>
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
        <small>Products</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Products</li>
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
              <h3 class="box-title">Add Product</h3>
            </div>
            <div class="box-body" id="">
              
              <form action="" method="post" role="form" id="w3_add_products_form" class="form-horizontal" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label class="control-label col-sm-3">Category</label>
                       <div class="col-sm-5">
                  <?php 
                      $get_category = $link->query('select category from category order by category asc');
                  ?>
                  <select class="form-control" name="input_select_category" id="input_select_category" required>
               
                    <option selected disabled>-- select category --</option>
                    <?php while($row = $get_category->fetch_object()) {?>
                    <option value="<?php echo $row->category; ?>"><?php echo $row->category; ?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>
                
                <div class="form-group">
                  <label class="control-label col-sm-3">Sub-Category</label>
                       <div class="col-sm-5">
                  <?php 
                      $get_subcategory = $link->query('select scategory from sub_category order by scategory asc');
                  ?>
                  <select class="form-control edit_select2" name="input_select_subcategory" id="input_select_subcategory" required>
               
                    <option></option>
                    <?php while($row = $get_subcategory->fetch_object()) {?>
                    <option value="<?php echo $row->scategory; ?>"><?php echo $row->scategory; ?></option>
                    <?php } ?>
                  </select>
                </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Product Name</label>
                       <div class="col-sm-5">
                      <input type="text" class="form-control" name="input_item_name" id="input_item_name" required autocomplete="off" placeholder="item name">
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Price</label>
                       <div class="col-sm-5">
                      <input type="text" class="form-control" name="input_item_price" id="input_item_price" required autocomplete="off" placeholder="item price">
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Quantity</label>
                       <div class="col-sm-5">
                      <input type="text" class="form-control" name="input_item_quantity" id="input_item_quantity" required autocomplete="off" placeholder="item quantity">
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Recommended</label>
                       <div class="col-sm-5">
                        <label class="radio-inline"><input type="radio" name="input_item_recommened" value="Yes">Yes</label>
                        <label class="radio-inline"><input type="radio" name="input_item_recommened" value="No">No</label>
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Brand</label>
                       <div class="col-sm-5">
                      <input type="text" class="form-control" name="input_item_brand" id="input_item_brand" autocomplete="off" placeholder="item brand" title="Optional (Depends on item)">
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Size</label>
                       <div class="col-sm-5">
                      <input type="text" class="form-control" name="input_item_size" id="input_item_size"  autocomplete="off" placeholder="item size" title="Optional (Depends on item)">
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Color</label>
                       <div class="col-sm-5">
                      <input type="text" class="form-control" name="input_item_color" id="input_item_color" autocomplete="off" placeholder="item color" title="Optional (Depends on item)">
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Description</label>
                       <div class="col-sm-7 pan">
                          <textarea class="form-control" name="input_item_description" id="input_item_description" required autocomplete="off" placeholder="description (200 characters)" maxlength="200" rows="4" cols="5"></textarea>
                          <!--<small class="text-success" id="textarea_feedback"></small>-->
                      </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3">Image Upload</label>
                       <div class="col-sm-7">
                           <div class="upload_preview_canvas"> 
                              <div class="row">
                              <div class="col-sm-4">
                                
                                <div class="image-preview" id="image_one_container" data-toggle="tooltip" title="This is the MAIN photo"> 

                                    <label for="image-upload-1" id="image_label_one" class="image-label">Choose File</label>
                                    <input type="file" name="image_one" class="w3_image_class" id="image-upload-1" onchange="document.getElementById('show_txt').value = this.value.split('\\').pop().split('/').pop()" accept="image/jpg, image/jpeg, image/png" required>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="image-preview" id="image_two_container">
                                    <label for="image-upload-2" id="image_label_two" class="image-label">Choose File</label>
                                    <input type="file" name="image_two" class="w3_image_class" id="image-upload-2" onchange="document.getElementById('show_txt2').value = this.value.split('\\').pop().split('/').pop()">
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="image-preview" id="image_three_container">
                                    <label for="image-upload-3" id="image_label_three" class="image-label">Choose File</label>
                                    <input type="file" name="image_three" class="w3_image_class" id="image-upload-3" onchange="document.getElementById('show_txt3').value = this.value.split('\\').pop().split('/').pop()">
                                </div>                                
                              </div>
                            </div>

                            <div class="row">

                              <div class="col-sm-4">
                                <div class="image-preview" id="image_four_container">
                                    <label for="image-upload-4" id="image_label_four" class="image-label">Choose File</label>
                                    <input type="file" name="image_four" class="w3_image_class" id="image-upload-4" onchange="document.getElementById('show_txt4').value = this.value.split('\\').pop().split('/').pop()">
                                </div>
                              </div>

                              <div class="col-sm-4">
                                <div class="image-preview" id="image_five_container">
                                    <label for="image-upload-5" id="image_label_five" class="image-label">Choose File</label>
                                    <input type="file" name="image_five" class="w3_image_class" id="image-upload-5" onchange="document.getElementById('show_txt5').value = this.value.split('\\').pop().split('/').pop()">
                                </div>
                              </div>

                              <div class="col-sm-4">
                                <div class="image-preview" id="image_six_container">
                                    <label for="image-upload-6" id="image_label_six" class="image-label">Choose File</label>
                                    <input type="file" name="image_six" class="w3_image_class" id="image-upload-6" onchange="document.getElementById('show_txt6').value = this.value.split('\\').pop().split('/').pop()">
                                </div>
                            </div>

                            </div>

                          </div>

                          <small class="text-danger">jpeg, jpg, png images ONLY - 1Mb Image Size - Maximum of 1-6 Image Uploads</small>
                      </div>
                </div>
                <br />
                <!-- /. not neccessary -->
                <input type="hidden" id="show_txt" name="show_txt1">
                <input type="hidden" id="show_txt2" name="show_txt2">
                <input type="hidden" id="show_txt3" name="show_txt3">
                <input type="hidden" id="show_txt4" name="show_txt4">
                <input type="hidden" id="show_txt5" name="show_txt5">
                <input type="hidden" id="show_txt6" name="show_txt6">


                <div class="form-group">
                      <div class="col-sm-5 col-sm-offset-3">
                        <button type="submit" class="btn btn-default bg-teal btn-flat btn-lg" name="triggerupload" id="trigger-upload">Submit <i class="fa fa-send"></i></button>
                    </div>
                </div>

              </form>

            </div>
            <div class="box-footer">
            </div>
          </div>

       </section>  <!-- col-lg-12 -->
      </div>  <!-- row -->

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

<?php   
// alerts 
$messages = array();

//define a maxim size for the uploaded images
define ("MAX_SIZE","1000"); // 1 Mb * 1024
// define the width and height for the thumbnail
// note that theese dimmensions are considered the maximum dimmension and are not fixed,
// because we have to keep the image ratio intact or it will be deformed
define ("WIDTH","270"); //set here the width you want your thumbnail to be
define ("HEIGHT","250"); //set here the height you want your thumbnail to be.
// require password hashing library
require "../modules/libraries/password_compatibility_library.php";

if(isset($_POST['triggerupload'])) {

    // assign post inputs to variables

        $input_select_category    = $_POST['input_select_category'];
        $input_select_subcategory = $_POST['input_select_subcategory'];
        $input_item_name          = $_POST['input_item_name'];
        $input_item_price         = $_POST['input_item_price'];
        $input_item_quantity      = $_POST['input_item_quantity'];
        $input_item_brand         = $_POST['input_item_brand'];
        $input_item_size          = $_POST['input_item_size'];
        $input_item_color         = $_POST['input_item_color'];
        $input_item_description   = $_POST['input_item_description'];
        $input_item_recommened    = $_POST['input_item_recommened'];

        $show_txt1    = $_POST['show_txt1'];
        $show_txt2    = $_POST['show_txt2'];
        $show_txt3    = $_POST['show_txt3'];
        $show_txt4    = $_POST['show_txt4'];
        $show_txt5    = $_POST['show_txt5'];
        $show_txt6    = $_POST['show_txt6'];


    /*----  //  ALITTLE BIT OF NASTY-NESS HERE!! NOT ADVISED TO THIS; JUST LOOK FOR A MULTIPLE IMAGE UPLOAD PLUGIN ----*/    

    
$image_one_name_tmp   =  explode(".",$_FILES['image_one']['name']);
$image_one_tmp      = $_FILES['image_one']['tmp_name'];
$file_extension_file1 = end($image_one_name_tmp);
    
$image_two_name_tmp   =  explode(".",$_FILES['image_two']['name']);
$image_two_tmp      = $_FILES['image_two']['tmp_name'];
$file_extension_file2 = end($image_two_name_tmp);

$image_three_name_tmp =  explode(".",$_FILES['image_three']['name']);
$image_three_tmp    = $_FILES['image_three']['tmp_name'];
$file_extension_file3 = end($image_three_name_tmp);

$image_four_name_tmp  =  explode(".",$_FILES['image_four']['name']);
$image_four_tmp     = $_FILES['image_four']['tmp_name'];
$file_extension_file4 = end($image_four_name_tmp);

$image_five_name_tmp  =  explode(".",$_FILES['image_five']['name']);
$image_five_tmp     = $_FILES['image_five']['tmp_name'];
$file_extension_file5 = end($image_five_name_tmp);

$image_six_name_tmp   =  explode(".",$_FILES['image_six']['name']);
$image_six_tmp      = $_FILES['image_six']['tmp_name'];
$file_extension_file6 = end($image_six_name_tmp);

// required image extensions 
$validextensions  = array("jpeg", "jpg", "png");


// -- check file extensions for required file formats
if (
  (($_FILES['image_one']['size'] !=0)   && (!in_array($file_extension_file1, $validextensions))) ||
  (($_FILES['image_two']['size'] !=0)   && (!in_array($file_extension_file2, $validextensions))) ||
  (($_FILES['image_three']['size'] !=0) && (!in_array($file_extension_file3, $validextensions))) ||
  (($_FILES['image_four']['size'] !=0)  && (!in_array($file_extension_file4, $validextensions))) ||
  (($_FILES['image_five']['size'] !=0)  && (!in_array($file_extension_file5, $validextensions))) ||
  (($_FILES['image_six']['size'] !=0)   && (!in_array($file_extension_file6, $validextensions))) 
  ) 
  {
 
  $messages[] = 'Error: Invalid image formats selected!! please try again';
  }
  
  else if (
    (($_FILES['image_one']['size'] !=0)   && ($_FILES['image_one']['size'] > MAX_SIZE*1024)) || 
    (($_FILES['image_two']['size'] !=0)   && ($_FILES['image_two']['size'] > MAX_SIZE*1024)) || 
    (($_FILES['image_three']['size'] !=0) && ($_FILES['image_three']['size'] > MAX_SIZE*1024)) || 
    (($_FILES['image_four']['size'] !=0)  && ($_FILES['image_four']['size'] > MAX_SIZE*1024)) || 
    (($_FILES['image_five']['size'] !=0)  && ($_FILES['image_five']['size'] > MAX_SIZE*1024)) || 
    (($_FILES['image_six']['size'] !=0)   && ($_FILES['image_six']['size'] > MAX_SIZE*1024))
  )
  {
    $messages[] = 'Error: Image size should not exceed 1Mb!! please try again';
  }

        // check that price is numeric
  else if(!is_numeric($input_item_price)){
        $messages[] = 'Error: Invalid price entered!!';
  }
    // check description does not exceed required number of characters
    else if(strlen($input_item_description) > 200){
  $messages[] = 'Error: Description does not exceed 200 characters!!';
    }
    else{

      # ------------ generate new image names

      //set random_id length
      $random_prod_length = 5;
      //generate a random id encrypt it and store in $rnd_id
      $rnd_id1 = sha1(uniqid(rand(),true));
      $rnd_id2 = sha1(uniqid(rand(),true));
      $rnd_id3 = sha1(uniqid(rand(),true));
      $rnd_id4 = sha1(uniqid(rand(),true));
      $rnd_id5 = sha1(uniqid(rand(),true));
      $rnd_id6 = sha1(uniqid(rand(),true));

      //remove any slashes that may have come
      $rnd_id1 = strip_tags(stripslashes($rnd_id1));
      $rnd_id2 = strip_tags(stripslashes($rnd_id2));
      $rnd_id3 = strip_tags(stripslashes($rnd_id3));
      $rnd_id4 = strip_tags(stripslashes($rnd_id4));
      $rnd_id5 = strip_tags(stripslashes($rnd_id5));
      $rnd_id6 = strip_tags(stripslashes($rnd_id6));

      //removing any . or / and reversing the string
      $rnd_id1 = str_replace(".","",$rnd_id1);
      $rnd_id1 = strrev(str_replace("/","",$rnd_id1));

      $rnd_id2 = str_replace(".","",$rnd_id2);
      $rnd_id2 = strrev(str_replace("/","",$rnd_id2));

      $rnd_id3 = str_replace(".","",$rnd_id3);
      $rnd_id3 = strrev(str_replace("/","",$rnd_id3));

      $rnd_id4 = str_replace(".","",$rnd_id4);
      $rnd_id4 = strrev(str_replace("/","",$rnd_id4));

      $rnd_id5 = str_replace(".","",$rnd_id5);
      $rnd_id5 = strrev(str_replace("/","",$rnd_id5));

      $rnd_id6 = str_replace(".","",$rnd_id6);
      $rnd_id6 = strrev(str_replace("/","",$rnd_id6));


      //taking the first ten characters from $rnd_id
      $rnd_id1 = substr($rnd_id1,0,$random_prod_length);
      $rnd_id2 = substr($rnd_id2,0,$random_prod_length);
      $rnd_id3 = substr($rnd_id3,0,$random_prod_length);
      $rnd_id4 = substr($rnd_id4,0,$random_prod_length);
      $rnd_id5 = substr($rnd_id5,0,$random_prod_length);
      $rnd_id6 = substr($rnd_id6,0,$random_prod_length);

      $img1 = md5($rnd_id1);

      $img2 = md5($rnd_id2);

      $img3 = md5($rnd_id3);

      $img4 = md5($rnd_id4);

      $img5 = md5($rnd_id5);

      $img6 = md5($rnd_id6);
      
      # ------------ image upload directory
      $upload_directory = "admin_uploads/";
      
      //we will give an unique name, for example a random number      
      //the new name will be containing the full path where will be stored (images folder)
      $sup_file11_Extention = strtolower(pathinfo($_FILES['image_one']['name'],PATHINFO_EXTENSION));  
      $consT_name1 = $img1.".".$sup_file11_Extention;
            
      $sup_file12_Extention = strtolower(pathinfo($_FILES['image_two']['name'],PATHINFO_EXTENSION));  
      $consT_name2 = $img2.".".$sup_file12_Extention;

      $sup_file13_Extention = strtolower(pathinfo($_FILES['image_three']['name'],PATHINFO_EXTENSION));  
      $consT_name3 = $img3.".".$sup_file13_Extention;

      $sup_file14_Extention = strtolower(pathinfo($_FILES['image_four']['name'],PATHINFO_EXTENSION));   
      $consT_name4 = $img4.".".$sup_file14_Extention;

      $sup_file15_Extention = strtolower(pathinfo($_FILES['image_five']['name'],PATHINFO_EXTENSION));   
      $consT_name5 = $img5.".".$sup_file15_Extention;

      $sup_file16_Extention = strtolower(pathinfo($_FILES['image_six']['name'],PATHINFO_EXTENSION));  
      $consT_name6 = $img6.".".$sup_file16_Extention;


      # ------------ generate unique product string

      $a          = uniqid(1,true);
      $time       = date("s");
      $crypt      =  password_hash($a, PASSWORD_DEFAULT);
      $length     = 5; 
      $unique_no  = uniqid($crypt,rand());
      $unique_no  = strip_tags(stripslashes($unique_no));
      $unique_no  = str_replace(".","",$unique_no);
      $unique_no  = strrev(str_replace("/","",$unique_no));
      $unique_no  = substr($unique_no,0,$length);
      $smkt_ref   = $unique_no.$time;

      # ------- save into database

      // information of product

      $query_one = $link->query ("insert into supermarket_products(
          product_code,
          smkt_name,
          smkt_qty,
          smkt_price,
          smkt_size,
          smkt_color,
          smkt_category,
          smkt_subcategory,
          smkt_description,
          image_one,
          image_two,
          image_three,
          image_four,
          image_five,
          image_six,
          recommended)      

          values(
              '$smkt_ref',
              '$input_item_name',
              '$input_item_quantity',
              '$input_item_price',
              '$input_item_size',
              '$input_item_color',
              '$input_select_category',
              '$input_select_subcategory',
              '$input_item_description',
              '$consT_name1',
              '$consT_name2',
              '$consT_name3',
              '$consT_name4',
              '$consT_name5',
              '$consT_name6',
              '$input_item_recommened')");


        if($query_one){


          $messages[] = 'Info: New product successfully added!';
          

          //the image name, the thumbnail name and the width and height desired for the thumbnail
          /*
          $thumbnail_Rone   = $img1.".".$sup_file11_Extention;
          $thumbnail_Rtwo   = $img2.".".$sup_file11_Extention;
          $thumbnail_Rthree = $img3.".".$sup_file11_Extention;
          $thumbnail_Rfour  = $img4.".".$sup_file11_Extention;
          $thumbnail_Rfive  = $img5.".".$sup_file11_Extention;
          $thumbnail_Rsix   = $img6.".".$sup_file11_Extention;

          $thumbnail_one    = make_thumb($upload_directory.$consT_name1, $thumbnail_Rone, WIDTH,HEIGHT);
          $thumbnail_two    = make_thumb($upload_directory.$consT_name1, $thumbnail_Rtwo, WIDTH,HEIGHT);
          $thumbnail_three  = make_thumb($upload_directory.$consT_name1, $thumbnail_Rthree, WIDTH,HEIGHT);
          $thumbnail_four   = make_thumb($upload_directory.$consT_name1, $thumbnail_Rfour, WIDTH,HEIGHT);
          $thumbnail_five   = make_thumb($upload_directory.$consT_name1, $thumbnail_Rfive, WIDTH,HEIGHT);
          $thumbnail_six    = make_thumb($upload_directory.$consT_name1, $thumbnail_Rsix, WIDTH,HEIGHT);
          */
          
          move_uploaded_file($image_one_tmp,$upload_directory.$consT_name1);          
          move_uploaded_file($image_two_tmp,$upload_directory.$consT_name2);          
          move_uploaded_file($image_three_tmp,$upload_directory.$consT_name3);          
          move_uploaded_file($image_four_tmp,$upload_directory.$consT_name4);         
          move_uploaded_file($image_five_tmp,$upload_directory.$consT_name5);         
          move_uploaded_file($image_six_tmp,$upload_directory.$consT_name6);          

        ?>
          <script>
            $(function (){
             // $("#input_select_subcategory").html('');
              //$("#input_item_description").val('');
              //$("#w3_add_products_form")[0].reset();
            });
          </script>
        <?php 
        
      }
      else {
      $messages[] = "Error: Failed to add product!";
      }

    } // else 

  if(!empty($messages)){
    foreach ($messages as $feedbacks) {
         ?>
      <script>
        $(function(){
            alert("<?php echo $feedbacks; ?>");
        });
      </script>
    <?php
    }
  }


  }// isset // post

?>
 
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

    <!-- Your code to create an instance of Fine Uploader and bind to the DOM/template
    ====================================================================== -->
    <script>
  /*
      $(document).ready(function() {
          


        // handle products submission  
        $('#trigger-upload').click(function() {
            
                  var input_select_category     = $('#input_select_category').val();
                  var input_select_subcategory  = $('#input_select_subcategory').val();
                  var input_item_name           = $('#input_item_name').val();
                  var input_item_price          = $('#input_item_price').val();
                  var input_item_quantity       = $('#input_item_quantity').val();
                  var input_item_brand          = $('#input_item_brand').val();
                  var input_item_size           = $('#input_item_size').val();
                  var input_item_color          = $('#input_item_color').val();
                  var input_item_description    = $('#input_item_description').val();


              //    if(input_select_category == '' || input_select_subcategory == '' || input_item_name == '' || input_item_price == '' || input_item_quantity == '' || input_item_description == '')
                //  {
               //        bootbox.alert("Error: Some required fields have not been filled!");
               //   }
              //    else {

                    $.ajax({
                      url: "_new_products.php",
                      method: "post",
                      data: $("#w3_add_products_form").serialize(),
                      success: function (data){
                         bootbox.alert(data);
                      }
                    });
                //}//else 
                
            });
        });
*/
    </script>

<!-- text counter for description -->
<script>        
  $(document).ready(function() {
    var text_max = 180;
    $('#textarea_feedback').html(text_max + ' characters remaining');
    $('#input_item_description').on('keyup', function() {
      var text_length     = $('#input_item_description').val().length;
      var text_remaining  = text_max - text_length;
      $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
  })
</script>
<!-- jQuery upload preview -->
<script src="plugins/uploadPreview/jquery.uploadPreview.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        // image previews before upload

          $.uploadPreview({
            input_field: "#image-upload-1",   // Default: .image-upload
            preview_box: "#image_one_container",  // Default: .image-preview
            label_field: "#image_label_one",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
          });

          $.uploadPreview({
            input_field: "#image-upload-2",   // Default: .image-upload
            preview_box: "#image_two_container",  // Default: .image-preview
            label_field: "#image_label_two",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
          });
          $.uploadPreview({
            input_field: "#image-upload-3",   // Default: .image-upload
            preview_box: "#image_three_container",  // Default: .image-preview
            label_field: "#image_label_three",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
          });
          $.uploadPreview({
            input_field: "#image-upload-4",   // Default: .image-upload
            preview_box: "#image_four_container",  // Default: .image-preview
            label_field: "#image_label_four",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
          });
          $.uploadPreview({
            input_field: "#image-upload-5",   // Default: .image-upload
            preview_box: "#image_five_container",  // Default: .image-preview
            label_field: "#image_label_five",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
          });
          $.uploadPreview({
            input_field: "#image-upload-6",   // Default: .image-upload
            preview_box: "#image_six_container",  // Default: .image-preview
            label_field: "#image_label_six",    // Default: .image-label
            label_default: "Choose File",   // Default: Choose File
            label_selected: "Change File",  // Default: Change File
            no_label: false                 // Default: false
          });
      });
    </script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jQueryUI/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- select2 plugin -->
<script src="plugins/select2/dist/js/select2.js"></script>
<script>
  $(document).ready(function(){
        // select2
            // -- single selects with editable fields
        $('.edit_select2').select2({
            placeholder: '-- Select Sub-Category --',
            tags: true,
            allowClear: true
        });
      });
</script>
<!--  enhance smooth scrolling  -->    
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    //bootstrap WYSIHTML5 - text editor
    $("#input_item_description").wysihtml5({
        "link": false, 
        "image": false
    });
  });
</script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

</body>
</html>
