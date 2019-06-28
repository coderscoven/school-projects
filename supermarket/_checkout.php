<?php 
require_once 'session-variables.php'; 
?>

<?php 

	if (isset($_POST)) {
	
	// initialize variables from form 
		$checkout_full_names 	  = $_POST['checkout_full_names'];
		$checkout_username 		  = $_POST['checkout_username'];
		$checkout_phone_contact   = $_POST['checkout_phone_contact'];
		$checkout_delivery_method = $_POST['checkout_delivery_method'];
		
		$checkout_location 		  = $_POST['checkout_location'];
		$checkout_notes		 	  = $_POST['checkout_notes'];
		
		$checkout_item_name 	  = $_POST['checkout_item_name'];
		$checkout_item_qty		  = $_POST['checkout_item_qty'];
		$checkout_item_tcost 	  = $_POST['checkout_item_tcost'];
		$checkout_item_code		  = $_POST['checkout_item_code'];

		$input_total_orders		  = $_POST['input_total_orders'];
		
		// custom variables 
		$checkout_Sinsertion = 1;
		$checkout_Einsertion = 1;
		$checkout_Scounter = array();
		$checkout_Ecounter = array();
		$boolvalue = false;
		
		if(empty($checkout_full_names)){
			echo "<p class='text-center text-danger'>Error: Please enter your full names!</p>"; 
		}
		else if(strlen($checkout_full_names) < 4){
			echo "<p class='text-center text-danger'>Error: Invalid full names entered!</p>";  		
		}
		else if(($checkout_delivery_method == 'Delivery') && empty($checkout_location )) {
			echo "<p class='text-center text-danger'>Info: Please enter your Location since you selected Delivery!</p>";  	 
		}
		else {
			// generate an orders receipt
			$random_id_length = 7;
			$rnd_id = crypt(uniqid(rand(),1));
			$rnd_id = strip_tags(stripslashes($rnd_id));
			$rnd_id = str_replace(".","",$rnd_id);
			$rnd_id = strrev(str_replace("/","",$rnd_id));
			$order_receipt = substr($rnd_id,0,$random_id_length);
		
			// cart items are in array format
			
			foreach($checkout_item_name as $key=>$n){
				
				// save in single orders table 
				$checkout_single_orders = $link->query("insert into customer_orders 
				(
				customer_username,
				full_names,
				product_code,
				item_name,
				item_price,
				item_qty,
				location,
				delivery,
				payment_status,
				order_status,
				order_receipt,
				notes) values 				
				(
				'$checkout_username',
				'$checkout_full_names',
				'$checkout_item_code[$key]',
				'$n',
				'$checkout_item_tcost[$key]',
				'$checkout_item_qty[$key]',
				'$checkout_location',
				'$checkout_delivery_method',
				'Not Paid',
				'New order',
				'$order_receipt',
				'$checkout_notes')");
				
				if($checkout_single_orders) {
					//$checkout_Scounter[] = $checkout_Sinsertion++;
					$boolvalue = true;
				} else { 
					//$checkout_Ecounter[] = $checkout_Einsertion++;
					$boolvalue = false;
				} // else check
				
			}// foreach
				
			
			// check insertion query counter
			if($boolvalue == true) {

			// save in group orders table 
			$checkout_grouped_orders = $link->query("insert into grouped_orders 
				(
				customer_username,
				order_receipt,
				order_status,
				payment_status,
				full_names,
			    total_amount) values 				
				(
				'$checkout_username',
				'$order_receipt',
				'New order',
				'Not Paid',
				'$checkout_full_names',
				'$input_total_orders')");
			
				// reduce quantity of products from supermarket_products inventory
			 foreach($checkout_item_code as $keyy=>$nn){
				$update_products_store_query = $link->query("update supermarket_products set smkt_qty = smkt_qty - '$checkout_item_qty[$keyy]' where product_code = '$nn'");
			}

			echo "
				<p class='text-center text-success'>
					Info: Your checkout was successful:
				 </p>
				<p class='text-center text-success'>
					Your Order code Is: <span class='text-danger'>".$order_receipt."</span>.
				</p> 
				<p class='text-center text-success'>
					Also you can follow your orders from <a href='user-account.php'>Here.</a>
				</p>"; 
			?>
			<script>
				$(document).ready(function(){
					$("#checkout_button").prop("disabled", true);
				});
			</script>
			<!--<meta http-equiv="refresh" content="1;url=index.php" />-->
			<?php 	
				
				
				// unset the cart session 
				//if (isset($_SESSION["products"])) {
							unset($_SESSION["products"]); 
				//}
				
				
			} else {
				?>
			<script>
				$(document).ready(function(){
					bootbox.alert("Error: There was error during your checkout!");
				});
			</script>
		<?php 
			// delete any insertions that went through
			$delete_q = $link->query("delete from customer_orders where order_receipt = '$order_receipt'");
			$delete_q = $link->query("delete from grouped_orders where order_receipt = '$order_receipt'");
			
			} // else error occurred during insertion
			
		}// else validation

	} // isset // post
?>