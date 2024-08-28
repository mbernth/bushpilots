<?php
/**
 * Block template file: /lib/template-parts/blocks/team.php
 *
 * Team Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'team-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-team';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
		/* Add styles that use ACF values here */
	}
</style>

<?php $id = get_field( 'id' ); ?>
<?php if ( $id ) { ?>
        <a class="linkedID" id="<?php the_field( 'id' ); ?>"></a>
<?php } ?> 
<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> <?php if ( get_field( 'add_top_padding' ) == 1 ) : ?>has-top-padding<?php endif; ?>">
    <?php $headline = get_field( 'headline' ); ?>
    <?php if ( $headline ) { ?>
    <div class="wrap">
        <header>
            <h2><?php the_field( 'headline' ); ?></h2>
        </header>
    </div>
    <?php } ?>
<div class="gridcontainer__team coll<?php the_field( 'number_of_columns' ); ?> has-column-gap">
    <?php $posts = get_field( 'team_members' ); ?>
    
    <?php if ( $posts ): ?>
        <?php global $post; ?>
        <?php foreach ( $posts as $post ):  ?>
        <section class="team-member">
            <?php setup_postdata ( $post ); ?>
            <?php $themeurl = get_stylesheet_directory_uri(); ?>
            <?php $partner = get_post_meta( $post->ID, 'partner', true ); ?>
            <?php $title = get_post_meta( $post->ID, 'title', true ); ?>
            <?php $email = get_post_meta( $post->ID, 'email', true ); ?>
            <?php $telephone = get_post_meta( $post->ID, 'telephone', true ); ?>
                <?php if ( (is_single() || is_page()) && has_post_thumbnail() ) { ?>
                    <figure>
                        <a href="<?php the_permalink(); ?>"><?php $imgfull = genesis_get_image( array( 'format' => 'html' ) ); printf( '%s', $imgfull ); ?></a>
                    </figure>
                    <?php }else{ ?>
                    <figure>
                        <a href="<?php the_permalink(); ?>"><img src="<?php echo ''.$themeurl.''; ?>/dist/img/thumb-portrait.png"></a>
                    </figure>

                <?php } ?>
                
                <p><span class="name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                    <?php if ($partner){ ?><span class="title"> <?php echo ''. __( 'Partner', 'bushpilots-pro' ) .''; ?></span><?php } ?>
                    <?php if ($title){ ?><span class="title"><?php echo $title; ?></span><?php } ?>
                    <?php if ($email){ ?><span class="email"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></span><?php } ?>
                    <?php if ($telephone){ ?><span class="phone"><a href="tel:<?php echo $telephone; ?>"><?php echo $telephone; ?></a></span></p><?php } ?>
            </section>
		<?php endforeach; ?>
	<?php wp_reset_postdata(); ?>
    <?php endif; ?>
</div>
</div>