<?php
/**
 * A range slider with a live readout, replacing Epsilon_Control_Slider.
 *
 * Epsilon's version pulled in jQuery UI and rendered a disabled text field
 * beside it. A native <input type="range"> needs no JavaScript to work and is
 * keyboard accessible on its own.
 *
 * Bounds come from $choices, the same shape the Epsilon control took:
 *   'choices' => array( 'min' => 1, 'max' => 4, 'step' => 1 )
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Pixova_Lite_Control_Range' ) ) {

	class Pixova_Lite_Control_Range extends WP_Customize_Control {

		/**
		 * @var string
		 */
		public $type = 'pixova-lite-range';

		/**
		 * Render the control.
		 *
		 * @return void
		 */
		public function render_content() {
			$input_id    = '_customize-input-' . $this->id;
			$describedby = ! empty( $this->description ) ? '_customize-description-' . $this->id : '';

			$bounds = wp_parse_args(
				is_array( $this->choices ) ? $this->choices : array(),
				array(
					'min'  => 0,
					'max'  => 100,
					'step' => 1,
				)
			);
			?>
			<label for="<?php echo esc_attr( $input_id ); ?>">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>

			<?php if ( $describedby ) : ?>
				<span id="<?php echo esc_attr( $describedby ); ?>" class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<span class="pixova-lite-range">
				<input
					type="range"
					id="<?php echo esc_attr( $input_id ); ?>"
					<?php if ( $describedby ) : ?>aria-describedby="<?php echo esc_attr( $describedby ); ?>"<?php endif; ?>
					min="<?php echo esc_attr( $bounds['min'] ); ?>"
					max="<?php echo esc_attr( $bounds['max'] ); ?>"
					step="<?php echo esc_attr( $bounds['step'] ); ?>"
					value="<?php echo esc_attr( $this->value() ); ?>"
					<?php $this->link(); ?>
				/>
				<output class="pixova-lite-range__value" for="<?php echo esc_attr( $input_id ); ?>"><?php echo esc_html( $this->value() ); ?></output>
			</span>
			<?php
		}
	}
}
