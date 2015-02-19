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
	$( 'body:not(".ourstaff, .projects, .categories") #sidenav li' ).each( function() {
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
		
		$.jCookie( 'initlogo', null );
		
		if ( !$.jCookie( 'initlogo' ) ) {
			var date = new Date();
			date.setTime( date.getTime() + ( 1 * 24 * 60 * 60 * 1000 ) );
				
			$.jCookie( 'initlogo', true, date );
			
			$( '#intro .logo' ).fadeIn( 'slow' ).fadeTo( 3500, 1, fadeOutIntro );
			
		} else {
			$( '#intro' ).remove();
		}
	
		var counter = 0;
		$( '#news dd' ).each( function() {	
			$( this ).attr( 'id', 'newsitem' + counter );
			counter++;
		});	

		$( '.article-title' ).each( function() {
			$(this).on( 'click', function( $event ) {
				$event.preventDefault();
				$( this ).removeClass( 'expanded' );
			});					   
		});
	}
	
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
