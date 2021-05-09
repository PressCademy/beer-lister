<?php

namespace Beer_List\Scripts;

use Underpin_Scripts\Abstracts\Script;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Beer_Blocks extends Script {

	protected $handle      = 'beer-blocks';
	public    $name        = 'Beer Blocks Script';
	public    $description = 'Scripts specific to the registered blocks in the editor';

	public function __construct() {
		$this->src  = beer()->js_url() . 'beer-admin.js';
		$this->deps = beer()->dir() . 'build/beer-admin.asset.php';

		parent::__construct();
	}

	public function do_actions() {
		parent::do_actions();

		// Enqueue this script on the beer admin page.
		add_action( 'admin_enqueue_scripts', function () {
			if ( get_post_type() === beer()->custom_post_types()->get( 'beer' )->type ) {
				$this->enqueue();
			}
		} );

		/**
		 * Setup Blocks
		 */
		beer()->blocks()->add( 'beer_list', [
				'name'        => 'Beer List',
				'description' => 'Displays a list of beers.',
				'type'        => 'beer-list/beer-list',
			]
		);
	}

}