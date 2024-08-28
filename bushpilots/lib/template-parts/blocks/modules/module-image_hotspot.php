<?php $image = get_sub_field( 'image' ); ?>
<?php $width = get_sub_field( 'tooltip_max_width' ); ?>
<?php if ( $image ) : ?>
<?php $loopCount = 0; ?>
<?php
    $rand1 = rand(0, 9);
    $rand2 = rand(0, 9);
    $rand3 = rand(0, 9);
    $rand4 = rand(0, 9);
?>
    <div class="section-hotspots <?php if ( get_sub_field( 'tooltips_text_size' ) == 1 ) : ?> <?php else : ?> has-small-font-size<?php endif; ?>">
	
		<?php echo wp_get_attachment_image( $image, $size ); ?>

	<?php if ( have_rows( 'hotspot' ) ) : ?>
		<?php while ( have_rows( 'hotspot' ) ) : the_row(); ?>
            <div class="hotspot" style="top:calc(<?php the_sub_field( 'vertical_position' ); ?>% - 20px); left:calc(<?php the_sub_field( 'horizontal_position' ); ?>% - 20px);">
                <button id="click__pointer<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?>" class="hotspot__pointer" aria-label="Image Hotspot"><span aria-hidden="true">Image Hotspot</span></button>
                
				    <div id="tooltip<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?>" class="tooltip <?php the_sub_field( 'tooltip_position' ); ?> <?php if ( get_sub_field( 'hotspot_active' ) == 1 ) : ?>active<?php endif; ?>" style="width:<?php echo''.$width.''; ?>px;">
                        <?php $tooltip_headline = get_sub_field( 'tooltip_headline' ); ?>
                        <?php if ( $tooltip_headline ) : ?>
                            <h5><?php the_sub_field( 'tooltip_headline' ); ?></h5>
                        <?php endif; ?>
			            <?php the_sub_field( 'tooltip_text' ); ?>
			            <?php $tooltip_button = get_sub_field( 'tooltip_button' ); ?>
			            <?php if ( $tooltip_button ) : ?>
				            <a class="wp-block-button__link has-small-font-size" href="<?php echo esc_url( $tooltip_button['url'] ); ?>" target="<?php echo esc_attr( $tooltip_button['target'] ); ?>"><?php echo esc_html( $tooltip_button['title'] ); ?></a>
			        <?php endif; ?>
                    </div>
                    <script>
                        const elementClicked<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?> = document.querySelector("#click__pointer<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?>");
                        const elementYouWantToShow<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?> = document.querySelector("#tooltip<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?>");

                        elementClicked<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?>.addEventListener("click", ()=>{
                            elementYouWantToShow<?php echo $loopCount?><?php echo $rand1?><?php echo $rand3?><?php echo $rand3?><?php echo $rand4?>.classList.toggle("active");
                        });
                    </script>
            </div>
        <?php $loopCount ++; ?>
		<?php endwhile; ?>
	<?php else : ?>
		<?php // no rows found ?>
	<?php endif; ?>

    </div>

<?php endif; ?>

<style type="text/css">
	<?php echo '#' . $id; ?> {
        /* Add styles that use ACF values here */
    }
    .section-hotspots{
        position:relative;
    }
    .section-hotspots img{
        display:block;
        width:100%;
        max-width: unset;
    }
    .hotspot{
        position: absolute;
    }
    .hotspot__pointer{
        display:block;
        content: '';
        height:1.250em;
        width:1.250em;
        min-width:unset;
        border-radius:2em;
        background-color:transparent;
        box-shadow: 0 5px 8px rgba(0, 0, 0, 0.5);
        border:4px solid #fefefe;
        cursor:pointer;
        padding:0;
        font-size:20px;
        text-indent: -999em;
    }
    .tooltip{
        position:absolute;
        padding:1.25em;
        min-width:180px;
        -webkit-transform: translate(-50%,0px);
        transform: translate(-50%,0px);
        left:-999em;
        color: #010101;
        opacity:0;
        z-index:30;
        -webkit-transition: opacity 0.2s ease-in-out;
	    -moz-transition:    opacity 0.2s ease-in-out;
	    -ms-transition:     opacity 0.2s ease-in-out;
	    -o-transition:      opacity 0.2s ease-in-out;
	    transition:         opacity 0.2s ease-in-out;
    }
    .tooltip.active{
        opacity:1;
        left:15px;
    }
    .tooltip h5,
    .tooltip p,
    .tooltip a{
        position:relative;
        z-index:30;
    }
    .tooltip::before{
        position:absolute;
        content: '';
        background-color:#fefefe;
        border-radius:.65em;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
        top:0;
        right:0;
        bottom:0;
        left:0;
        z-index:20;
    }
    .tooltip::after {
        height: 4px;
        width: 30px;
        content: '';
        display: block;
        position: absolute;
        background-color:#fefefe;
        z-index:20;
    }
    .tooltip.top::after,
    .tooltip.bottom::after{
        height: 30px;
        width: 4px;
    }

    .tooltip.top{
        bottom:54px;
    }
    
    .tooltip.top::after{
        bottom: -30px;
        left: 50%;
        margin-left: -4px;
    }
    .tooltip.right{
        transform: translate(0px,-50%);
        margin: 0 25px;
        top: calc(50% - 2px);
        left: 110%;
        text-align:left;
    }
    .tooltip.right::after{
        top: 50%;
        left: -30px;
        margin-top: 0px;
    }
    .tooltip.bottom{
        top:54px;
    }
    .tooltip.bottom::after {
        top: -30px;
        left: 50%;
        margin-left: -4px;
    }
    .tooltip.left{
        -webkit-transform: translate(0px,-50%);
        transform: translate(0px,-50%);
        margin: 0 25px 0 0;
        top: calc(50% - 2px);
        right: 110%;
        left: unset;
        text-align:left;
    }
    .tooltip.left::after{
        top: 50%;
        right: -30px;
        margin-top: 0px;
    }
</style>