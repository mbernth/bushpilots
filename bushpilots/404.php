<?php
/**
 * This file adds the 404 template to bushpilots.
 *
 * @author mono voce aps
 * @package bushpilots
 * @subpackage Customizations
 */
 
 /*
Template Name: 404 page
*/

//* Remove default loop
remove_action( 'genesis_loop', 'genesis_do_loop' );

add_action( 'genesis_loop', 'genesis_404' );
/**
 * This function outputs a 404 "Not Found" error message
 *
 * @since 1.6
 */
function genesis_404() {

	echo genesis_html5() ? '<article class="gridcontainer  not-found-page alignfull">' : '';

		printf( '<header><div class="wrap"><h1 class="row_headline">%s</h1></div></header>', apply_filters( 'genesis_404_entry_title', __( 'The page could not be found', 'bushpilots-pro' ) ) );
		echo '<section><div class="wrap">';
				echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( '<strong>We apologize</strong><br> The page you are looking for is not available.', 'bushpilots-pro' ), trailingslashit( home_url() ) ) . '</p>' );
				echo apply_filters( 'genesis_404_entry_content', '<p>' . sprintf( __( '<a class="section-link" href="%s">Go to the homepage <svg class="icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg></a>', 'bushpilots-pro' ), trailingslashit( home_url() ) ) . '</p>' );
		echo '</div></section>';

	echo genesis_html5() ? '</article>' : '';

}



genesis();