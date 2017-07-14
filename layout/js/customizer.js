( function( $ ) {// jscs:ignore validateLineBreaks

    /* Multi-level panels in customizer */

    var api = wp.customize;

    // Extend Panel
    var _panelEmbed = wp.customize.Panel.prototype.embed;
    var _panelIsContextuallyActive = wp.customize.Panel.prototype.isContextuallyActive;
    var _panelAttachEvents = wp.customize.Panel.prototype.attachEvents;

    api.bind( 'pane-contents-reflowed', function() {

        // Reflow panels
        var panels = [];

        api.panel.each( function( panel ) {

            if (
                'pixova_panel' !== panel.params.type ||
                'undefined' === typeof panel.params.panel
            ) {

                return;

            }

            panels.push( panel );

        });

        panels.sort( api.utils.prioritySort ).reverse();

        $.each( panels, function( i, panel ) {

            var parentContainer = $( '#sub-accordion-panel-' + panel.params.panel );

            parentContainer.children( '.panel-meta' ).after( panel.headContainer );

        });

    });

    wp.customize.Panel = wp.customize.Panel.extend({
        attachEvents: function() {
            var panel = this;
            if (
                'pixova_panel' !== this.params.type ||
                'undefined' === typeof this.params.panel
            ) {

                _panelAttachEvents.call( this );

                return;

            }

            _panelAttachEvents.call( this );

            panel.expanded.bind( function( expanded ) {

                var parent = api.panel( panel.params.panel );

                if ( expanded ) {

                    parent.contentContainer.addClass( 'current-panel-parent' );

                } else {

                    parent.contentContainer.removeClass( 'current-panel-parent' );

                }

            });

            panel.container.find( '.customize-panel-back' )
                .off( 'click keydown' )
                .on( 'click keydown', function( event ) {

                    if ( api.utils.isKeydownButNotEnterEvent( event ) ) {

                        return;

                    }

                    event.preventDefault(); // Keep this AFTER the key filter above

                    if ( panel.expanded() ) {

                        api.panel( panel.params.panel ).expand();

                    }

                });

        },
        embed: function() {
            var panel = this;
            var parentContainer = $( '#sub-accordion-panel-' + this.params.panel );

            if (
                'pixova_panel' !== this.params.type ||
                'undefined' === typeof this.params.panel
            ) {

                _panelEmbed.call( this );

                return;

            }

            _panelEmbed.call( this );

            parentContainer.append( panel.headContainer );

        },
        isContextuallyActive: function() {
            var panel = this;
            var children = this._children( 'panel', 'section' );
            var activeCount = 0;

            if (
                'pixova_panel' !== this.params.type
            ) {

                return _panelIsContextuallyActive.call( this );

            }

            api.panel.each( function( child ) {

                if ( ! child.params.panel ) {

                    return;

                }

                if ( child.params.panel !== panel.id ) {

                    return;

                }

                children.push( child );

            });

            children.sort( api.utils.prioritySort );

            _( children ).each( function( child ) {

                if ( child.active() && child.isContextuallyActive() ) {

                    activeCount += 1;

                }

            });

            return ( 0 !== activeCount );

        }

    });

})( jQuery );
