<?php
/**
 * @author mono voce aps
 * @package bushpilots
*/

/*
Template Name: Team Members Single
*/

//* Add landing body class to the head
add_filter( 'body_class', 'work_single_add_body_class' );
function work_single_add_body_class( $classes ) {
	$classes[] = 'team-member-single';
	return $classes;
}

remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_open', 5 );
remove_action( 'genesis_entry_header', 'genesis_entry_header_markup_close', 15 );
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );

// add_action ( 'genesis_entry_content', 'single_team_member', 6 );
function single_team_member() {
	$posttitle = get_the_title();
	$themeurl = get_stylesheet_directory_uri();
	$title = get_field( 'title' );
	$email = get_field( 'email' );
	$telephone = get_field( 'telephone' );
	$linkedin_url = get_field( 'linkedin_url' );
	$short_biography = get_field( 'short_biography' );
	$senest_har_jeg = get_field( 'senest_har_jeg' );
	$uddannelse_og_erfaring = get_field( 'uddannelse_og_erfaring' );
	$medlemskaber = get_field( 'medlemskaber' );
	echo '<section class="team-header alignfull"><div class="wrap">';
		echo '<div class="team-member">';
			echo '<h1 class="team-name">'.$posttitle.'</h1>';
			if ( get_field( 'partner' ) == 1 ) :
				echo '<p><span class="team-title">Partner<br>'.$title.'</span></p>';
			else :
				echo '<p><span class="team-title">'.$title.'</span></p>';
			endif;
			if($telephone){
				echo '<a href="tel:'.$telephone.'">'.$telephone.'</a></phone><br>';
			}
			if ($email){
				echo '<a href="mailto:'.$email.'">'.$email.'</a></span><br>';
			}
			?>
			<?php $linkedin_url = get_field( 'linkedin_url' ); ?>
			<?php if ( $linkedin_url ) : ?>
				<p class="linedin"><a href="<?php echo esc_url( $linkedin_url['url'] ); ?>" target="<?php echo esc_attr( $linkedin_url['target'] ); ?>"><?php echo esc_html( $linkedin_url['title'] ); ?></a></p>
			<?php endif; ?>
			<?php
		echo '</div>';
		echo '<figure class="team-member-portrait">';
			if ( (is_single()) && has_post_thumbnail() ) {
				$imgfull = genesis_get_image( array( 'format' => 'html' ) );
				printf( '%s', $imgfull );
			}else{
				echo '<img src="'.$themeurl.'/dist/img/thumb-portrait.png">';
			}
		echo '</figure>';
	echo '</div></section>';

	echo '<section class="team-content alignfull"><div class="wrap">';
		echo '<section>';
			if ($short_biography){
				echo ''.$short_biography.'';
			}
			if ($senest_har_jeg){
				echo '<h2>' . __( 'I recently...', 'bushpilots-pro' ) . '</h2>';
				echo ''.$senest_har_jeg.'';
			}
		echo '</section>';
		echo '<aside class="team-aside">';
			if ($uddannelse_og_erfaring){
				echo '<h2>' . __( 'Qualifications and experience', 'bushpilots-pro' ) . '</h2>';
				echo ''.$uddannelse_og_erfaring.'';
			}
			if ($medlemskaber){
				echo '<h2>' . __( 'Memberships', 'bushpilots-pro' ) . '</h2>';
				echo ''.$medlemskaber.'';
			}
		echo '</aside>';
	echo '</div></section>';

	

	
}
//* Run the Genesis loop
genesis();