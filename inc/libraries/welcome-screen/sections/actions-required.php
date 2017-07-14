<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Actions required
 */

wp_enqueue_style( 'plugin-install' );
wp_enqueue_script( 'plugin-install' );
wp_enqueue_script( 'updates' );
?>

<div class="feature-section action-required demo-import-boxed" id="plugin-filter">

	<?php
	global $pixova_required_actions;
	$hooray = true;
	if ( ! empty( $pixova_required_actions ) ) :

		/* pixova_show_required_actions is an array of true/false for each required action that was dismissed */
		$pixova_show_required_actions = get_option( 'pixova_show_required_actions' );

		foreach ( $pixova_required_actions as $pixova_required_action_key => $pixova_required_action_value ) :
			$hidden = false;
			if ( isset( $pixova_show_required_actions[ $pixova_required_action_value['id'] ] ) && false === $pixova_show_required_actions[ $pixova_required_action_value['id'] ] ) {
				$hidden = true;
			}
			if ( isset( $pixova_required_action_value['check'] ) && $pixova_required_action_value['check'] ) {
				continue;
			}
			?>
			<div class="pixova-action-required-box">
				<?php if ( ! $hidden ) : ?>
					<span data-action="dismiss" class="dashicons dashicons-visibility pixova-required-action-button"
						  id="<?php echo esc_attr( $pixova_required_action_value['id'] ); ?>"></span>
				<?php else : ?>
					<span data-action="add" class="dashicons dashicons-hidden pixova-required-action-button"
						  id="<?php echo esc_attr( $pixova_required_action_value['id'] ); ?>"></span>
				<?php endif; ?>
				<h3><?php if ( ! empty( $pixova_required_action_value['title'] ) ) : echo esc_html( $pixova_required_action_value['title'] );
endif; ?></h3>
				<p>
					<?php if ( ! empty( $pixova_required_action_value['description'] ) ) : echo esc_html( $pixova_required_action_value['description'] );
endif; ?>
					<?php if ( ! empty( $pixova_required_action_value['help'] ) ) : echo '<br/>' . wp_kses_post( $pixova_required_action_value['help'] );
endif; ?>
				</p>
				<?php
				if ( ! empty( $pixova_required_action_value['plugin_slug'] ) ) {
					$active = $this->check_active( $pixova_required_action_value['plugin_slug'] );
					$url    = $this->create_action_link( $active['needs'], $pixova_required_action_value['plugin_slug'] );
					$label  = '';

					switch ( $active['needs'] ) {
						case 'install':
							$class = 'install-now button';
							$label = __( 'Install', 'pixova-lite' );
							break;
						case 'activate':
							$class = 'activate-now button button-primary';
							$label = __( 'Activate', 'pixova-lite' );
							break;
						case 'deactivate':
							$class = 'deactivate-now button';
							$label = __( 'Deactivate', 'pixova-lite' );
							break;
					}

					?>
					<p class="plugin-card-<?php echo esc_attr( $pixova_required_action_value['plugin_slug'] ) ?> action_button <?php echo ( 'install' !== $active['needs'] && $active['status'] ) ? 'active' : '' ?>">
						<a data-slug="<?php echo esc_attr( $pixova_required_action_value['plugin_slug'] ) ?>"
						   class="<?php echo esc_attr( $class ); ?>"
						   href="<?php echo esc_url( $url ) ?>"> <?php echo esc_html( $label ) ?> </a>
					</p>
					<?php
				};
				?>
			</div>
			<?php
			$hooray = false;
		endforeach;
	endif;

	if ( $hooray ) :
		echo '<span class="hooray">' . __( 'Hooray! There are no required actions for you right now.', 'pixova-lite' ) . '</span>';
	endif;
	?>

</div>
