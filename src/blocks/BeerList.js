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
	attributes: {
		abv: {
			type: 'object',
			default: { min: 0, max: 20 }
		},
		ibu: {
			type: 'object',
			default: { min: 0, max: 150 }
		},
		srm: {
			type: 'object',
			default: { min: 0, max: 40 }
		},
		style: {
			type: 'integer',
			default: 0
		},
		posts_per_page: {
			type: 'integer',
			default: -1
		},
		order:{
			type: 'string',
			default: 'ASC',
		},
		orderby: {
			type: 'string',
			default: ''
		},
		meta_key: {
			type: 'string',
			default: ''
		},
		on_tap: {
			type: 'boolean',
			default: false
		}
	},
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