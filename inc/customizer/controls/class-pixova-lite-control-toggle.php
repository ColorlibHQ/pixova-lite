<?php
/**
 * An on/off switch, replacing Epsilon_Control_Toggle.
 *
 * Presentation only: the value is a plain boolean checkbox, so any sanitiser
 * that worked with the Epsilon control still works here.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Pixova_Lite_Control_Toggle' ) ) {

	class Pixova_Lite_Control_Toggle extends WP_Customize_Control {

		/**
		 * @var string
		 */
		public $type = 'pixova-lite-toggle';

		/**
		 * Render the control.
		 *
		 * @return void
		 */
		public function render_content() {
			$id = '_customize-input-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<span class="pixova-lite-toggle">
				<input
					type="checkbox"
					id="<?php echo esc_attr( $id ); ?>"
					class="pixova-lite-toggle__input"
					value="1"
					<?php checked( $this->value() ); ?>
					<?php $this->link(); ?>
				/>
				<label class="pixova-lite-toggle__track" for="<?php echo esc_attr( $id ); ?>">
					<span class="screen-reader-text"><?php echo esc_html( $this->label ); ?></span>
				</label>
			</span>
			<?php
		}
	}
}
