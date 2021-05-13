<?php

namespace Test_Taxonomies\Factories;


use Test\Traits\Instance_Setter;
use Test_Taxonomies\Abstracts\Taxonomy;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Taxonomy_Instance extends Taxonomy {

	use Instance_Setter;

	public function __construct( $args ) {
		$this->set_values( $args );
	}

}