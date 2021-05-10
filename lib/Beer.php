<?php

namespace Beer_List;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Beer_List\Loaders\Colors;
use Underpin\Abstracts\Underpin;
use Underpin\Factories\Loader_Registry_Item;
use Underpin_Blocks\Loaders\Blocks;
use Underpin_Meta\Loaders\Meta;
use Underpin_Scripts\Loaders\Scripts;
use Underpin_Styles\Loaders\Styles;

/**
 * Class Beer_Plugin_Instance
 *
 * @since    1.0.0
 *
 * @package  Beer_List\Factories
 * @method Loader_Registry_Item custom_post_types
 * @method Scripts scripts
 * @method Styles styles
 * @method Loader_Registry_Item rest_endpoints
 * @method Loader_Registry_Item taxonomies
 * @method Blocks blocks
 * @method Meta meta
 * @method Colors colors
 */
class Beer extends Underpin {

	public $root_namespace      = 'Beer_List';
	public $text_domain         = 'beer';
	public $minimum_php_version = '7.0';
	public $minimum_wp_version  = '5.1';
	public $version             = '1.0.0';

	protected function _setup() {
		/**
		 * Setup Custom Post Types, taxonomies, and meta specific to this post type
		 */
		$this->custom_post_types()->add( 'beer', 'Beer_List\Custom_Post_Types\Beer' );

		/**
		 * Setup Scripts
		 */
		$this->scripts()->add( 'admin_scripts', 'Beer_List\Scripts\Admin_Scripts' );
		$this->scripts()->add( 'beer_admin_blocks', 'Beer_List\Scripts\Beer_Blocks' );

		/**
		 * Setup Colors
		 */
		$this->loaders()->add( 'colors', [
			'registry' => 'Beer_List\Loaders\Colors',
		] );

		$this->rest_endpoints()->add( 'srm', [
			'endpoint_callback'       => fn ( \WP_REST_Request $request ) => array_values( get_beer_colors() ),
			'has_permission_callback' => '__return_true',
			'rest_namespace'          => 'beer-list/v1',
			'route'                   => 'srm',
			'args'                    => [ 'methods' => 'GET' ],
		] );
	}
}