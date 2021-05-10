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

$srm   = get_beer_srm( $beer->ID );
$ibu   = get_beer_ibu( $beer->ID );
$abv   = get_beer_abv( $beer->ID );
$style = get_beer_style( $beer->ID );

if ( is_wp_error( $style ) ) {
	$style       = '';
	$style_class = '';
} else {
	$style_class = $style->slug;
}

$args = [ 'beer' => $beer, 'srm' => $srm, 'ibu' => $ibu, 'style' => $style ];
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
			<?php if ( ! is_wp_error( $style ) ): ?>
				<dt>Style:</dt>
				<dd><a href="<?= get_term_link( $style->term_id ) ?>"><?= $style->name ?></a></dd>
			<?php endif; ?>
		</dl>
	</div>
</article>