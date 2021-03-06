import { select, dispatch } from '@wordpress/data';
import React, { useState } from '@wordpress/element';


const MetaNumberField = ( props ) => {

	const [meta, setMeta] = useState( select( 'core/editor' ).getEditedPostAttribute( 'meta' )[props.metaKey] || props.min );

	const step = props.step || 1;

	const handleChange = ( e ) => {
		let metaValue = e.target.value;

		if ( metaValue > props.max ) {
			metaValue = props.max;
		}

		if ( metaValue < props.min ) {
			metaValue = props.min;
		}

		const updated = {}

		updated[props.metaKey] = metaValue;

		dispatch( 'core/editor' ).editPost( { meta: { ...meta, ...updated } } )

		setMeta( metaValue );
	}

	return (
		<>
			<label
				style={{ 'display': 'block', "marginBottom": '8px' }}
				htmlFor={`beer-${props.metaKey}`}>
				{props.label}
			</label>
			<input name={`beer-${props.metaKey}`} onChange={handleChange} value={meta} type="number" step={step}/>
			<p>{props.description}</p>
		</>
	)
}

export default MetaNumberField;