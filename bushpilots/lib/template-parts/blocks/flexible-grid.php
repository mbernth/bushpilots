<?php
/**
 * Block template file: /lib/template-parts/flexible-grid.php
 *
 * Flexible Grid Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'flexible-grid-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-flexible-grid';
if( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if( ! empty( $block['align'] ) ) {
    $classes_align .= ' align' . $block['align'];
}
?>

<?php
// Get ACF Values from color picker
$wd_acf_background_color_picker_values = get_field( 'background_color' );
$wd_acf_text_color_picker_values = get_field( 'text_color' );

// Set array of color classes (for block editor) and hex codes (from ACF)
$wd_block_background_colors = [
	 // Change these to match your color class (gutenberg) and hex codes (acf)
     "theme-shade"      => "#010101",
     "theme-tint"       => "#fefefe",
     "theme-primary"    => "#29548a",
     "theme-secondary"  => "#d4dbe8",
     "theme-active"     => "#de4f2e",
];
$wd_block_text_colors = [
    // Change these to match your color class (gutenberg) and hex codes (acf)
    "theme-shade"      => "#010101",
    "theme-tint"       => "#fefefe",
    "theme-primary"    => "#29548a",
    "theme-secondary"  => "#d4dbe8",
    "theme-active"     => "#de4f2e",
];

// Loop over colors array and set proper class if background color selection matches value
foreach( $wd_block_background_colors as $key => $value ) {
     if( $wd_acf_background_color_picker_values == $value ) {
          $wd_color_class = $key;

     }
}
// Loop over colors array and set proper class if text color selection matches value
foreach( $wd_block_text_colors as $key => $value ) {
    if( $wd_acf_text_color_picker_values == $value ) {
         $wd_color_text_class = $key;
    }
}
?>

<?php if ( get_field( 'hide' ) == 1 ) { 
	 // hide this flexible grid
	} else { 
     // Show this flexible grid 
?>
    <?php $element_id = get_field( 'element_id' ); ?>
    
    <?php if ( $element_id ) { ?>
        <a class="linkedID" id="<?php the_field( 'element_id' ); ?>"></a>
    <?php } ?> 

    <div id="<?php echo esc_attr( $id ); ?>" 
        class="<?php echo esc_attr( $classes ); ?> alignfull  <?php if ( get_field( 'top_and_bottom_margin' ) == 1 ) { ?>has-top-bottom-margin<?php } ?> <?php if ( $wd_color_text_class ) { ?>has-<?php echo $wd_color_text_class; ?>-color<?php } ?> ">
    <div class="gridcontainer coll<?php the_field( 'number_of_columns' ); ?> <?php if ( get_field( 'use_column_gap' ) == 1 ) { ?>has-column-gap<?php }else{ ?>has-no-column-gap<?php } ?> <?php if ( get_field( 'top_and_bottom_padding' ) == 1 ) : ?><?php if ( get_field( 'padding_size' ) == 1 ) : ?>has-top-bottom-padding<?php else : ?>has-top-bottom-padding-large<?php endif; ?><?php endif; ?> <?php echo esc_attr( $classes_align ); ?> <?php if ( $wd_color_class ) { ?>has-<?php echo $wd_color_class; ?>-background-color<?php } ?>">
        
        
    <?php if ( have_rows( 'grid_contents' ) ): ?>

        <?php while ( have_rows( 'grid_contents' ) ) : the_row(); ?>
        
			<?php if ( get_row_layout() == 'text_column_element' ) : ?>
				<?php if ( get_sub_field( 'hide' ) == 1 ) { 
				 // Hide element
				} else { ?>
				<section class="flexgrid-text vertical-<?php the_sub_field( 'align_content' ); ?>">
                    <?php $headline = get_sub_field( 'headline' ); ?>
                    <?php if ($headline) {?>
                        <h3 class="section-header"> <?php echo $headline; ?></h3>
                    <?php } ?>
				    <?php the_sub_field( 'text' ); ?>
				    <?php $button = get_sub_field( 'button' ); ?>
				    <?php if ( $button ) { ?>
					    <a class="button" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>"><?php echo $button['title']; ?></a>
                    <?php } ?>
                </section>
                <?php } ?>
                
            <?php elseif ( get_row_layout() == 'image_column_element' ) : ?>
                <?php if ( get_sub_field( 'hide' ) == 1 ) { 
				 // Hide element
                } else { ?>
                <section class="flexgrid-image">
                    

                    <?php $link = get_sub_field( 'link' ); ?>
                    <?php $image = get_sub_field( 'image' ); ?>
                    <?php $size = 'full'; ?>
                    <?php $image_caption = get_the_excerpt( $image ); ?>
                    <?php if ( $image ) : ?>
                        <?php if ( $link ) { ?>
                            <figure>
                            <a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo wp_get_attachment_image( $image, $size ); ?></a>
                            <?php if ( $image_caption ) { ?>
                            <figcaption><?php echo $image_caption; ?></figcaption>
                            <?php } ?>
                            </figure>
                        <?php }else{ ?>
                            <figure>
                                <?php echo wp_get_attachment_image( $image, $size ); ?>
                                <?php if ( $image_caption ) { ?>
                                <figcaption><?php echo $image_caption; ?></figcaption>
                                <?php } ?>
                            </figure>
                        <?php } ?>
                    <?php endif; ?>
                </section>
				<?php } ?>
				
                
            <?php elseif ( get_row_layout() == 'carousel_column_element' ) : ?>
                <?php if ( get_sub_field( 'hide' ) == 1 ) { 
				 // hide element
				} else { ?>
                <section class="flexgrid-carousel">
                   

                    <?php $gallery_ids = get_sub_field( 'gallery' ); ?>
                    <?php $size = 'full'; ?>
                    <div class="carousel" data-flickity='{ "autoPlay": 3000, "prevNextButtons": false, "pageDots": true}' tabindex="0">
                    <?php if ( $gallery_ids ) :  ?>
                        <?php foreach ( $gallery_ids as $gallery_id ): ?>
                            <div class="carousel-cell">
                                <?php echo wp_get_attachment_image( $gallery_id, $size ); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                </section>
                <?php } ?>

            <?php elseif ( get_row_layout() == 'video_element' ) : ?>
                <?php if ( get_sub_field( 'hide' ) == 1 ) { 
				 // Hide element 
				} else { ?>
                <?php $video_thumbnail = get_sub_field( 'video_thumbnail' ); ?>
                <section class="flexgrid-video <?php if ( get_sub_field( 'crop_to_column_width_and_hight' ) == 1 ) { ?>crop-video<?php } ?>">
                
                <?php if ( have_rows( 'video' ) ) : ?>

                    <video autoplay="" preload="auto" muted="" playsinline="" -webkit-playsinline="" loop="" poster="<?php echo ''.$video_thumbnail.''; ?>" >
					<?php while ( have_rows( 'video' ) ) : the_row(); ?>
                        <source src="<?php the_sub_field( 'video_link' ); ?>" type="video/<?php the_sub_field( 'video_type' ); ?>">
                    <?php endwhile; ?>
                    </video>
                
				<?php else : ?>
					<?php // no rows found ?>
                <?php endif; ?>
                </section>
                <?php } ?>
                
            <?php elseif ( get_row_layout() == 'video_embed' ) : ?>
                <?php if ( get_sub_field( 'hide' ) == 1 ) { 
				 // Hide elemet 
                } else { ?>
                <section class="flexgrid-embed">
                    <div class="wrap-embed">
                        <?php the_sub_field( 'embeding_code' ); ?>
                    </div>
                </section>
                <?php } ?>
                
            <?php elseif ( get_row_layout() == 'counter' ) : ?>
                
                <?php $prefix = get_sub_field( 'prefix' ); ?>
                <?php $suffix = get_sub_field( 'suffix' ); ?>
                <?php $offset = get_sub_field( 'offset' ); ?>
                <?php $beginat = get_sub_field( 'begin_at_number' ); ?>

                <div class="counter">
                    <div class="counter__numbers">
                    <?php if ($prefix){ ?>
                        <span class="counter__prefix"><?php the_sub_field( 'prefix' ); ?></span>
                    <?php } ?>
                    <h2 class="timer count-title count-number  <?php the_sub_field( 'description_font_size' ); ?>" data-counterup-time="<?php the_sub_field( 'speed' ); ?>" <?php if ($offset){ ?> data-counterup-offset="<?php the_sub_field( 'offset' ); ?>" <?php } ?> <?php if ($beginat){ ?> data-counterup-beginat="<?php the_sub_field( 'begin_at_number' ); ?>" <?php } ?> ><?php the_sub_field( 'number' ); ?></h2>
                    <?php if ( $suffix ){ ?>
                        <span class="counter__suffix"><?php the_sub_field( 'suffix' ); ?></span>
                    <?php } ?>
                    </div>
                    <p class="counter__text "><?php the_sub_field( 'description' ); ?></p>
                </div>

            <?php elseif ( get_row_layout() == 'animated_types' ) : ?>
                <?php $loopCount = 0; ?>
                <?php
                    $rand1 = rand(0, 9);
                    $rand2 = rand(0, 9);
                    $rand3 = rand(0, 9);
                    $rand4 = rand(0, 9);
                ?>
                <section class="typed">
				    
                    <p class="<?php the_sub_field( 'font_size' ); ?> <?php the_sub_field( 'font_weight' ); ?>">
                        <?php the_sub_field( 'static_text' ); ?> <?php echo '<span class="typed'.$rand1.''.$rand2.''.$rand3.''.$rand4.'"></span>'; ?>
                    </p>
                    <?php if ( have_rows( 'animated_text' ) ) : ?>
                    <script>
                        var typed = new Typed(".typed<?php echo''.$rand1.''.$rand2.''.$rand3.''.$rand4.''; ?>", {
                            strings: [
                                <?php while ( have_rows( 'animated_text' ) ) : the_row(); ?>
						        "<?php the_sub_field( 'text_animated' ); ?>",
                                <?php endwhile; ?>
                            ],
                            // typing speed
                            typeSpeed: <?php the_sub_field( 'typing_speed' ); ?>,
                            // time before typing starts
                            startDelay: <?php the_sub_field( 'delay_before_typing_starts' ); ?>,
                            // backspacing speed
                            backSpeed: <?php the_sub_field( 'backspacing_speed' ); ?>,
                            // time before backspacing
                            backDelay: <?php the_sub_field( 'delay_before_backspacing' ); ?>,
                            smartBackspace: true,
                            <?php if ( get_sub_field( 'loop' ) == 1 ) : ?>
                                // loop
                                loop: true,
                            <?php else : ?>
                                // false = infinite
                                loop: true,
                                loopCount: <?php the_sub_field( 'number_of_loops' ); ?>,
                            <?php endif; ?>
                            // show cursor
                            <?php if ( get_sub_field( 'show_character_cursor' ) == 1 ) : ?>
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
                </section>
                <?php $loopCount ++; ?>
            
            
            
            <?php elseif ( get_row_layout() == 'timeline_module' ) : ?>
				<?php if ( get_sub_field( 'hide_timeline' ) == 1 ) : ?>
					<?php // hide timeline ?>
                <?php else : ?>
                    <section>
                    <?php if(get_sub_field('headline_timeline')) : ?>
                    <header class="timeline-header <?php the_sub_field( 'items_alignment' ); ?>">
                        <h3><?php the_sub_field( 'headline_timeline' ); ?></h3>
                    </header>
                    <?php endif; ?>
                    <div class="cd-container <?php if ( get_sub_field( 'animate_timeline' ) == 1 ) : ?>animate-timeline<?php endif; ?> <?php the_sub_field( 'items_alignment' ); ?>">
                        
                        <?php if ( have_rows( 'timeline_items' ) ) : ?>
                            <?php while ( have_rows( 'timeline_items' ) ) : the_row(); ?>
                                <?php if ( get_sub_field( 'hide_item' ) == 1 ) : ?>
                                    <?php // hide timeline item ?>
                                <?php else : ?>
                                    <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-picture"></div>
                                        <div class="cd-timeline-content <?php if( get_sub_field( 'start_day' ) || get_sub_field( 'start_month' ) || get_sub_field( 'start_year' ) ): ?>time-content<?php endif; ?>">
                                            <?php if( get_sub_field( 'start_day' ) || get_sub_field( 'start_month' ) || get_sub_field( 'start_year' ) ): ?>
                                            <span class="cd-date">
                                                <?php the_sub_field( 'start_day' ); ?> <?php the_sub_field( 'start_month' ); ?> <?php the_sub_field( 'start_year' ); ?>
                                                <?php if(get_sub_field('end_day') || get_sub_field('end_month') || get_sub_field('end_year')) : ?>
                                                    - <?php the_sub_field( 'end_day' ); ?> <?php the_sub_field( 'end_month' ); ?> <?php the_sub_field( 'end_year' ); ?>
                                                <?php endif; ?>
                                            </span>
                                            <?php endif; ?>
                                            <h4><?php the_sub_field( 'headline' ); ?></h4>
                                            <?php the_sub_field( 'text' ); ?>
                                            <?php $link = get_sub_field( 'link' ); ?>
                                            <?php if ( $link ) : ?>
                                                <a class="section-link" href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?> <svg class="icon-stepup-arrow"><use xlink:href="#icon-stepup-arrow"></use></svg></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // no rows found ?>
                        <?php endif; ?>

                    </div>
                    </section>
                <?php endif; ?>
                
			<?php endif; ?>
            
		<?php endwhile; ?>
	<?php else: ?>
		<?php // no layouts found ?>
    <?php endif; ?>

    <?php $block_button_link = get_field( 'block_button_link' ); ?>
	<?php if ( $block_button_link ) : ?>
    <footer class="block-button-footer <?php the_field( 'button_alignment' ); ?> <?php the_field( 'button_text_color' ); ?> <?php the_field( 'button_background_color' ); ?>">
		<a class="wp-block-button__link" href="<?php echo esc_url( $block_button_link['url'] ); ?>" target="<?php echo esc_attr( $block_button_link['target'] ); ?>" style="color:<?php the_field( 'button_text_color' ); ?>; background-color:<?php the_field( 'button_background_color' ); ?>;"><?php echo esc_html( $block_button_link['title'] ); ?></a>
    </footer>
	<?php endif; ?>

    </div>
</div>

<?php } ?>