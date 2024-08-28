<?php
/**
 * bushpilots theme settings.
 *
 * Genesis 2.9+ updates these settings when themes are activated.
 *
 * @package bushpilots
 * @author  mono voce aps
 * @license GNU General Public License v3.0
 * @link    https://github.com/mbernth/bushpilots
 */

return [
	GENESIS_SETTINGS_FIELD => [
		'blog_cat_num'              => 5,
		'breadcrumb_front_page'     => 0,
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'entry_meta_after_content'  => '[post_categories before=""] [post_tags before=""]',
		'entry_meta_before_content' => '[post_author_posts_link] &middot; [post_date] &middot; [post_comments] [post_edit]',
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'full-width-content',
	],
	'posts_per_page'       => 10,
];
