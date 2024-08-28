<?php
/**
 * Block template file: /lib/template-parts/blocks/contact-adress.php
 *
 * Contact Adress Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'contact-adress-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-contact-adress';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php if ( get_field( 'skjul_block' ) == 1 ) : ?>
		<?php // echo 'true'; ?>
	
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="wrap">
	    <section>
            <?php the_field( 'adresse' ); ?>
        </section>
        <section>
            <?php $kort = get_field( 'kort' ); ?>
            <?php if ( $kort ) : ?>
                <img src="<?php echo esc_url( $kort['url'] ); ?>" alt="<?php echo esc_attr( $kort['alt'] ); ?>" />
            <?php endif; ?>
        </section>
    </div>
</div>
<?php else : ?>
<?php // echo 'false'; ?>
<?php endif; ?>