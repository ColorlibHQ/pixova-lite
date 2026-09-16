/**
 * Behaviour for the theme's own Customizer controls.
 *
 * The Customizer builds a section's controls the first time it is opened, so
 * nothing here can bind on page load. Events are delegated from the document,
 * and the editors are attached when a section expands.
 */
( function ( $, api ) {
	'use strict';

	/* Range: keep the readout beside the slider in step. */
	document.addEventListener( 'input', function ( event ) {
		var input = event.target;

		if ( ! input.matches || ! input.matches( '.pixova-lite-range input[type="range"]' ) ) {
			return;
		}

		var output = input.parentNode.querySelector( '.pixova-lite-range__value' );

		if ( output ) {
			output.value = input.value;
		}
	} );

	/* Icon picker: show the chosen icon next to the field. */
	document.addEventListener( 'input', function ( event ) {
		var input = event.target;

		if ( ! input.matches || ! input.matches( '.pixova-lite-icon-picker__input' ) ) {
			return;
		}

		var preview = input.parentNode.querySelector( '.pixova-lite-icon-picker__preview' );

		if ( preview ) {
			preview.className = 'pixova-lite-icon-picker__preview ' + input.value;
		}
	} );

	/**
	 * Typography: gather the visible fields into the JSON the setting stores.
	 *
	 * The stored shape is the one earlier versions wrote, so a site that
	 * configured its headings before this release keeps them:
	 *   {"selectors":[...],"json":{"font-family":...,"font-size":...}}
	 */
	document.addEventListener( 'change', function ( event ) {
		var field = event.target;

		if ( ! field.matches || ! field.matches( '.pixova-lite-typography__field' ) ) {
			return;
		}

		var wrap   = field.closest( '.pixova-lite-typography' ),
			hidden = wrap && wrap.querySelector( '.pixova-lite-typography__value' );

		if ( ! hidden ) {
			return;
		}

		var json = {};

		wrap.querySelectorAll( '.pixova-lite-typography__field' ).forEach( function ( el ) {
			var property = el.dataset.property;

			if ( 'checkbox' === el.type ) {
				json[ property ] = el.checked ? 'on' : '';
				return;
			}

			json[ property ] = el.value;
		} );

		var selectors = [];

		try {
			selectors = JSON.parse( wrap.dataset.selectors || '[]' );
		} catch ( e ) {
			selectors = [];
		}

		hidden.value = JSON.stringify( { selectors: selectors, json: json } );

		var setting = api( jQuery( hidden ).data( 'customize-setting-link' ) );

		if ( setting ) {
			setting.set( hidden.value );
		}
	} );

	/**
	 * Attach TinyMCE to a textarea, and push its contents back to the setting.
	 *
	 * wp.editor.initialize() needs the textarea to be in the document and
	 * visible, which is only true once its section has been expanded.
	 */
	function initEditor( textarea ) {
		if ( ! textarea || textarea.dataset.pixovaEditor || ! window.wp || ! wp.editor ) {
			return;
		}

		textarea.dataset.pixovaEditor = '1';

		var id      = textarea.id,
			setting = api( $( textarea ).data( 'customize-setting-link' ) );

		wp.editor.initialize( id, {
			tinymce: {
				wpautop: true,
				toolbar1: 'bold italic bullist numlist link unlink undo redo'
			},
			quicktags: true,
			mediaButtons: false
		} );

		var editor = window.tinymce && tinymce.get( id );

		if ( editor && setting ) {
			editor.on( 'change keyup NodeChange', function () {
				setting.set( editor.getContent() );
			} );
		}

		/* The Text tab writes straight to the textarea. */
		$( textarea ).on( 'change keyup', function () {
			if ( setting ) {
				setting.set( textarea.value );
			}
		} );
	}

	api.bind( 'ready', function () {
		api.section.each( function ( section ) {
			section.expanded.bind( function ( expanded ) {
				if ( ! expanded ) {
					return;
				}
				$( section.container )
					.find( 'textarea.pixova-lite-text-editor' )
					.each( function () {
						initEditor( this );
					} );
			} );
		} );
	} );
}( jQuery, wp.customize ) );
