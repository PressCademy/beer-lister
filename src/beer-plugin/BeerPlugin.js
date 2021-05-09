import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import SRMValues from './components/SRMValues';


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
		</>
	)
}

export default BeerPlugin