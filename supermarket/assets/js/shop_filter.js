var  textbox_filter_search, input_select_category, input_select_subcategory, input_sort_recent, input_sort_price, input_scategory_hidden;
	
$(function(){

	// slide range slider filtering

		$( "#slider-range" ).slider({
		  range: true,
		  step: 500,
		  animate: "fast",
		  min: 0,
		  max: 50000,
		  values: [ 5000, 50000 ],
		  slide: function( event, ui ) {
			$( "#priceshow" ).html( "Ugx. " + ui.values[ 0 ] + " - Ugx. " + ui.values[ 1 ] );
			$( ".price1" ).val(ui.values[ 0 ]);
			$( ".price2" ).val(ui.values[ 1 ]);

			textbox_filter_search 		= $(".textbox_filter_search").val();
			input_select_category 		= $(".input_select_category").val();			
			input_select_subcategory 	= $(".input_select_subcategory").val();
			input_sort_price 			= $(".input_sort_price").val();			
			input_sort_recent 			= $(".input_sort_recent").val();
			
			$('.product-data').html('<div id="loaderpro" style="" ></div>');			 
			 
            $.ajax({
				url:"_shop_filter.php",
				type:'post',
				data:{input_sort_recent:input_sort_recent,input_sort_price:input_sort_price,input_select_subcategory:input_select_subcategory,input_select_category:input_select_category,textbox_filter_search:textbox_filter_search,sprice:ui.values[ 0 ],eprice:ui.values[ 1 ]},
				success:function(result){
					$('.product-data').html(result);
				}
			});
		  }
		});
		
		$( "#priceshow" ).html( "Ugx. " + $( "#slider-range" ).slider( "values", 0 ) +
		 " - Ugx. " + $( "#slider-range" ).slider( "values", 1 ) );

});

$(function(){
	
	// category filtering 
	$(".input_select_category").on('change', function(){
		$('.product-data').html('<div id="loaderpro" style="" ></div>');
		
		input_select_category 		= $(".input_select_category").val();			
		textbox_filter_search 		= $(".textbox_filter_search").val();
		input_select_subcategory 	= $(".input_select_subcategory").val();
		input_sort_price 			= $(".input_sort_price").val();			
		input_sort_recent 			= $(".input_sort_recent").val();


			$.ajax({
				url:"_shop_filter.php",
				type:'post',
				data:{input_sort_recent:input_sort_recent,input_sort_price:input_sort_price,input_select_subcategory:input_select_subcategory,input_select_category:input_select_category,textbox_filter_search:textbox_filter_search,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
				success:function(result){
					$('.product-data').html(result);
				}
		});			
	});
	
	// subcategory filtering 
	$(".input_select_subcategory").on('change', function(){
		$('.product-data').html('<div id="loaderpro" style="" ></div>');
		
		input_select_subcategory 	= $(".input_select_subcategory").val();
		input_select_category 		= $(".input_select_category").val();			
		textbox_filter_search 		= $(".textbox_filter_search").val();
		input_sort_price 			= $(".input_sort_price").val();			
		input_sort_recent 			= $(".input_sort_recent").val();

			$.ajax({
				url:"_shop_filter.php",
				type:'post',
				data:{input_sort_recent:input_sort_recent,input_sort_price:input_sort_price,input_select_category:input_select_category,input_select_subcategory:input_select_subcategory,textbox_filter_search:textbox_filter_search,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
				success:function(result){
					$('.product-data').html(result);
				}
		});			
	});
	
	// sort by price 
	$(".input_sort_price").on('change', function(){
		$('.product-data').html('<div id="loaderpro" style="" ></div>');
		
		input_select_subcategory 	= $(".input_select_subcategory").val();
		input_select_category 		= $(".input_select_category").val();			
		textbox_filter_search 		= $(".textbox_filter_search").val();			
		input_sort_price 			= $(".input_sort_price").val();			
		input_sort_recent 			= $(".input_sort_recent").val();

			$.ajax({
				url:"_shop_filter.php",
				type:'post',
				data:{input_sort_price:input_sort_price,input_sort_recent:input_sort_recent,input_select_category:input_select_category,input_select_subcategory:input_select_subcategory,textbox_filter_search:textbox_filter_search,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
				success:function(result){
					$('.product-data').html(result);
				}
		});			
	});
	
	// sort by most recent 
	$(".input_sort_recent").on('change', function(){
		$('.product-data').html('<div id="loaderpro" style="" ></div>');
		
		input_select_subcategory 	= $(".input_select_subcategory").val();
		input_select_category 		= $(".input_select_category").val();			
		textbox_filter_search 		= $(".textbox_filter_search").val();			
		input_sort_price 			= $(".input_sort_price").val();			
		input_sort_recent 			= $(".input_sort_recent").val();

			$.ajax({
				url:"_shop_filter.php",
				type:'post',
				data:{input_sort_price:input_sort_price,input_sort_recent:input_sort_recent,input_select_category:input_select_category,input_select_subcategory:input_select_subcategory,textbox_filter_search:textbox_filter_search,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
				success:function(result){
					$('.product-data').html(result);
				}
		});			
	});
	
	// textbox searching
	$(".textbox_filter_search").on('keyup', function(){
		$('.product-data').html('<div id="loaderpro" style="" ></div>');
			
		textbox_filter_search 		= $(".textbox_filter_search").val();
		input_select_subcategory 	= $(".input_select_subcategory").val();
		input_select_category 		= $(".input_select_category").val();			
		input_sort_price 			= $(".input_sort_price").val();			
		input_sort_recent 			= $(".input_sort_recent").val();

			$.ajax({
				url:"_shop_filter.php",
				type:'post',
				data:{input_sort_recent:input_sort_recent,input_sort_price:input_sort_price,input_select_category:input_select_category,input_select_subcategory:input_select_subcategory,textbox_filter_search:textbox_filter_search,sprice:$(".price1" ).val(),eprice:$( ".price2" ).val()},
				success:function(result){
					$('.product-data').html(result);
				}
		});			
	});	
	
	
	
});

// ------------------------		PAGINATION FIRST 	------------------------	//
$(document).ready(function(){
	
 $(document).on("click", ".page", function(){
 		input_scategory_hidden = $(".input_scategory_hidden").val();
		$.ajax({
				url: "_shop_filter.php",
				type: "GET",
				data:  {page:$(this).attr("data-page")},
				beforeSend: function(){$("#overlay").show();},
				success: function(data)
				{
					$(".pagination-result").html(data);
					setInterval(function() {$("#overlay").hide(); },500);
				},
				error: function() 
				{}          
		   });
	});

});
//	------------------------	FILTERING AND SORTING STARTS HERE	------------------------	//
	




