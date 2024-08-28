<?php
/**
 * Block template file: /lib/template-parts/blocks/timeline.php
 *
 * Timeline Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'timeline-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-timeline';
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
<?php // echo 'vis'; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="wrap">
        <h2><?php the_field( 'tidslinje_type' ); ?></h2>
        <h3><?php the_field( 'overskrift' ); ?></h3>
    </div>
    <hr class="line">
    <div class="wrap">
	<?php $tidslinje_billede = get_field( 'tidslinje_billede' ); ?>
	<?php if ( $tidslinje_billede ) : ?>
    <figure>
		<img src="<?php echo esc_url( $tidslinje_billede['url'] ); ?>" alt="<?php echo esc_attr( $tidslinje_billede['alt'] ); ?>" />
    </figure>
	<?php endif; ?>
    </div>
</div>
<?php else : ?>
<?php // echo 'skjul'; ?>
<?php endif; ?>