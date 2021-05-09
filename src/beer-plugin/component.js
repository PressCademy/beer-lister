import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { ColorPalette, PanelRow } from '@wordpress/components';
import React, { useState } from '@wordpress/element';
import { select, dispatch } from '@wordpress/data';
import apiFetch from '@wordpress/api-fetch';

const SRMValues = () => {
	const meta = select( 'core/editor' ).getCurrentPostAttribute( 'meta' );
	const [color, setColor] = useState( 25 );
	const [srmValues, setSrmValues] = useState( false );

	// If srmValues haven't been fetched, go get 'em.
	if ( false === srmValues ) {
		setSrmValues( [] );
		new Promise( async ( res, rej ) => {
			const response = await apiFetch( {
				path: '/beer-list/v1/srm'
			} );

			setSrmValues( response );

			const srm = response.find( ( srm ) => {
				return srm.srm === wp.data.select( 'core/editor' ).getCurrentPostAttribute( 'meta' ).srm;
			} );

			setColor( srm.color );

			res();
		} );

	}

	function updateColor( color ) {
		const colorObject = srmValues.find( colorObject => color === colorObject.color );

		dispatch( 'core/editor' ).editPost( { meta: { ...meta, ...{ srm: colorObject.srm } } } )
		setColor( colorObject.color );
	}

	// Bail if the SRM values have not loaded yet.
	if ( false === srmValues || srmValues.length === 0 ) {
		return ( <em>Loading colors...</em> );
	}

	return (
			<ColorPalette
				colors={srmValues}
				value={color}
				onChange={( color ) => updateColor( color )}
			/>
	);
}

function BeerData() {

	return (
		<PluginDocumentSettingPanel
			name="beer-srm"
			title="SRM (color)"
			className="beer-srm"
		>
				<SRMValues/>
		</PluginDocumentSettingPanel>
	)
}

export default BeerData