<?php include_once('session-variables.php'); 

if(isset($_SESSION["products"]) && count($_SESSION["products"])>0) {

		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		$counter = 1;
foreach($_SESSION["products"] as $product){					
		$product_name 	= $product["smkt_name"]; 
		$product_price 	= $product["smkt_price"];
		$product_code 	= $product["product_code"];
		$product_qty 	= $product["product_qty"];
		$product_color 	= $product["smkt_color"];					
		$subtotal 		= ($product_price * $product_qty);
		$total 			= ($total + $subtotal);

        echo '<ul><li>';
        echo '<h4>'.$counter.'.'.$product_name.'</h4>';
        echo '<div class="p-qty">Qty : '.$product_qty.'</div>';
        echo '<div class="p-price">Price :'.$currency.' '.number_format($product_price * $product_qty).'</div>';
        echo '</li></ul>';
    	$counter++;	
    }
    if(isset($total)) {
    	echo '<hr>';
    	echo '<span class="check-out-txt cart-products-total"><strong>Total : '.$currency.' '.number_format($total).'</strong></span>';
	}
}else{
    echo '<div class="marquee" id="uri_empty_cart">Your Cart is empty!</div>';
}
?>