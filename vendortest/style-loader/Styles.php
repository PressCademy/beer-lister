<?php
/**
 * Style Loader
 *
 * @since   1.0.0
 * @package Test\Registries\Loaders
 */


namespace Test_Styles\Loaders;

use Test\Abstracts\Registries\Loader_Registry;
use Test_Styles\Abstracts\Style;
use WP_Error;
use function Test\test;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Styles
 * Loader for styles
 *
 * @since   1.0.0
 * @package Test\Registries\Loaders
 */
class Styles extends Loader_Registry {

	/**
	 * @inheritDoc
	 */
	protected $abstraction_class = '\Test_Styles\Abstracts\Style';

	protected $default_factory = '\Test_Styles\Factories\Style_Instance';

	/**
	 * @inheritDoc
	 */
	protected function set_default_items() {}

	/**
	 * @param string $key
	 * @return Style|WP_Error Script Resulting script class, if it exists. WP_Error, otherwise.
	 */
	public function get( $key ) {
		return parent::get( $key );
	}

	/**
	 * Enqueues a script.
	 * This is essentially a wrapper for wp_localize_script and wp_enqueue_script.
	 * The script is only localized if the class specifies localized values to pass.
	 * The script uses the value of $handle to set the variable in Javascript.
	 *
	 * @since 1.0.0
	 *
	 * @param string $handle The script that should be enqueued.
	 * @return true|WP_Error True if the style was enqueued, a WP Error otherwise.
	 */
	public function enqueue( $handle ) {
		$style = $this->get( $handle );
		if ( $style instanceof Style ) {
			$style->enqueue();

			return true;
		} else {
			return test()->logger()->log_as_error(
				'error',
				'style_not_enqueued',
				'The specified style could not be enqueued because it has not been registered.',
				$handle
			);
		}
	}
}