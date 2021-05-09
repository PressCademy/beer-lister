<?php
/**
 *
 * @param Beer_List\Blocks\Beer_List $template
 */

if ( ! isset( $template ) || ! $template instanceof Beer_List\Blocks\Beer_List ) {
	return;
}
$beers = $template->get_param( 'beers', [] );
?>
<div class="beer-wrapper <?= $template->get_param('wrapper_class','') ?>">
	<?php if ( ! empty( $beers ) ): ?>
		<?php foreach ( $beers as $beer ): ?>
			<?= $template->get_template( 'beer', [ 'beer' => $beer ] ) ?>
		<?php endforeach; ?>
	<?php else: ?>
		<?= $template->get_template( 'no-beer' ) ?>
	<?php endif; ?>
</div>