<?php
/**
 * Block template file: /lib/template-parts/blocks/subscriptions.php
 *
 * Subscriptions Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'subscriptions-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-subscriptions';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes_align .= ' align' . $block['align'];
}
?>

<?php if ( get_field( 'hide_block' ) == 1 ) : ?>
    <?php // echo 'true'; ?>
<?php else : ?>
    <?php // echo 'false'; ?>

    <div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> alignfull">        
        
        <?php if ( have_rows( 'column' ) ) : ?>
            <div class="gridcontainer coll<?php the_field( 'number_of_columns' ); ?> <?php echo esc_attr( $classes_align ); ?>">
            <?php while ( have_rows( 'column' ) ) : the_row(); ?>
                <section>
                    <header><h3><?php the_sub_field( 'headline' ); ?></h3></header>
                    <p class="subscription-price"><?php the_sub_field( 'price' ); ?></p>
                    <?php the_sub_field( 'text' ); ?>
                </section>
            <?php endwhile; ?>
            </div>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>

    </div>

<?php endif; ?>