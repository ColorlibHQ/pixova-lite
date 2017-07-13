wp.customize.controlConstructor[ 'epsilon-wysiwyg' ] = wp.customize.Control.extend( {
	ready: function() {
		var control = this;

		control.container.on( 'change', 'textarea',
	        function() {
	          control.setting.set( jQuery( this ).val() );
	        }
	    );
	    control.container.find( 'textarea' ).keyup(function(){
	    	control.setting.set( jQuery( this ).val() );
	    });
		this.buildEditor();
	},
	buildEditor: function() {
		var control = this;
		var changeDebounceDelay = 1000;
		var editor_id = control.id+'-editor';
		control.textarea = control.container.find( '#'+editor_id );

		// The user has disabled TinyMCE.
		if ( typeof window.tinymce === 'undefined' ) {
			wp.editor.initialize( editor_id, {
				quicktags: true
			});
			return;
		}

		wp.editor.initialize( editor_id, {
			tinymce: {
				wpautop: true,
				setup: function( editor ) {
				    editor.on('change', function(e) {
				    	editor.save();
				    	jQuery( editor.getElement() ).trigger( 'change' );
				    });
				}
			},
			quicktags: true,
		});
	},

} );


wp.customize.controlConstructor[ 'epsilon-iconpicker' ] = wp.customize.Control.extend( {
	ready: function() {
		var control = this;

		control.container.on( 'change', 'input.epsilon-icon-picker',
	        function() {
	          control.setting.set( jQuery( this ).val() );
	        }
	    );

	    control.container.find( '.epsilon-open-iconpicker' ).click( function(){
	    	control.container.toggleClass( 'epsilon-iconpicker-opened' );
	    });

	    control.container.find( '.epsilon-icons-container .epsilon-icons' ).on( 'click', 'i', function( e ){
	    	var selectedIcon = jQuery(this).attr( 'data-icon' );
	    	control.container.removeClass( 'epsilon-iconpicker-opened' );
	    	control.container.find( '.epsilon-icon-contianer > i' ).removeClass();
	    	control.container.find( '.epsilon-icons > i.selected' ).removeClass( 'selected' );
	    	jQuery(this).addClass( 'selected' );
	    	control.container.find( '.epsilon-icon-contianer > i' ).addClass( selectedIcon );
	    	control.container.find( '.epsilon-icon-contianer > i' )
	    	control.container.find( 'input.epsilon-icon-picker' ).val( selectedIcon );
	    	control.setting.set( selectedIcon );
	    });

	    control.container.find( '.search-container input' ).keyup(function(){
	    	var filter = jQuery(this).val();
	    	control.container.find( '.epsilon-icons > i' ).each(function(){
	    		var text = jQuery(this).attr( 'data-search' );
	    		if ( text.search(new RegExp(filter, "i")) < 0 ) {
	    			jQuery(this).fadeOut();
	    		}else{
	    			jQuery(this).fadeIn();
	    		}
	    	});
	    });
	    
	    this.builHTML();
	},

	builHTML: function() {
		var control = this;
		
		var iconContainer = control.container.find( '.epsilon-icons-container .epsilon-icons' );
		jQuery.each( control.params.icons, function( key, name ){
			var classes = key;
			if ( key === control.params.value ) {
				classes = classes + ' selected';
			}
			var iconHTML = '<i class="' + classes + '" data-icon="' + key + '" data-search="' + name + '"></i>';
			iconContainer.append( iconHTML );
		});

	},

} );