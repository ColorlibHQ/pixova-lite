/**
 * Behaviour for the theme's About page.
 *
 * Both requests carry the nonce localised as pixovaLiteWelcome.nonce; neither
 * endpoint is available to logged-out visitors.
 */
jQuery( function ( $ ) {
	'use strict';

	/* Import the demo content. */
	$( '#pixova-lite-import-demo' ).on( 'click', function ( event ) {
		event.preventDefault();

		var button = $( this ),
			steps  = [];

		button.closest( '.action-required-box' )
			.find( '.pixova-lite-import-step:checked' )
			.each( function () {
				steps.push( this.value );
			} );

		button.prop( 'disabled', true ).addClass( 'updating-message' );

		$.post( pixovaLiteWelcome.ajaxurl, {
			action: 'pixova_lite_import_demo',
			nonce: pixovaLiteWelcome.nonce,
			steps: steps
		} ).done( function () {
			window.location.reload();
		} ).fail( function () {
			button.prop( 'disabled', false ).removeClass( 'updating-message' );
		} );
	} );

	/* Dismiss or restore a recommended action. */
	$( '.required-action-button' ).on( 'click', function ( event ) {
		event.preventDefault();

		var button = $( this );

		$.post( pixovaLiteWelcome.ajaxurl, {
			action: 'pixova_lite_dismiss_required_action',
			nonce: pixovaLiteWelcome.nonce,
			id: button.attr( 'id' ),
			todo: button.data( 'action' )
		} ).done( function () {
			window.location.reload();
		} );
	} );
} );
