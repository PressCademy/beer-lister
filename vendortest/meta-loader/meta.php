<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
	require_once( plugin_dir_path( __FILE__ ) . 'lib/abstracts/Meta_Record_Type.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'lib/factories/Meta_Record_Type_Instance.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'lib/loaders/Meta.php' );
	Test\test()->get( $file, $class )->loaders()->add( 'meta', [
		'registry' => 'Test_Meta\Loaders\Meta',
	] );
}, 10, 2 );