<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<?php
		echo pixova_lite_entry_meta(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in the helper.
		?>
	</div><!--/.entry-meta-->
	<?php if ( has_post_thumbnail() ) { ?>
		<aside class="entry-featured-image">
			<?php echo get_the_post_thumbnail( $post->ID, 'pixova-lite-featured-blog-image' ); ?>
		</aside><!--/.entry-featured-image-->
	<?php } ?>

	<div class="entry-content">
		<?php

		echo the_excerpt();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pixova-lite' ),
				'after'  => '</div>',
			)
		);

		?>
	</div><!-- .entry-content -->

	<div class="clearfix"></div><!--/.clearfix-->
</article><!-- #post-## -->
