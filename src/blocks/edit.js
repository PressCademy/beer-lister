/**
 * Beer List Edit Component.
 *
 * @since 1.0.0
 */

import { InspectorControls } from '@wordpress/block-editor';
import React, { useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import { CustomSelectControl, PanelBody, PanelRow } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { addQueryArgs } from "@wordpress/url";


/**
 * Beer List.
 *
 * Beer list edit block.
 *
 * @since 1.0.0
 *
 * @param {object}   attributes    Block attributes.
 * @param {function} setAttributes Method used to set the attributes for this component in the global scope.
 * @returns {JSX.Element}          The rendered component.
 */
function BeerList( { attributes, setAttributes } ) {

	const [beerList, setBeer] = useState( [] );
	const [styles, setStyles] = useState( [] );
	const [isLoading, setIsLoading] = useState( false );


	const getBeers = ( args = {} ) => {
		new Promise( async ( res, rej ) => {
			setIsLoading( 'loading' );

			const url = 'wp/v2/beer';

			args = Object.keys( args ).reduce( ( acc, key ) => {
				if ( false !== args[key] ) {
					acc[key] = args[key];
				}

				return acc;
			}, {} );

			const response = await apiFetch( {
				path: addQueryArgs( url, args ),
			} );

			setBeer( response );

			setIsLoading( 'loaded' );
			res();
		} );
	}

	const getStyles = () => {
		return new Promise( async ( res, rej ) => {

			const path = "/wp/v2/style";
			const response = await apiFetch( {
				path
			} );

			const items = response.map( ( style ) => {
				return {
					key: style.id,
					value: style.id,
					name: style.name
				}
			} )

			// Shove the default value in-front.
			items.unshift({
				key: 0, value: false, name: 'Any Style'
			});

			setStyles( items );
			res();
		} );
	}

	const Beer = ( props ) => {
		return (
			<li>
				<h3>{props.beer.title.rendered}</h3>
				<em>{props.beer.excerpt.rendered}</em>
			</li>
		)
	};

	const BeerList = () => {
		if ( 'loaded' !== isLoading ) {
			return ( <span>Loading...</span> );
		} else {
			return (
				<ol>
					{beerList.map( beer => <Beer beer={beer}/> )}
				</ol>
			);
		}
	}

	if ( false === isLoading ) {
		getBeers();
		getStyles();
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={__( 'Filter Options', 'beer-list' )}>
					<PanelRow>
						<CustomSelectControl
							label={__( 'Style', 'beer-list' )}
							options={styles}
							onChange={( e ) => getBeers( { style: e.selectedItem.value } )}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<BeerList/>
		</>
	);
}

export default BeerList;