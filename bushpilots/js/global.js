/**
 * This script adds the jquery effects to the bushpilots Theme.
 *
 * @package Mono\JS
 * @author mono voce aps
 * @license GNU-General-Public-License-v3.0
 */
( function( $ ) {

	// Make sure JS class is added.
	$( document ).ready( function() {
        $( 'body' ).addClass( 'js' );
    });

    $(document).ready(function(){
		$(".trigger-overlay").click(function(){
			$(".overlay-contentpush").addClass("overlay-open");
		});
    });

    $(document).ready(function(){
		$(".overlay-close").click(function(){
			$(".overlay-contentpush").removeClass("overlay-open");
		});
    });

	if( $( document ).scrollTop() > 0 ){
		$( '.site-header' ).addClass( 'dark' );
	}

	// Add opacity class to site header
	$( document ).on('scroll', function(){

		if ( $( document ).scrollTop() > 0 ){
			$( '.site-header' ).addClass( 'dark' );

		} else {
			$( '.site-header' ).removeClass( 'dark' );	
		}

	});
	
	// Add and remove class when in view
	$(window).scroll(function(){
    // This is then function used to detect if the element is scrolled into view
    function elementScrolled(elem)
    {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        return ((elemTop <= docViewBottom) && (elemTop >= docViewTop));
    }

    
	});
    
}( jQuery ) );