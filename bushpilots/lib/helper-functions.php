<?php
/**
 * bushpilots.
 *
 * This file defines helper functions used elsewhere in the bushpilots Theme.
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for black color.
 */
function mono_pro_get_default_shade_color() {
	return '#010101';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for white color.
 */
function mono_pro_get_default_tint_color() {
	return '#fefefe';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for primary color.
 */
function mono_pro_get_default_primary_color() {
	return '#29548a';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for secondary color.
 */
function mono_pro_get_default_secondary_color() {
	return '#d4dbe8';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for active color.
 */
function mono_pro_get_default_active_color() {
	return '#de4f2e';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for accent one (Succes) color.
 */
function mono_pro_get_default_accent_one_color() {
	return '#4dffa6';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for accent two (Warning) color.
 */
function mono_pro_get_default_accent_two_color() {
	return '#fff04d';
}

/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for accent three (Alert/Error) color.
 */
function mono_pro_get_default_accent_three_color() {
	return '#ff4d6a';
}


/**
 *
 * @since 1.0.0
 *
 * @return string Hex color code for link color.
 */
function mono_customizer_get_default_link_color() {
	return '#0066cc';
}

/**
 * Gets default accent color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.0.0
 *
 * @return string Hex color code for accent color.
 */
function mono_customizer_get_default_accent_color() {
	return '#0066cc';
}

/**
 * Gets default footer start color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.0.0
 *
 * @return string Hex color code for footer start color.
 */
function mono_customizer_get_default_footer_start_color() {
	return '#0066cc';
}

/**
 * Gets default footer end color for Customizer.
 * Abstracted here since at least two functions use it.
 *
 * @since 1.0.0
 *
 * @return string Hex color code for footer end color.
 */
function mono_customizer_get_default_footer_end_color() {
	return '#02cbfb';
}

/**
 * Gets default search icon settings for Customizer.
 *
 * @since 1.0.0
 *
 * @return int 1 for true, in order to show the icon.
 */
function mono_customizer_get_default_search_setting() {
	return 1;
}

/**
 * Gets the default image for the footer logo section.
 *
 * @return string defaultimage for the footer logo section.
 *
 * @since 1.2.0
 */
function mono_get_default_footer_logo() {
	return get_stylesheet_directory_uri() . '/images/logo-white.png';
}

/**
 * Outputs the header search form toggle button.
 *
 * @return string HTML output of the Show Search button.
 *
 * @since 1.0.0
 */
function mono_get_header_search_toggle() {
	return sprintf( '<a href="#header-search-wrap" aria-controls="header-search-wrap" aria-expanded="false" role="button" class="toggle-header-search"><span class="screen-reader-text">%s</span><span class="ionicons ion-ios-search"></span></a>', __( 'Show Search', 'bushpilots-pro' ) );
}

/**
 * Outputs the header search form.
 *
 * @since 1.0.0
 */
function mono_do_header_search_form() {

	$button = sprintf( '<a href="#" role="button" aria-expanded="false" aria-controls="header-search-wrap" class="toggle-header-search close"><span class="screen-reader-text">%s</span><span class="ionicons ion-ios-close"></span></a>', __( 'Hide Search', 'bushpilots-pro' ) );

	printf(
		'<div id="header-search-wrap" class="header-search-wrap">%s %s</div>',
		get_search_form( false ),
		$button // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);

}

/**
 * Calculates if white or black would contrast more with the provided color.
 *
 * @since 1.0.0
 *
 * @param string $color A color in hex format.
 * @return string The hex code for the most contrasting color: black or white.
 */
function mono_color_contrast( $color ) {

	$hexcolor = str_replace( '#', '', $color );

	$red   = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	return ( $luminosity > 128 ) ? '#000000' : '#ffffff';

}

/**
 * Generates a lighter or darker color from a starting color.
 * Used to generate complementary hover tints from user-chosen colors.
 *
 * @since 1.0.0
 *
 * @param string $color A color in hex format.
 * @param int    $change The amount to reduce or increase brightness by.
 * @return string Hex code for the adjusted color brightness.
 */
function mono_color_brightness( $color, $change ) {

	$hexcolor = str_replace( '#', '', $color );

	$red   = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

	$red   = max( 0, min( 255, $red + $change ) );
	$green = max( 0, min( 255, $green + $change ) );
	$blue  = max( 0, min( 255, $blue + $change ) );

	return '#' . dechex( $red ) . dechex( $green ) . dechex( $blue );

}

/**
 * Changes color brightness.
 *
 * @since 1.0.0
 *
 * @param string $color A color in hex format.
 * @return string Hex code for the adjusted color brightness.
 */
function mono_change_brightness( $color ) {

	$hexcolor = str_replace( '#', '', $color );

	$red   = hexdec( substr( $hexcolor, 0, 2 ) );
	$green = hexdec( substr( $hexcolor, 2, 2 ) );
	$blue  = hexdec( substr( $hexcolor, 4, 2 ) );

	$luminosity = ( ( $red * 0.2126 ) + ( $green * 0.7152 ) + ( $blue * 0.0722 ) );

	return ( $luminosity > 128 ) ? mono_color_brightness( '#000000', 20 ) : mono_color_brightness( '#ffffff', -50 );

}
