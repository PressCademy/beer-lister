<?php
/**
 * Settings Text Field
 *
 * @since 1.0.0
 * @package Test\Factories\Settings_Fields
 */


namespace Test\Factories\Settings_Fields;

use Test\Abstracts\Settings_Field;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Text
 *
 * @since 1.0.0
 * @package Test\Factories\Settings_Fields
 */
class Text extends Settings_Field {

	/**
	 * @inheritDoc
	 */
	function get_field_type() {
		return 'text';
	}

	/**
	 * @inheritDoc
	 */
	function sanitize( $value ) {
		return (string) $value;
	}
}