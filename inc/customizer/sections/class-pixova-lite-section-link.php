<?php
/**
 * A Customizer section that is a signpost rather than a set of controls.
 *
 * Replaces Epsilon_Section_Recommended_Actions and Epsilon_Section_Pro. The
 * first of those rebuilt the About page's recommended actions inside the
 * Customizer, plugin install buttons and all; rather than carry two copies of
 * that interface, this points at the About page, which has the full version.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Pixova_Lite_Section_Link' ) ) {

	class Pixova_Lite_Section_Link extends WP_Customize_Section {

		/**
		 * @var string
		 */
		public $type = 'pixova-lite-link';

		/**
		 * @var string
		 */
		public $button_text = '';

		/**
		 * @var string
		 */
		public $button_url = '';

		/**
		 * @var bool Whether the link leaves the Customizer.
		 */
		public $external = false;

		/**
		 * Pass the extra properties through to the JS template.
		 *
		 * @return array
		 */
		public function json() {
			$json = parent::json();

			$json['button_text'] = $this->button_text;
			$json['button_url']  = esc_url( $this->button_url );
			$json['external']    = (bool) $this->external;
			$json['description'] = $this->description;

			return $json;
		}

		/**
		 * The section renders as a single link, so it needs no accordion.
		 *
		 * @return void
		 */
		protected function render_template() {
			?>
			<li id="accordion-section-{{ data.id }}"
				class="accordion-section pixova-lite-section-link control-section-{{ data.type }}">
				<h3 class="pixova-lite-section-link__title">{{ data.title }}</h3>
				<# if ( data.description ) { #>
					<p class="pixova-lite-section-link__description">{{ data.description }}</p>
				<# } #>
				<a class="button button-secondary pixova-lite-section-link__button"
					href="{{ data.button_url }}"
					<# if ( data.external ) { #>target="_blank" rel="noopener noreferrer"<# } #>>
					{{ data.button_text }}
				</a>
			</li>
			<?php
		}
	}
}
