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

/**
 * Setup Custom Post Types
 */
beer()->custom_post_types()->add( 'beer', [
	'type'        => 'beer',
	'name'        => 'Beer',
	'description' => 'Lists beers as a custom post type',
	'args'        => [
		'public'          => true,
		'capability_type' => 'post',
		'can_export'      => true,
		'show_in_rest'    => true,
		'supports'        => [ 'title', 'editor', 'excerpt', 'custom-fields' ],
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

/**
 * Setup Taxonomies
 */
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

/**
 * Setup Scripts
 */
beer()->scripts()->add( 'admin_scripts', 'Beer_List\Scripts\Admin_Scripts' );

/**
 * Setup Blocks
 */
beer()->blocks()->add( 'beer_list', [
		'name'        => 'Beer List',
		'description' => 'Displays a list of beers.',
		'type'        => 'beer-list/beer-list',
		'args'        => [],
	]
);

/**
 * Setup Colors
 */
beer()->loaders()->add( 'colors', [
	'registry' => 'Beer_List\Loaders\Colors',
] );

beer()->meta()->add( 'srm', [
	'key'                     => 'srm',
	'subtype'                 => 'beer',
	'description'             => 'The SRM (color) of a beer',
	'name'                    => 'SRM',
	'default_value'           => 25,
	'type'                    => 'post',
	'show_in_rest'            => true,
	'field_type'              => 'integer',
	'single'                  => true,
	'sanitize_callback'       => function ( $meta_value, $meta_key, $object_type ) {
		$valid_color = ! empty( beer()->colors()->filter( [ 'srm' => $meta_value ] ) );

		if ( true === $valid_color ) {
			return $meta_value;
		}

		return $this->default_value;
	},
	'has_permission_callback' => fn () => current_user_can( 'edit_posts' ),
] );

beer()->rest_endpoints()->add( 'srm', [
	'endpoint_callback'       => fn ( \WP_REST_Request $request ) => array_values( (array) beer()->colors() ),
	'has_permission_callback' => '__return_true',
	'rest_namespace'          => 'beer-list/v1',
	'route'                   => 'srm',
	'args'                    => [ 'methods' => 'GET' ],
] );

/**
 * Setup ABV
 */
beer()->meta()->add('abv', [
	'key'                     => 'abv',
	'subtype'                 => 'beer',
	'description'             => 'The alcohol by volume of a beer',
	'name'                    => 'ABV',
	'default_value'           => 12,
	'type'                    => 'post',
	'show_in_rest'            => true,
	'field_type'              => 'number',
	'single'                  => true,
	'has_permission_callback' => fn () => current_user_can( 'edit_posts' ),
] );

/**
 * Setup IBU
 */
beer()->meta()->add('ibu', [
	'key'                     => 'ibu',
	'subtype'                 => 'beer',
	'description'             => 'The international bitterness units of a beer',
	'name'                    => 'ABV',
	'default_value'           => 12,
	'type'                    => 'post',
	'show_in_rest'            => true,
	'field_type'              => 'integer',
	'single'                  => true,
	'sanitize_callback'       => 'absint',
	'has_permission_callback' => fn () => current_user_can( 'edit_posts' ),
] );