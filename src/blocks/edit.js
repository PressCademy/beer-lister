/**
 * Beer List Edit Component.
 *
 * @since 1.0.0
 */

import { InspectorControls } from '@wordpress/block-editor';
import React, { useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import { CustomSelectControl, PanelBody, PanelRow, RangeControl, CheckboxControl } from '@wordpress/components';
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
	const [filter, setFilter] = useState( { srm: { min: 0, max: 40 }, abv: { min: 0, max: 100 }, ibu: { min: 0, max: 150 } } );
	const [srmValues, setSrmValues] = useState( [] );

	if ( !srmValues.length ) {
		new Promise( async ( res, rej ) => {
			const response = await apiFetch( {
				path: '/beer-list/v1/srm'
			} );

			setSrmValues( response );
		} );
	}

	const getBeers = ( args ) => {
		new Promise( async ( res, rej ) => {
			setIsLoading( 'loading' );

			const url = 'wp/v2/beer';

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
			items.unshift( {
				key: 0, value: false, name: 'Any Style'
			} );

			setStyles( items );
			res();
		} );
	}

	const Beer = ( props ) => {
		return (
			<li>
				<h3>{props.beer.title.rendered}</h3>
				<span dangerouslySetInnerHTML={{ __html: props.beer.excerpt.rendered }}/>
			</li>
		)
	};

	const BeerList = () => {
		if ( 'loaded' !== isLoading ) {
			return ( <span>Loading...</span> );
		} else {
			return (
				<ol>
					{beerList.map( beer => <Beer key={beer.id} beer={beer}/> )}
				</ol>
			);
		}
	}

	const updateFilter = ( args ) => {

		args.srm = { ...filter.srm, ...args.srm };
		args.abv = { ...filter.abv, ...args.abv };
		args.ibu = { ...filter.ibu, ...args.ibu };

		args = { ...filter, ...args }

		if ( args.srm.min > args.srm.max ) {
			args.srm.max = args.srm.min
		}

		if ( args.abv.min > args.abv.max ) {
			args.abv.max = args.abv.min
		}

		if ( args.ibu.min > args.ibu.max ) {
			args.ibu.max = args.ibu.min
		}

		if ( undefined !== args.style && false === args.style ) {
			delete args.style;
		}

		setFilter( args );

		args = Object.keys( args ).reduce( ( acc, argument ) => {

			// If we're working with any of these args, filter them out.
			if ( ['abv', 'ibu', 'srm'].includes( argument ) ) {
				const value = args[argument];
				if ( value.min !== 0 || value.max !== 0 ) {
					acc[argument] = value;
				}
			} else {
				acc[argument] = args[argument];
			}

			return acc;
		}, {} );

		getBeers( args );
	}

	if ( false === isLoading ) {
		getBeers();
		getStyles();
	}

	return (
		<>
			<InspectorControls>
				<PanelBody title={__( 'Filter Style', 'beer-list' )}>
					<PanelRow>
						<CustomSelectControl
							label={__( 'Style', 'beer-list' )}
							options={styles}
							onChange={( e ) => updateFilter( { style: e.selectedItem.value } )}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody title={__( 'Filter SRM', 'beer' )}>
					<PanelRow>
						<RangeControl
							label={__( "Minimum SRM Value", 'beer' )}
							value={filter.srm.min}
							onChange={( minSrm ) => updateFilter( { srm: { min: minSrm } } )}
							min={0}
							max={srmValues.length}
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							label={__( "Maximum SRM Value", 'beer' )}
							value={filter.srm.max}
							onChange={( maxSrm ) => updateFilter( { srm: { max: maxSrm } } )}
							min={0}
							max={srmValues.length}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody title={__( 'Filter ABV', 'beer-list' )}>
					<PanelRow>
						<RangeControl
							label={__( "Minimum ABV Value", 'beer' )}
							value={filter.abv.min}
							onChange={( minAbv ) => updateFilter( { abv: { min: minAbv } } )}
							min={0}
							max={100}
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							label={__( "Maximum ABV Value", 'beer' )}
							value={filter.abv.max}
							onChange={( maxAbv ) => updateFilter( { abv: { max: maxAbv } } )}
							min={1}
							max={100}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody title={__( 'Filter IBU', 'beer-list' )}>
					<PanelRow>
						<RangeControl
							label={__( "Minimum IBU Value", 'beer' )}
							value={filter.ibu.min}
							onChange={( minIbu ) => updateFilter( { ibu: { min: minIbu } } )}
							min={1}
							max={150}
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							label={__( "Maximum IBU Value", 'beer' )}
							value={filter.ibu.max}
							onChange={( maxIbu ) => updateFilter( { ibu: { max: maxIbu } } )}
							min={1}
							max={150}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<BeerList/>
		</>
	);
}

export default BeerList;