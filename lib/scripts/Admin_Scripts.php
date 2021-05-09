<?php

namespace Beer_List\Scripts;

use Underpin_Scripts\Abstracts\Script;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Admin_Scripts extends Script {

	protected $handle      = 'beer-editor';
	public    $name        = 'Beer Admin Script';
	public    $description = 'Scripts specific to the beer post type';

	public function __construct() {
		$this->src  = beer()->js_url() . 'admin.js';
		$this->deps = beer()->dir() . 'build/admin.asset.php';

		parent::__construct();
	}

	public function do_actions() {
		parent::do_actions();

		// Enqueue this script on the admin.
		add_action( 'admin_enqueue_scripts', fn () => $this->enqueue() );
	}

}