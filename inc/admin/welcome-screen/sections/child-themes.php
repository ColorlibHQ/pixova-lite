<?php
/**
 * Child themes template
 */
?>
<div id="child_themes" class="pixova-lite-tab-pane">

	<?php
		$current_theme = wp_get_theme();
	?>

	<div class="pixova-tab-pane-center">

		<h1><?php esc_html_e( 'Get a whole new look for your site', 'pixova-lite' ); ?></h1>

		<p><?php esc_html_e( 'Below you will find a selection of Pixova Lite child themes that will totally transform the look of your site.', 'pixova-lite' ); ?></p>

	</div>


	<div class="pixova-tab-pane-half pixova-tab-pane-first-half">

		<!-- ZBlackBeard -->
		<div class="pixova-lite-child-theme-container">
			<div class="pixova-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zblackbeard.jpg'; ?>" alt="<?php esc_html_e( 'ZBlackBeard Child Theme', 'pixova-lite' ); ?>" />
				<div class="pixova-lite-child-theme-description">
					<h2><?php esc_html_e( 'ZBlackBeard', 'pixova-lite' ); ?></h2>
				</div>
			</div>
			<div class="pixova-lite-child-theme-details">
				<?php if ( 'ZBlackBeard' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zblackbeard</span>
						<a href="http://themeisle.com/themes/zblackbeard/#pricing-single" class="button button-primary install right"><?php esc_html_e( 'Get now', 'pixova-lite' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zblackbeard"><?php esc_html_e( 'Live Preview','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Zblackbeard - Current theme', 'pixova-lite' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
		<hr />

		<!-- OnePirate -->
		<div class="pixova-lite-child-theme-container">
			<div class="pixova-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/onepirate.jpg'; ?>" alt="<?php esc_html_e( 'OnePirate Child Theme', 'pixova-lite' ); ?>" />
				<div class="pixova-lite-child-theme-description">
					<h2><?php esc_html_e( 'OnePirate', 'pixova-lite' ); ?></h2>
				</div>
			</div>
			<div class="pixova-lite-child-theme-details">
				<?php if ( 'OnePirate' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">OnePirate</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=onepirate' ), 'install-theme_onepirate' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'pixova-lite' ), '<span class="screen-reader-text">ZblackBeard</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/onepirate"><?php esc_html_e( 'Live Preview','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'OnePirate - Current theme', 'pixova-lite' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>
		
		<hr/>
		<!-- Zifer Child -->
		<div class="pixova-lite-child-theme-container">
			<div class="pixova-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zifer-child.jpg'; ?>" alt="<?php esc_html_e( 'Zifer Child Theme', 'pixova-lite' ); ?>" />
				<div class="pixova-lite-child-theme-description">
					<h2><?php esc_html_e( 'Zifer', 'pixova-lite' ); ?></h2>
				</div>
			</div>
			<div class="pixova-lite-child-theme-details">
				<?php if ( 'Zifer Child' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zifer Child</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zifer-child' ), 'install-theme_zifer-child' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'pixova-lite' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zifer-child"><?php esc_html_e( 'Live Preview','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } else { ?>
					<div class="theme-details active">
						<span class="theme-name"><?php echo esc_html_e( 'Zifer Child - Current theme', 'pixova-lite' ); ?></span>
						<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e( 'Customize','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } ?>
			</div>
		</div>

	</div>

	<div class="pixova-tab-pane-half">
		<!-- ResponsiveBoat -->
		<div class="pixova-lite-child-theme-container">
			<div class="pixova-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/responsiveboat.png'; ?>" alt="<?php esc_html_e( 'ResponsiveBoat', 'pixova-lite' ); ?>" />
				<div class="pixova-lite-child-theme-description">
					<h2><?php esc_html_e( 'ResponsiveBoat', 'pixova-lite' ); ?></h2>
				</div>
			</div>
			<div class="pixova-lite-child-theme-details">
				<?php if ( 'ResponsiveBoat' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">ResponsiveBoat</span>
						<a href="http://themeisle.com/themes/responsiveboat-theme/#pricing-single" class="button button-primary install right"><?php printf( __( 'Get %s now', 'pixova-lite' ), '<span class="screen-reader-text">ResponsiveBoat</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/responsiveboat"><?php esc_html_e( 'Live Preview','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } else { ?>
				<div class="theme-details active">
					<span class="theme-name"><?php echo esc_html_e( 'ResponsiveBoat - Current theme', 'pixova-lite' ); ?></span>
					<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','pixova-lite'); ?></a>
					<div class="pixova-lite-clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>
		<hr />

		<!-- Zerius -->
		<div class="pixova-lite-child-theme-container">
			<div class="pixova-lite-child-theme-image-container">
				<img src="<?php echo esc_url( get_template_directory_uri() ) . '/inc/admin/welcome-screen/img/zerius.jpg'; ?>" alt="<?php esc_html_e( 'Zerius Child Theme', 'pixova-lite' ); ?>" />
				<div class="pixova-lite-child-theme-description">
					<h2><?php esc_html_e( 'Zerius', 'pixova-lite' ); ?></h2>
				</div>
			</div>
			<div class="pixova-lite-child-theme-details">
				<?php if ( 'Zerius' != $current_theme['Name'] ) { ?>
					<div class="theme-details">
						<span class="theme-name">Zerius</span>
						<a href="<?php echo esc_url( wp_nonce_url( self_admin_url( 'update.php?action=install-theme&theme=zerius' ), 'install-theme_zerius' ) ); ?>" class="button button-primary install right"><?php printf( __( 'Install %s now', 'pixova-lite' ), '<span class="screen-reader-text">Zerius</span>' ); ?></a>
						<a class="button button-secondary preview right" target="_blank" href="https://wp-themes.com/zerius"><?php esc_html_e( 'Live Preview','pixova-lite'); ?></a>
						<div class="pixova-lite-clear"></div>
					</div>
				<?php } else { ?>
				<div class="theme-details active">
					<span class="theme-name"><?php echo esc_html_e( 'Zerius - Current theme', 'pixova-lite' ); ?></span>
					<a class="button button-secondary customize right" target="_blank" href="<?php echo get_site_url(). '/wp-admin/customize.php' ?>"><?php esc_html_e('Customize','pixova-lite'); ?></a>
					<div class="pixova-lite-clear"></div>
				</div>
				<?php } ?>
			</div>
		</div>

	</div>

</div>
