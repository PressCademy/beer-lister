/**
 * Beer List Edit Component.
 *
 * @since 1.0.0
 */

import { InspectorControls } from '@wordpress/block-editor';
import React, { useState } from '@wordpress/element';
import apiFetch from '@wordpress/api-fetch';
import { CustomSelectControl, PanelBody, PanelRow, RangeControl, ServerSideRender } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

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

	const [styles, setStyles] = useState( [] );
	const [isLoading, setIsLoading] = useState( false );
	const [srmValues, setSrmValues] = useState( [] );

	if ( !srmValues.length ) {
		new Promise( async ( res, rej ) => {
			const response = await apiFetch( {
				path: '/beer-list/v1/srm'
			} );

			setSrmValues( response );
		} );
	}

	const getStyles = () => {
		return new Promise( async ( res, rej ) => {

			const path = "/wp/v2/style?per_page=-1";
			const response = await apiFetch( {
				path
			} );

			const items = response.map( ( style ) => {
				return {
					key: style.id,
					value: style.id,
					name: style.name,
				}
			} )

			// Shove the default value in-front.
			items.unshift( {
				key: 0, value: 0, name: 'Any Style'
			} );

			setStyles( items );
			res();
		} );
	}

	const updateFilter = ( args ) => {

		args.srm = { ...attributes.srm, ...args.srm };
		args.abv = { ...attributes.abv, ...args.abv };
		args.ibu = { ...attributes.ibu, ...args.ibu };

		args = { ...attributes, ...args }

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

		args.posts_per_page = -1;

		setAttributes( args );

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
	}

	if ( false === isLoading ) {
		getStyles();
		setIsLoading( true );
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
							value={attributes.srm.min}
							onChange={( minSrm ) => updateFilter( { srm: { min: minSrm } } )}
							min={0}
							max={srmValues.length}
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							label={__( "Maximum SRM Value", 'beer' )}
							value={attributes.srm.max}
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
							value={attributes.abv.min}
							onChange={( minAbv ) => updateFilter( { abv: { min: minAbv } } )}
							min={0}
							max={100}
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							label={__( "Maximum ABV Value", 'beer' )}
							value={attributes.abv.max}
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
							value={attributes.ibu.min}
							onChange={( minIbu ) => updateFilter( { ibu: { min: minIbu } } )}
							min={1}
							max={150}
						/>
					</PanelRow>
					<PanelRow>
						<RangeControl
							label={__( "Maximum IBU Value", 'beer' )}
							value={attributes.ibu.max}
							onChange={( maxIbu ) => updateFilter( { ibu: { max: maxIbu } } )}
							min={1}
							max={150}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody title={__( 'Sort By', 'beer-list' )}>
					<PanelRow>
						<CustomSelectControl
							label={__( 'Sort By', 'beer-list' )}
							options={[
								{ key: 'abv', value: 'abv', name: __( 'ABV', 'beer-list' ) },
								{ key: 'ibu', value: 'ibu', name: __( 'IBU', 'beer-list' ) },
								{ key: 'srm', value: 'srm', name: __( 'SRM', 'beer-list' ) },
								{ key: 'post_title', value: 'post_title', name: __( 'Title', 'beer-list' ) }
							]}
							onChange={( e ) => {
								const update = {};
								const value = e.selectedItem.value

								if ( ['abv', 'ibu', 'srm'].includes( value ) ) {
									update.meta_key = value;
									update.orderby = 'meta_value';
								} else {
									update.meta_key = '';
									update.orderby = value;
								}

								return updateFilter( update );
							}}
						/>
					</PanelRow>
				</PanelBody>
				<PanelBody title={__( 'Sort', 'beer-list' )}>
					<PanelRow>
						<CustomSelectControl
							label={__( 'Sort By', 'beer-list' )}
							options={[
								{ key: 'ASC', value: 'ASC', name: __( 'Ascending', 'beer-list' ) },
								{ key: 'DESC', value: 'DESC', name: __( 'Descending', 'beer-list' ) }
							]}
							onChange={e => updateFilter( { order: e.selectedItem.value } )}
						/>
					</PanelRow>
				</PanelBody>
			</InspectorControls>
			<ServerSideRender block="beer-list/beer-list" attributes={attributes}/>
		</>
	);
}

export default BeerList;