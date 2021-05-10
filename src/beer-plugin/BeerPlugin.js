import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { ToggleControl } from '@wordpress/components';
import SRMValues from './components/SRMValues';
import MetaNumberField from './components/MetaNumberField';
import { __ } from '@wordpress/i18n'
import { select, dispatch } from '@wordpress/data';
import { withState } from '@wordpress/compose';

function BeerPlugin() {

	const OnTap = withState( {
		onTap: select( 'core/editor' ).getEditedPostAttribute( 'meta' ).on_tap || false,
	} )( ( { onTap, setState } ) => (
		<ToggleControl
			metaKey='on_tap'
			label={__( "On Tap", 'beer' )}
			help={__( 'Is this beer currently on-tap?.', 'beer' )}
			checked={onTap}
			onChange={( on_tap ) => {
				setState( { onTap: on_tap } );
				dispatch( 'core/editor' )
					.editPost( { meta: { ...select( 'core/editor' ).getEditedPostAttribute( 'meta' ), ...{ on_tap } } } )
			}}
		/>
	) );

	return (
		<>
			<PluginDocumentSettingPanel
				name="beer-srm"
				title="SRM (color)"
				className="beer-srm"
			>
				<SRMValues/>
			</PluginDocumentSettingPanel>
			<PluginDocumentSettingPanel
				name="beer-abv"
				title="ABV"
				className="abv"
			>
				<MetaNumberField
					metaKey='abv'
					label={__( "ABV", 'beer' )}
					description={__( 'The alcohol by volume value.', 'beer' )}
					min={0}
					max={100}
					step={.01}
				/>
			</PluginDocumentSettingPanel>
			<PluginDocumentSettingPanel
				name="beer-ibu"
				title="IBU"
				className="ibu"
			>
				<MetaNumberField
					metaKey='ibu'
					label={__( "IBU", 'beer' )}
					description={__( 'The international bitterness units.', 'beer' )}
					min={0}
					max={150}
				/>
			</PluginDocumentSettingPanel>
			<PluginDocumentSettingPanel
				name="beer-on-tap"
				title="On Tap"
				className="on-tap"
			>
				<OnTap/>
			</PluginDocumentSettingPanel>

		</>
	)
}

export default BeerPlugin