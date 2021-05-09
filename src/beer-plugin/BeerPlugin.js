import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import SRMValues from './components/SRMValues';
import MetaNumberField from './components/MetaNumberField';
import { __ } from '@wordpress/i18n'


function BeerPlugin() {

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
					description={__('The alcohol by volume value.','beer')}
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
					description={__('The international bitterness units.','beer')}
					min={0}
					max={150}
				/>
			</PluginDocumentSettingPanel>
		</>
	)
}

export default BeerPlugin