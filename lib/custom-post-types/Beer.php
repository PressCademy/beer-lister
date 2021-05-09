<?php

namespace Beer_List\Custom_Post_Types;

use Underpin_Custom_Post_Types\Abstracts\Custom_Post_Type;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Beer extends Custom_Post_Type {

	protected $type        = 'beer';
	public    $name        = 'Beer';
	public    $description = 'Lists beers as a custom post type';

	public function __construct() {
		$this->args = [
			'public'          => true,
			'capability_type' => 'post',
			'can_export'      => true,
			'show_in_rest'    => true,
			'supports'        => [ 'title', 'editor', 'excerpt', 'custom-fields' ],
			'labels'          => [
				'name'               => beer()->__( 'Beers' ),
				'singular_name'      => beer()->__( 'Beer' ),
				'label'              => beer()->__( 'Beers' ),
				'add_new'            => beer()->__( 'Add new beer' ),
				'add_new_item'       => beer()->__( 'Add new beer' ),
				'new_item'           => beer()->__( 'New beer' ),
				'edit_item'          => beer()->__( 'Edit beer' ),
				'view_item'          => beer()->__( 'View beer' ),
				'all_items'          => beer()->__( 'All beer' ),
				'search_items'       => beer()->__( 'Search beers' ),
				'not_found'          => beer()->__( 'No beer found. Sad.' ),
				'not_found_in_trash' => beer()->__( 'No beer in trash.' ),
			],
		];
	}

	public function do_actions() {
		parent::do_actions();
		$this->setup_meta();
		$this->setup_taxonomies();
	}

	private function setup_taxonomies() {

		/**
		 * Setup Taxonomies
		 */
		beer()->taxonomies()->add( 'taxonomy', [
			'post_type'   => $this->type,
			'id'          => 'style',
			'description' => 'Beer style',
			'name'        => 'Styles',
			'args'        => [
				'public'       => true,
				'show_in_rest' => true,
				'hierarchical' => true,
				'query_var'    => true,
				'rewrite'      => [ 'slug' => 'style' ],
				'labels'       => [
					'name'              => beer()->__( 'Styles' ),
					'singular_name'     => beer()->__( 'Style' ),
					'search_items'      => beer()->__( 'Search Styles' ),
					'all_items'         => beer()->__( 'All Styles' ),
					'parent_item'       => beer()->__( 'Parent Style' ),
					'parent_item_colon' => beer()->__( 'Parent Style:' ),
					'edit_item'         => beer()->__( 'Edit Style' ),
					'update_item'       => beer()->__( 'Update Style' ),
					'add_new_item'      => beer()->__( 'Add New Style' ),
					'new_item_name'     => beer()->__( 'New Beer Style' ),
					'not_found'         => beer()->__( 'No styles found' ),
				],
			],
		] );

	}

	/**
	 * Registers a meta field to this post type.
	 *
	 * This is essentially a wrapper for beer()->meta()->add, but it adds sane defaults specific to this post type.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key  The key to register
	 * @param array  $args The arguments to use to register the field.
	 */
	public function add_meta_field( $key, $args ) {
		$defaults = [
			'key'          => $key,
			'subtype'      => $this->type,
			'type'         => 'post',
			'show_in_rest' => true,
			'single'       => true,
			'has_permission_callback' => fn () => current_user_can( 'edit_posts' ),
		];

		$args = wp_parse_args( $args, $defaults );

		beer()->meta()->add( $key, $args );
	}

	/**
	 * Register core meta fields.
	 */
	private function setup_meta() {

		// Set up related meta, and taxonomies
		$this->add_meta_field( 'srm', [
			'description'             => 'The SRM (color) of a beer',
			'name'                    => 'SRM',
			'default_value'           => 25,
			'field_type'              => 'integer',
			'sanitize_callback'       => function ( $meta_value, $meta_key, $object_type ) {
				$valid_color = ! empty( beer()->colors()->filter( [ 'srm' => $meta_value ] ) );

				if ( true === $valid_color ) {
					return $meta_value;
				}

				return $this->default_value;
			},
		] );

		/**
		 * Setup ABV
		 */
		$this->add_meta_field( 'abv', [
			'description'             => 'The alcohol by volume of a beer',
			'name'                    => 'ABV',
			'default_value'           => 12,
			'field_type'              => 'number',
		] );

		/**
		 * Setup IBU
		 */
		beer()->meta()->add( 'ibu', [
			'description'             => 'The international bitterness units of a beer',
			'name'                    => 'ABV',
			'default_value'           => 12,
			'field_type'              => 'integer',
			'sanitize_callback'       => 'absint',
		] );
	}

}