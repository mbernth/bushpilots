<?php
/**
 * Block template file: /lib/template-parts/blocks/hero_carousel.php
 *
 * Hero Carousel Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-carousel-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-hero-carousel';
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
    .static-banner{
        position:absolute;
        z-index:10;
    }
    .block-hero-carousel .text-area{
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:self-start;
        z-index:-1;
    }
    .block-hero-carousel .text-area h3{
        font-size:clamp(3.6rem, 3vw, 18rem);
    }
    .block-hero-carousel img{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        height:100%;
        width:100%;
        object-fit:cover;
    }
    .block-hero-carousel .carousel-cell {
        height: 100%;
    }
</style>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?> <?php if ( get_field( 'text_and_image_carousel_og_typed_animation_carousel' ) == 0 ) : ?>typed-text-animation<?php endif; ?>">
    <?php if ( get_field( 'text_and_image_carousel_og_typed_animation_carousel' ) == 1 ) : ?>
		<?php // echo 'true'; ?>
	
    
        <?php if ( have_rows( 'carousel' ) ) : ?>
            
            <div class="carousel" data-flickity='{ "autoPlay": <?php the_field( 'speed' ); ?>, "prevNextButtons": false, "pageDots": false, "draggable": false, "wrapAround": true, "pauseAutoPlayOnHover": false, "cellSelector": ".carousel-cell", "setGallerySize": false}' tabindex="0">
                
            <?php $button = get_field( 'button' ); ?>
            <?php if ( $button ) : ?>
                <div class="static-banner">
                    <a class="wp-block-button__link" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?></a>
                </div>
            <?php endif; ?>
                
            <?php while ( have_rows( 'carousel' ) ) : the_row(); ?>
                <div class="carousel-cell text-area">
                <?php $headline = get_sub_field( 'headline' ); ?>
                <?php $short_text = get_sub_field( 'short_text' ); ?>
                <?php $link = get_sub_field( 'link' ); ?>

                <?php if ( $headline ) : ?>
                    <h3><?php the_sub_field( 'headline' ); ?></h3>
                <?php endif; ?>
                <?php if ( $headline ) : ?>
                    <?php the_sub_field( 'short_text' ); ?>
                <?php endif; ?>
                <?php $link = get_sub_field( 'link' ); ?>
                <?php if ( $link ) : ?>
                    <a class="wp-block-button__link" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
                <?php endif; ?>
                </div>
            <?php endwhile; ?>
            </div>
            
            <div class="carousel" data-flickity='{ "autoPlay": <?php the_field( 'speed' ); ?>, "prevNextButtons": false, "pageDots": true, "draggable": false, "wrapAround": true, "pauseAutoPlayOnHover": false, "imagesLoaded": true, "setGallerySize": false}' tabindex="0">
            <?php while ( have_rows( 'carousel' ) ) : the_row(); ?>
                <?php $image = get_sub_field( 'image' ); ?>
                <?php $image_link = get_sub_field( 'image_link' ); ?>
                <?php $size = 'full'; ?>
                <div class="carousel-cell">
                <?php if ( $image_link ) : ?>
                    <a href="<?php echo esc_url( $image_link['url'] ); ?>" target="<?php echo esc_attr( $image_link['target'] ); ?>"><?php echo wp_get_attachment_image( $images, $size ); ?></a>
                    <?php else: ?>
                    <?php echo wp_get_attachment_image( $images, $size ); ?>
                <?php endif; ?>
                </div>
            <?php endwhile; ?>
            </div>
        
        <?php else : ?>
            <?php // no rows found ?>
        <?php endif; ?>
    
    <?php else : ?>
        
        <?php
            $rand1 = rand(0, 9);
            $rand2 = rand(0, 9);
            $rand3 = rand(0, 9);
            $rand4 = rand(0, 9);
        ?>
        <section class="typed">
				    
            <p>
                <?php the_field( 'static_text' ); ?> <?php echo '<span class="typed'.$rand1.''.$rand2.''.$rand3.''.$rand4.'"></span>'; ?>
            </p>
            <?php if ( have_rows( 'animated_typed_text' ) ) : ?>
                <script>
                    var typed = new Typed(".typed<?php echo''.$rand1.''.$rand2.''.$rand3.''.$rand4.''; ?>", {
                        strings: [
                            <?php while ( have_rows( 'animated_typed_text' ) ) : the_row(); ?>
						        "<?php the_sub_field( 'typed_text' ); ?>",
                            <?php endwhile; ?>
                        ],
                        // typing speed
                        typeSpeed: <?php the_field( 'typing_speed' ); ?>,
                        // time before typing starts
                        startDelay: <?php the_field( 'delay_before_typing_starts' ); ?>,
                        // backspacing speed
                        backSpeed: <?php the_field( 'backspacing_speed' ); ?>,
                        // time before backspacing
                        backDelay: <?php the_field( 'delay_before_backspacing' ); ?>,
                        smartBackspace: true,
                        // Loops
                        <?php if ( get_field( 'loop' ) == 1 ) : ?>
                            // loop
                            loop: true,
                        <?php else : ?>
                            loop: true,
                            loopCount: <?php the_field( 'number_of_loops' ); ?>,
                        <?php endif; ?>
                        // show cursor
                        <?php if ( get_field( 'show_character_cursor' ) == 1 ) : ?>
                            showCursor: true,
                        <?php else : ?>
                            showCursor: false,
                        <?php endif; ?>
                        // character for cursor
                        cursorChar: "|",
                        // attribute to type (null == text)
                        attr: null,
                        // either html or text
                        contentType: 'html',         
                    });
                </script>
                <?php else : ?>
					<?php // no rows found ?>
                <?php endif; ?>

                <?php $button = get_field( 'button' ); ?>
                <?php if ( $button ) : ?>
                    <a class="section-link" href="<?php echo esc_url( $button['url'] ); ?>" target="<?php echo esc_attr( $button['target'] ); ?>"><?php echo esc_html( $button['title'] ); ?> <svg class="icon-stepup-arrow"><use xlink:href="#icon-stepup-arrow"></use></svg></a>
                <?php endif; ?>
                    
        </section>

        

            <?php if ( have_rows( 'carousel_images' ) ) : ?>
                <div class="carousel" data-flickity='{ "autoPlay": <?php the_field( 'speed' ); ?>, "prevNextButtons": false, "pageDots": true, "draggable": false, "wrapAround": true, "pauseAutoPlayOnHover": false, "imagesLoaded": true, "setGallerySize": false}' tabindex="0">
                <?php while ( have_rows( 'carousel_images' ) ) : the_row(); ?>
                    <?php $images = get_sub_field( 'images' ); ?>
                    <?php $image_link = get_sub_field( 'image_link' ); ?>
                    <?php $size = 'full'; ?>
                    <div class="carousel-cell">
			        <?php if ( $image_link ) : ?>
				        <a href="<?php echo esc_url( $image_link['url'] ); ?>" target="<?php echo esc_attr( $image_link['target'] ); ?>"><?php echo wp_get_attachment_image( $images, $size ); ?></a>
                        <?php else: ?>
                        <?php echo wp_get_attachment_image( $images, $size ); ?>
			        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
                </div>
            <?php else : ?>
            <?php // no rows found ?>
            <?php endif; ?>

        
    <?php endif; ?>
    
</div>