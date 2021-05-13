<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Rest_Endpoint.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Rest_Endpoint_Instance.php' );
	Test\test()->get( $file, $class )->loaders()->add( 'rest_endpoints', [
		'instance' => 'Test_Rest_Endpoints\Abstracts\Rest_Endpoint',
		'default'  => 'Test_Rest_Endpoints\Factories\Rest_Endpoint_Instance',
	] );
}, 10, 2 );