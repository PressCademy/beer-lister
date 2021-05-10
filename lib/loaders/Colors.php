<?php

namespace Beer_List\Loaders;

use Beer_List\Abstracts\Color;
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

		foreach ( $colors as $key => $color ) {
			$srm = $key + 1;
			$this->add( $srm, [ 'name' => "SRM value $srm", 'srm' => $srm, 'color' => $color ] );
		}
	}

	public function beer_color( $id ) {
		return $this->get_srm_color( get_beer_srm( $id ) );
	}

	public function get_srm_color( $srm ) {
		$color = $this->filter( [ 'srm' => $srm ] );

		if ( count( $color ) <= 0 ) {
			return beer()->logger()->log_as_error(
				'error',
				'beer_color_not_found',
				'The provided srm color could not be found',
				[ 'srm' => $srm, 'found_colors' => $color ]
			);
		}

		return array_pop( $color );
	}

	/**
	 * @param string $key
	 *
	 * @return Color|\WP_Error
	 */
	public function get( $key ) {
		return parent::get( $key );
	}

}