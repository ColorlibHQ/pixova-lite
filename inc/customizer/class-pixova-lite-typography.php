<?php
/**
 * Heading typography, replacing Epsilon_Typography.
 *
 * Each of the six heading settings stores a JSON string of the shape the
 * Epsilon control wrote, so settings saved by earlier versions are read
 * unchanged:
 *
 *   {"selectors":[".entry-content h1"],"json":{"font-family":"Roboto", ... }}
 *
 * The selectors are taken from the control's own registration rather than from
 * the stored value, so a saved setting cannot inject a selector.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Pixova_Lite_Typography' ) ) {

	class Pixova_Lite_Typography {

		/**
		 * @var Pixova_Lite_Typography|null
		 */
		private static $instance = null;

		/**
		 * @var string
		 */
		private $handler;

		/**
		 * Setting id => CSS selectors it styles.
		 *
		 * @var array
		 */
		private $options = array();

		/**
		 * Google font families in use this request.
		 *
		 * @var array
		 */
		private $fonts = array();

		/**
		 * @param array  $options
		 * @param string $handler
		 */
		public function __construct( $options, $handler ) {
			$this->options = $options;
			$this->handler = $handler;

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 11 );
		}

		/**
		 * @param array  $options
		 * @param string $handler
		 *
		 * @return Pixova_Lite_Typography
		 */
		public static function get_instance( $options = array(), $handler = null ) {
			if ( null === self::$instance ) {
				self::$instance = new self( $options, $handler );
			}

			return self::$instance;
		}

		/**
		 * Read one setting, tolerating anything that is not the shape we expect.
		 *
		 * @param string $id
		 *
		 * @return array
		 */
		public function get_option( $id ) {
			$value = get_theme_mod( $id, '' );

			if ( empty( $value ) || ! is_string( $value ) ) {
				return array();
			}

			// The Customizer stored these with entity-encoded quotes.
			$decoded = json_decode( str_replace( '&quot;', '"', $value ), true );

			if ( ! is_array( $decoded ) || empty( $decoded['json'] ) || ! is_array( $decoded['json'] ) ) {
				return array();
			}

			return $decoded['json'];
		}

		/**
		 * Turn one setting's properties into a declaration block.
		 *
		 * @param array $properties
		 *
		 * @return string
		 */
		public function build_declarations( $properties ) {
			$placeholders = array( 'Select font', 'Theme default', 'initial', 'default_font' );
			$units        = array( 'font-size', 'line-height', 'letter-spacing' );
			$allowed      = array( 'font-family', 'font-weight', 'font-style', 'font-size', 'line-height', 'letter-spacing' );
			$out          = '';

			foreach ( $properties as $property => $value ) {
				if ( ! in_array( $property, $allowed, true ) ) {
					continue;
				}

				if ( '' === $value || null === $value || in_array( $value, $placeholders, true ) ) {
					continue;
				}

				switch ( $property ) {
					case 'font-size':
					case 'line-height':
					case 'letter-spacing':
						$out .= $property . ':' . floatval( $value ) . 'px;';
						break;

					case 'font-weight':
						if ( 'on' === $value ) {
							$out .= 'font-weight:bold;';
						}
						break;

					case 'font-style':
						if ( 'on' === $value ) {
							$out .= 'font-style:italic;';
						}
						break;

					case 'font-family':
						$family = sanitize_text_field( $value );
						$this->fonts[] = $family;
						$out .= 'font-family:' . $this->quote_family( $family ) . ';';
						break;
				}
			}

			return $out;
		}

		/**
		 * Quote a family name if it needs it, so the declaration stays valid.
		 *
		 * @param string $family
		 *
		 * @return string
		 */
		private function quote_family( $family ) {
			$family = str_replace( array( '"', "'", ';', '{', '}' ), '', $family );

			return preg_match( '/^[a-zA-Z0-9-]+$/', $family ) ? $family : '"' . $family . '"';
		}

		/**
		 * @return string
		 */
		public function generate_css() {
			$css = '';

			foreach ( $this->options as $id => $selectors ) {
				$declarations = $this->build_declarations( $this->get_option( $id ) );

				if ( '' === $declarations ) {
					continue;
				}

				$css .= implode( ',', (array) $selectors ) . '{' . $declarations . '}';
			}

			return $css;
		}

		/**
		 * The Google fonts this theme offers, keyed by family name.
		 *
		 * @return array
		 */
		public static function get_fonts() {
			static $fonts = null;

			if ( null !== $fonts ) {
				return $fonts;
			}

			$fonts = array();
			$path  = get_template_directory() . '/inc/customizer/assets/fonts.json';

			if ( is_readable( $path ) ) {
				$decoded = json_decode( file_get_contents( $path ), true ); // phpcs:ignore WordPress.WP.AlternativeFunctions

				if ( is_array( $decoded ) ) {
					$fonts = $decoded;
				}
			}

			return $fonts;
		}

		/**
		 * @return void
		 */
		public function enqueue() {
			$css = $this->generate_css();

			if ( '' === $css ) {
				return;
			}

			$imports = array();
			$catalog = self::get_fonts();

			foreach ( array_unique( array_filter( $this->fonts ) ) as $family ) {
				// Each catalogue entry names the weights and subsets to fetch.
				$imports[] = isset( $catalog[ $family ]['import'] ) ? $catalog[ $family ]['import'] : $family;
			}

			if ( ! empty( $imports ) ) {
				wp_enqueue_style(
					'pixova-lite-typography-fonts',
					'https://fonts.googleapis.com/css?family=' . str_replace( ' ', '+', implode( '|', $imports ) ) . '&display=swap',
					array(),
					null
				);
			}

			wp_add_inline_style( $this->handler, $css );
		}
	}
}
