<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
		require_once( plugin_dir_path( __FILE__ ) . 'Script.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'Scripts.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'Script_Instance.php' );
		Test\test()->get( $file, $class )->loaders()->add( 'scripts', [
			'registry' => 'Test_Scripts\Loaders\Scripts',
		] );
}, 5, 2 );