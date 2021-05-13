<?php
/**
 * Core functionality for Test
 *
 * @since
 * @package
 */


namespace Test;


use Test\Abstracts\Test;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'Test\test' ) ) {

	require_once( plugin_dir_path( __FILE__ ) . 'autoload.php' );


	/**
	 * Fetches the instance of the plugin.
	 * This function makes it possible to access everything else in this plugin.
	 * It will automatically initiate the plugin, if necessary.
	 * It also handles autoloading for any class in the plugin.
	 *
	 * @since 1.0.0
	 *
	 * @return Test|Abstracts\Test The bootstrap for this plugin
	 */
	function test() {
		return Test::make_class()->get( __FILE__ );
	}
}