<?php
/**
 *
 * @param Beer_List\Blocks\Beer_List $template
 */

if ( ! isset( $template ) || ! $template instanceof Beer_List\Blocks\Beer_List ) {
	return;
}
?>
<p>No beers matching your criteria were found.</p>