<?php

class Pixova_Lite_Helper {

	public static $pixova_settings;
	public static $pixova_fields = array(
		'pixova_lite_about_visibility',
		'pixova_lite_works_visibility',
		'pixova_lite_testimonials_visibility',
		'pixova_lite_team_visibility',
		'pixova_lite_news_visibility',
		'pixova_lite_contact_visibility',
		'pixova_lite_copyright_enable',
		'pixova_lite_copyright',
		'pixova_lite_preloader_enabled',
		'pixova_lite_animations_enabled',
		'pixova_lite_enable_post_breadcrumbs',
		'pixova_lite_enable_default_images',
		'pixova_lite_header_effect_enabled',
		'pixova_lite_email',
		'pixova_lite_phone',
		'pixova_lite_address',
		'pixova_lite_blog_breadcrumb_menu_prefix',
		'pixova_lite_blog_breadcrumb_menu_separator',
		'pixova_lite_blog_breadcrumb_menu_post_category',
		'pixova_lite_enable_blog_header_image',
		'pixova_lite_blog_text_title',
		'pixova_lite_blog_text_description',
		'pixova_lite_related_posts_enabled',
		'pixova_lite_enable_content_navigation',
		'pixova_lite_enable_author_box',
		'pixova_lite_enable_related_title_blog_posts',
		'pixova_lite_enable_related_date_blog_posts',
		'pixova_lite_autoplay_blog_posts',
		'pixova_lite_howmany_blog_posts',
		'pixova_lite_pagination_blog_posts',
		'pixova_lite_woocommerce_show_header_image',
		'pixova_lite_woocommerce_title',
		'pixova_lite_woocommerce_description',
		'pixova_lite_woocommerce_show_sidebar_on_shop_page',
		'pixova_lite_woocommerce_show_sidebar_on_left_or_right_side',
		'pixova_lite_intro_title_cta',
		'pixova_lite_intro_cta',
		'pixova_lite_intro_sub_cta',
		'pixova_lite_intro_outline_button_text',
		'pixova_lite_intro_outline_button_url',
		'pixova_lite_intro_outline_button_color',
		'pixova_lite_intro_outline_button_text_color',
		'pixova_lite_intro_button_text',
		'pixova_lite_intro_button_url',
		'pixova_lite_intro_button_color',
		'pixova_lite_intro_button_text_color',
		'pixova_lite_intro_what_we_do_enabled',
		'pixova_lite_intro_what_we_do_1_icon',
		'pixova_lite_intro_what_we_do_1_title',
		'pixova_lite_intro_what_we_do_1_description',
		'pixova_lite_intro_what_we_do_2_icon',
		'pixova_lite_intro_what_we_do_2_title',
		'pixova_lite_intro_what_we_do_2_description',
		'pixova_lite_intro_what_we_do_3_icon',
		'pixova_lite_intro_what_we_do_3_title',
		'pixova_lite_intro_what_we_do_3_description',
		'pixova_lite_about_section_title',
		'pixova_lite_about_section_sub_title',
		'pixova_lite_about_section_textarea',
		'pixova_lite_about_section_blockquote',
		'pixova_lite_about_section_chart_1_heading',
		'pixova_lite_about_section_chart_1_percentage',
		'pixova_lite_about_section_chart_2_heading',
		'pixova_lite_about_section_chart_2_percentage',
		'pixova_lite_about_section_chart_3_heading',
		'pixova_lite_about_section_chart_3_percentage',
		'pixova_lite_about_section_chart_4_heading',
		'pixova_lite_about_section_chart_4_percentage',
		'pixova_lite_work_section_title',
		'pixova_lite_work_section_sub_title',
		'pixova_lite_works_project_1_image',
		'pixova_lite_works_project_1_logo',
		'pixova_lite_works_project_1_url',
		'pixova_lite_works_project_2_image',
		'pixova_lite_works_project_2_logo',
		'pixova_lite_works_project_2_url',
		'pixova_lite_works_project_3_image',
		'pixova_lite_works_project_3_logo',
		'pixova_lite_works_project_3_url',
		'pixova_lite_works_project_4_image',
		'pixova_lite_works_project_4_logo',
		'pixova_lite_works_project_4_url',
		'pixova_lite_testimonial_section_title',
		'pixova_lite_testimonial_section_sub_title',
		'pixova_lite_testimonial_1_person_name',
		'pixova_lite_testimonial_1_person_description',
		'pixova_lite_testimonial_1_person_image',
		'pixova_lite_testimonial_2_person_name',
		'pixova_lite_testimonial_2_person_description',
		'pixova_lite_testimonial_2_person_image',
		'pixova_lite_testimonial_3_person_name',
		'pixova_lite_testimonial_3_person_description',
		'pixova_lite_testimonial_3_person_image',
		'pixova_lite_testimonial_4_person_name',
		'pixova_lite_testimonial_4_person_description',
		'pixova_lite_testimonial_4_person_image',
		'pixova_lite_testimonial_5_person_name',
		'pixova_lite_testimonial_5_person_description',
		'pixova_lite_testimonial_5_person_image',
		'pixova_lite_news_section_title',
		'pixova_lite_news_section_sub_title',
		'pixova_lite_news_section_button_text',
		'pixova_lite_news_section_no_posts_per_slide',
		'pixova_lite_contact_section_title',
		'pixova_lite_contact_section_sub_title',
		'pixova_lite_team_section_title',
		'pixova_lite_team_section_sub_title',
		'pixova_lite_team_member_1_name',
		'pixova_lite_team_member_1_image',
		'pixova_lite_team_member_1_facebook',
		'pixova_lite_team_member_1_dribbble',
		'pixova_lite_team_member_1_email',
		'pixova_lite_team_member_2_name',
		'pixova_lite_team_member_2_image',
		'pixova_lite_team_member_2_facebook',
		'pixova_lite_team_member_2_dribbble',
		'pixova_lite_team_member_2_email',
		'pixova_lite_team_member_3_name',
		'pixova_lite_team_member_3_image',
		'pixova_lite_team_member_3_facebook',
		'pixova_lite_team_member_3_dribbble',
		'pixova_lite_team_member_3_email',
		'pixova_lite_team_member_4_name',
		'pixova_lite_team_member_4_image',
		'pixova_lite_team_member_4_facebook',
		'pixova_lite_team_member_4_dribbble',
		'pixova_lite_team_member_4_email',
		'pixova_lite_team_member_5_name',
		'pixova_lite_team_member_5_image',
		'pixova_lite_team_member_5_facebook',
		'pixova_lite_team_member_5_dribbble',
		'pixova_lite_team_member_5_email',
	);


	public static function parse_pixova_settings() {

		$pixova_settings = get_post_meta( Pixova_Lite_Helper::get_setting_page_id(), 'pixova-settings', true );

		if ( is_array( $pixova_settings ) ) {
			return $pixova_settings;
		}
		return array();

	}

	public static function get_pixova_setting( $setting, $default = false ) {

		if ( in_array( $setting, Pixova_Lite_Helper::$pixova_fields ) ) {
			$pixova_settings = Pixova_Lite_Helper::parse_pixova_settings();
			if ( isset( $pixova_settings[ $setting ] ) ) {
				return $pixova_settings[ $setting ];
			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	// static method in order to get settings from page
	// use $arguments[0] if value doesn't exist.
	public static function __callStatic( $name, $arguments ) {

		$settings_id = str_replace( '_get_', '', $name );
		$setting_value = Pixova_Lite_Helper::get_pixova_setting( $settings_id );

		if ( false === $setting_value ) {
			return $arguments[0];
		} else {
			return $setting_value;
		}

	}

	public static function delete_theme_mods_save_page_content() {

		$pixova_settings = get_theme_mods();
		$existing_settings = Pixova_Lite_Helper::parse_pixova_settings();
		$content = '';
		$new_fields = false;
		foreach ( $pixova_settings as $key => $value ) {
			if ( in_array( $key, Pixova_Lite_Helper::$pixova_fields ) ) {
				if ( isset( $existing_settings[ $key ] ) && $existing_settings[ $key ] != $value ) {
					$new_fields = true;
					$existing_settings[ $key ] = $value;
				} elseif ( ! isset( $existing_settings[ $key ] ) ) {
					$new_fields = true;
					$existing_settings[ $key ] = $value;
				}
				remove_theme_mod( $key );
			}
		}

		if ( $new_fields ) {
			foreach ( $existing_settings as $key => $value ) {
				$content .= $key . '="' . $value . '";';
			}
		}

		if ( '' != $content ) {

			// Update Pixova Settings' Page
			$pixova_settings_page_args = array(
				'ID'           => Pixova_Lite_Helper::get_setting_page_id(),
				'post_content' => $content,
			);

			wp_update_post( $pixova_settings_page_args );
			update_post_meta( Pixova_Lite_Helper::get_setting_page_id(), 'pixova-settings', $existing_settings );

		}

	}

	public static function get_setting_page_id() {

		$page_id = get_option( 'pixova-settings-id' );
		if ( $page_id ) {
			return $page_id;
		} else {

			$page_args = array(
				'post_title' => 'Pixova Settings',
				'post_status' => 'draft',
				'post_type' => 'page',
				'post_author' => 0,
			);

			$page_id = wp_insert_post( $page_args );

			if ( ! is_wp_error( $page_id ) ) {
				update_option( 'pixova-settings-id', $page_id );
				return $page_id;
			}
		}

	}

}

$pixova_settings = array( 'pixova_lite_intro_cta' );

foreach ( Pixova_Lite_Helper::$pixova_fields as $pixova_setting ) {
	add_filter( "customize_sanitize_js_{$pixova_setting}", array( 'Pixova_Lite_Helper', "_get_{$pixova_setting}" ) );
	add_filter( "theme_mod_{$pixova_setting}", array( 'Pixova_Lite_Helper', "_get_{$pixova_setting}" ) );
}

add_action( 'customize_save_after', array( 'Pixova_Lite_Helper', 'delete_theme_mods_save_page_content' ) );

add_action( 'dbx_post_advanced', 'pixova_remove_editor_for_pixova_settings' );

function pixova_remove_editor_for_pixova_settings( $post ) {

	global $post_type;

	if ( get_option( 'pixova-settings-id' ) == $post->ID ) {
		add_action( 'edit_form_after_title', '_pixova_setting_page_notice' );
		remove_post_type_support( $post_type, 'editor' );
	}

}

function _pixova_setting_page_notice() {
	echo '<div class="notice notice-warning inline"><p>' . __( 'You are currently editing the page that hold your theme settings. Please don\'t delete it', 'pixova-lite' ) . '</p></div>';
}

add_filter( 'display_post_states', 'add_states_for_pixova_settings_page', 10, 2 );

function add_states_for_pixova_settings_page( $post_states, $post ) {

	if ( intval( get_option( 'pixova-settings-id' ) ) === $post->ID ) {
		$post_states['pixova_setting_page'] = __( 'Theme Settings Page. Don\'t delete it.', 'pixova-lite' );
		unset( $post_states['draft'] );
	}

	return $post_states;

}

// print_r( get_theme_mods() );
