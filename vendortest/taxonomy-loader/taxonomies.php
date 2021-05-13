<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Taxonomy.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Taxonomy_Instance.php' );
	Test\test()->get( $file, $class )->loaders()->add( 'taxonomies', [
		'instance' => 'Test_Taxonomies\Abstracts\Taxonomy',
		'default'  => 'Test_Taxonomies\Factories\Taxonomy_Instance',
	] );
}, 10, 2 );