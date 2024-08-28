<?php
/**
 * bushpilots
 *
 * This file adds functions to the bushpilots Theme.
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */

 // Starts the engine.
// =====================================================================================================================
require_once get_template_directory() . '/lib/init.php';

// Setup Theme.
// =====================================================================================================================
require_once get_stylesheet_directory() . '/lib/theme-defaults.php';

// Adds the theme helper functions
// =====================================================================================================================
require_once get_stylesheet_directory() . '/lib/helper-functions.php';

// Set Localization (do not remove)
// =====================================================================================================================
add_action( 'after_setup_theme', 'mono_localization_setup' );
function mono_localization_setup() {

	load_child_theme_textdomain( 'bushpilots-pro', get_stylesheet_directory() . '/languages' );

}

// Adds WooCommerce support.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-setup.php';

// Adds the required WooCommerce styles and Customizer CSS.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-output.php';

// Adds the Genesis Connect WooCommerce notice.
require_once get_stylesheet_directory() . '/lib/woocommerce/woocommerce-notice.php';

// Add desired theme supports
// =====================================================================================================================
add_action( 'after_setup_theme', 'mono_theme_support', 1 );
function mono_theme_support() {

	$theme_supports = genesis_get_config( 'theme-supports' );

	foreach ( $theme_supports as $feature => $args ) {
		add_theme_support( $feature, $args );
	}

}

// Gutenberg support
// =====================================================================================================================
add_action( 'after_setup_theme', 'genesis_child_gutenberg_support' );
function genesis_child_gutenberg_support() { // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedFunctionFound -- using same in all child themes to allow action to be unhooked.
	require_once get_stylesheet_directory() . '/lib/gutenberg/init.php';
}

// Remove width attributes for figure element
add_filter('img_caption_shortcode_width', '__return_false');

// Global scripts
// =====================================================================================================================
remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

add_action( 'wp_enqueue_scripts', 'mono_enqueue_scripts_styles' );
function mono_enqueue_scripts_styles() {
	// wp_enqueue_style( 'mono-fonts', 'https//fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,500;0,600;1,200;1,300;1,500&display=swap', [], genesis_get_theme_version() );
	// wp_enqueue_style( 'mono-ionicons', '//unpkg.com/ionicons@4.1.2/dist/css/ionicons.min.css', [], genesis_get_theme_version() );

	wp_enqueue_script( 'mono-jquery', get_stylesheet_directory_uri() . '/js/jquery-3.5.1.min.js', array( 'jquery' ), '3.5.1' );
	
	wp_enqueue_script( 'mono-global-script', get_stylesheet_directory_uri() . '/js/global.js', [ 'jquery' ], '1.0.0', true );
	// wp_enqueue_script( 'mono-block-effects', get_stylesheet_directory_uri() . '/js/block-effects.js', array(), '1.0.0', true );
	// wp_enqueue_script( 'mono-animations', get_stylesheet_directory_uri() . '/js/animations.js', array(), '1.0.0', true );

	// Flickity
	wp_enqueue_script( 'flickity', get_stylesheet_directory_uri() . '/js/flickity.pkgd.min.js', array( 'jquery' ), '2.2.1', true );

	// Fitvids
	// wp_enqueue_script( 'mono-fitvids-script', get_stylesheet_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.0.0', true );
	// wp_enqueue_script( 'mono-fitvids', get_stylesheet_directory_uri() . '/js/fitvids.js', array( 'jquery' ), '1.0.0', true );

	// Counter
	// wp_enqueue_script( 'mono-waypoints', get_stylesheet_directory_uri() . '/js/jquery.waypoints.min.js', array( 'jquery' ), '4.0.0', true );
	// wp_enqueue_script( 'mono-counter', get_stylesheet_directory_uri() . '/js/jquery.counterup.js', array( 'jquery' ), '2.1.0', true );
	// wp_enqueue_script( 'mono-counter-setting', get_stylesheet_directory_uri() . '/js/counterup-setting.js', array( 'jquery' ), '1.0.0' );

	// Types
	wp_enqueue_script( 'mono-types', get_stylesheet_directory_uri() . '/js/typed.min.js', array( 'jquery' ), '2.0.11' );

	// Timeline
	// wp_enqueue_script( 'mono-modernizr', get_bloginfo( 'stylesheet_directory' ) . '/js/modernizr.min.js', array( 'jquery' ), '1.0.0' );
	// wp_enqueue_script( 'moono-timeline', get_bloginfo( 'stylesheet_directory' ) . '/js/timeline.js', array( 'jquery' ), '1.0.0' );

	// GSAP
	// wp_enqueue_script( 'tween-max', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js');
	// wp_enqueue_script( 'moono-cursor', get_bloginfo( 'stylesheet_directory' ) . '/js/cursor.js', array( 'jquery' ), '1.0.0' );

	// Page transitions
	// wp_enqueue_script( 'mono-smoothstate', get_stylesheet_directory_uri() . '/js/jquery.smoothState.min.js', array( 'jquery' ), '1.0.0' );
	// wp_enqueue_script( 'mono-main', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0' );
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	wp_enqueue_script( 'mono-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menus' . $suffix . '.js', [ 'jquery' ], genesis_get_theme_version(), true );
	wp_localize_script( 'mono-responsive-menu', 'genesis_responsive_menu', mono_responsive_menu_settings() );

}

/**
 * Defines responsive menu settings.
 *
 * @since 1.1.0
 */
function mono_responsive_menu_settings() {

	$settings = [
		'mainMenu'         => __( 'Menu', 'monochrome-pro' ),
		'menuIconClass'    => 'ionicons-before ion-ios-menu',
		'subMenu'          => __( 'Submenu', 'monochrome-pro' ),
		'subMenuIconClass' => 'ionicons-before ion-ios-arrow-down',
		'menuClasses'      => [
			'combine' => [],
			'others'  => [
				'.nav-primary',
			],
		],
	];

	return $settings;

}

function mono_pro_styles() {
    wp_register_style('bushpilots', get_bloginfo( 'stylesheet_directory' ) . '/dist/style.css', array(), '2.0.2');
    wp_enqueue_style('bushpilots'); // Enqueue it!
}
add_action('wp_enqueue_scripts', 'mono_pro_styles'); // Add Theme Stylesheet

// Favicon location and touch icons
// =====================================================================================================================
// add_filter( 'genesis_pre_load_favicon', 'mono_favicon_filter' );
function mono_favicon_filter( $favicon ) {
	/*
	echo '<link rel="shortcut icon" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon.ico" type="image/x-icon" />';
	echo '<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-16x16.png" sizes="16x16">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-32x32.png" sizes="32x32">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-96x96.png" sizes="96x96">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/android-chrome-192x192.png" sizes="192x192">';
	echo '<meta name="msapplication-square70x70logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//smalltile.png" />';
	echo '<meta name="msapplication-square150x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//mediumtile.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//widetile.png" />';
	echo '<meta name="msapplication-square310x310logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//largetile.png" />';

	echo '
		<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="'.get_bloginfo( 'stylesheet_directory' ).'/img/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/favicon-16x16.png">
		<link rel="manifest" href="'.get_bloginfo( 'stylesheet_directory' ).'/img/manifest.json">
		<meta name="msapplication-TileColor" content="#010101">
		<meta name="msapplication-TileImage" content="'.get_bloginfo( 'stylesheet_directory' ).'/img/ms-icon-144x144.png">
		<meta name="theme-color" content="#010101">
	';
	*/
}

//* Add svg upload
// =====================================================================================================================
add_filter('upload_mimes', 'cc_mime_types');
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}

//* Remove the edit link
// =====================================================================================================================
add_filter ( 'genesis_edit_post_link' , '__return_false' );

//* Widgets
// =====================================================================================================================
// Removes header right widget area.
// unregister_sidebar( 'header-right' );

// Removes primary sidebar.
unregister_sidebar( 'sidebar' );

// Removes secondary sidebar.
unregister_sidebar( 'sidebar-alt' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'before-header',
	'name'        => __( 'Before Header', 'bushpilots' ),
	'description' => __( 'This is the before header widget area.', 'bushpilots' ),
) );

//* Hook before header widget area above header
add_action( 'genesis_header', 'mono_before_header', 10 );
function mono_before_header() {

	genesis_widget_area( 'before-header', array(
		'before' => '<div class="before-header widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

//* Layout
// =====================================================================================================================
// Removes site layouts - full width only
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content' );
genesis_unregister_layout( 'content-sidebar' );
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

//* Custom Cursor
// =====================================================================================================================
// add_action ( 'genesis_after', 'custom_cursor' );
function custom_cursor() {
	echo '<div class="custom-cursor"></div>';
}

//* Custom header
// =====================================================================================================================
//* Setup custom header
include_once( get_stylesheet_directory() . '/lib/template-parts/custom-header.php' );

//* Reposition the primary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );

// Front Page Site Title in H1
/**
 * Use h1 for site title
 * @see https://www.billerickson.net/genesis-h1-front-page/
 */
function ea_h1_for_site_title( $wrap ) {
	return is_front_page() ? 'h1' : $wrap;
}
add_filter( 'genesis_site_title_wrap', 'ea_h1_for_site_title' );


//* Mono Icons
// =====================================================================================================================
//* Setup custom header
include_once( get_stylesheet_directory() . '/lib/template-parts/mono-icons.php' );

//* Advanced Custom Fields Modules
// =====================================================================================================================
//* Push Content
// include_once( get_stylesheet_directory() . '/lib/template-parts/push_content.php' );

//* Post archive page
// =====================================================================================================================

//* Customize the next page link
add_filter ( 'genesis_next_link_text' , 'sp_next_page_link' );
function sp_next_page_link ( $text ) {
    return '<svg class="icon-arrow-right5"><use xlink:href="#icon-arrow-right5"></use></svg>';
}
//* Customize the previous page link
add_filter ( 'genesis_prev_link_text' , 'sp_previous_page_link' );
function sp_previous_page_link ( $text ) {
    return '<svg class="icon-arrow-left5"><use xlink:href="#icon-arrow-left5"></use></svg>';
}

//* Custom post types
// =====================================================================================================================
include_once( get_stylesheet_directory() . '/lib/template-parts/post-types/post_type_team.php' );
// include_once( get_stylesheet_directory() . '/lib/template-parts/post-types/post_type_work.php' );


//* Option pages
// =====================================================================================================================
// Add Option Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Services',
		'menu_title'	=> 'Servises'
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Services UK',
		'menu_title'	=> 'Servises UK'
	));
}

//* Gravity forms
// =====================================================================================================================

// Enables the confirmation anchor on all forms
add_filter( 'gform_confirmation_anchor', '__return_true' );

// ACF Blocks
// =====================================================================================================================
/**
 * ACF Color Palette
 *
 * Add default color palatte to ACF color picker for branding
 * Match these colors to colors in /functions.php & /assets/scss/partials/base/variables.scss
 *
*/
add_action( 'acf/input/admin_footer', 'wd_acf_color_palette' );
function wd_acf_color_palette() { ?>
<script type="text/javascript">
(function($) {
     acf.add_filter('color_picker_args', function( args, $field ){
          // add the hexadecimal codes here for the colors you want to appear as swatches
          args.palettes = ['#010101', '#fefefe', '#29548a', '#d4dbe8', '#de4f2e']
          // return colors
          return args;
     });
})(jQuery);
</script>
<?php }

function mono_block_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'mono-blocks',
				'title' => __( 'Mono Blocks', 'mono-blocks' ),
			),
		)
	);
}
add_filter( 'block_categories', 'mono_block_category', 10, 2);

function register_acf_block_types() {

	acf_register_block(array(
		'name'				=> 'page-quote',
		'title'				=> __('Side citat', 'pbf'),
		'description'		=> __('Side citat.'),
		'render_template'   => '/lib/template-parts/blocks/page-quote.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'format-quote',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports'			=> [
			'multiple' 		=> false
		]
	));

	acf_register_block(array(
		'name'				=> 'page-body-content',
		'title'				=> __('Brødtekst', 'pbf'),
		'description'		=> __('Brødtekst på lyseblå baggrund'),
		'render_template'   => '/lib/template-parts/blocks/page-body-content.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'media-text',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports' 			=> array( 
			'align' => array( 'full' ),
		),
	));

	acf_register_block(array(
		'name'				=> 'page-cta-blue',
		'title'				=> __('Call to action - hvid', 'pbf'),
		'description'		=> __('Call to action i hvid boks'),
		'render_template'   => '/lib/template-parts/blocks/page-cta-blue.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'yes-alt',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports' 			=> array( 
			'align' => array( 'full' ),
		),
	));

	acf_register_block(array(
		'name'				=> 'page-cta-orange',
		'title'				=> __('Call to action - blå', 'pbf'),
		'description'		=> __('Call to action i blå boks'),
		'render_template'   => '/lib/template-parts/blocks/page-cta-orange.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'yes',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports' 			=> array( 
			'align' => array( 'full' ),
		),
	));

	acf_register_block(array(
		'name'				=> 'page-black-box',
		'title'				=> __('Sort tekst boks', 'pbf'),
		'description'		=> __('Sort tekst boks med stor hvid skrift'),
		'render_template'   => '/lib/template-parts/blocks/page-black-box.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'media-default',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports' 			=> array( 
			'align' => array( 'full' ),
		),
	));

	acf_register_block_type(array(
		'name'              => 'hero_advanced',
		'title'             => __('Hero Advanced'),
		'description'       => __('A custom advanced hero block.'),
		'render_template'   => '/lib/template-parts/blocks/hero-advanced.php',
		'category'          => 'mono-blocks',
		'icon'              => 'laptop',
		'mode' 				=> 'edit',
		'align' 			=> 'full',
		'supports'			=> [
			'multiple' 		=> false
		]
	));

	acf_register_block(array(
		'name'				=> 'page-services-listmenu',
		'title'				=> __('Services listmenu', 'pbf'),
		'description'		=> __('Services listmenu.'),
		'render_template'   => '/lib/template-parts/blocks/page-services-listmenu.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'editor-ul',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports'			=> [
			'multiple' 		=> false
		]
	));

	acf_register_block(array(
		'name'				=> 'timeline',
		'title'				=> __('Timeline', 'pbf'),
		'description'		=> __('Tidslinje'),
		'render_template'   => '/lib/template-parts/blocks/timeline.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'arrow-right-alt',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports'			=> [
			'multiple' 		=> false
		]
	));

	acf_register_block_type(array(
		'name'              => 'team',
		'title'             => __('Team'),
		'description'       => __('A custom team block.'),
		'render_template'   => '/lib/template-parts/blocks/team.php',
		'category'          => 'mono-blocks',
		'icon'              => 'groups',
		'mode' 				=> 'edit',
		'align' 			=> 'full',
		'supports' 			=> array( 
								'align' => array( 'full' ),
							),
	));

	acf_register_block(array(
		'name'				=> 'contact-adress',
		'title'				=> __('Kontakt addresse', 'pbf'),
		'description'		=> __('Kontakt addresse med kort i boks'),
		'render_template'   => '/lib/template-parts/blocks/contact-adress.php',
		'category'			=> 'mono-blocks',
		'icon'				=> 'admin-site',
		'align'				=> 'full',
		'mode'				=> 'edit',
		'supports' 			=> array( 
			'align' => array( 'full' ),
		),
	));

	acf_register_block_type(array(
		'name'              => 'team-member',
		'title'             => __('Medarbejder'),
		'description'       => __('Medarbejder information'),
		'render_template'   => '/lib/template-parts/blocks/team-member.php',
		'category'          => 'mono-blocks',
		'icon'              => 'admin-users',
		'post_types' 		=> array('team'),
		'mode' 				=> 'edit',
		'align' 			=> 'full',
		'supports' 			=> array( 
			'align' => array( 'full' ),
								),
	));

	// Register a hero video block.
	/*
	acf_register_block_type(array(
		'name'              => 'hero_video',
		'title'             => __('Video hero'),
		'description'       => __('Video hero til forsiden.'),
		'render_template'   => '/lib/template-parts/blocks/hero-video.php',
		'category'          => 'mono-blocks',
		'icon'              => 'format-video',
		'align' 			=> 'full',
		'supports'			=> [
			'multiple' 		=> false
		]
	));

	
	acf_register_block_type(array(
		'name'              => 'hero',
		'title'             => __('Hero'),
		'description'       => __('A custom hero block.'),
		'render_template'   => '/lib/template-parts/blocks/hero.php',
		'category'          => 'mono-blocks',
		'icon'              => 'awards',
		'align' 			=> 'full',
		'supports' 			=> array( 
								'align' => array( 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'images_text',
		'title'             => __('Images and texts'),
		'description'       => __('A custom images and text repeater block.'),
		'render_template'   => '/lib/template-parts/blocks/images-text.php',
		'category'          => 'mono-blocks',
		'icon'              => 'index-card',
		'mode' 				=> 'edit',
		'align' 			=> 'wide',
		'supports' 			=> array( 
								'align' => array( 'wide', 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'flexible_grid',
		'title'             => __('Flexible Grid'),
		'description'       => __('A custom flexible grid block.'),
		'render_template'   => '/lib/template-parts/blocks/flexible-grid.php',
		'category'          => 'mono-blocks',
		'icon'              => 'editor-table',
		'mode' 				=> 'edit',
		'align' 			=> 'wide',
		'supports' 			=> array( 
								'align' => array( 'wide', 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'two_column_grid',
		'title'             => __('Two Column Grid'),
		'description'       => __('A custom two column grid block.'),
		'render_template'   => '/lib/template-parts/blocks/two-column-grid.php',
		'category'          => 'mono-blocks',
		'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g><path d="M9,23.5v-6H23.5v6Zm-8.5,0v-6h6v6Zm17-8.5V9h6v6ZM.5,15V9H15v6ZM13.25,6.5V.5H23.5v6ZM.5,6.5V.5H10.75v6Z"/><path d="M23,1V6H13.75V1H23M10.25,1V6H1V1h9.25M23,9.5v5H18v-5h5m-8.5,0v5H1v-5H14.5M23,18v5H9.5V18H23M6,18v5H1V18H6M24,0H12.75V7H24V0ZM11.25,0H0V7H11.25V0ZM24,8.5H17v7h7v-7Zm-8.5,0H0v7H15.5v-7ZM24,17H8.5v7H24V17ZM7,17H0v7H7V17Z"/></g></svg>',
		'mode' 				=> 'edit',
		'align' 			=> 'wide',
		'supports' 			=> array( 
								'align' => array( 'wide', 'full' ),
							),
	));


	acf_register_block_type(array(
		'name'              => 'image_hotspots',
		'title'             => __('Image hotspots'),
		'description'       => __('A custom image hotspot block.'),
		'render_template'   => '/lib/template-parts/blocks/image_hotspots.php',
		'category'          => 'mono-blocks',
		'icon'              => 'location',
		'align' 			=> 'wide',
		'supports' 			=> array( 
								'align' => array( 'wide', 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'hero_carousel',
		'title'             => __('Hero Carousel'),
		'description'       => __('A custom hero carousel block.'),
		'render_template'   => '/lib/template-parts/blocks/hero-carousel.php',
		'category'          => 'mono-blocks',
		'icon'              => 'update',
		'mode' 				=> 'edit',
		'align' 			=> 'full',
		'supports' 			=> array( 
								'align' => array( 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'hero_advanced',
		'title'             => __('Hero Advanced'),
		'description'       => __('A custom advanced hero block.'),
		'render_template'   => '/lib/template-parts/blocks/hero-advanced.php',
		'category'          => 'mono-blocks',
		'icon'              => 'laptop',
		'mode' 				=> 'edit',
		'align' 			=> 'full',
		'supports' 			=> array( 
								'align' => array( 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'subscriptions',
		'title'             => __('Subscriptions'),
		'description'       => __('A subscriptions options block.'),
		'render_template'   => '/lib/template-parts/blocks/subscriptions.php',
		'category'          => 'mono-blocks',
		'icon'              => 'yes',
		'mode' 				=> 'edit',
		'align' 			=> 'wide',
		'supports' 			=> array( 
								'align' => array( 'wide', 'full' ),
							),
	));

	acf_register_block_type(array(
		'name'              => 'subscriptions-table',
		'title'             => __('Subscriptions table'),
		'description'       => __('A subscriptions table block.'),
		'render_template'   => '/lib/template-parts/blocks/subscriptions_table.php',
		'category'          => 'mono-blocks',
		'icon'              => 'editor-table',
		'mode' 				=> 'edit',
		'align' 			=> 'full',
		'supports' 			=> array( 
								'align' => array( 'wide', 'full' ),
							),
	));
	*/
}

// check function exists.
if( function_exists('acf_register_block_type') ) {
	add_action('acf/init', 'register_acf_block_types');
}