<?php

namespace Test_Rest_Endpoints\Factories;


use Test\Traits\Instance_Setter;
use Test_Rest_Endpoints\Abstracts\Rest_Endpoint;
use WP_REST_Request;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Rest_Endpoint_Instance extends Rest_Endpoint {

	use Instance_Setter;

	protected $has_permission_callback;
	protected $endpoint_callback;

	public function __construct( $args ) {
		$this->set_values( $args );

		parent::__construct();
	}

	function endpoint( WP_REST_Request $request ) {
		return $this->set_callable( $this->endpoint_callback, $request );
	}

	function has_permission( WP_REST_Request $request ) {
		return $this->set_callable( $this->has_permission_callback, $request );
	}

}