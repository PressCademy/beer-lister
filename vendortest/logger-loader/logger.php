<?php

use function Test\test;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Add this loader.
add_action( 'test/before_setup', function ( $file, $class ) {
		require_once( plugin_dir_path( __FILE__ ) . 'lib/abstracts/registries/Event_Registry.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/loaders/Logger.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/abstracts/Event_Type.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/factories/Event_Type_Instance.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/cron-jobs/Purge_Logs.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/abstracts/Writer.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/factories/Basic_Logger.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/factories/Log_Item.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/decisions/event-type-purge-frequency/Event_Type.php' );
		require_once( plugin_dir_path( __FILE__ ) . 'lib/decisions/event-type-purge-frequency/Event_Type_Purge_Frequency.php' );

		// Add the logger.
		Test\test()->get( $file, $class )->loaders()->add( 'logger', [
			'registry' => 'Test_Logger\Loaders\Logger',
		] );

		// Setup Cron jobs
		Test\test()->get( $file, $class )->cron_jobs()->add( 'purge_logs', 'Test_Logger\Cron_Jobs\Purge_Logs' );

		// Setup Decision Lists
		Test\test()->get( $file, $class )->decision_lists()->add( 'event_type_purge_frequency', 'Test_Logger\Decisions\Event_Type_Purge_Frequency\Event_Type_Purge_Frequency' );
}, 5, 2 );