<?php get_header(); ?>
<?php get_template_part('sections/section','header-archive'); ?>


<div class="container">
	<div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
			<div class="has-padding">
				<?php if(have_posts() ) {
					
					while(have_posts() ) {
						the_post(); 
				?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
					<div class="mt-date"><time datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php echo get_the_date( get_option('date_format'), $post->ID); ?></time></div>
					
					<header class="entry-header">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-meta">
						<?php echo __('Written by: ', 'pixova-lite') . '<a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'" rel="author">'.get_the_author().'</a>'; ?>
						<?php echo '&middot;'; ?>
						<?php echo __('Posted in: ', 'pixova-lite').get_the_category_list(', ', '', false); ?>
						<?php echo '&middot;'; ?>
						<?php the_tags( __('Tags:', 'pixova-lite') , ', ', '<br />' ); ?>
					</div><!--/.entry-meta-->

					<?php if( has_post_thumbnail() ) { ?>
						<aside class="entry-featured-image">
							<?php echo get_the_post_thumbnail($post->ID, 'pixova-lite-featured-blog-image'); ?>
						</aside>
					<?php } ?>

					<div class="entry-content">
						<?php
						the_excerpt();

						wp_link_pages( array(
							'before' => '<nav class="page-links">' . __( 'Pages:', 'pixova-lite' ),
							'after'  => '</nav>',
						) );
						?>
					</div><!-- .entry-content -->


				</article><!-- #post-## -->

					<?php } ?>
				<?php } ?>
			</div><!--/.has-padding-->
		</div><!--/.col-lg-8-->

    <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
	<aside class="mt-blog-sidebar">
	<?php
		if(is_active_sidebar('blog-sidebar')) {
			dynamic_sidebar('blog-sidebar');
		} else {
			the_widget( 'WP_Widget_Search', sprintf('title=%', __('Search', 'pixova-lite') ) );
			the_widget( 'WP_Widget_Calendar', sprintf('title=%s', __('Calendar', 'pixova-lite') ) );
		}
	?>
	</aside> <!--/.mt-blog-sidebar-->
	</div><!--/.col-md-3-->
	</div> <!-- /.row-->


	<div class="row">
		<div class="mt-custom-pagination col-lg-12">
			<?php pixova_lite_pagination(); ?>
		</div>
	</div>

</div><!--/.container-->

<?php get_footer(); ?>