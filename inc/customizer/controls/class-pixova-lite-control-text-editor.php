<?php
/**
 * A TinyMCE editor in the Customizer, replacing Epsilon_Control_Text_Editor.
 *
 * The Customizer builds a section's controls the first time it is opened, so
 * the editor cannot be initialised on page load. The markup is a plain
 * textarea -- which is what the setting reads from, and what a browser without
 * the editor still gets -- and assets/js/customizer-controls.js attaches
 * wp.editor to it when the control becomes visible.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Pixova_Lite_Control_Text_Editor' ) ) {

	class Pixova_Lite_Control_Text_Editor extends WP_Customize_Control {

		/**
		 * @var string
		 */
		public $type = 'pixova-lite-text-editor';

		/**
		 * Make sure the editor's own scripts and styles are available.
		 *
		 * @return void
		 */
		public function enqueue() {
			if ( function_exists( 'wp_enqueue_editor' ) ) {
				wp_enqueue_editor();
			}
		}

		/**
		 * Render the control.
		 *
		 * @return void
		 */
		public function render_content() {
			$input_id = '_customize-input-' . $this->id;
			?>
			<label for="<?php echo esc_attr( $input_id ); ?>">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>

			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<textarea
				id="<?php echo esc_attr( $input_id ); ?>"
				class="widefat pixova-lite-text-editor"
				rows="6"
				<?php $this->link(); ?>
			><?php echo esc_textarea( $this->value() ); ?></textarea>
			<?php
		}
	}
}
