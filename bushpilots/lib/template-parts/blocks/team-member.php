<?php
/**
 * Block template file: /lib/template-parts/blocks/team-member.php
 *
 * Team Member Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-member-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-team-member';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>


<?php if ( get_field( 'skjul_block' ) == 1 ) : ?>
<?php // echo 'true'; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php 
    
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
    
    ?>

</div>
<?php else : ?>
<?php // echo 'false'; ?>
<?php endif; ?>