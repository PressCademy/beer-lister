<?php

namespace Test\Traits;

use Test\Abstracts\Test;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

trait With_Parent {

	protected $parent_id;

	public function parent() {
		return Test::get_by_id( $this->parent_id );
	}

}