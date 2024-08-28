<?php
/**
 * bushpilots.
 *
 * Onboarding config shared between Starter Packs.
 *
 * Genesis Starter Packs give you a choice of content variation when activating
 * the theme. The content below is common to all packs for this theme.
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */

$mono_onboarding_config = [
	'dependencies'     => [
		'plugins' => [
			[
				'name'       => __( 'Atomic Blocks', 'bushpilots-pro' ),
				'slug'       => 'atomic-blocks/atomicblocks.php',
				'public_url' => 'https://atomicblocks.com/',
			],
			[
				'name'       => __( 'Simple Social Icons', 'bushpilots-pro' ),
				'slug'       => 'simple-social-icons/simple-social-icons.php',
				'public_url' => 'https://wordpress.org/plugins/simple-social-icons/',
			],
		],
	],
];


return $mono_onboarding_config;
