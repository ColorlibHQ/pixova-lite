<?php

if ( current_user_can( 'edit_theme_options' ) ) {

	$pixova_lite_section_title = get_theme_mod( 'pixova_lite_team_section_title', __( 'The team', 'pixova-lite' ) );
	$pixova_lite_section_sub_title = get_theme_mod( 'pixova_lite_team_section_sub_title', __( 'Meet the people that made it all happen.', 'pixova-lite' ) );

	// Team member #1
	$pixova_lite_team_member_1_name = get_theme_mod( 'pixova_lite_team_member_1_name', __( 'Angelina Doe', 'pixova-lite' ) );

	# Image Manipulation
	$pixova_lite_team_member_1_image_customizer = get_theme_mod( 'pixova_lite_team_member_1_image', get_template_directory_uri() . '/layout/images/team/teammembru-150x150.jpg' );
	$pixova_lite_team_member_1_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_1_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_1_image ) {
		$pixova_lite_team_member_1_image = $pixova_lite_team_member_1_image_customizer;
	}

	$pixova_lite_team_member_1_fburl = get_theme_mod( 'pixova_lite_team_member_1_facebook', 'https://www.facebook.com/colorlib/' );
	$pixova_lite_team_member_1_dribbble_url = get_theme_mod( 'pixova_lite_team_member_1_dribbble', 'http://www.dribbble.com/' );
	$pixova_lite_team_member_1_email = get_theme_mod( 'pixova_lite_team_member_1_email', sanitize_email( 'contact@site.com' ) );
	$pixova_lite_team_member_1_linkedin = get_theme_mod( 'pixova_lite_team_member_1_linkedin', 'https://www.linkedin.com/' );
	$pixova_lite_team_member_1_pinterest = get_theme_mod( 'pixova_lite_team_member_1_pinterest', 'https://pinterest.com/' );
	$pixova_lite_team_member_1_twitter = get_theme_mod( 'pixova_lite_team_member_1_twitter', 'https://twitter.com/colorlib' );
	$pixova_lite_team_member_1_googleplus = get_theme_mod( 'pixova_lite_team_member_1_googleplus', 'https://plus.google.com/' );
	$pixova_lite_team_member_1_instagram = get_theme_mod( 'pixova_lite_team_member_1_instagram', 'https://www.instagram.com/' );

	// Team member #2
	$pixova_lite_team_member_2_name = get_theme_mod( 'pixova_lite_team_member_2_name', __( 'John Doe', 'pixova-lite' ) );

	# Image Manipulation
	$pixova_lite_team_member_2_image_customizer = get_theme_mod( 'pixova_lite_team_member_2_image', get_template_directory_uri() . '/layout/images/team/teammembru2-150x150.jpg' );
	$pixova_lite_team_member_2_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_2_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_2_image ) {
		$pixova_lite_team_member_2_image = $pixova_lite_team_member_2_image_customizer;
	}

	$pixova_lite_team_member_2_fburl = get_theme_mod( 'pixova_lite_team_member_2_facebook', 'https://www.facebook.com/colorlib/' );
	$pixova_lite_team_member_2_dribbble_url = get_theme_mod( 'pixova_lite_team_member_2_dribbble', 'http://www.dribbble.com/' );
	$pixova_lite_team_member_2_email = get_theme_mod( 'pixova_lite_team_member_2_email', sanitize_email( 'contact@site.com' ) );
	$pixova_lite_team_member_2_linkedin = get_theme_mod( 'pixova_lite_team_member_2_linkedin', 'https://www.linkedin.com/' );
	$pixova_lite_team_member_2_pinterest = get_theme_mod( 'pixova_lite_team_member_2_pinterest', 'https://pinterest.com/' );
	$pixova_lite_team_member_2_twitter = get_theme_mod( 'pixova_lite_team_member_2_twitter', 'https://twitter.com/colorlib' );
	$pixova_lite_team_member_2_googleplus = get_theme_mod( 'pixova_lite_team_member_2_googleplus', 'https://plus.google.com/' );
	$pixova_lite_team_member_2_instagram = get_theme_mod( 'pixova_lite_team_member_2_instagram', 'https://www.instagram.com/' );

	// Team member #3
	$pixova_lite_team_member_3_name = get_theme_mod( 'pixova_lite_team_member_3_name', __( 'Angelina Doe', 'pixova-lite' ) );

	# Image Manipulation
	$pixova_lite_team_member_3_image_customizer = get_theme_mod( 'pixova_lite_team_member_3_image', get_template_directory_uri() . '/layout/images/team/teammembru3-150x150.jpg' );
	$pixova_lite_team_member_3_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_3_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_3_image ) {
		$pixova_lite_team_member_3_image = $pixova_lite_team_member_3_image_customizer;
	}

	$pixova_lite_team_member_3_fburl = get_theme_mod( 'pixova_lite_team_member_3_facebook', 'https://www.facebook.com/colorlib/' );
	$pixova_lite_team_member_3_dribbble_url = get_theme_mod( 'pixova_lite_team_member_3_dribbble', 'http://www.dribbble.com/' );
	$pixova_lite_team_member_3_email = get_theme_mod( 'pixova_lite_team_member_3_email', sanitize_email( 'contact@site.com' ) );
	$pixova_lite_team_member_3_linkedin = get_theme_mod( 'pixova_lite_team_member_3_linkedin', 'https://www.linkedin.com/' );
	$pixova_lite_team_member_3_pinterest = get_theme_mod( 'pixova_lite_team_member_3_pinterest', 'https://pinterest.com/' );
	$pixova_lite_team_member_3_twitter = get_theme_mod( 'pixova_lite_team_member_3_twitter', 'https://twitter.com/colorlib' );
	$pixova_lite_team_member_3_googleplus = get_theme_mod( 'pixova_lite_team_member_3_googleplus', 'https://plus.google.com/' );
	$pixova_lite_team_member_3_instagram = get_theme_mod( 'pixova_lite_team_member_3_instagram', 'https://www.instagram.com/' );

	// Team member #4
	$pixova_lite_team_member_4_name = get_theme_mod( 'pixova_lite_team_member_4_name', __( 'Angelina Doe', 'pixova-lite' ) );

	# Image Manipulation
	$pixova_lite_team_member_4_image_customizer = get_theme_mod( 'pixova_lite_team_member_4_image', get_template_directory_uri() . '/layout/images/team/teammembru4-150x150.jpg' );
	$pixova_lite_team_member_4_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_4_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_4_image ) {
		$pixova_lite_team_member_4_image = $pixova_lite_team_member_4_image_customizer;
	}

	$pixova_lite_team_member_4_fburl = get_theme_mod( 'pixova_lite_team_member_4_facebook', 'https://www.facebook.com/colorlib/' );
	$pixova_lite_team_member_4_dribbble_url = get_theme_mod( 'pixova_lite_team_member_4_dribbble', 'http://www.dribbble.com/' );
	$pixova_lite_team_member_4_email = get_theme_mod( 'pixova_lite_team_member_4_email', sanitize_email( 'contact@site.com' ) );
	$pixova_lite_team_member_4_linkedin = get_theme_mod( 'pixova_lite_team_member_4_linkedin', 'https://www.linkedin.com/' );
	$pixova_lite_team_member_4_pinterest = get_theme_mod( 'pixova_lite_team_member_4_pinterest', 'https://pinterest.com/' );
	$pixova_lite_team_member_4_twitter = get_theme_mod( 'pixova_lite_team_member_4_twitter', 'https://twitter.com/colorlib' );
	$pixova_lite_team_member_4_googleplus = get_theme_mod( 'pixova_lite_team_member_4_googleplus', 'https://plus.google.com/' );
	$pixova_lite_team_member_4_instagram = get_theme_mod( 'pixova_lite_team_member_4_instagram', 'https://www.instagram.com/' );

	// Team member #5
	$pixova_lite_team_member_5_name = get_theme_mod( 'pixova_lite_team_member_5_name' );

	# Image Manipulation
	$pixova_lite_team_member_5_image_customizer = get_theme_mod( 'pixova_lite_team_member_5_image' );
	$pixova_lite_team_member_5_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_5_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_5_image ) {
		$pixova_lite_team_member_5_image = $pixova_lite_team_member_5_image_customizer;
	}

	$pixova_lite_team_member_5_fburl = get_theme_mod( 'pixova_lite_team_member_5_facebook' );
	$pixova_lite_team_member_5_dribbble_url = get_theme_mod( 'pixova_lite_team_member_5_dribbble' );
	$pixova_lite_team_member_5_email = get_theme_mod( 'pixova_lite_team_member_5_email' );
	$pixova_lite_team_member_5_linkedin = get_theme_mod( 'pixova_lite_team_member_5_linkedin' );
	$pixova_lite_team_member_5_pinterest = get_theme_mod( 'pixova_lite_team_member_5_pinterest' );
	$pixova_lite_team_member_5_twitter = get_theme_mod( 'pixova_lite_team_member_5_twitter' );
	$pixova_lite_team_member_5_googleplus = get_theme_mod( 'pixova_lite_team_member_5_googleplus' );
	$pixova_lite_team_member_5_instagram = get_theme_mod( 'pixova_lite_team_member_5_instagram' );

} else {

	$pixova_lite_section_title = get_theme_mod( 'pixova_lite_team_section_title' );
	$pixova_lite_section_sub_title = get_theme_mod( 'pixova_lite_team_section_sub_title' );

	// Team member #1
	$pixova_lite_team_member_1_name = get_theme_mod( 'pixova_lite_team_member_1_name' );

	# Image Manipulation
	$pixova_lite_team_member_1_image_customizer = get_theme_mod( 'pixova_lite_team_member_1_image' );
	$pixova_lite_team_member_1_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_1_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_1_image ) {
		$pixova_lite_team_member_1_image = $pixova_lite_team_member_1_image_customizer;
	}

	$pixova_lite_team_member_1_fburl = get_theme_mod( 'pixova_lite_team_member_1_facebook' );
	$pixova_lite_team_member_1_dribbble_url = get_theme_mod( 'pixova_lite_team_member_1_dribbble' );
	$pixova_lite_team_member_1_email = get_theme_mod( 'pixova_lite_team_member_1_email' );
	$pixova_lite_team_member_1_linkedin = get_theme_mod( 'pixova_lite_team_member_1_linkedin' );
	$pixova_lite_team_member_1_pinterest = get_theme_mod( 'pixova_lite_team_member_1_pinterest' );
	$pixova_lite_team_member_1_twitter = get_theme_mod( 'pixova_lite_team_member_1_twitter' );
	$pixova_lite_team_member_1_googleplus = get_theme_mod( 'pixova_lite_team_member_1_googleplus' );
	$pixova_lite_team_member_1_instagram = get_theme_mod( 'pixova_lite_team_member_1_instagram' );

	// Team member #2
	$pixova_lite_team_member_2_name = get_theme_mod( 'pixova_lite_team_member_2_name' );

	# Image Manipulation
	$pixova_lite_team_member_2_image_customizer = get_theme_mod( 'pixova_lite_team_member_2_image' );
	$pixova_lite_team_member_2_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_2_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_2_image ) {
		$pixova_lite_team_member_2_image = $pixova_lite_team_member_2_image_customizer;
	}

	$pixova_lite_team_member_2_fburl = get_theme_mod( 'pixova_lite_team_member_2_facebook' );
	$pixova_lite_team_member_2_dribbble_url = get_theme_mod( 'pixova_lite_team_member_2_dribbble' );
	$pixova_lite_team_member_2_email = get_theme_mod( 'pixova_lite_team_member_2_email' );
	$pixova_lite_team_member_2_linkedin = get_theme_mod( 'pixova_lite_team_member_2_linkedin' );
	$pixova_lite_team_member_2_pinterest = get_theme_mod( 'pixova_lite_team_member_2_pinterest' );
	$pixova_lite_team_member_2_twitter = get_theme_mod( 'pixova_lite_team_member_2_twitter' );
	$pixova_lite_team_member_2_googleplus = get_theme_mod( 'pixova_lite_team_member_2_googleplus' );
	$pixova_lite_team_member_2_instagram = get_theme_mod( 'pixova_lite_team_member_2_instagram' );

	// Team member #3
	$pixova_lite_team_member_3_name = get_theme_mod( 'pixova_lite_team_member_3_name' );

	# Image Manipulation
	$pixova_lite_team_member_3_image_customizer = get_theme_mod( 'pixova_lite_team_member_3_image' );
	$pixova_lite_team_member_3_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_3_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_3_image ) {
		$pixova_lite_team_member_3_image = $pixova_lite_team_member_3_image_customizer;
	}

	$pixova_lite_team_member_3_fburl = get_theme_mod( 'pixova_lite_team_member_3_facebook' );
	$pixova_lite_team_member_3_dribbble_url = get_theme_mod( 'pixova_lite_team_member_3_dribbble' );
	$pixova_lite_team_member_3_email = get_theme_mod( 'pixova_lite_team_member_3_email' );
	$pixova_lite_team_member_3_linkedin = get_theme_mod( 'pixova_lite_team_member_3_linkedin' );
	$pixova_lite_team_member_3_pinterest = get_theme_mod( 'pixova_lite_team_member_3_pinterest' );
	$pixova_lite_team_member_3_twitter = get_theme_mod( 'pixova_lite_team_member_3_twitter' );
	$pixova_lite_team_member_3_googleplus = get_theme_mod( 'pixova_lite_team_member_3_googleplus' );
	$pixova_lite_team_member_3_instagram = get_theme_mod( 'pixova_lite_team_member_3_instagram' );

	// Team member #4
	$pixova_lite_team_member_4_name = get_theme_mod( 'pixova_lite_team_member_4_name' );

	# Image Manipulation
	$pixova_lite_team_member_4_image_customizer = get_theme_mod( 'pixova_lite_team_member_4_image' );
	$pixova_lite_team_member_4_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_4_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_4_image ) {
		$pixova_lite_team_member_4_image = $pixova_lite_team_member_4_image_customizer;
	}

	$pixova_lite_team_member_4_fburl = get_theme_mod( 'pixova_lite_team_member_4_facebook' );
	$pixova_lite_team_member_4_dribbble_url = get_theme_mod( 'pixova_lite_team_member_4_dribbble' );
	$pixova_lite_team_member_4_email = get_theme_mod( 'pixova_lite_team_member_4_email' );
	$pixova_lite_team_member_4_linkedin = get_theme_mod( 'pixova_lite_team_member_4_linkedin' );
	$pixova_lite_team_member_4_pinterest = get_theme_mod( 'pixova_lite_team_member_4_pinterest' );
	$pixova_lite_team_member_4_twitter = get_theme_mod( 'pixova_lite_team_member_4_twitter' );
	$pixova_lite_team_member_4_googleplus = get_theme_mod( 'pixova_lite_team_member_4_googleplus' );
	$pixova_lite_team_member_4_instagram = get_theme_mod( 'pixova_lite_team_member_4_instagram' );

	// Team member #5
	$pixova_lite_team_member_5_name = get_theme_mod( 'pixova_lite_team_member_5_name' );

	# Image Manipulation
	$pixova_lite_team_member_5_image_customizer = get_theme_mod( 'pixova_lite_team_member_5_image' );
	$pixova_lite_team_member_5_image = pixova_lite_get_customizer_image_by_url( $pixova_lite_team_member_5_image_customizer, 'thumbnail' );

	if ( ! $pixova_lite_team_member_5_image ) {
		$pixova_lite_team_member_5_image = $pixova_lite_team_member_5_image_customizer;
	}

	$pixova_lite_team_member_5_fburl = get_theme_mod( 'pixova_lite_team_member_5_facebook' );
	$pixova_lite_team_member_5_dribbble_url = get_theme_mod( 'pixova_lite_team_member_5_dribbble' );
	$pixova_lite_team_member_5_email = get_theme_mod( 'pixova_lite_team_member_5_email' );
	$pixova_lite_team_member_5_linkedin = get_theme_mod( 'pixova_lite_team_member_5_linkedin' );
	$pixova_lite_team_member_5_pinterest = get_theme_mod( 'pixova_lite_team_member_5_pinterest' );
	$pixova_lite_team_member_5_twitter = get_theme_mod( 'pixova_lite_team_member_5_twitter' );
	$pixova_lite_team_member_5_googleplus = get_theme_mod( 'pixova_lite_team_member_5_googleplus' );
	$pixova_lite_team_member_5_instagram = get_theme_mod( 'pixova_lite_team_member_5_instagram' );

}// End if().
if ( $pixova_lite_team_member_1_image && $pixova_lite_team_member_2_image && $pixova_lite_team_member_3_image && $pixova_lite_team_member_4_image && ! $pixova_lite_team_member_5_image ) {
	$sizing = 'col-sm-3';
} else {
	$sizing = '';
}

echo '<section class="has-padding" id="team">';
	echo '<div class="container">';
		echo '<div class="row">';
			echo '<div class="text-center section-heading">';
				echo '<h2 class="light-section-heading">';
					echo esc_html( $pixova_lite_section_title );
				echo '</h2>';
			echo '<div class="section-sub-heading">' . esc_html( $pixova_lite_section_sub_title ) . '</div>';
			echo '</div><!--/.text-center-->';
		echo '</div><!--/.row-->';

		echo '<div class="row align-center">';

if ( isset( $pixova_lite_team_member_1_image ) && ! empty( $pixova_lite_team_member_1_image ) ) {
	echo '<div class="mt-team ' . $sizing . ' pixova-lite-team-member-1">';
	echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_1_image ) . '" alt="' . ( ( $pixova_lite_team_member_1_name ) ? esc_attr( $pixova_lite_team_member_1_name ) : '' ) . '">';

	echo '<div class="mt-team-member-name">';
	echo esc_html( $pixova_lite_team_member_1_name );
	echo '</div><!--/.mt-team-member-name-->';
	if ( $pixova_lite_team_member_1_fburl || $pixova_lite_team_member_1_dribbble_url || $pixova_lite_team_member_1_email ) {
		echo '<div class="mt-team-description">';
		echo '<div class="mt-team-member-icons">';

		if ( $pixova_lite_team_member_1_fburl ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_fburl ) . '"><i class="fa fa-facebook-official"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_1_dribbble_url ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_dribbble_url ) . '"><i class="fa fa-dribbble"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_1_email ) {
			echo '<div class="mt-team-member-icon">';
			  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_1_email ) . '"><i class="fa fa-envelope"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_1_linkedin ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_1_pinterest ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_pinterest ) . '"><i class="fa fa-pinterest"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_1_twitter ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_twitter ) . '"><i class="fa fa-twitter"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_1_googleplus ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_googleplus ) . '"><i class="fa fa-google-plus"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_1_instagram ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_1_instagram ) . '"><i class="fa fa-instagram"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		echo '</div><!--/.mt-team-member-icons-->';
		echo '</div><!--/.mt-team-description-->';
	}

	echo '</div> <!--/.mt-team-->';
}// End if().

if ( isset( $pixova_lite_team_member_2_image ) && ! empty( $pixova_lite_team_member_2_image ) ) {
	echo '<div class="mt-team ' . $sizing . ' pixova-lite-team-member-2">';

	echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_2_image ) . '" alt="' . ( ( $pixova_lite_team_member_2_name ) ? esc_attr( $pixova_lite_team_member_2_name ) : '' ) . '">';

	echo '<div class="mt-team-member-name">';
	echo esc_html( $pixova_lite_team_member_2_name );
	echo '</div><!--/.mt-team-member-name-->';

	if ( $pixova_lite_team_member_2_fburl || $pixova_lite_team_member_2_dribbble_url || $pixova_lite_team_member_2_email ) {

		echo '<div class="mt-team-description">';
		echo '<div class="mt-team-member-icons">';

		if ( '' !== $pixova_lite_team_member_2_fburl ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_fburl ) . '"><i class="fa fa-facebook-official"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( '' !== $pixova_lite_team_member_2_dribbble_url ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_dribbble_url ) . '"><i class="fa fa-dribbble"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_2_email ) {
			echo '<div class="mt-team-member-icon">';
			  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_2_email ) . '"><i class="fa fa-envelope"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_2_linkedin ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_2_pinterest ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_pinterest ) . '"><i class="fa fa-pinterest"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_2_twitter ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_twitter ) . '"><i class="fa fa-twitter"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_2_googleplus ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_googleplus ) . '"><i class="fa fa-google-plus"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_2_instagram ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_2_instagram ) . '"><i class="fa fa-instagram"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		echo '</div><!--/.mt-team-member-icons-->';
		echo '</div><!--/.mt-team-description-->';
	}

	echo '</div> <!--/.mt-team-->';
}// End if().

if ( isset( $pixova_lite_team_member_3_image ) && ! empty( $pixova_lite_team_member_3_image ) ) {
	echo '<div class="mt-team ' . $sizing . ' pixova-lite-team-member-3">';

	echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_3_image ) . '" alt="' . ( ( $pixova_lite_team_member_3_name ) ? esc_attr( $pixova_lite_team_member_3_name ) : '' ) . '">';

	echo '<div class="mt-team-member-name">';
	echo esc_html( $pixova_lite_team_member_3_name );
	echo '</div><!--/.mt-team-member-name-->';

	if ( $pixova_lite_team_member_3_fburl || $pixova_lite_team_member_3_dribbble_url || $pixova_lite_team_member_3_email ) {

		echo '<div class="mt-team-description">';
		echo '<div class="mt-team-member-icons">';

		if ( '' !== $pixova_lite_team_member_3_fburl ) {
			echo '<div class="mt-team-member-icon">';
			echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_fburl ) . '"><i class="fa fa-facebook-official"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( '' !== $pixova_lite_team_member_3_dribbble_url ) {
			echo '<div class="mt-team-member-icon">';
			echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_dribbble_url ) . '"><i class="fa fa-dribbble"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_3_email ) {
			echo '<div class="mt-team-member-icon">';
			  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_3_email ) . '"><i class="fa fa-envelope"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_3_linkedin ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_3_pinterest ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_pinterest ) . '"><i class="fa fa-pinterest"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_3_twitter ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_twitter ) . '"><i class="fa fa-twitter"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_3_googleplus ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_googleplus ) . '"><i class="fa fa-google-plus"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_3_instagram ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_3_instagram ) . '"><i class="fa fa-instagram"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		echo '</div><!--/.mt-team-member-icons-->';
		echo '</div><!--/.mt-team-description-->';
	}

	echo '</div> <!--/.mt-team-->';
}// End if().

if ( isset( $pixova_lite_team_member_4_image ) && ! empty( $pixova_lite_team_member_4_image ) ) {
	echo '<div class="mt-team ' . $sizing . ' pixova-lite-team-member-4">';

	echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_4_image ) . '" alt="' . ( ( $pixova_lite_team_member_4_name ) ? esc_attr( $pixova_lite_team_member_4_name ) : '' ) . '">';

	echo '<div class="mt-team-member-name">';
	echo esc_html( $pixova_lite_team_member_4_name );
	echo '</div><!--/.mt-team-member-name-->';

	if ( $pixova_lite_team_member_4_fburl || $pixova_lite_team_member_4_dribbble_url || $pixova_lite_team_member_4_email ) {
		echo '<div class="mt-team-description">';

		echo '<div class="mt-team-member-icons">';

		if ( '' !== $pixova_lite_team_member_4_fburl ) {
			echo '<div class="mt-team-member-icon">';
			echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_fburl ) . '"><i class="fa fa-facebook-official"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( '' !== $pixova_lite_team_member_4_dribbble_url ) {
			echo '<div class="mt-team-member-icon">';
			echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_dribbble_url ) . '"><i class="fa fa-dribbble"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_4_email ) {
			echo '<div class="mt-team-member-icon">';
			  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_4_email ) . '"><i class="fa fa-envelope"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_4_linkedin ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_4_pinterest ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_pinterest ) . '"><i class="fa fa-pinterest"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_4_twitter ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_twitter ) . '"><i class="fa fa-twitter"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_4_googleplus ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_googleplus ) . '"><i class="fa fa-google-plus"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_4_instagram ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_4_instagram ) . '"><i class="fa fa-instagram"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		echo '</div><!--/.mt-team-member-icons-->';
		echo '</div><!--/.mt-team-description-->';

	}
	echo '</div> <!--/.mt-team-->';
}// End if().

if ( isset( $pixova_lite_team_member_5_image ) && ! empty( $pixova_lite_team_member_5_image ) ) {
	echo '<div class="mt-team pixova-lite-team-member-5">';

	echo '<img class="mt-team-img" src="' . esc_url( $pixova_lite_team_member_5_image ) . '" alt="' . ( ( $pixova_lite_team_member_5_name ) ? esc_attr( $pixova_lite_team_member_5_name ) : '' ) . '">';

	echo '<div class="mt-team-member-name">';
	echo esc_html( $pixova_lite_team_member_5_name );
	echo '</div><!--/.mt-team-member-name-->';

	if ( $pixova_lite_team_member_5_fburl || $pixova_lite_team_member_5_dribbble_url || $pixova_lite_team_member_5_email ) {

		echo '<div class="mt-team-description">';
		echo '<div class="mt-team-member-icons">';

		if ( '' !== $pixova_lite_team_member_5_fburl ) {
			echo '<div class="mt-team-member-icon">';
			echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_fburl ) . '"><i class="fa fa-facebook-official"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( '' !== $pixova_lite_team_member_5_dribbble_url ) {
			echo '<div class="mt-team-member-icon">';
			echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_dribbble_url ) . '"><i class="fa fa-dribbble"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_5_email ) {
			echo '<div class="mt-team-member-icon">';
			  echo '<a rel="nofollow" href="mailto:' . esc_attr( $pixova_lite_team_member_5_email ) . '"><i class="fa fa-envelope"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		if ( $pixova_lite_team_member_5_linkedin ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_linkedin ) . '"><i class="fa fa-linkedin"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_5_pinterest ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_pinterest ) . '"><i class="fa fa-pinterest"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_5_twitter ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_twitter ) . '"><i class="fa fa-twitter"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_5_googleplus ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_googleplus ) . '"><i class="fa fa-google-plus"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}
		if ( $pixova_lite_team_member_5_instagram ) {
			echo '<div class="mt-team-member-icon">';
				echo '<a rel="nofollow" href="' . esc_url( $pixova_lite_team_member_5_instagram ) . '"><i class="fa fa-instagram"></i></a>';
			echo '</div><!--/.mt-team-member-icon-->';
		}

		echo '</div><!--/.mt-team-member-icons-->';
		echo '</div><!--/.mt-team-description-->';
	}

	echo '</div> <!--/.mt-team-->';
}// End if().

		echo '</div><!--/.row-->';
	echo '</div><!--/.container-->';
echo '</section><!--/ SECTION -->';
