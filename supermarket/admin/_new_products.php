<?php 
#	----	add new products to database
// database connection
require_once '../session-variables.php'; 
//error_reporting(~E_NOTICE);

//define a maxim size for the uploaded images
define ("MAX_SIZE","1000"); // 1 Mb * 1024
// define the width and height for the thumbnail
// note that theese dimmensions are considered the maximum dimmension and are not fixed,
// because we have to keep the image ratio intact or it will be deformed
define ("WIDTH","270"); //set here the width you want your thumbnail to be
define ("HEIGHT","250"); //set here the height you want your thumbnail to be.
// require password hashing library
require "../modules/libraries/password_compatibility_library.php";
?>

<?php 	
	
if(isset($_POST['input_select_category'])) {

		// boolean check 
		$bool = false;

		// assign post inputs to variables

        $input_select_category 		= $_POST['input_select_category'];
        $input_select_subcategory	= $_POST['input_select_subcategory'];
        $input_item_name			= $_POST['input_item_name'];
        $input_item_price			= $_POST['input_item_price'];
        $input_item_quantity		= $_POST['input_item_quantity'];
        $input_item_brand			= $_POST['input_item_brand'];
        $input_item_size			= $_POST['input_item_size'];
        $input_item_color			= $_POST['input_item_color'];
        $input_item_description		= $_POST['input_item_description'];

        $show_txt1		= $_POST['show_txt1'];
        $show_txt2		= $_POST['show_txt2'];
        $show_txt3		= $_POST['show_txt3'];
        $show_txt4		= $_POST['show_txt4'];
        $show_txt5		= $_POST['show_txt5'];
        $show_txt6		= $_POST['show_txt6'];
        // images
        /*
        $image_one					= $_FILES['image_one']['name'];
        $image_two					= $_FILES['image_two']['name'];
        $image_three				= $_FILES['image_three']['name'];
        $image_four					= $_FILES['image_four']['name'];
        $image_five					= $_FILES['image_five']['name'];
        $image_six					= $_FILES['image_six']['name'];
*/
    /*----	//	ALITTLE BIT OF NASTY-NESS HERE!! NOT ADVISED TO THIS; JUST LOOK FOR A MULTIPLE IMAGE UPLOAD PLUGIN ----*/    

		
$image_one_name_tmp	  =	 explode(".",$_FILES['image_one']['name']);
$image_one_tmp		  =	$_FILES['image_one']['tmp_name'];
$file_extension_file1 = end($image_one_name_tmp);
		
$image_two_name_tmp	  =	 explode(".",$_FILES['image_two']['name']);
$image_two_tmp		  =	$_FILES['image_two']['tmp_name'];
$file_extension_file2 = end($image_two_name_tmp);

$image_three_name_tmp =	 explode(".",$_FILES['image_three']['name']);
$image_three_tmp	  =	$_FILES['image_three']['tmp_name'];
$file_extension_file3 = end($image_three_name_tmp);

$image_four_name_tmp  =	 explode(".",$_FILES['image_four']['name']);
$image_four_tmp		  =	$_FILES['image_four']['tmp_name'];
$file_extension_file4 = end($image_four_name_tmp);

$image_five_name_tmp  =	 explode(".",$_FILES['image_five']['name']);
$image_five_tmp		  =	$_FILES['image_five']['tmp_name'];
$file_extension_file5 = end($image_five_name_tmp);

$image_six_name_tmp	  =	 explode(".",$_FILES['image_six']['name']);
$image_six_tmp		  =	$_FILES['image_six']['tmp_name'];
$file_extension_file6 = end($image_six_name_tmp);

// required image extensions 
$validextensions 	= array("jpeg", "jpg", "png");


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
	echo '<p class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;Error: Invalid image formats selected!! please try again</p>';
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
    echo '<p class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;Error: Image size should not exceed 1Mb!! please try again</p>';
	}

        // check that price is numeric
	else if(!is_numeric($input_item_price)){
      	echo '<p class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;Error: Invalid price entered!!</p>';
	}
		// check description does not exceed required number of characters
		else if(strlen($input_item_description) > 200){
	echo '<p class="text-danger text-center"><i class="fa fa-exclamation-triangle"></i>&nbsp;Error: Description does not exceed 180 characters!!</p>';
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
			$consT_name1 = $upload_directory.$img1.".".$sup_file11_Extention;
						
			$sup_file12_Extention = strtolower(pathinfo($_FILES['image_two']['name'],PATHINFO_EXTENSION)); 	
			$consT_name2 = $upload_directory.$img2.".".$sup_file12_Extention;

			$sup_file13_Extention = strtolower(pathinfo($_FILES['image_three']['name'],PATHINFO_EXTENSION)); 	
			$consT_name3 = $upload_directory.$img3.".".$sup_file13_Extention;

			$sup_file14_Extention = strtolower(pathinfo($_FILES['image_four']['name'],PATHINFO_EXTENSION)); 	
			$consT_name4 = $upload_directory.$img4.".".$sup_file14_Extention;

			$sup_file15_Extention = strtolower(pathinfo($_FILES['image_five']['name'],PATHINFO_EXTENSION)); 	
			$consT_name5 = $upload_directory.$img5.".".$sup_file15_Extention;

			$sup_file16_Extention = strtolower(pathinfo($_FILES['image_six']['name'],PATHINFO_EXTENSION)); 	
			$consT_name6 = $upload_directory.$img6.".".$sup_file16_Extention;


			# ------------ generate unique product string


			$a 			= uniqid(1,true);
			$time 		= date("s");
			$crypt 		=  password_hash($a, PASSWORD_DEFAULT);
			$length 	= 5; 
			$unique_no 	= uniqid($crypt,rand());
			$unique_no 	= strip_tags(stripslashes($unique_no));
			$unique_no 	= str_replace(".","",$unique_no);
			$unique_no 	= strrev(str_replace("/","",$unique_no));
			$unique_no 	= substr($unique_no,0,$length);
			$smkt_ref 	= $unique_no.$time;

			#	------- save into database

			// information of product

			$query_one = $link->query ("insert into supermarket_products(
					smkt_ref,
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
					image_six) 			

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
							'$consT_name6')");


				if($query_one){


					echo '<p class="text-success text-center"><i class="fa fa-check"></i>&nbsp;Info: New product successfully added!</p>';
					

					//the image name, the thumbnail name and the width and height desired for the thumbnail
					/*
					$thumbnail_Rone   =	$img1.".".$sup_file11_Extention;
					$thumbnail_Rtwo   =	$img2.".".$sup_file11_Extention;
					$thumbnail_Rthree =	$img3.".".$sup_file11_Extention;
					$thumbnail_Rfour  =	$img4.".".$sup_file11_Extention;
					$thumbnail_Rfive  =	$img5.".".$sup_file11_Extention;
					$thumbnail_Rsix   =	$img6.".".$sup_file11_Extention;

					$thumbnail_one 	  = make_thumb($consT_name1, $thumbnail_Rone, WIDTH,HEIGHT);
					$thumbnail_two 	  = make_thumb($consT_name1, $thumbnail_Rtwo, WIDTH,HEIGHT);
					$thumbnail_three  = make_thumb($consT_name1, $thumbnail_Rthree, WIDTH,HEIGHT);
					$thumbnail_four   = make_thumb($consT_name1, $thumbnail_Rfour, WIDTH,HEIGHT);
					$thumbnail_five   = make_thumb($consT_name1, $thumbnail_Rfive, WIDTH,HEIGHT);
					$thumbnail_six 	  = make_thumb($consT_name1, $thumbnail_Rsix, WIDTH,HEIGHT);
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
							$("#input_select_subcategory").html('');
							$("#input_item_description").val('');
							$("#w3_add_products_form")[0].reset();
						});
					</script>
				<?php 
				
			}
			else {
			echo "<p class='text-danger text-center'><i class='fa fa-exclamation-triangle'></i>&nbsp;Error: Failed to add product!</p>";
			}

		} // else 

	}// isset // post

?>