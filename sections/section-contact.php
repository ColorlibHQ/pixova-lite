<?php


$pixova_lite_section__title = get_theme_mod('pixova_lite_contact_section_title', __('Contact us', 'pixova-lite') );
$pixova_lite_section__sub_title = get_theme_mod('pixova_lite_contact_section_sub_title', __('And we\'ll reply in no time', 'pixova-lite') );

// section args
$pixova_lite_contact_section_address = get_theme_mod('pixova_lite_address', __('Street 221B Baker Street, London, UK', 'pixova-lite') );
$pixova_lite_contact_section_phone = get_theme_mod('pixova_lite_phone', '+444 974 525');
$pixova_lite_contact_section_email = get_theme_mod('pixova_lite_email', 'office@machothemes.com');
$pixova_lite_contact_cf7_form = get_theme_mod('pixova_lite_contact_section_cf7', '');
$pixova_lite_contact_section_type = get_theme_mod( 'pixova_lite_contact_section_type', 'contact-form-7' );


echo '<section class="has-padding" id="contact">';
	echo '<div class="container">';
		echo '<div class="row">';
			echo '<div class="text-center section-heading">';
				echo '<h2 class="light-section-heading">';
					echo esc_html( $pixova_lite_section__title );
				echo '</h2><!--/.section-heading.light-section-heading-->';
					echo '<div class="section-sub-heading">'.esc_html( $pixova_lite_section__sub_title ).'</div>';
			echo '</div><!--/.text-center-->';
		echo '</div><!--/.row-->';

		echo '<div class="row">';

		echo '<div class="col-md-3">';
			echo '<div class="mt-contact-info">';
				echo '<h3>'.__('Address', 'pixova-lite').'</h3>';

					echo '<p class="contact-info-details address"><span>'.esc_html( $pixova_lite_contact_section_address ).'</span></p>';

				echo '<h3>'.__('Customer Support', 'pixova-lite').'</h3>';

					echo '<p class="contact-info-details-phone">'.__('Phone: ', 'pixova-lite'). '<span>'.esc_html( $pixova_lite_contact_section_phone ) .'</span>';
				echo '</p>';

					echo '<p class="contact-info-details-email">'. __('Email: ', 'pixova-lite'). '<span>'. esc_html( $pixova_lite_contact_section_email ) . '</span>';
				echo '</p>';

				echo '</div><!--/.contact-info-details-->';
			echo '</div><!--/.mt-contact-info-->';
		//echo '</div><!--/.col-md-3-->';


		echo '<div class="col-md-9">';

		require_once ABSPATH . 'wp-admin/includes/plugin.php';

		if( $pixova_lite_contact_section_type == 'contact-form-7' && is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) && $pixova_lite_contact_cf7_form != NULL && $pixova_lite_contact_cf7_form != 'default'  ) {
			$shortcode = '[contact-form-7 id="'. esc_html( $pixova_lite_contact_cf7_form ) .'"]';
			echo do_shortcode($shortcode);
		} elseif( $pixova_lite_contact_section_type == 'pirate-forms' ) {
			echo do_shortcode( '[pirate_forms]' );
		} else { ?>

		<div role="form" class="wpcf7" dir="ltr">
			<form action="/" method="post" class="wpcf7-form" novalidate="novalidate">

			<div class="col-md-4">
			    <span class="wpcf7-form-control-wrap your-name">
						<input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" aria-invalid="false" placeholder="Your name">
					</span>
			</div>
		<div class="col-md-4">
		    <span class="wpcf7-form-control-wrap your-email">
					<input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Your email">
				</span>
		</div>
		<div class="col-md-4">
		    <span class="wpcf7-form-control-wrap your-subject">
					<input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Your subject">
				</span>
		</div>
		<div class="col-md-12">
		    <span class="wpcf7-form-control-wrap your-message">
					<textarea name="your-message" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Your message"></textarea>
				</span>
		</div>
		<p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit btn btn-cta-light pull-right"></p>
		</form>
		</div>

<?php }

		echo '</div><!--/.row-->';
	echo '</div><!--/.col-md-9-->';
	echo '</div><!--/.container-->';
echo '</section>';
