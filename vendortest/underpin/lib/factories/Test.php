<?php

namespace Test\Factories;

use Test\Abstracts\Test;
use Test\Traits\Instance_Setter;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Test_Instance extends Test {

	use Instance_Setter;

	/**
	 * The callback to fire in setup.
	 *
	 * @since 1.2.0
	 *
	 * @var callable The callback.
	 */
	protected $setup_callback;

	/**
	 * Test_Instance constructor.
	 *
	 * @since 1.2.0
	 *
	 * @param array $args Arguments to set in this class
	 */
	public function __construct( $args = [] ) {
		$this->set_values( $args );
	}

	protected function _setup() {
		$this->set_callable( $this->setup_callback, $this );
	}

}