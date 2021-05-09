import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import SRMValues from './components/SRMValues';
import ABVField from './components/ABVField';


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
				<ABVField/>
			</PluginDocumentSettingPanel>
		</>
	)
}

export default BeerPlugin