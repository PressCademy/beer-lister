import { select, dispatch } from '@wordpress/data';
import React, { useState } from '@wordpress/element';


const ABVField = () => {

	const [abv, setABV] = useState( select( 'core/editor' ).getEditedPostAttribute( 'meta' ).abv );

	const handleChange = ( e ) => {
		let abv = e.target.value;

		if ( abv > 100 ) {
			abv = 100;
		}

		if ( abv < 0 ) {
			abv = 0;
		}

		const meta = wp.data.select( 'core/editor' ).getEditedPostAttribute( 'meta' );

		dispatch( 'core/editor' ).editPost( { meta: { ...meta, ...{ abv } } } )

		setABV( abv );
	}

	return (
		<input onChange={handleChange} value={abv} type="number" step=".01"/>
	)
}

export default ABVField;