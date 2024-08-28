<?php
/**
 * Block template file: /template-parts/blocks/page-quote.php
 *
 * Page Quote Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-quote-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-page-quote';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php if ( get_field( 'skjul_block' ) == 1 ) : ?>
<?php // echo 'Vise'; ?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<div class="wrap">
        <blockquote>
	        <?php the_field( 'citat' ); ?>
        </blockquote>
    </div>
</div>
<?php else : ?>
		<?php // echo 'Skjul'; ?>
<?php endif; ?>