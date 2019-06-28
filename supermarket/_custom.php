<?php 
require_once 'session-variables.php'; 
?>

<?php 
	// update customer information 

	if (isset($_POST['input_username']) && isset($_POST['input_mobile_contact'])) {
		# code...
		$input_username			=	$_POST['input_username'];
		$input_mobile_contact	=	$_POST['input_mobile_contact'];
		$input_email_add		=	$_POST['input_email_add'];
	
		if (!empty($input_email_add) && !filter_var($input_email_add, FILTER_VALIDATE_EMAIL)) {
			echo "Error: Invalid email address entered!!";
		}
		else if(strlen($input_mobile_contact) > 13 || strlen($input_mobile_contact) < 6){
			echo "Error: Mobile contact length is Invalid!";
		}
		else {

			$update_customer_account = $link->query("update all_users_login_details set Cmplx_phone = '$input_mobile_contact', Cmplx_email = '$input_email_add' where Cmplx_username = '$input_username'");
			if ($update_customer_account) {
				# code...
				echo "Info: Information successfully updated!";
			}
			else  {
				echo "Error: failed to update information";
			}
		}

	}// ISSET //POST
?>

<?php 
	// load order lists 

	if (isset($_POST['order_receipt_var'])) {
		# code...
		$order_receipt_var	=	$_POST['order_receipt_var'];
	
	      $get_order_list_query = $link->query("select 
	          id, 
	          customer_username,
	          product_code,
	          item_name,
	          item_price,
	          item_qty,
	          item_size,
	          item_color,
	          item_brand,
	          location,
	          date_format(date_ordered, '%d-%m-%Y') as ordered_date,
	          delivery,
	          payment_status,
	          order_status,
	          order_receipt,
	          notes
	          from customer_orders
	          where order_receipt = '$order_receipt_var'");

	      if ($get_order_list_query->num_rows > 0) {

	      		$total_amount_array = array();
	      		$t = 1;
	      ?>
	      <h4 class="text-info">Items List for Order Receipt: <span style="text-decoration: underline;"><?php echo $order_receipt_var; ?></span></h4>
            <table class="table table-bordered table-hover table-condensed orders_table">
              <thead>
	                <tr class="success">
	                  <th>No</th>
	                  <th>Date</th>
	                  <th>Item Name</th>
	                  <th>Quantity</th>
	                  <th>Size</th>
	                  <th>Color</th>
	                  <th>Brand</th>
	                  <th>Total</th>
	              </tr>
              </thead>

              <tbody>
                <?php 
                    while ($row = $get_order_list_query->fetch_assoc()) {
                    	$total_amount_array[] = $row['item_price'];
                      ?>
                      <tr>
	                        <td><?php echo $t; ?></td>
	                        <td><?php echo $row['ordered_date']; ?></td>
	                        <td><?php echo $row['item_name']; ?></td>
	                        <td><?php echo $row['item_qty']; ?></td>
	                        <td><?php echo $row['item_size']; ?></td>
	                        <td><?php echo $row['item_color']; ?></td>
	                        <td><?php echo $row['item_brand']; ?></td>
	                        <td><?php echo number_format($row['item_price']); ?></td>
                      </tr>
                      <?php 
                      $t++;
                    }
                ?>
              </tbody>                      
              <tfoot>
              	<tr class="text-danger">
              		<th colspan="7">TOTAL</th>
              		<th><?php echo $currency.' '.number_format(array_sum($total_amount_array)); ?></th>
              	</tr>
              </tfoot>
            </table>

	      <?php	
	      }
	      else {
	      	 echo "<span class='text-danger text-uppercase'>Failed to Load Order List</span>!";
	    } // else
	}// ISSET //POST
?>




