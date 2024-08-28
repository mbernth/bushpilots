<?php
/**
 * Block template file: /lib/template-parts/blocks/page-body-content.php
 *
 * Page Body Content Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-body-content-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-page-body-content';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>
<?php if ( get_field( 'skjul_block' ) == 1 ) : ?>
<?php // echo 'Vis blocken'; ?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php if ( get_field( 'topline' ) == 1 ) : ?>text-block-topline	<?php endif; ?> <?php echo esc_attr( $classes ); ?> <?php the_field( 'antal_kolonner' ); ?>">
    <div class="wrap">
        <?php if ( have_rows( 'tekstafsnit' ) ) : ?>
            <?php while ( have_rows( 'tekstafsnit' ) ) : the_row(); ?>
            <?php $rubrik = get_sub_field( 'rubrik' ); ?>
            <section>
                 <?php if ( $rubrik ) : ?>
                    <h2><?php the_sub_field( 'rubrik' ); ?></h2>
                <?php endif; ?>
                <?php the_sub_field( 'brodtekst' ); ?>
            </section>
            <?php endwhile; ?>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
        <?php $laes_mere_indhold = get_field( 'laes_mere_indhold' ); ?>
        <?php if ( $laes_mere_indhold ) : ?>
            <details>
                <summary><?php the_field( 'laes_mere_label' ); ?>   <svg class="icon-arrow-right"><use xlink:href="#icon-arrow-right"></use></svg></summary>
                <div class="extra-content">
                    <?php the_field( 'laes_mere_indhold' ); ?>
                </div>
            </details>
        <?php endif; ?>
    </div>
</div>
<?php else : ?>
<?php // echo 'Skjul blocekn'; ?>
<?php endif; ?>