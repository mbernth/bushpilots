<?php
/**
 * Archive for mono voce theme.
 *
 * @author mono voce aps
 * @package mono voce
 * @subpackage Customizations
 */

/*
Template Name: Archive Profile
*/


//* Add landing body class to the head
add_filter( 'body_class', 'work_archive_add_body_class' );
function work_archive_add_body_class( $classes ) {
	$classes[] = 'work-archive';
	return $classes;
}

// List post alphabetical ascending
/*
add_action( 'genesis_before_loop', 'work_list_order' );
function work_list_order() {
        global $query_string;
        query_posts( wp_parse_args( $query_string, array( 'orderby' => 'title', 'order' => 'ASC' ) ) );
}
*/

// Reposition archive description
remove_action( 'genesis_before_loop', 'genesis_do_cpt_archive_title_description' );
add_action( 'genesis_before_loop', 'rv_cpt_archive_title_description' );
function rv_cpt_archive_title_description() {

	$archive_settings = get_option( 'genesis-cpt-archive-settings-work' );

	echo '<div class="archive-description cpt-archive-description">';
			echo '<h1 lang="en" class="archive-title-hidden">'.$archive_settings['headline'].'</h1><p class="typed-archive-title" itemprop="headline"></p>';
	echo '</div>';
	
	echo '
    
    <script>
    var typed = new Typed(".typed-archive-title", {
        strings: [ "'.$archive_settings['headline'].'"],
        typeSpeed: 60,
        startDelay: 500,
        backSpeed: 100,
        backDelay: 10000,
        smartBackspace: true,
        loop: false,
        loopCount: 3,
        showCursor: true,
        cursorChar: "|",
        attr: null,
        contentType: "html",         
    });

    </script>
    
    ';
}


// Custom loop
/*
remove_action ('genesis_loop', 'genesis_do_loop'); // Remove the standard loop
add_action( 'genesis_loop', 'custom_do_grid_loop' ); // Add custom loop
function custom_do_grid_loop() {
	
	if(have_posts()){
		echo '<div class="cases-archive">';
		while(have_posts()) : 
			the_post();
			// Repeat while content
			$img = genesis_get_image( array( 'format' => 'src' ) );
			$work_thumbnail = get_field( 'thumbnail' ); 
			$client_name = get_field('client_name');

			echo '<article class="case-entry" aria-label="' . get_the_title() . '" itemscope="" itemtype="https://schema.org/CreativeWork">';
				if ( $work_thumbnail ){
					echo '<figure><a href="' . get_permalink() . '"><img src="'.$work_thumbnail['url'].'" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
				}else{
					echo '<figure><a href="' . get_permalink() . '"><img src="/wp-content/themes/bushpilots-pro/images/thumb.png" alt="'.$work_thumbnail['alt'].'" /></a></figure>';
				}
				echo '<section>';
					echo '<header>';
						echo '<h2 class="entry-title" itemprop="headline" lang="en"><a href="' . get_permalink() . '">' . get_the_title() . '</a></h2>';
					echo '</header>';
					echo '<div class="case-content">';
						echo '<h3>Client</h3><h4>'.$client_name.'</h4>';
						echo '<a class="section-link" href="' . get_permalink() . '">See the case <svg class="icon-stepup-arrow"><use xlink:href="#icon-stepup-arrow"></use></svg></a></a>';
					echo '</div>';
				echo '</section>';
			echo '</article>';

		endwhile;
		echo '</div>';
	}else{
	}

}
*/
//* Run the Genesis loop
genesis();
