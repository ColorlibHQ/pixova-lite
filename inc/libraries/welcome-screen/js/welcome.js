var welcomeScreenFunctions = {
  /**
   * Import demo content
   */
  importDemoContent: function() {
    jQuery( '.epsilon-ajax-button' ).click( function() {
      var action = jQuery( this ).attr( 'data-action' ) ? jQuery( this ).attr( 'data-action' ) : jQuery( this ).attr( 'id' ),
          container = jQuery( this ).parents( '.action-required-box' ),
          checkboxes = container.find( ':checkbox' ),
          args,
          importThis = {
            'content': [],
            'sections': [],
            'frontpage': []
          };

      jQuery.each( checkboxes, function( k, item ) {

        if ( jQuery( item ).prop( 'checked' ) ) {
          importThis[ jQuery( item ).attr( 'name' ) ].push( jQuery( item ).val() );
        }

      } );

      args = {
        action: [ 'Medzone_Helper', action ],
        nonce: welcomeScreen.ajax_nonce,
        args: importThis
      };

      jQuery.ajax( {
        type: 'POST',
        data: { action: 'welcome_screen_ajax_callback', args: args },
        dataType: 'json',
        url: ajaxurl,
        success: function( json ) {
          if ( container.length ) {
            container.html( '<h3>Demo content was imported successfully! </h3>' );

            window.setTimeout( function() {
              container.slideUp( 300, function() {
                container.remove();
              } );
            }, 3000 );
          }
        },
        /**
         * Throw errors
         *
         * @param jqXHR
         * @param textStatus
         * @param errorThrown
         */
        error: function( jqXHR, textStatus, errorThrown ) {
          console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
        }

      } );
    } );
  },

  /**
   * Show hidden content
   */
  showHiddenContent: function() {
    jQuery( '.epsilon-hidden-content-toggler' ).on( 'click', function( e ) {
      e.preventDefault();
      jQuery( '#' + jQuery( this ).attr( 'data-toggle' ) ).slideToggle();
    } );
  },

  /**
   * Dismiss action through AJAX
   */
  dismissAction: function() {
    var args;

    jQuery( '.required-action-button' ).click( function() {
      args = {
        action: [ 'Epsilon_Welcome_Screen', 'handle_required_action' ],
        nonce: welcomeScreen.ajax_nonce,
        args: {
          'do': jQuery( this ).attr( 'data-action' ),
          'id': jQuery( this ).attr( 'id' )
        }
      };

      jQuery.ajax( {
        type: 'POST',
        data: { action: 'welcome_screen_ajax_callback', args: args },
        dataType: 'json',
        url: ajaxurl,
        success: function() {
          location.reload();
        },
        /**
         * Throw errors
         *
         * @param jqXHR
         * @param textStatus
         * @param errorThrown
         */
        error: function( jqXHR, textStatus, errorThrown ) {
          console.log( jqXHR + ' :: ' + textStatus + ' :: ' + errorThrown );
        }

      } );
    } );
  },

  /**
   * Init Range sliders in backend
   *
   * @param context
   */
  rangeSliders: function( context ) {
    var sliders = context.find( '.slider-container' );

    jQuery.each( sliders, function() {
      var slider, input, inputId, id, instance, self;
      self = jQuery( this );
      slider = jQuery( this ).find( '.ss-slider' );
      input = jQuery( this ).find( 'input' );
      inputId = input.attr( 'id' );
      id = slider.attr( 'id' );
      instance = jQuery( '#' + id );

      instance.slider( {
        value: self.find( 'input' ).attr( 'value' ),
        range: 'min',
        min: parseFloat( instance.attr( 'data-attr-min' ) ),
        max: parseFloat( instance.attr( 'data-attr-max' ) ),
        step: parseFloat( instance.attr( 'data-attr-step' ) ),
        /**
         * Removed Change event because server was flooded with requests from
         * javascript, sending changesets on each increment.
         *
         * @param event
         * @param ui
         */
        slide: function( event, ui ) {
          self.find( 'input' ).attr( 'value', ui.value );
        },
        /**
         * Bind the change event to the "actual" stop
         * @param event
         * @param ui
         */
        stop: function( event, ui ) {
          jQuery( '#' + inputId ).trigger( 'change' );
        }
      } );

      jQuery( input ).on( 'focus', function() {
        jQuery( this ).blur();
      } );

      instance.attr( 'value', ( instance.slider( 'value' ) ) );
      instance.on( 'change', function() {
        jQuery( '#' + id ).slider( {
          value: jQuery( this ).val()
        } );
      } );
    } );
  }
};

jQuery( document ).ready( function() {
  welcomeScreenFunctions.rangeSliders( jQuery( '#wpbody-content .widget-content' ) );
  welcomeScreenFunctions.dismissAction();
  welcomeScreenFunctions.importDemoContent();
  welcomeScreenFunctions.showHiddenContent();
} );

jQuery( document ).ajaxStop( function() {
  welcomeScreenFunctions.rangeSliders( jQuery( '#wpbody-content .widget-content' ) );
} );
