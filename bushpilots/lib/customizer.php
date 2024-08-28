<?php
/**
 * bushpilots.
 *
 * This file adds the Customizer additions to the bushpilots Theme.
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */

add_action( 'customize_register', 'mono_customizer_register' );
/**
 * Registers settings and controls with the Customizer.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function mono_customizer_register( $wp_customize ) {

	$wp_customize->add_section(
		'mono_theme_options',
		[
			'description' => __( 'Personalize the bushpilots theme with these available options.', 'bushpilots-pro' ),
			'title'       => __( 'bushpilots Settings', 'bushpilots-pro' ),
			'priority'    => 30,
		]
	);

	// Adds control for search option.
	$wp_customize->add_setting(
		'mono_header_search',
		[
			'default'           => mono_customizer_get_default_search_setting(),
			'sanitize_callback' => 'absint',
		]
	);

	// Adds setting for search option.
	$wp_customize->add_control(
		'mono_header_search',
		[
			'label'       => __( 'Show Menu Search Icon?', 'bushpilots-pro' ),
			'description' => __( 'Check the box to show a search icon in the menu.', 'bushpilots-pro' ),
			'section'     => 'mono_theme_options',
			'type'        => 'checkbox',
			'settings'    => 'mono_header_search',
		]
	);

	// Adds setting for theme colors.
	$wp_customize->add_setting(
		'mono_color_shade',
		[
			'default'           => mono_pro_get_default_shade_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_tint',
		[
			'default'           => mono_pro_get_default_tint_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_primary',
		[
			'default'           => mono_pro_get_default_primary_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_secondary',
		[
			'default'           => mono_pro_get_default_secondary_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_active',
		[
			'default'           => mono_pro_get_default_active_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_accent_one',
		[
			'default'           => mono_pro_get_default_accent_one_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_accent_two',
		[
			'default'           => mono_pro_get_default_accent_two_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

	$wp_customize->add_setting(
		'mono_color_accent_three',
		[
			'default'           => mono_pro_get_default_accent_three_color(),
			'sanitize_callback' => 'sanitize_hex_color',
		]
	);

}
