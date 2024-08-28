<?php

// check if the Push content field has data
// =====================================================================================================================
add_action( 'wp_enqueue_scripts', 'push_scripts_jquery' );
function push_scripts_jquery() {
	wp_enqueue_script( 'classie-push-script', get_bloginfo( 'stylesheet_directory' ) . '/js/classie.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'push-script-jquery', get_stylesheet_directory_uri() . '/js/push.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'genesis_header', 'mono_push_button', 12 );
function mono_push_button() {
	if ( get_field( 'push_message_active', 'option' ) == 1 ) :
		echo '<div class="push-button"><button class="button-hire trigger-overlay">hire us!</button></div>';
	else :
		// echo 'false';
	endif;
}

add_action( 'genesis_after', 'mono_push_content', 15 );
function mono_push_content() {
	$headline 					= get_field('headline', 'option');
	$contact_information 		= get_field('contact_information', 'option');
	$gravity_forms_shortcode	= get_field('gravity_forms_shortcode', 'option');

	echo '<div class="overlay overlay-contentpush">';
		echo '<div class="wrap">';
			echo '<button type="button" class="overlay-close">Close</button>';
			echo '<section>';
				echo '<h2>'.$headline.'</h2>';
				echo ''.$contact_information.'';
			echo '</section>';
			echo '<section>';
				echo do_shortcode("$gravity_forms_shortcode");
			echo '</section>';
		echo '</div>';
	echo '</div>';
	
}