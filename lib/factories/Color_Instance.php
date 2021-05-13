<?php

namespace Beer_List\Factories;

use Beer_List\Abstracts\Color;
use Beercore\Traits\Instance_Setter;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Color_Instance extends Color {

	use Instance_Setter;

	public function __construct( $args ) {
		$this->set_values( $args );
	}

}