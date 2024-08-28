<?php
/**
 * Block template file: /lib/template-parts/page-services-listmenu.php
 *
 * Page Services Listmenu Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'page-services-listmenu-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-page-services-listmenu';
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
        <?php if ( get_field( 'vaelg_sprog' ) == 1 ) : ?>
            <?php // echo 'DK'; ?>
        <header>
        <h2 class="entry-title"><?php the_field( 'global_overskrift', 'option' ); ?></h2>
        </header>
        <nav class="service-menu">
        <?php if ( have_rows( 'menuen', 'option' ) ) : ?>
            <ul>
            <?php while ( have_rows( 'menuen', 'option' ) ) : the_row(); ?>
                <?php $link_til_serviseside = get_sub_field( 'link_til_serviseside' ); ?>
                <?php if ( $link_til_serviseside ) : ?>
                    <li><a href="<?php echo esc_url( $link_til_serviseside['url'] ); ?>" target="<?php echo esc_attr( $link_til_serviseside['target'] ); ?>"><?php echo esc_html( $link_til_serviseside['title'] ); ?></a></li>
                <?php endif; ?>
            <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
        </nav>
        <?php else : ?>
            <?php // echo 'UK'; ?>
        <header>
        <h2 class="entry-title"><?php the_field( 'global_overskrift_uk', 'option' ); ?></h2>
        </header>
        <nav class="service-menu">
        <?php if ( have_rows( 'menuen_uk', 'option' ) ) : ?>
            <ul>
            <?php while ( have_rows( 'menuen_uk', 'option' ) ) : the_row(); ?>
                <?php $link_til_serviseside_uk = get_sub_field( 'link_til_serviseside_uk' ); ?>
                <?php if ( $link_til_serviseside_uk ) : ?>
                    <li><a href="<?php echo esc_url( $link_til_serviseside_uk['url'] ); ?>" target="<?php echo esc_attr( $link_til_serviseside_uk['target'] ); ?>"><?php echo esc_html( $link_til_serviseside_uk['title'] ); ?></a></li>
                <?php endif; ?>
            <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <?php // No rows found ?>
        <?php endif; ?>
        </nav>
        <?php endif; ?>

        
    </div>
</div>
<?php else : ?>
<?php // echo 'Skjul block'; ?>
<?php endif; ?>