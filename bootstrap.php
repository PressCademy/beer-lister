<?php
/*
Plugin Name: Beer Plugin
Description: Beer plugin
Version: 1.0.0
Author: DesignFrame Solutions
Text Domain: plugin_name_replace_me
Domain Path: /languages
Requires at least: 5.1
Requires PHP: 7.0
Author URI: https://www.designframesolutions.com
*/

use Underpin\Abstracts\Underpin;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Fetches the instance of the plugin.
 * This function makes it possible to access everything else in this plugin.
 * It will automatically initiate the plugin, if necessary.
 * It also handles autoloading for any class in the plugin.
 *
 * @since 1.0.0
 *
 * @return \Underpin\Factories\Underpin_Instance The bootstrap for this plugin.
 */
function beer() {
	return Underpin::make_class( [
		'root_namespace'      => 'Beer_List',
		'text_domain'         => 'beer',
		'minimum_php_version' => '7.0',
		'minimum_wp_version'  => '5.1',
		'version'             => '1.0.0',
	] )->get( __FILE__ );
}

beer()->custom_post_types()->add( 'beer', [
	'type'        => 'beer',
	'name'        => 'Beer',
	'description' => 'Lists beers as a custom post type',
	'args'        => [
		'public'          => true,
		'capability_type' => 'post',
		'can_export'      => true,
		'show_in_rest'    => true,
		'supports'        => [ 'title', 'editor', 'excerpt', 'revisions', 'thumbnail' ],
		'labels'          => [
			'name'               => beer()->__( 'Beers' ),
			'singular_name'      => beer()->__( 'Beer' ),
			'label'              => beer()->__( 'Beers' ),
			'add_new'            => beer()->__( 'Add new beer' ),
			'add_new_item'       => beer()->__( 'Add new beer' ),
			'new_item'           => beer()->__( 'New beer' ),
			'edit_item'          => beer()->__( 'Edit beer' ),
			'view_item'          => beer()->__( 'View beer' ),
			'all_items'          => beer()->__( 'All beer' ),
			'search_items'       => beer()->__( 'Search beers' ),
			'not_found'          => beer()->__( 'No beer found. Sad.' ),
			'not_found_in_trash' => beer()->__( 'No beer in trash.' ),
		],
	],
] );

beer()->taxonomies()->add( 'taxonomy', [
	'post_type'   => 'beer',
	'id'          => 'style',
	'description' => 'Beer style',
	'name'        => 'Styles',
	'args'        => [
		'public'       => true,
		'show_in_rest' => true,
		'hierarchical' => true,
		'query_var'    => true,
		'rewrite'      => [ 'slug' => 'style' ],
		'labels'       => [
			'name'              => beer()->__( 'Styles' ),
			'singular_name'     => beer()->__( 'Style' ),
			'search_items'      => beer()->__( 'Search Styles' ),
			'all_items'         => beer()->__( 'All Styles' ),
			'parent_item'       => beer()->__( 'Parent Style' ),
			'parent_item_colon' => beer()->__( 'Parent Style:' ),
			'edit_item'         => beer()->__( 'Edit Style' ),
			'update_item'       => beer()->__( 'Update Style' ),
			'add_new_item'      => beer()->__( 'Add New Style' ),
			'new_item_name'     => beer()->__( 'New Beer Style' ),
			'not_found'         => beer()->__( 'No styles found' ),
		],
	],
] );

beer()->scripts()->add( 'admin_scripts', [
	'handle'      => 'beer-editor',
	'src'         => beer()->js_url() . 'admin.js',
	'name'        => 'Beer Admin Script',
	'description' => 'Scripts specific to the block editor',
	'deps'        => beer()->dir() . 'build/admin.asset.php',
] );

add_action( 'admin_enqueue_scripts', fn () => beer()->scripts()->enqueue( 'admin_scripts' ) );

beer()->blocks()->add( 'beer_list', [
		'name'        => 'Beer List',
		'description' => 'Displays a list of beers.',
		'type'        => 'beer-list/beer-list', // See register_block_type
		'args'        => [],                    // See register_block_type
	]
);

beer()->loaders()->add( 'colors', [
	'registry' => 'Beer_List\Loaders\Colors',
] );

beer()->meta()->add( 'color', [
	'key'           => 'color',
	'description'   => 'The color of a beer',
	'name'          => 'Color',
	'default_value' => false,
	'type'          => 'post',
] );

add_filter( 'the_content', function () {
	var_dump( (array) beer()->colors() );
} );