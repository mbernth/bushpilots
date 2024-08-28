<?php
/**
 * @author mono voce aps
 * @package bushpilots
*/

/*
Template Name: Profile Single
*/

//* Enqueue scripts
add_action( 'wp_enqueue_scripts', 'float_animations' );
function float_animations() {
	// Float animation
	wp_enqueue_script( 'float-jquery', get_bloginfo( 'stylesheet_directory' ) . '/js/float_animation.js', array( 'jquery' ), '1.0.0' );
}

//* Add landing body class to the head
add_filter( 'body_class', 'work_single_add_body_class' );
function work_single_add_body_class( $classes ) {
	$classes[] = 'work-single';
	return $classes;
}
remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
// add_action( 'genesis_header', 'genesis_do_post_title' );
add_action ( 'genesis_entry_header', 'typed_title', 5 );
function typed_title() {
    $posttitle = get_the_title();
    echo '<div class="wrap"><h1 class="entry-hidden" itemprop="headline">'.$posttitle.'</h1><p class="typed-title" itemprop="headline"></p></div>';
    echo '
    
    <script>
    var typed = new Typed(".typed-title", {
        strings: [ "'.$posttitle.'"],
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

add_action ( 'genesis_entry_content', 'single_work_post_featured_image', 1 );
function single_work_post_featured_image() {
    if ( (is_single() || is_page()) ) :
        
        $img = genesis_get_image( array( 'format' => 'src' ) );
        $terms = get_the_terms( $post->ID , 'work_category' );
        $client_name = get_field('client_name');
        $project_link = get_field('project_link');
        $brief = get_field('brief');
        $solution = get_field('solution');

        echo '<div class="work-grid alignfull">';
                echo '<section class="work-info">';
                    echo '<div class="wrap">';
                    echo '<div class="work-client">';
                        echo '<h3>Client</h3><h4>'.$client_name.'</h4>';
                    echo '</div>';
                    if($brief){
                    echo '<div class="work-brief">';
                        echo '<h3>Brief</h3>'.$brief.'';
                    echo '</div>';
                    }
                    if($solution){
                        echo '<div class="work-solution">';
                            echo '<h3>Solutions</h3>'.$solution.'';
                        echo '</div>';
                    }
                    echo '</div>';
                echo '</section>';
                echo '<aside class="work-data">';
                    if ($project_link){
                        echo '<div class="work-data-website">';
                            echo '<h3>Visit the website</h3>';
                            echo '<a class="section-link" href="'.$project_link['url'].'" target="'.$project_link['target'].'">'.$project_link['title'].' <svg class="icon-stepup-arrow"><use xlink:href="#icon-stepup-arrow"></use></svg></a>';
                        echo '</div>';
                    }
                    echo '<div class="work-data-list">';
                        echo '<h3>What I did</h3>';
                        echo '<ul class="work-list">';
		    	        foreach ( $terms as $term ) {
			    	        $term_link = get_term_link( $term, 'work_category' );
				            if( is_wp_error( $term_link ) )
                            continue;
                            // echo '<li><a href="' . $term_link . '">'.$term->name.'</a></li>';
                            echo '<li>'.$term->name.'</li>';
                        }
                        echo '</ul>';
                    echo '</div>';
                echo '</aside>';
        echo '</div>';
    endif;
}

// Post next previous links

add_action( 'genesis_after_entry', 'ja_prev_next_post_nav', 20 );
function ja_prev_next_post_nav() {
    next_post_link( '<div class="previous"><span class="previous-text">%link <span class="left-icon"><svg class="icon-arrow-left5"><use xlink:href="#icon-arrow-left5"></use></svg></span></span></div>', 'previous' );
	previous_post_link( '<div class="next"><span class="next-text"><span class="right-icon"><svg class="icon-arrow-right5"><use xlink:href="#icon-arrow-right5"></use></svg></span> %link</span></div>', 'next' );
}


//* Run the Genesis loop
genesis();