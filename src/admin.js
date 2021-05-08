/**
 * External dependencies
 */
import { unescape as unescapeString } from 'lodash';
import * as BeerList from './blocks/BeerList';

/**
 * WordPress dependencies
 */
import { addFilter } from '@wordpress/hooks';
import { registerBlockType } from '@wordpress/blocks';

// Register blocks.
[BeerList].forEach( ( { name, settings } ) => {
	registerBlockType( name, settings );
} );

// Customize post taxonomy to use radio buttons.
addFilter( 'editor.PostTaxonomyType', 'beer-lister', ( OriginalComponent ) => {
	return function ( props ) {
		if ( props.slug === 'style' ) {
			if ( !window.HierarchicalTermRadioSelector ) {
				window.HierarchicalTermRadioSelector = class HierarchicalTermRadioSelector extends OriginalComponent {
					// Return only the selected term ID
					onChange( event ) {
						const { onUpdateTerms, taxonomy } = this.props;
						const termId = parseInt( event.target.value, 10 );
						onUpdateTerms( [termId], taxonomy.rest_base );
					}

					// Copied from HierarchicalTermSelector, changed input type to radio
					renderTerms( renderedTerms ) {
						const { terms = [] } = this.props;
						return renderedTerms.map( ( term ) => {
							const id = `editor-post-taxonomies-hierarchical-term-${term.id}`;
							return (
								<div key={term.id} className="editor-post-taxonomies__hierarchical-terms-choice">
									<input
										id={id}
										className="editor-post-taxonomies__hierarchical-terms-input"
										type="radio"
										checked={terms.indexOf( term.id ) !== -1}
										value={term.id}
										onChange={this.onChange}
									/>
									<label htmlFor={id}>{unescapeString( term.name )}</label>
									{!!term.children.length && <div
										className="editor-post-taxonomies__hierarchical-terms-subchoices">{this.renderTerms( term.children )}</div>}
								</div>
							);
						} );
					}
				};
			}
			return <window.HierarchicalTermRadioSelector {...props} />;
		}
		return <OriginalComponent {...props} />;
	};
} );