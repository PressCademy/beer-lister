/**
 * Beer List Block.
 *
 */

/**
 * Internal Dependencies
 */
import edit from './edit';

/**
 * WordPress Dependencies
 */
import { __ } from '@wordpress/i18n';

const name = 'beer-list/beer-list';

const settings = {
	title: __( 'Beer List', 'beer-list' ),
	description: __( 'Display a list of beers', 'beer-list' ),
	keywords: [
		__( 'Beer', 'beer-list' ),
		__( 'Menu', 'beer-list' ),
		__( 'List', 'beer-list' ),
	],
	category: 'beer-list',
	supports: {
		html: false,
	},
	edit,
	save() {
		return null;
	},
}
export { name, settings };