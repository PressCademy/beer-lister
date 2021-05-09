import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { ColorPalette, PanelRow } from '@wordpress/components';
import React, { useState } from '@wordpress/element';
import { select, dispatch } from '@wordpress/data';

const SRMValues = () => {
	const meta = select( 'core/editor' ).getCurrentPostAttribute( 'meta' );

	const [color, setColor] = useState( '' );

	const colors = [
		{ name: 'red', color: '#f00', srm: 1 },
		{ name: 'white', color: '#fff', srm: 2 },
		{ name: 'blue', color: '#00f', srm: 3 },
	];

	function updateColor( color ) {
		setColor( { color } );

		const colorObject = colors.find( colorObject => color === colorObject.color );

		dispatch( 'core/editor' ).editPost( { meta: { ...meta, ...{ srm: colorObject.srm } } } )
	}

	return (
		<ColorPalette
			colors={colors}
			value={color}
			onChange={( color ) => updateColor( color )}
		/>
	);
}

function BeerData() {

	return (
		<PluginDocumentSettingPanel
			name="beer-info"
			title="Beer Info"
			className="beer-info"
		>
			<PanelRow>
				<SRMValues/>
			</PanelRow>
		</PluginDocumentSettingPanel>
	)
}

export default BeerData