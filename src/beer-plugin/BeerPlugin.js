import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import SRMValues from './components/SRMValues';
import MetaNumberField from './components/MetaNumberField';


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
					min={0}
				/>
			</PluginDocumentSettingPanel>
		</>
	)
}

export default BeerPlugin