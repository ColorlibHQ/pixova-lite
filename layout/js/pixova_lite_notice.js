jQuery( document ).on( 'click', '.pixova-error-update .notice-dismiss', function() {// jscs:ignore validateLineBreaks

    jQuery.ajax({
        url: ajaxurl,
        method: 'POST',
        data: {
            action: 'pixova_lite_remove_upate_notice'
        }
    });

});
