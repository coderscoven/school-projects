      $(function(){
	$('#txt_add').keyup(function(){
	limitChars('txt_add', 70, 'charsLeft1');
	})
     });
	 
	     $(function(){
	$('#itemname').keyup(function(){
	limitChars('itemname', 18, 'charsLeft2');
	})
     });
	 
	     function limitChars(textid, limit, infodiv)

	  {

		var text = $('#'+textid).val(); 

		var textlength = text.length;

		if(textlength > limit)

	      {

		  $('#' + infodiv).html('You cannot write more then '+limit+' characters!');

		  $('#'+textid).val(text.substr(0,limit));

		  return false;

	      }

		else

	      {

		  $('#' + infodiv).html( (limit - textlength) );

		  return true;

	      }

	 }