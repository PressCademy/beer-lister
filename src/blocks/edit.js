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
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={__( 'Style', 'beer-list' )}>
					<PanelRow>
						<CustomSelectControl
							label={__( 'Style', 'beer-list' )}
							options={[
								{ key: 'any', value: false, name: 'Any' },
								{ key: 'stout', value: 2, name: 'Stout' },
								{ key: 'ipa', value: 3, name: 'IPA' }
							]}
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