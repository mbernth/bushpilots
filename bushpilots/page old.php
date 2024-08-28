<?php
/**
 * bushpilots
 *
 * This file adds the landing page template to the bushpilots Theme.
 *
 * Template Name: Default Template
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */


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



// Runs the Genesis loop.
genesis();