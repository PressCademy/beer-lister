<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
	require_once( plugin_dir_path( __FILE__ ) . 'Cron_Job.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'Cron_Job_Instance.php' );
	Test\test()->get( $file, $class )->loaders()->add( 'cron_jobs', [
		'instance' => 'Test_Cron_Jobs\Abstracts\Cron_Job',
		'default'  => 'Test_Cron_Jobs\Factories\Cron_Job_Instance',
	] );
}, 4, 2 );