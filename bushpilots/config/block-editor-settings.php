<?php
/**
 * Block Editor settings specific to bushpilots.
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */

// Disables custom colors in block color palette.
add_theme_support( 'disable-custom-colors' );
// Disabling custom font sizes
add_theme_support('disable-custom-font-sizes');
// Disabling custom gradients
add_theme_support( 'disable-custom-gradients' );

$mono_color_shade			=	get_theme_mod( 'mono_color_shade', mono_pro_get_default_shade_color() );
$mono_color_tint			=	get_theme_mod( 'mono_color_tint', mono_pro_get_default_tint_color() );
$mono_color_primary			=	get_theme_mod( 'mono_color_primary', mono_pro_get_default_primary_color() );
$mono_color_secondary		=	get_theme_mod( 'mono_color_secondary', mono_pro_get_default_secondary_color() );
$mono_color_active			=	get_theme_mod( 'mono_color_active', mono_pro_get_default_active_color() );
$mono_color_accent_one		=	get_theme_mod( 'mono_color_accent_one', mono_pro_get_default_accent_one_color() );
$mono_color_accent_two		=	get_theme_mod( 'mono_color_accent_two', mono_pro_get_default_accent_two_color() );
$mono_color_accent_three	=	get_theme_mod( 'mono_color_accent_three', mono_pro_get_default_accent_three_color() );

$mono_color_contrast   = mono_color_contrast( $mono_color_active );
$mono_color_brightness = mono_color_brightness( $mono_color_active, 35 );

return [
	'admin-fonts-url'              => 'https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i|Open+Sans+Condensed:300',
	'content-width'                => 1200,
	'default-button-bg'            => $mono_color_active,
	'default-button-color'         => $mono_color_tint,
	'default-button-outline-hover' => $mono_color_brightness,
	'default-link-color'           => $mono_color_active,
	'editor-color-palette'         => [
		[
			'name'  => __( 'Black color', 'bushpilots-pro' ),
			'slug'  => 'theme-shade',
			'color' => $mono_color_shade,
		],
		[
			'name'  => __( 'White color', 'bushpilots-pro' ),
			'slug'  => 'theme-tint',
			'color' => $mono_color_tint,
		],
		[
			'name'  => __( 'Primary color', 'bushpilots-pro' ),
			'slug'  => 'theme-primary',
			'color' => $mono_color_primary,
		],
		[
			'name'  => __( 'Secondary color', 'bushpilots-pro' ),
			'slug'  => 'theme-secondary',
			'color' => $mono_color_secondary,
		],
		[
			'name'  => __( 'Active color', 'bushpilots-pro' ),
			'slug'  => 'theme-active',
			'color' => $mono_color_active,
		],
	],
	'editor-font-sizes'            => [
		[
			'name' => __( 'Small', 'bushpilots-pro' ),
			'size' => 14,
			'slug' => 'small',
		],
		[
			'name' => __( 'Large', 'bushpilots-pro' ),
			'size' => 22,
			'slug' => 'large',
		],
		[
			'name' => __( 'Larger', 'bushpilots-pro' ),
			'size' => 30,
			'slug' => 'larger',
		],
	],
];
