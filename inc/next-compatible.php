<?php
/**
 *	Next compatible functionality: over 4.4.2
 */
if( version_compare( $GLOBALS['wp_version'], '4.4.2', '>' ) ) {
	// Add Image Size
	add_image_size( 'pixova-lite-custom-logo', 141, 30 );

	// Add Theme Support: Custom Logo
	add_theme_support( 'custom-logo', array(
		'sizes'	=> 'pixova-lite-custom-logo'
	) );

	// Logo
	add_action( 'pixova_lite_logo', 'pixova_lite_logo_over_442', 1 );
    function pixova_lite_logo_over_442() {
        $text_logo = get_theme_mod( 'pixova_lite_text_logo', 'Pixova' );
        $image_logo = get_theme_mod( 'pixova_lite_image_logo', esc_url( get_template_directory_uri() . '/layout/images/pixova-lite-img-logo.png' ) );

        $output = '';

        if( function_exists( 'has_custom_logo' ) ) {
            if( has_custom_logo() ) {
                $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'">'. get_custom_logo() .'</a>';
            } elseif ( $image_logo ) {
                $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'"><img src="'. esc_url( $image_logo ) .'" alt="'. esc_attr( get_bloginfo( 'title' ) ) .'" title="'. esc_attr( get_bloginfo( 'title' ) ) .'" /></a>';
            } else {
                $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'">'. esc_html( $logo_text ) .'</a>';
            }
        } else {
            if ( $image_logo ) {
                $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'"><img src="'. esc_url( $image_logo ) .'" alt="'. esc_attr( get_bloginfo( 'title' ) ) .'" title="'. esc_attr( get_bloginfo( 'title' ) ) .'" /></a>';
            } else {
                $output .= '<a class="logo" href="'. esc_url( get_site_url() ) .'">'. esc_html( $logo_text ) .'</a>';
            }
        }

        echo $output;
    }
}