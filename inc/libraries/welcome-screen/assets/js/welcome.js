jQuery(document).ready(function () {

	/* If there are required actions, add an icon with the number of required actions in the About pixova page -> Actions required tab */
	var pixova_nr_actions_required = pixovaWelcomeScreenObject.nr_actions_required;

	if ( (typeof pixova_nr_actions_required !== 'undefined') && (pixova_nr_actions_required != '0') ) {
		jQuery('li.pixova-w-red-tab a').append('<span class="pixova-actions-count">' + pixova_nr_actions_required + '</span>');
	}

	/* Dismiss required actions */
	jQuery(".pixova-required-action-button").click(function () {

		var id = jQuery(this).attr('id'),
				action = jQuery(this).attr('data-action');
		jQuery.ajax({
			type      : "GET",
			data      : { action: 'pixova_dismiss_required_action', id: id, todo: action },
			dataType  : "html",
			url       : pixovaWelcomeScreenObject.ajaxurl,
			beforeSend: function (data, settings) {
				jQuery('.pixova-tab-pane#actions_required h1').append('<div id="temp_load" style="text-align:center"><img src="' + pixovaWelcomeScreenObject.template_directory + '/inc/libraries/welcome-screen/assets/img/ajax-loader.gif" /></div>');
			},
			success   : function (data) {
				location.reload();
				jQuery("#temp_load").remove();
				/* Remove loading gif */
			},
			error     : function (jqXHR, textStatus, errorThrown) {
				console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});
	});
});
