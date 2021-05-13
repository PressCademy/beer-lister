<?php
/**
 * Script Factory
 *
 * @since   1.0.0
 * @package Test\Abstracts
 */


namespace Test_Scripts\Factories;


use Test\Traits\Instance_Setter;
use Test_Scripts\Abstracts\Script;
use function Test\test;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Script_Instance
 * Handles creating custom admin bar menus
 *
 * @since   1.0.0
 * @package Test\Abstracts
 */
class Script_Instance extends Script {
	use Instance_Setter;

	public function __construct( $args = [] ) {
		// Override default params.
		$this->set_values( $args );

		parent::__construct();
	}

}