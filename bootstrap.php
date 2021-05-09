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
 * Setup Custom Post Types, taxonomies, and meta specific to this post type
 */
beer()->custom_post_types()->add( 'beer', 'Beer_List\Custom_Post_Types\Beer' );

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


beer()->rest_endpoints()->add( 'srm', [
	'endpoint_callback'       => fn ( \WP_REST_Request $request ) => array_values( (array) beer()->colors() ),
	'has_permission_callback' => '__return_true',
	'rest_namespace'          => 'beer-list/v1',
	'route'                   => 'srm',
	'args'                    => [ 'methods' => 'GET' ],
] );