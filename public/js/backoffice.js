$(document).ready( function() {

	$('#table_settings select').on('change', function() {
		$(this).closest('form').submit();
	})

	$('#topbar').css('top','-40px');
	
	function showTopbar() {
		
		$('#topbar').animate({
			top: 0
		}, 2000)
		
		return false;
	}
	
	showTopbar();
	
	/*
	setTimeout(function (){
		$('#topbar').animate({
			top: 0
		}, 2000, function() { 
			alert('animation complete.')
		})
		
		return false
	}, 1000);
	*/
})
