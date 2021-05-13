<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Style.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Styles.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Style_Instance.php' );
	Test\test()->get( $file, $class )->loaders()->add( 'styles', [
		'registry' => 'Test_Styles\Loaders\Styles',
	] );
}, 5, 2 );