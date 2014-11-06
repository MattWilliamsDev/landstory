/**
 * INIT sIFR
 */

// var demi = { src: '/swf/demi.swf' };
// sIFR.activate(demi);
		
		
/**
 * CALLED BY CYCLE PAGER
 */

function onAfter( curr, next, opts ) {
	var index = opts.currSlide;
	$( '#pageNum' ).html( ( opts.currSlide + 1 ) + ' / ' + opts.slideCount );
}

/**
 * DOCUMENT READY
 */

$( document ).ready( function() {
	// VARIABLES
	var hrefHash;

	// sIFR CONFIG
	// sIFR.replace(demi, {
	//   selector: 'h2'
	//  ,wmode: 'transparent'
	//  ,offsetTop: 2
	//  ,tuneHeight: 0
	//   ,css: '.sIFR-root { color: #a8aa23; }, a { color: #a8aa23; text-decoration:none; }, a:hover { color: #a8aa23; text-decoration:underline;}, a:visited { color: #a8aa23; text-decoration:none; }'
	// });
	
	// sIFR.replace(demi, {
	//   selector: '#home #brandpromise'
	//  ,wmode: 'transparent'
	//  ,offsetTop: 2
	//  ,tuneHeight: 0
	//   ,css: '.sIFR-root { color: #5e6e65; leading: 6px; }'
	// });
	
	// sIFR.replace(demi, {
	//   selector: 'h3'
	//  ,wmode: 'transparent'
	//  ,offsetTop: 2
	//  ,tuneHeight: 0
	//   ,css: '.sIFR-root { color: #a8aa23; }, a { color: #a8aa23; text-decoration:none; }, a:hover { color: #a8aa23; text-decoration:underline;}, a:visited { color: #a8aa23; text-decoration:none; }'
	//   ,onRelease: function(fi) { toggleFlash(fi) }
	// });

	/**
	 * GALLERY CYCLE
	 */	
	 $( '#gallery' ).each( function() {							   
		$( this ).cycle({ 
			fx:    'fade'
			, speed:	1000
			, timeout:  6000
			, prev:   '#prev' 
			, next:   '#next'
			, after:   onAfter
			, nowrap:  0
			, pagerAnchorBuilder: function( idx, slide ) { 
				// return selector string for existing anchor
				return '#nav li:eq(' + idx + ') a'; 
			}
		});
		
		$( this ).hover( function() {
			$( this ).cycle( 'pause' );
		}
		, function() {
			$( this ).cycle( 'resume' );
		});
	});
		

	/**
	 * NAV
	 */
	$( '#topnav li' ).each( function() {					 						 
		$( this ).hover(
			function() {			   
				$( this ).children( 'ul' ).show();
				$( this ).children( '.bg' ).show();
				$( this ).children( '.bg' ).height( $( this ).children( 'ul' ).height() );
				$( this ).children( '.bg' ).width( $( this ).children( 'ul' ).width() );
			}
			, function() {			   
				$( this ).children( 'ul' ).hide();
				$( this ).children( '.bg' ).hide();
			}
			
		);	
	});
	
	
	/**
	 * SECONDARY NAV
	 */
	$( '#sidenav li' ).each( function() {						   
		var section = $( 'body' ).attr( 'id' );
		var project = $( 'body' ).attr( 'class' );
		var thisClass = $( this ).attr( 'class' );
			if ( thisClass.indexOf( section ) != -1 || thisClass.indexOf( project ) != -1 ) {
				thisClass += " active";
				$( this ).attr( 'class', thisClass );
			} 	
	});
	

	/**
	 * HOMEPAGE
	 */
	function showContainer() {
		$( '#intro' ).remove();
	}
	
	function fadeOutIntro() {
		$( '#intro' ).fadeTo( 2500, 0, showContainer );
	}
	
	if ( $( 'body' ).attr( 'id' ) == 'home' ) {
		
		//jQuery.jCookie('initlogo',null);
		
		if ( jQuery.jCookie('initlogo') != 'true' ) {
			var date = new Date();
			date.setTime( date.getTime() + ( 1 * 24 * 60 * 60 * 1000 ) );
				
			jQuery.jCookie( 'initlogo','true', date );
			
			$( '#intro .logo' ).fadeIn( 'slow' ).fadeTo( 3500, 1, fadeOutIntro );
			
		} else {
			$( '#intro' ).remove();
		}
	
		var counter = 0;
			$( '#news dd' ).each( function() {	
				$( this ).attr( 'id', 'newsitem' + counter );
				counter++;
			});	

		$("#news dt a").each(function() {					   
			$(this).click(function(event) {	
				event.preventDefault();
				var nextitem = $(this).parent().next('dd').attr('id');
				$(this).parent().siblings('dd').each(function() {
														  
					if ( $(this).attr('id') != nextitem ) {
						$(this).slideUp('normal')
					} else {
						$(this).slideToggle('normal')
					}
				});
			});					   
		});
	}
	
	
	/**
	 * OUR STAFF SLIDING PANELS
	 */
	// if ( $('body').attr('class') == 'ourstaff' ) {
		
	// 	var currentPanel;
	// 		if (location.hash) { 
	// 			currentPanel = location.hash.substring(1);
	// 		} else {
	// 			currentPanel = 'joann_g';
	// 		}
	
	// 	$(".ourstaff .panel").each(function() {	
									   
	// 			if ( $(this).attr('id') != currentPanel ) {
	// 				$(this).children('dl').hide();
	// 			}					   
	// 	});
		
		
	// 	$("#sidenav .ourstaff ul li a").each(function() {					   
	// 			$(this).click(function(event) {	
	// 				event.preventDefault();
	// 					hrefHash = $(this).attr("href");
	// 					//setTimeout( setHash, 1000 );
	// 						$(hrefHash).siblings().children('dl').slideUp(1000);
	// 						$(hrefHash).children('dl').slideToggle(1000);
	// 			});					   
	// 	});
	
	// function toggleFlash(fi) {
	// 	var h = fi.getAncestor();
	// 	var currentToggle = $(h).parent();
	// 		$(currentToggle).siblings().children('dl').slideUp(1000);
	// 		$(currentToggle).children('dl').slideToggle(1000);
	// }
	
	function setHash() {
		window.location.hash = hrefHash;
	}
	
	/**
	 * THUMB GRIDS
	 */
	$( 'ul.grid li:nth-child(3n)' ).each( function() {						   
		$( this ).css( 'margin-right', '0' );
	});

}); // DOCUMENT READY
