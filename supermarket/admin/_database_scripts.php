<?php 
	#	----	DATABASE CRUD SCRIPTS

	// database connection
	require_once '../session-variables.php'; 
?>

<?php 

	// delete products from manage-products page
	
	if(isset($_POST['idProd'])) {

			$product_id = $_POST['idProd'];

			$prod_delete_query = $link->query("delete from supermarket_products where smkt_id='$product_id'");

			if ($prod_delete_query) {
				echo 'Info: Product successfully Deleted!';
			}
			else {
				echo 'Error: failed to delete product!';
			}

	}// isset // post

?>
<?php 

	// delete customer

	if(isset($_POST['idCust'])) {

			$customer_id = $_POST['idCust'];

			$cust_delete_query = $link->query("delete from all_users_login_details where Cmplx_id='$customer_id'");

			if ($cust_delete_query) {
				echo 'Info: customer information successfully Deleted!';
			}
			else {
				echo 'Error: failed to delete customer information!';
			}
}
?>

<?php 

	// delete order list

	if(isset($_POST['idOrder'])) {

			$order_receipt = $_POST['idOrder'];

			$grp_order_delete_query = $link->query("delete from grouped_orders where order_receipt='$order_receipt'");

			$list_order_delete_query = $link->query("delete from customer_orders where order_receipt='$order_receipt'");

		if (($grp_order_delete_query) && ($list_order_delete_query)) {
				echo 'Info: Order information was successfully Deleted!';
			}
		else {
				echo 'Error: failed to delete order information!';
	}
}
?>

<?php 

	// confirm order list

	if(isset($_POST['receiptVar'])) {

			$receiptVar = $_POST['receiptVar'];

			$grp_order_confirm_order_query = $link->query("update grouped_orders set order_status='Old order', payment_status='Paid' where order_receipt='$receiptVar'");

			$list_order_confirm_order_query = $link->query("update customer_orders set order_status='Old order', payment_status='Paid' where order_receipt='$receiptVar'");

		if (($grp_order_confirm_order_query) && ($list_order_confirm_order_query)) {
				echo 'Info: Order information was successfully confirmed!';
			}
		else {
				echo 'Error: failed to confirm order information!';
	}
}//
?>


<?php 

	// load delivered / paid order list

	if(isset($_POST['w3_delivered_picked_orders_class'])) {

			$w3_delivered_picked_orders = $_POST['w3_delivered_picked_orders_class'];

           $fetch_paid_orders_list_qry = $link->query("select 
                      id, 
                      customer_username,
                      order_receipt,
                      order_status,
                      payment_status,
                      date_format(date_time, '%d-%m-%Y %h:%i') as ordered_date                     
                  from grouped_orders
                  where order_status = 'Old order' and payment_status='Paid'");

if ($fetch_paid_orders_list_qry) {
   
            ?>
            <table class="table table-bordered table-hover table-condensed" id="w3_paid_orders_table">
              <thead>
                  <tr class="success">
                    <th>No</th>
                    <th>Date-Time</th>
                    <th>Customer Username</th>
                    <th>Order Receipt</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                $rvt = 1;
                while ($roww = mysqli_fetch_assoc($fetch_paid_orders_list_qry)) {
                ?>
                <tr>
                  <td><?php echo $rvt; ?>                      </td>
                  <td><?php echo $roww['ordered_date']; ?>     </td>
                  <td><?php echo $roww['customer_username']; ?></td>
                  <td><?php echo $roww['order_receipt']; ?>    </td>
                  <td>
                    <a href="#orderListModal" data-toggle="modal" onclick="viewOrdersFunction('<?php echo $roww['customer_username']; ?>','<?php echo $roww['order_receipt']; ?>')" title="View list"><span class="label label-info">View List</span>
                    </a>
                  </td>
                </tr>
            <?php $rvt++; } ?>
              </tbody>
            </table>
					<script>
					  $(document).ready(function () {
							// datatable configuration
							$('#w3_paid_orders_table').DataTable({
							"paging": true,
							"lengthChange": false,
							"searching": true,
							"ordering": true,
							"info": false,
							"autoWidth": false
							});
					  });
					</script>            

          <?php } 

          else { 
				echo "<span class='text-info'>Info: No information currently available to display!</span>";
	}
}//
?>


<?php 
		// load order list

	if (isset($_POST['cust_username']) && isset($_POST['order_receipt'])) {
		# code...
			$cust_username 		= $_POST['cust_username'];
			$order_receipt	 	= $_POST['order_receipt'];

		$fetch_orders_list_query = $link->query("select 
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
					where customer_username = '$cust_username' and order_receipt='$order_receipt'");

		// total amount
		$total_amount = array();

			if ($fetch_orders_list_query) {

				$fetch_orders_list_obj_query = $link->query("select * from customer_orders where customer_username = '$cust_username' and order_receipt='$order_receipt'");
				$fetch_orders_list_obj = $fetch_orders_list_obj_query->fetch_object();

					?>

                    <table class="table table-bordered table-hover table-condensed">
                      <thead>
                            <tr class="success">
	                            <th>Item Name</th>
	                            <th>Quantity</th>
	                            <th>Size</th>
	                            <th>Color</th>
	                            <th>Brand</th>
	                            <th>Date</th>
	                            <th>Total</th>
                          </tr>
                      </thead>

                      <tbody>
                        <?php 
                           	while ($row = mysqli_fetch_assoc($fetch_orders_list_query)) {
                           		$total_amount[] = $row['item_price'];
                              ?>
                              <tr>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['item_qty']; ?></td>
                                <td><?php echo $row['item_size']; ?></td>
                                <td><?php echo $row['item_color']; ?></td>
                                <td><?php echo $row['item_brand']; ?></td>
                                <td><?php echo $row['ordered_date']; ?></td>
                                <td><?php echo number_format($row['item_price']); ?></td>
                              </tr>
                              <?php 
                            }
                        ?>
                      </tbody>
                      <tfoot>
                      	<th colspan="6">TOTAL ORDER AMOUNT</th>
                      	<th><?php echo $currency.' '.number_format(array_sum($total_amount)); ?></th>
                      </tfoot>
                      
                    </table>
                    <br />
					<p><strong>Location:</strong>&nbsp;<?php echo $fetch_orders_list_obj->location; ?></p>
					<p><strong>Delivery:</strong>&nbsp;<?php echo $fetch_orders_list_obj->delivery; ?></p>
					<p><strong>Notes:</strong>&nbsp;<?php echo $fetch_orders_list_obj->notes; ?></p>
					
					<?php
				}			
		else {
			echo "<p class='text-center text-danger'>ERROR OCCURRED WHILE DISPLAYING INFORMATION!</p>";
		}
}//
?>	

<?php 
	
	// load customer orders on click

	if (isset($_POST['customer_id']) && isset($_POST['customer_username'])) {
		# code...
			$customer_id 		= $_POST['customer_id'];
			$customer_username 	= $_POST['customer_username'];

			$fetch_orders_query = $link->query("select 
											id, 
											customer_username,
											item_name,
											product_code,
											item_price,
											item_qty,
											item_size,
											item_color,
											item_brand,
											location,
											date_format(date_ordered, '%d-%m-%Y') as ordered_date,
											delivery,
											payment_status,
											order_status
									from customer_orders
									where customer_username = '$customer_username'");

			if ($fetch_orders_query) {

					?>
                    <table class="table table-bordered table-hover customers_table table-condensed">
                      <thead>
                            <tr class="success">
	                            <th>Item Name</th>
	                            <th>Price</th>
	                            <th>Quantity</th>
	                            <th>Date</th>
	                            <th>Delivery</th>
	                            <th>Payment</th>
                          </tr>
                      </thead>

                      <tbody>
                        <?php 
                           	while ($row = mysqli_fetch_assoc($fetch_orders_query)) {
                              ?>
                              <tr>
                                <td><?php echo $row['item_name']; ?></td>
                                <td><?php echo $row['item_price']; ?></td>
                                <td><?php echo $row['item_qty']; ?></td>
                                <td><?php echo $row['ordered_date']; ?></td>
                                <td><?php echo $row['delivery']; ?></td>
                                <td><?php echo $row['payment_status']; ?></td>
                              </tr>
                              <?php 
                            }
                        ?>
                      </tbody>
                      
                    </table>
					<?php
				}
			
		else {
			echo "<p class='text-center text-info'><span class='text-danger'>".$customer_username."</span> HAS NO ORDER HISTORY!</p>";
	}
}// isset //post
?>
