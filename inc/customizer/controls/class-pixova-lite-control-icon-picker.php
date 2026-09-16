<?php
/**
 * Pick a Font Awesome icon, replacing Epsilon_Control_Icon_Picker.
 *
 * The setting stores the icon's class string, the same as before, so values
 * saved by earlier versions keep working.
 *
 * The list is a <datalist> on a text field rather than a custom dropdown: it
 * is searchable, it degrades to a plain text field, and it lets someone type
 * a class the list does not know about.
 *
 * @package Pixova Lite
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'Pixova_Lite_Control_Icon_Picker' ) ) {

	class Pixova_Lite_Control_Icon_Picker extends WP_Customize_Control {

		/**
		 * @var string
		 */
		public $type = 'pixova-lite-icon-picker';

		/**
		 * The icons offered, as class => label.
		 *
		 * @return array
		 */
		public static function icons() {
			static $icons = null;

			if ( null !== $icons ) {
				return $icons;
			}

			$icons = array();
			$file  = get_template_directory() . '/inc/customizer/assets/icons.json';

			if ( is_readable( $file ) ) {
				$decoded = json_decode( file_get_contents( $file ), true );

				if ( is_array( $decoded ) ) {
					$icons = $decoded;
				}
			}

			return $icons;
		}

		/**
		 * Render the control.
		 *
		 * @return void
		 */
		public function render_content() {
			$input_id = '_customize-input-' . $this->id;
			$list_id  = $input_id . '-list';
			$icons    = self::icons();
			$value    = $this->value();
			// The field keeps showing exactly what is stored, but the swatch has to
			// draw it, so a Font Awesome 4 value is translated for the preview only.
			$preview  = pixova_lite_fontawesome_class( $value );
			?>
			<label for="<?php echo esc_attr( $input_id ); ?>">
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>

			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
			<?php endif; ?>

			<span class="pixova-lite-icon-picker">
				<i class="pixova-lite-icon-picker__preview <?php echo esc_attr( $preview ); ?>" aria-hidden="true"></i>
				<input
					type="text"
					id="<?php echo esc_attr( $input_id ); ?>"
					class="widefat pixova-lite-icon-picker__input"
					list="<?php echo esc_attr( $list_id ); ?>"
					value="<?php echo esc_attr( $value ); ?>"
					<?php $this->link(); ?>
				/>
				<datalist id="<?php echo esc_attr( $list_id ); ?>">
					<?php foreach ( $icons as $class => $label ) : ?>
						<option value="<?php echo esc_attr( $class ); ?>"><?php echo esc_html( $label ); ?></option>
					<?php endforeach; ?>
				</datalist>
			</span>
			<?php
		}
	}
}
