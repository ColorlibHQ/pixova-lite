<?php
/**
 * Heading typography, replacing Epsilon_Control_Typography.
 *
 * The setting holds a JSON string in the shape earlier versions wrote, so a
 * site that already configured its headings keeps them. A hidden field carries
 * that JSON and is what the setting is bound to; the visible fields edit it.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Pixova_Lite_Control_Typography' ) ) {

	class Pixova_Lite_Control_Typography extends WP_Customize_Control {

		/**
		 * @var string
		 */
		public $type = 'pixova-lite-typography';

		/**
		 * Selectors this control styles. Kept for reference; the front end
		 * takes its selectors from the theme's own registration.
		 *
		 * @var array
		 */
		public $selectors = array();

		/**
		 * @var array
		 */
		public $font_defaults = array();

		/**
		 * Render the control.
		 *
		 * @return void
		 */
		public function render_content() {
			$id       = '_customize-input-' . $this->id;
			$fonts    = class_exists( 'Pixova_Lite_Typography' ) ? Pixova_Lite_Typography::get_fonts() : array();
			$choices  = is_array( $this->choices ) ? $this->choices : array();
			$defaults = wp_parse_args(
				is_array( $this->font_defaults ) ? $this->font_defaults : array(),
				array(
					'font-family'    => '',
					'font-size'      => '',
					'line-height'    => '',
					'letter-spacing' => '',
				)
			);

			$stored = json_decode( str_replace( '&quot;', '"', (string) $this->value() ), true );
			$values = ( is_array( $stored ) && ! empty( $stored['json'] ) && is_array( $stored['json'] ) )
				? $stored['json']
				: array();

			$value_for = function ( $key ) use ( $values, $defaults ) {
				if ( isset( $values[ $key ] ) && '' !== $values[ $key ] ) {
					return $values[ $key ];
				}

				return isset( $defaults[ $key ] ) ? $defaults[ $key ] : '';
			};

			$numbers = array(
				'font-size'      => __( 'Font size (px)', 'pixova-lite' ),
				'line-height'    => __( 'Line height (px)', 'pixova-lite' ),
				'letter-spacing' => __( 'Letter spacing (px)', 'pixova-lite' ),
			);
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>

			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<span class="pixova-lite-typography"
				data-selectors="<?php echo esc_attr( wp_json_encode( array_values( (array) $this->selectors ) ) ); ?>">

				<?php if ( in_array( 'font-family', $choices, true ) ) : ?>
					<label class="pixova-lite-typography__row">
						<span><?php esc_html_e( 'Font family', 'pixova-lite' ); ?></span>
						<select class="pixova-lite-typography__field" data-property="font-family">
							<option value=""><?php esc_html_e( 'Theme default', 'pixova-lite' ); ?></option>
							<?php foreach ( $fonts as $family => $font ) : ?>
								<option value="<?php echo esc_attr( $family ); ?>" <?php selected( $value_for( 'font-family' ), $family ); ?>>
									<?php echo esc_html( $family ); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</label>
				<?php endif; ?>

				<?php foreach ( $numbers as $property => $label ) : ?>
					<?php if ( in_array( $property, $choices, true ) ) : ?>
						<label class="pixova-lite-typography__row">
							<span><?php echo esc_html( $label ); ?></span>
							<input
								type="number"
								class="pixova-lite-typography__field"
								data-property="<?php echo esc_attr( $property ); ?>"
								value="<?php echo esc_attr( $value_for( $property ) ); ?>"
							/>
						</label>
					<?php endif; ?>
				<?php endforeach; ?>

				<?php if ( in_array( 'font-weight', $choices, true ) ) : ?>
					<label class="pixova-lite-typography__check">
						<input type="checkbox" class="pixova-lite-typography__field" data-property="font-weight"
							value="on" <?php checked( 'on', $value_for( 'font-weight' ) ); ?> />
						<span><?php esc_html_e( 'Bold', 'pixova-lite' ); ?></span>
					</label>
				<?php endif; ?>

				<?php if ( in_array( 'font-style', $choices, true ) ) : ?>
					<label class="pixova-lite-typography__check">
						<input type="checkbox" class="pixova-lite-typography__field" data-property="font-style"
							value="on" <?php checked( 'on', $value_for( 'font-style' ) ); ?> />
						<span><?php esc_html_e( 'Italic', 'pixova-lite' ); ?></span>
					</label>
				<?php endif; ?>

				<input type="hidden" id="<?php echo esc_attr( $id ); ?>"
					class="pixova-lite-typography__value"
					value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
			</span>
			<?php
		}
	}
}
