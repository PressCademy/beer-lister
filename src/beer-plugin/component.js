import { PluginDocumentSettingPanel } from '@wordpress/edit-post';

function BeerData() {

	return (
		<PluginDocumentSettingPanel
			name="beer-info"
			title="Beer Info"
			className="beer-info"
		>
			Custom Panel Contents
		</PluginDocumentSettingPanel>
	)
}

export default BeerData