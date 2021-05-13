<?php
/**
 * Determines how frequently an event type should purge
 *
 * @since   1.0.0
 * @package Test
 */


namespace Test_Logger\Decisions\Event_Type_Purge_Frequency;


use Test_Decision_Lists\Abstracts\Registries\Decision_List;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Event_Type_Purge_Frequency
 * Class Event_Type_Purge_Frequency
 *
 * @since   1.0.0
 * @package Test
 */
class Event_Type_Purge_Frequency extends Decision_List {

	public $name = 'Event Type Purge Frequency.';
	public $description = 'Determines how often an event type should be purged.';

	/**
	 * @inheritDoc
	 */
	protected function set_default_items() {
		$this->add( 'event_type', 'Test_Logger\Decisions\Event_Type_Purge_Frequency\Event_Type' );
	}
}