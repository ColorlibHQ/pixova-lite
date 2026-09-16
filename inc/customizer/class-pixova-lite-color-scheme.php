<?php
/**
 * The theme's colour scheme, replacing Epsilon_Color_Scheme.
 *
 * layout/css/style-overrides.css is a vsprintf template: the selectors that
 * take a configurable colour are written once, with %1$s to %6$s where the
 * colour goes. The six Customizer settings fill those positions in order.
 *
 * Nothing is printed while every colour still matches its default, so a site
 * that has not changed any of them carries no inline stylesheet at all.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Pixova_Lite_Color_Scheme' ) ) {

	class Pixova_Lite_Color_Scheme {

		/**
		 * @var Pixova_Lite_Color_Scheme|null
		 */
		private static $instance = null;

		/**
		 * The stylesheet the generated CSS is attached to.
		 *
		 * @var string
		 */
		private $handler;

		/**
		 * @var array
		 */
		private $fields = array();

		/**
		 * @param string $handler Stylesheet handle to attach the inline CSS to.
		 * @param array  $fields  Colour fields, keyed by setting id.
		 */
		public function __construct( $handler, $fields ) {
			$this->handler = $handler;
			$this->fields  = $fields;

			add_action( 'customize_register', array( $this, 'register' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 11 );
		}

		/**
		 * @param string $handler
		 * @param array  $fields
		 *
		 * @return Pixova_Lite_Color_Scheme
		 */
		public static function get_instance( $handler = null, $fields = array() ) {
			if ( null === self::$instance ) {
				self::$instance = new self( $handler, $fields );
			}

			return self::$instance;
		}

		/**
		 * @return array
		 */
		public function get_fields() {
			return $this->fields;
		}

		/**
		 * Register a setting and a core colour picker for each field.
		 *
		 * @param WP_Customize_Manager $wp_customize
		 *
		 * @return void
		 */
		public function register( $wp_customize ) {
			$priority = 3;

			foreach ( $this->fields as $id => $field ) {
				$wp_customize->add_setting( $id, array(
					'default'           => $field['default'],
					'sanitize_callback' => 'sanitize_hex_color',
					'transport'         => 'postMessage',
				) );

				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $id, array(
					'label'       => $field['label'],
					'description' => isset( $field['description'] ) ? $field['description'] : '',
					'section'     => $field['section'],
					'settings'    => $id,
					'priority'    => $priority,
				) ) );

				$priority ++;
			}
		}

		/**
		 * The six colours, in the order the template expects them.
		 *
		 * @return array
		 */
		public function get_colors() {
			$colors = array();

			foreach ( $this->fields as $id => $field ) {
				$color = get_theme_mod( $id, $field['default'] );
				$color = sanitize_hex_color( $color );

				$colors[ $id ] = $color ? $color : $field['default'];
			}

			return $colors;
		}

		/**
		 * True while every colour is still its default.
		 *
		 * @return bool
		 */
		public function is_default() {
			foreach ( $this->fields as $id => $field ) {
				if ( get_theme_mod( $id, $field['default'] ) !== $field['default'] ) {
					return false;
				}
			}

			return true;
		}

		/**
		 * @return string
		 */
		public function generate_css() {
			if ( $this->is_default() ) {
				return '';
			}

			$template = Pixova_Lite_Color_Scheme::get_template();

			if ( '' === $template ) {
				return '';
			}

			return vsprintf( $template, array_values( $this->get_colors() ) );
		}

		/**
		 * The override stylesheet, read once per request.
		 *
		 * @return string
		 */
		public static function get_template() {
			static $template = null;

			if ( null !== $template ) {
				return $template;
			}

			$template = '';
			$path     = get_template_directory() . '/layout/css/style-overrides.css';

			if ( is_readable( $path ) ) {
				$contents = file_get_contents( $path ); // phpcs:ignore WordPress.WP.AlternativeFunctions
				$template = is_string( $contents ) ? $contents : '';
			}

			return $template;
		}

		/**
		 * @return void
		 */
		public function enqueue() {
			$css = $this->generate_css();

			if ( '' !== $css ) {
				wp_add_inline_style( $this->handler, $css );
			}
		}
	}
}
