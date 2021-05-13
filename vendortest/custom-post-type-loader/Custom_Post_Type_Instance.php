<?php
/**
 * Custom_Post_Type Factory
 *
 * @since   1.0.0
 * @package Test\Abstracts
 */


namespace Test_Custom_Post_Types\Factories;


use Test\Traits\Instance_Setter;
use Test_Custom_Post_Types\Abstracts\Custom_Post_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Custom_Post_Type_Instance
 * Handles creating custom admin bar menus
 *
 * @since   1.0.0
 * @package Test\Abstracts
 */
class Custom_Post_Type_Instance extends Custom_Post_Type {
	use Instance_Setter;

	/**
	 * Custom_Post_Type_Instance constructor.
	 *
	 * @param array $args Overrides to default args in the object
	 */
	public function __construct( array $args = [] ) {
		$this->set_values( $args );
	}

}