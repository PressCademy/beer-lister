/**
 * External dependencies
 */
import * as BeerList from './blocks/BeerList';

/**
 * WordPress dependencies
 */
import { registerBlockType } from '@wordpress/blocks';

// Register blocks.
[BeerList].forEach( ( { name, settings } ) => {
	registerBlockType( name, settings );
} );