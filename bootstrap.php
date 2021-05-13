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

use Beer_List\Beer;
use Beercore\Abstracts\Beercore;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );

// If the beer exists, log an error, add an admin notice, and bail.
if ( function_exists( 'beer' ) ) {
	\Beercore\Beercore()->logger()->log(
		'critical',
		'beer_plugin_conflict',
		'The beer plugin could not be set up - another plugin has declared a beer function.'
	);
} else {

// Load beer file
	require_once( plugin_dir_path( __FILE__ ) . 'lib/Beer.php' );

	/**
	 * Fetches the instance of the plugin.
	 * This function makes it possible to access everything else in this plugin.
	 * It will automatically initiate the plugin, if necessary.
	 * It also handles autoloading for any class in the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return \Beer_List\Beer|Beercore The bootstrap for this plugin.
	 */
	function beer() {
		return ( new Beer() )->get( __FILE__ );
	}

	// Start up the plugin.
	beer();

	/**
	 * Queries the database for beer.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args List of arguments to pass to the beer query.
	 *
	 * @return WP_Query The beer query.
	 */
	function get_beers( $args ) {
		return beer()->custom_post_types()->get( 'beer' )->query( $args );
	}

	/**
	 * Fetches the color from a beer's SRM value.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args List of arguments to pass to the beer query.
	 *
	 * @return WP_Query The beer query.
	 */
	function get_beer_color( $beer_id ) {
		return beer()->colors()->beer_color( $beer_id );
	}

	/**
	 * Retrieves a list of all beer colors.
	 *
	 * @since 1.0.0
	 *
	 * @return array list of beer color objects.
	 */
	function get_beer_colors() {
		return (array) beer()->colors();
	}

	/**
	 * Fetches the beer meta.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key The meta key
	 * @param int    $id  The beer ID
	 *
	 * @return mixed The meta value.
	 */
	function get_beer_meta( $key, $id ) {
		return beer()->meta()->get( $key )->get( $id, true );
	}

	/**
	 * Fetches the beer IBU.
	 *
	 * @since 1.0.0
	 *
	 * @param int $id The beer ID
	 *
	 * @return int The beer IBU
	 */
	function get_beer_ibu( $id ) {
		return (int) get_beer_meta( 'ibu', $id );
	}

	/**
	 * Fetches the beer IBU.
	 *
	 * @since 1.0.0
	 *
	 * @param int $id The beer ID
	 *
	 * @return float The beer ABV
	 */
	function get_beer_abv( $id ) {
		return (float) get_beer_meta( 'abv', $id );
	}

	/**
	 * Fetches the beer IBU.
	 *
	 * @since 1.0.0
	 *
	 * @param int $id The beer ID
	 *
	 * @return int The beer SRM
	 */
	function get_beer_srm( $id ) {
		return (int) get_beer_meta( 'srm', $id );
	}

	/**
	 * Fetches the beer style.
	 *
	 * @param int $id The Beer ID
	 *
	 * @return  WP_Term|WP_Error beer style, or WP_Error if the beer has no style set.
	 */
	function get_beer_style( $id ) {
		$style = wp_get_post_terms( $id, 'style' );

		if ( ! empty( $style ) ) {
			$style = $style[0];
		} else {
			$style = beer()->logger()->log_as_error(
				'notice',
				'beer_style_not_found',
				'The beer does not have a beer style set.',
				[ 'id' => $id ]
			);
		}

		return $style;
	}
}