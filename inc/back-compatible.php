<?php
/**
 *  Back compatible functionality: less as 4.1-alpha
 */
if( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
    if( !function_exists( 'pixova_lite_switch_theme' ) ) {
        /**
         * Prevent switching to Pixova Lite on old versions of WordPress.
         *
         * Switches to the default theme.
         *
         * @since Pixova Lite 1.16
         */
        function pixova_lite_switch_theme()
        {
            switch_theme(WP_DEFAULT_THEME, WP_DEFAULT_THEME);
            unset($_GET['activated']);
            add_action('admin_notices', 'pixova_lite_upgrade_notice');
        }

        add_action('after_switch_theme', 'pixova_lite_switch_theme');
    }

    if( !function_exists('pixova_lite_upgrade_notice') ) {
        /**
         * Add message for unsuccessful theme switch.
         *
         * Prints an update nag after an unsuccessful attempt to switch to
         * Pixova Lite on WordPress versions prior to 4.1.
         *
         * @since Pixova Lite 1.16
         */
        function pixova_lite_upgrade_notice()
        {
            $message = sprintf(__('Pixova Lite requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'pixova-lite'), $GLOBALS['wp_version']);
            printf('<div class="error"><p>%s</p></div>', $message);
        }
    }

    if( !function_exists('pixova_lite_customize') ) {
        /**
         * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
         *
         * @since Pixova Lite 1.16
         */
        function pixova_lite_customize()
        {
            wp_die(sprintf(__('Pixova Lite requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'pixova-lite'), $GLOBALS['wp_version']), '', array(
                'back_link' => true,
            ));
        }

        add_action('load-customize.php', 'pixova_lite_customize');
    }

    if(!function_exists('pixova_lite_preview')) {
        /**
         * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
         *
         * @since Pixova Lite 1.16
         */
        function pixova_lite_preview()
        {
            if (isset($_GET['preview'])) {
                wp_die(sprintf(__('Pixova Lite requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.', 'pixova-lite'), $GLOBALS['wp_version']));
            }
        }

        add_action('template_redirect', 'pixova_lite_preview');
    }
}

/**
 *  Back compatible functionality: less as 4.5
 */
if( version_compare( $GLOBALS['wp_version'], '4.5', '<' ) ) {
    // Logo
    add_action( 'pixova_lite_logo', 'pixova_lite_logo', 1 );
    function pixova_lite_logo() {
        $text_logo = get_theme_mod( 'pixova_lite_text_logo', 'Pixova' );
        $image_logo = get_theme_mod( 'pixova_lite_image_logo', esc_url( get_template_directory_uri() . '/layout/images/pixova-lite-img-logo.png' ) );

        $output = '';

        if( $image_logo ) {
            $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'"><img src="'. esc_url( $image_logo ) .'" alt="'. esc_attr( get_bloginfo( 'title' ) ) .'" title="'. esc_attr( get_bloginfo( 'title' ) ) .'" /></a>';
        } else {
            $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'">'. esc_html( $text_logo ) .'</a>';
        }

        echo $output;
    }
}