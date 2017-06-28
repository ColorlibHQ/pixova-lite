<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="pixova-lite-tab-pane active">

	<div class="pixova-tab-pane-center">

		<h1 class="pixova-lite-welcome-title">Welcome to Pixova Lite! <?php if ( ! empty( $pixova_lite['Version'] ) ) : ?> <sup id="pixova-lite-theme-version"><?php echo esc_attr( $pixova_lite['Version'] ); ?> </sup><?php endif; ?></h1>
		<p><?php esc_html_e( 'Our most popular free one page WordPress theme, Pixova Lite!','pixova-lite' ); ?></p>
		<p><?php esc_html_e( 'We want to make sure you have the best experience using Pixova Lite and that is why we gathered here all the necessary informations for you. We hope you will enjoy using Pixova Lite, as much as we enjoy creating great products.', 'pixova-lite' ); ?>

	</div>
	<hr />
	<div class="pixova-tab-pane-center">

		<h1><?php esc_html_e( 'Getting started', 'pixova-lite' ); ?></h1>
		<h4><?php esc_html_e( 'Customize everything in a single place.' ,'pixova-lite' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'pixova-lite' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'pixova-lite' ); ?></a></p>

	</div>
	<hr />

	<div class="pixova-tab-pane-center">
		<h1><?php esc_html_e( 'FAQ', 'pixova-lite' ); ?></h1>
	</div>

	<div class="pixova-tab-pane-half pixova-tab-pane-first-half">

		<h4><?php esc_html_e( 'Create a child theme', 'pixova-lite' ); ?></h4>
		<p><?php esc_html_e( 'If you want to make changes to the theme\'s files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.', 'pixova-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.machothemes.com/article/34-how-to-create-a-child-theme' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'pixova-lite' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Translate Pixova Lite', 'pixova-lite' ); ?></h4>
		<p><?php esc_html_e( 'In the below documentation you will find an easy way to translate Pixova Lite into your native language or any other language you need for you site.', 'pixova-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.themeisle.com/article/80-how-to-translate-pixova' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'pixova-lite' ); ?></a></p>

	</div>

	<div class="pixova-tab-pane-half">

		<h4><?php esc_html_e( 'Link Menu to sections', 'pixova-lite' ); ?></h4>
		<p><?php esc_html_e( 'Linking the frontpage sections with the top menu is very simple, all you need to do is assign section anchors to the menu. In the below documentation you will find a nice tutorial about this.', 'pixova-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.machothemes.com/article/30-faq-common-issues#linkmenu' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'pixova-lite' ); ?></a></p>

		<hr />

		<h4><?php esc_html_e( 'Change the page template', 'pixova-lite' ); ?></h4>
		<p><?php esc_html_e( 'Pixova Lite has three page templates available, two for the blog and one for full width pages. To make sure you take full advantage of those page templates, make sure you read the documentation.', 'pixova-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.themeisle.com/article/32-how-to-change-the-page-template-in-wordpress' ); ?>" class="button"><?php esc_html_e( 'View how to do this', 'pixova-lite' ); ?></a></p>

	</div>

	<div class="pixova-lite-clear"></div>

	<hr />

	<div class="pixova-tab-pane-center">

		<h1><?php esc_html_e( 'View full documentation', 'pixova-lite' ); ?></h1>
		<p><?php esc_html_e( 'Need more details? Please check our full documentation for detailed information on how to use Pixova Lite.', 'pixova-lite' ); ?></p>
		<p><a target="_blank" href="<?php echo esc_url( 'http://docs.machothemes.com/category/106-pixova-lite' ); ?>" class="button button-primary"><?php esc_html_e( 'Read full documentation', 'pixova-lite' ); ?></a></p>

	</div>

	<hr />

	<div class="pixova-lite-clear"></div>

</div>
