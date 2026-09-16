<?php
/**
 * Template part for the recommended plugins tab in welcome screen
 *
 * @package Pixova Lite
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}
wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );
add_thickbox();
?>

<?php $this->prime_plugin_information( array_keys( $this->plugins ) ); ?>

<div class="feature-section recommended-plugins three-col demo-import-boxed" id="plugin-filter">
	<?php
	foreach ( $this->plugins as $plugin => $prop ) {
		$info = $this->get_plugin_information( $plugin );

		/*
		 * WordPress.org keeps answering for a plugin it has closed, but with no
		 * version, author or icon -- which used to render as a blank card with
		 * an Install button that could not work. Skip it instead.
		 */
		if ( empty( $info['info']->version ) || empty( $info['info']->name ) ) {
			continue;
		}
		?>
		<div class="col plugin_box">

			<?php if ( $prop['recommended'] ) { ?>
				<span class="recommended"><?php echo esc_html__( 'Recommended', 'pixova-lite' ); ?></span>
			<?php } ?>

			<img src="<?php echo esc_attr( $info['icon'] ); ?>" alt="plugin box image">
			<span class="version"><?php echo esc_html__( 'Version:', 'pixova-lite' ); ?><?php echo esc_html( $info['info']->version ); ?></span>
			<span class="separator">|</span> <?php echo wp_kses_post( $info['info']->author ); ?>
			<?php $pixova_lite_active = ( 'install' !== $info['needs'] && $info['active'] ); ?>
			<?php /* The button belongs inside the bar: as a sibling it was positioned
			         independently, so it stood taller than the bar it was meant to sit
			         in and the bar had to reserve a fixed 105px for it whatever the
			         label said. */ ?>
			<div class="action_bar <?php echo $pixova_lite_active ? 'active' : ''; ?>">
				<span class="plugin_name"><?php echo $pixova_lite_active ? esc_html__( 'Active:', 'pixova-lite' ) . ' ' : ''; ?><?php echo esc_html( $info['info']->name ); ?></span>
				<span class="plugin-card-<?php echo esc_attr( $plugin ); ?> action_button <?php echo $pixova_lite_active ? 'active' : ''; ?>">
					<a data-slug="<?php echo esc_attr( $plugin ); ?>" class="<?php echo esc_attr( $info['class'] ); ?>" href="<?php echo esc_url( $info['url'] ); ?>"><?php echo esc_html( $info['label'] ); ?></a>
				</span>
			</div>
		</div>
	<?php
	}// End foreach().
	?>
</div>
