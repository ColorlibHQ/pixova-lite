<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * Getting started template
 */
$customizer_url = admin_url() . 'customize.php';
$count          = $this->count_actions();
?>

<div class="feature-section three-col">
	<div class="col">
		<h3><?php esc_html_e( 'Step 1 - Implement recommended actions', 'pixova-lite' ); ?></h3>
		<p><?php esc_html_e( 'We\'ve compiled a list of steps for you, to take make sure the experience you\'ll have using one of our products is very easy to follow.', 'pixova-lite' ); ?></p>
		<?php if ( 0 == $count ) { ?>
			<p><span class="dashicons dashicons-yes"></span>
				<a href="<?php echo esc_url( admin_url( 'themes.php?page=pixova-welcome&tab=recommended_actions' ) ); ?>"><?php esc_html_e( 'No recommended actions left to perform', 'pixova-lite' ); ?></a>
			</p>
		<?php } else { ?>
			<p><span class="dashicons dashicons-no-alt"></span> <a
					href="<?php echo esc_url( admin_url( 'themes.php?page=pixova-welcome&tab=recommended_actions' ) ); ?>"><?php esc_html_e( 'Check recommended actions', 'pixova-lite' ); ?></a>
			</p> <?php
}; ?>
	</div><!--/.col-->

	<div class="col">
		<h3><?php esc_html_e( 'Step 2 - Check our documentation', 'pixova-lite' ); ?></h3>
		<p><?php esc_html_e( 'Even if you\'re a long-time WordPress user, we still believe you should give our documentation a very quick Read.', 'pixova-lite' ) ?></p>
		<p>
			<a target="_blank"
			   href="<?php echo esc_url( 'https://colorlib.com/wp/support/pixova/' ); ?>"><?php esc_html_e( 'Full documentation', 'pixova-lite' ); ?></a>
		</p>
	</div><!--/.col-->

	<div class="col">
		<h3><?php esc_html_e( 'Step 3 - Customize everything', 'pixova-lite' ); ?></h3>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'pixova-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( $customizer_url ); ?>"
			  class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'pixova-lite' ); ?></a>
		</p>
	</div><!--/.col-->
</div><!--/.feature-section-->
