
$(document).ready(function(){

	// update product quantity in cart
    $(".quantity").change(function() {		
		 var element = this;
		 setTimeout(function () { update_quantity.call(element) }, 2000);	
	});	
	function update_quantity() {
		var pcode = $(this).attr("data-code");
		var quantity = $(this).val(); 
		$(this).parent().parent().fadeOut(); 
		$.getJSON( "_cart_controller.php", {"update_quantity":pcode, "quantity":quantity} , function(data){		
			window.location.reload();			
		});
	}	


// add item to cart
	$(".product-form").submit(function(e){
		var form_data 			= $(this).serialize();
		//var button_content 	= $(this).find('button[type=submit]');
		var button_content		=	$(".w3_cart_add_btn");
		var button_prod_details = $("#w3_btn_add_to_cart");
		var button_shop 		= $(".w3ls-cart");

		button_content.html('<i class="fa fa-spinner"</i>'); 
		button_prod_details.html('<i class="fa fa-spinner"</i>');
		button_shop.html('<i class="fa fa-spinner"</i>');

		$.ajax({
			url: "_cart_controller.php",
			type: "POST",
			dataType:"json",
			data: form_data
		}).done(function(data){		    
			$("#cart-container").html(data.products);
			button_content.addClass('add_to_cart_btn');
			button_shop.addClass('w3ls-cart');
			button_prod_details.html('<i class="fa fa-shopping-cart"></i> Add to cart');
			button_content.html('<i class="fa fa-shopping-cart"></i>'); 		
			button_shop.html('<i class="fa fa-cart-plus"></i> Add to cart');	
		})
		e.preventDefault();
	});

	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); 
		$(this).parent().parent().fadeOut();
		$.getJSON( "_cart_controller.php", {"remove_code":pcode} , function(data){
			$("#cart-container").html(data.products); 	
			window.location.reload();			
		});
	});
	

});