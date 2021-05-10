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
beer()->scripts()->add( 'beer_admin_blocks', 'Beer_List\Scripts\Beer_Blocks' );

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

add_filter( 'the_content', function () {

	/**
	 * Command to reset database
	 * wp db reset && wp core install --admin_user=admin --admin_password=admin --admin_email=admin@admin.admin --skip-email --url=localhost:3000 --title=Beer
	 */
	$beers = beer()->custom_post_types()->get( 'beer' )->query( [ 'fields' => 'ids' ] );

	// Bail early if we already generated posts
	if ( is_array( $beers->posts ) && count( $beers->posts ) > 0 ) {
		return '';
	}

	// Disable error reporting. Faker throws deprecated notices on some versions of PHP
	error_reporting( 0 );

	// Create our faker instance
	// make sure to require this package first!
	// docker-compose run composer require fzaninotto/faker
	// See https://github.com/fzaninotto/Faker#fakerproviderlorem
	$faker = Faker\Factory::create();

	/**
	 * Beer styles to generate.
	 * This array was scraped from Wikipedia
	 */
	$beer_styles = [
		"Altbier",
		"Amber ale",
		"Barley wine",
		"Berliner Weisse",
		"Bière de Garde",
		"Bitter",
		"Blonde Ale",
		"Bock",
		"Brown ale",
		"California Common",
		"Cream Ale",
		"Dortmunder Export",
		"Doppelbock",
		"Dunkel",
		"Dunkelweizen",
		"Eisbock",
		"Flanders red ale",
		"Golden",
		"Gose",
		"Gueuze",
		"Hefeweizen",
		"Helles",
		"India pale ale",
		"Kölsch",
		"Lambic",
		"Light ale",
		"Maibock",
		"Malt liquor",
		"Mild",
		"Oktoberfestbier",
		"Old ale",
		"Oud bruin",
		"Pale ale",
		"Pilsener",
		"Porter",
		"Red ale",
		"Roggenbier",
		"Saison",
		"Scotch ale",
		"Stout",
		"Schwarzbier",
		"Vienna lager",
		"Witbier",
		"Weissbier",
		"Weizenbock",
	];


	// Loop through each beer style, and create the taxonomy terms for each style.
	$styles = [];
	foreach ( $beer_styles as $beer_style ) {
		$styles[] = beer()->taxonomies()->get( 'style' )->save( [ 'name' => $beer_style ] );
	}

	// Fetch the term ID
	$styles = wp_list_pluck( $styles, 'term_id' );

	$ids = [];
	// Generate 100 Beers
	for ( $i = 0; $i < 100; $i++ ) {
		$post_type_args = [
			'post_content' => $faker->paragraph(),
			'post_title'   => $faker->company,
			'post_status'  => 'publish',
			'tax_input'    => [ 'style' => $faker->randomElement( $styles ) ],
			'meta_input'   => [
				'srm' => $faker->numberBetween( 1, 40 ),   // Generate a random integer between 1 and 50
				'abv' => $faker->randomFloat( 2, 1, 15 ),  // Generate a random float between 1 and 15
				'ibu' => $faker->numberBetween( 10, 120 ), // Generate a random integer between 10 and 120
			],
		];

		$ids[] = beer()->custom_post_types()->get( 'beer' )->save( $post_type_args );
	}

	// Dump the postdata
	$posts = array_map( 'get_post', $ids );
	var_dump( $posts );
} );