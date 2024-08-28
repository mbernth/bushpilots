<?php
/**
 * Block template file: /lib/template-parts/blocks/page-cta-blue.php
 *
 * Page Cta Blue Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-cta-blue-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-page-cta-blue';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php if ( get_field( 'skjul_block' ) == 1 ) : ?>
<?php // echo 'Vis block'; ?>
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
    <div class="wrap">
        
        <?php if ( get_field( 'foto' ) == 1 ) : ?>
            <section class="twwocolls">
                <?php $cal_to_action_foto = get_field( 'cal_to_action_foto' ); ?>
                <Header>
                    <h3><?php the_field( 'call_to_action_tekst' ); ?></h3>
                </header>
                <?php if ( $cal_to_action_foto ) : ?>
                <figure>
                    <img src="<?php echo esc_url( $cal_to_action_foto['url'] ); ?>" alt="<?php echo esc_attr( $cal_to_action_foto['alt'] ); ?>" />
                </figure>
                <?php endif; ?>
                <div class="main">
                    <?php the_field( 'call_to_action_kontakt_information' ); ?>
                </div>
            </section>
        <?php else : ?>
            <section class="onecoll">
                <Header>
                    <h3><?php the_field( 'call_to_action_tekst' ); ?></h3>
                </header>
                <div class="main">
                    <?php the_field( 'call_to_action_kontakt_information' ); ?>
                </div>
            </section>
        <?php endif; ?>
        
    </div>
</div>
<?php else : ?>
<?php // echo 'Skjul'; ?>
<?php endif; ?>