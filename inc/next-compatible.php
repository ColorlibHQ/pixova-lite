<?php
/**
 *	Next compatible functionality
 */
if( version_compare( $GLOBALS['wp_version'], '4.4', '>' ) ) {
	add_image_size( 'pixova-lite-custom-logo', 141, 30 );

	add_theme_support( 'custom-logo', array(
		'sizes'	=> 'pixova-lite-custom-logo'
	) );
}