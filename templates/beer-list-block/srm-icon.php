<?php
/**
 *
 * @param Beer_List\Blocks\Beer_List $template
 */

if ( ! isset( $template ) ||
		 ! $template instanceof Beer_List\Blocks\Beer_List ||
		 ! $template->get_param( 'beer', '' ) instanceof \WP_Post ) {
	return;
}

$beer  = $template->get_param( 'beer' );
$color = beer()->colors()->beer_color( $beer->ID );

// If the color could not be found, just return an empty string.
if ( ! $color instanceof \Beer_List\Abstracts\Color ) {
	return '';
}
?>
<span class="srm-icon" style="background-color: <?= $color->color; ?>"></span>