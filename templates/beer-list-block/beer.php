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

$beer = $template->get_param( 'beer' );

$srm   = beer()->meta()->get( 'srm' )->get( $beer->ID, true );
$ibu   = beer()->meta()->get( 'ibu' )->get( $beer->ID, true );
$abv   = beer()->meta()->get( 'abv' )->get( $beer->ID, true );
$style = wp_get_post_terms( $beer->ID, 'style' );

if ( empty( $style ) ) {
	$style       = '';
	$style_class = '';
} else {
	$style       = $style[0];
	$style_class = $style->slug;
}

$args = [ 'beer' => $beer, 'srm' => $srm, 'ibu' => $ibu, 'style' => $style->slug ];
?>
<article class="srm-<?= $srm ?> ibu-<?= $ibu ?> style-<?= $style_class ?>">
	<?= $template->get_template( 'srm-icon', $args ) ?>
	<div class="beer-info">
		<h3><a href="<?= get_post_permalink( $beer ) ?>"><?= get_the_title( $beer ) ?></a></h3>
		<em><?= get_the_excerpt( $beer ) ?></em>
		<dl class="beer-stats">
			<dt>ABV:</dt>
			<dd><?= $abv ?>%</dd>
			<dt>IBU:</dt>
			<dd><?= $ibu ?> </dd>
			<dt>Style:</dt>
			<dd><a href="<?= get_term_link( $style->term_id ) ?>"><?= $style->name ?></a></dd>
		</dl>
	</div>
</article>