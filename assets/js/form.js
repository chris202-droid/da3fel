$(document).ready(function(){
	$('.saisi').focus(function(){
		$(this).parent().addClass('is-focused has-label');
	});

	$('.saisi').blur(function(){
		$parent = $(this).parent();
		if($(this).val()==''){
			$parent.removeClass('has-label');
		}
		$parent.removeClass('is-focused');
	});


	$('.saisi').each(function(){
		if($(this).val()!= ''){
			$(this).parent().addClass('has-label');
		}
	});

});	