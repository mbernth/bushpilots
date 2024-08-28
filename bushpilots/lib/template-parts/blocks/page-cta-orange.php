<?php
/**
 * Block template file: /lib/template-parts/blocks/page-cta-orange.php
 *
 * Page Cta Orange Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-cta-orange-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-page-cta-orange';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php if ( get_field( 'skjul_block' ) == 1 ) : ?>
<?php // echo 'Vis'; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="wrap">
        <section>
            <?php $link = get_field( 'link' ); ?>
            <?php if ( $link ) : ?>
                <a class="section-link" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?>   <svg class="icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg></a>
            <?php endif; ?>
            <p><?php the_field( 'call_to_action_tekst' ); ?></p>
        </section>
    </div>
</div>
<?php else : ?>
<?php // echo 'skjul'; ?>
<?php endif; ?>