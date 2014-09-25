$(document).ready(function() {
						   
						   
	function resizeIt() {
		if ( $(window).width() > 900) {
			//$('body').css('background','#CCC');
			$('#test').stop();
			$('#test').animate( { backgroundColor: '#CCC' }, 1000);
		} else {
			$('#test').stop();
			$('#test').animate( { backgroundColor: '#FFF' }, 1000);
		}
	}
	
	resizeIt();
	
	$(window).resize(function() {		  
				resizeIt();
		});
						   
						   
	var alpha = jQuery.url.param("alpha");
	var category = jQuery.url.param("category");
	
	if (alpha || category ) {
		$('#items').children().hide();
	}
	
	if (alpha) {
		if (alpha == 'a-d') {
			var letters = ['A','B','C','D','a','b','c','d'];
		} else if (alpha == 'e-h') {
			letters = ['E','F','G','H','e','f','g','h'];
		} else if (alpha == 'i-l') {
			var letters = ['I','J','K','L','i','j','k','l'];
		} else if (alpha == 'm-p') {
			var letters = ['M','N','O','P','m','n','o','p'];
		} else if (alpha == 'q-t') {
			var letters = ['Q','R','S','T','q','r','s','t'];
		} else if (alpha == 'u-x') {
			var letters = ['U','V','W','X','u','v','w','x'];
		} else if (alpha == 'y-z') {
			var letters = ['Y','Z','y','z'];
		}
			$('#items').children().each(function() {		  
				var firstChar = $(this).html().charAt(0);	
					for (i =0; i<letters.length; i++) {
						if ( firstChar == letters[i]) {
							$(this).show();
						}
					}
			});
	}
	
	if (category == 'books') {
		$('#items').children().each(function() {		  
				if ( $(this).attr('rel') == 'books' ) {
					$(this).show();
				}
		});
		
		
	} else if (category == 'identities') {
		
		$('#items').children().each(function() {		  
				if ( $(this).attr('rel') == 'identities' ) {
					$(this).show();
				}
		});
		
	} else if (category == 'publications') {
		
		$('#items').children().each(function() {		  
				if ( $(this).attr('rel') == 'publications' ) {
					$(this).show();
				}
		});
		
	}
	
						   
});
