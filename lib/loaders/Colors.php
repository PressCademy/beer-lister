<?php

namespace Beer_List\Loaders;

use Underpin\Abstracts\Registries\Loader_Registry;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class Colors extends Loader_Registry {

	/**
	 * The abstraction class name.
	 * This is used to validate that the items in this service locator are extended
	 * from the correct abstraction.
	 *
	 * @since 1.0.0
	 * @var string The name of the abstract class this service locator uses.
	 */
	protected $abstraction_class = 'Beer_List\Abstracts\Color';

	/**
	 * The default factory name.
	 * When generating a new instance without specifying a class, this factory will be used by default.
	 *
	 * @since 1.2.0
	 * @var string The name of the abstract class this service locator uses.
	 */
	protected $default_factory = 'Beer_List\Factories\Color_Instance';

	protected function set_default_items() {

		$colors = [ '#FCEABC', '#F9DB99', '#F6CC76', '#F1BB57', '#ECAC3C', '#E79C23', '#DF8D05', '#D87F06', '#CE7304',
			'#CA6704', '#C05C04', '#B75103', '#AF4A03', '#A84003', '#A03903', '#983203', '#902B05', '#892502', '#851F02',
			'#7B1B02', '#761605', '#6F1102', '#6A0D02', '#630904', '#5E0001', '#590001', '#540001', '#500001', '#4C0001',
			'#470001', '#450001', '#410004', '#3D0001', '#390001', '#360004', '#330001', '#300001', '#2E0401', '#2C0004',
			'#200004' ];

		foreach ( $colors as $key => $hex ) {
			$srm = $key + 1;
			$this->add( $srm, compact( 'srm', 'hex' ) );
		}
	}

	/**
	 * Fetches a list of registered colors that have been used by any beer.
	 *
	 * @since 1.0.0
	 *
	 * @return array List of colors that have been used by any beer.
	 */
	public function get_used_colors() {

		// First, retrieve the list of beers that have a color set.
		$beers = beer()->custom_post_types()->get( 'beer' )->query( [
			'posts_per_page' => -1,
			'fields'         => 'ids',
			'meta_query'     => [
				[
					'key'     => 'color',
					'compare' => 'EXISTS',
				],
			],
		] );

		// Next, retrieve the color for each of these fields.
		$colors = [];
		foreach ( $beers as $beer_id ) {
			$colors[] = beer()->meta()->get_meta( 'color', $beer_id );
		}

		// Finally, filter our color objects for colors that are set.
		return $this->filter( [ 'color__in' => array_unique( $colors ) ] );
	}

}