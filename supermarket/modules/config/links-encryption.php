<?php 
							
$urlString = uniqid(date("his"));												
							
#	---------	CATEGORY

$pcat1 = 'Grocery Store';
$pcat2 = 'Electronics';
$pcat3 = 'Health & Beauty';
$pcat4 = 'Photos, Gifts & Office Supplies';
$pcat5 = 'All';

$field1 = array('pcat1'=>$pcat1, 'urlString'=>$urlString);
$field2 = array('pcat2'=>$pcat2, 'urlString'=>$urlString);
$field3 = array('pcat3'=>$pcat3, 'urlString'=>$urlString);
$field4 = array('pcat4'=>$pcat4, 'urlString'=>$urlString);
				
$url1 ="shop.php?".http_build_query($field1,'',"&");
$url2 ="shop.php?".http_build_query($field2,'',"&");
$url3 ="shop.php?".http_build_query($field3,'',"&");
$url4 ="shop.php?".http_build_query($field4,'',"&");


/*
	# ELECTRONICS STORE
	if (isset($_GET['pcat2']) && isset($_GET['urlString'])) {
		# code...
		$electronics_store = mysqli_escape_string($link, $_GET['pcat2']);

		$electronics_store_query = mysqli_query($link, "select * from supermarket_products where smkt_category='$electronics_store'");
		if (mysqli_num_rows($electronics_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($electronics_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# ELECTRONICS STORE


	# HEALTH AND BEAUTY
	if (isset($_GET['pcat3']) && isset($_GET['urlString'])) {
		# code...
		$health_beauty_store = mysqli_escape_string($link, $_GET['pcat3']);

		$health_beauty_store_query = mysqli_query($link, "select * from supermarket_products where smkt_category='$health_beauty_store'");
		if (mysqli_num_rows($health_beauty_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($health_beauty_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# HEALTH AND BEAUTY


	# PHOTOS, GIFTS AND OFFICE SUPPLIES STORE
	if (isset($_GET['pcat4']) && isset($_GET['urlString'])) {
		# code...
		$photos_gifts_office_store = mysqli_escape_string($link, $_GET['pcat4']);

		$photos_gifts_office_store_query = mysqli_query($link, "select * from supermarket_products where smkt_category='$photos_gifts_office_store'");
		if (mysqli_num_rows($photos_gifts_office_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($photos_gifts_office_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	} # PHOTOS, GIFTS AND OFFICE SUPPLIES STORE
*/

	
#	---------	SUB CATEGORY

$pscat1 = 'Home Appliances';
$pscat2 = 'Food store';
$pscat3 = 'Beverages';
$pscat4 = 'Personal Health';
$pscat5 = 'Office stationary';
						
$fields1 = array('pscat1'=>$pscat1, 'urlString'=>$urlString);
$fields2 = array('pscat2'=>$pscat2, 'urlString'=>$urlString);
$fields3 = array('pscat3'=>$pscat3, 'urlString'=>$urlString);
$fields4 = array('pscat4'=>$pscat4, 'urlString'=>$urlString);
$fields5 = array('pscat5'=>$pscat5, 'urlString'=>$urlString);
				
$urls1 ="shop.php?".http_build_query($fields1,'',"&");
$urls2 ="shop.php?".http_build_query($fields2,'',"&");
$urls3 ="shop.php?".http_build_query($fields3,'',"&");
$urls4 ="shop.php?".http_build_query($fields4,'',"&");
$urls5 ="shop.php?".http_build_query($fields5,'',"&");

/*
	# HOME APPLIANCES
	if (isset($_GET['pscat1']) && isset($_GET['urlString'])) {
				# code...
		$home_appliances_store = mysqli_escape_string($link, $_GET['pscat1']);

		$home_appliances_store_query = mysqli_query($link, "select * from supermarket_products where smkt_subcategory='$home_appliances_store'");
		if (mysqli_num_rows($home_appliances_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($home_appliances_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# HOME APPLIANCES

	# FOOD STORE
	if (isset($_GET['pscat2']) && isset($_GET['urlString'])) {
				# code...
		$food_store = mysqli_escape_string($link, $_GET['pscat2']);

		$food_store_query = mysqli_query($link, "select * from supermarket_products where smkt_subcategory='$food_store'");
		if (mysqli_num_rows($food_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($food_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# FOOD STORE

	# BEVERAGES STORE
	if (isset($_GET['pscat3']) && isset($_GET['urlString'])) {
						# code...
		$beverages_store = mysqli_escape_string($link, $_GET['pscat3']);

		$beverages_store_query = mysqli_query($link, "select * from supermarket_products where smkt_subcategory='$beverages_store'");
		if (mysqli_num_rows($beverages_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($beverages_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# BEVERAGES STORE

	# PERSONAL HEALTH STORE
	if (isset($_GET['pscat4']) && isset($_GET['urlString'])) {
						# code...
		$personal_health_store = mysqli_escape_string($link, $_GET['pscat4']);

		$personal_health_store_query = mysqli_query($link, "select * from supermarket_products where smkt_subcategory='$personal_health_store'");
		if (mysqli_num_rows($personal_health_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($personal_health_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# PERSONAL HEALTH STORE

	# OFFICE STATIONARY
	if (isset($_GET['pscat5']) && isset($_GET['urlString'])) {
						# code...
		$office_stationary_store = mysqli_escape_string($link, $_GET['pscat5']);

		$office_stationary_store_query = mysqli_query($link, "select * from supermarket_products where smkt_subcategory='$office_stationary_store'");
		if (mysqli_num_rows($office_stationary_store_query) > 0) {

			while ($row = mysqli_fetch_assoc($office_stationary_store_query)) {
				# code...
			}
		} else {
			echo "<h3 class='text-center text-warning'>No Results were found</h3>";
		}
	}	# OFFICE STATIONARY

*/

#	-------	HOME PAGE COUNTER 
# ----- CATEGORY
$Cat_counter_1 = $link->query("select count(smkt_id) as grocery_store_count from supermarket_products where smkt_category = 'Grocery Store'");
$Cat1_counter =  $Cat_counter_1->fetch_object();

$Cat_counter_2 = $link->query("select count(smkt_id) as electronic_store_count from supermarket_products where smkt_category = 'Electronics'");
$Cat2_counter =  $Cat_counter_2->fetch_object();

$Cat_counter_3 = $link->query("select count(smkt_id) as healthbeauty_count from supermarket_products where smkt_category = 'Health & Beauty'");
$Cat3_counter =  $Cat_counter_3->fetch_object();

$Cat_counter_4 = $link->query("select count(smkt_id) as giftsphotosoffice_count from supermarket_products where smkt_category = 'Photos, Gifts & Office Supplies'");
$Cat4_counter =  $Cat_counter_4->fetch_object();

# ----- SUB-CATEGORY
$Scat_counter_1 = $link->query("select count(smkt_id) as sfood_store_count from supermarket_products where smkt_subcategory = 'Food store'");
$Scat1_counter =  $Scat_counter_1->fetch_object();

$Scat_counter_2 = $link->query("select count(smkt_id) as sbeverages_store_count from supermarket_products where smkt_subcategory = 'Beverages'");
$Scat2_counter =  $Scat_counter_2->fetch_object();

$Scat_counter_3 = $link->query("select count(smkt_id) as selectronic_store_count from supermarket_products where smkt_subcategory = 'Home Appliances'");
$Scat3_counter =  $Scat_counter_3->fetch_object();

$Scat_counter_4 = $link->query("select count(smkt_id) as shealthbeauty_count from supermarket_products where smkt_subcategory = 'Personal Health'");
$Scat4_counter =  $Scat_counter_4->fetch_object();

$Scat_counter_5 = $link->query("select count(smkt_id) as sgiftsphotosoffice_count from supermarket_products where smkt_subcategory = 'Office stationary'");
$Scat5_counter =  $Scat_counter_5->fetch_object();


#	----------------	QUERYING SHOP

?>