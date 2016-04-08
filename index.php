<?php get_header(); ?>
<?php //get_template_part('sections/section','header-archive'); ?>

    <div class="container">
        <div class="row">
            <section class="has-padding">

                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <?php if(have_posts() ) {

                        while(have_posts() ) {
                            the_post();
                            ?>

                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                                <header class="entry-header">
                                    <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                                </header><!-- .entry-header -->

                                <div class="entry-meta">
                                    <time datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php echo get_the_date( get_option('date_format'), $post->ID); ?></time>
                                    <?php printf(
                                        // Translators: 1 is the post author, 2 is the category list.
                                        __( '<span class="post-meta-separator">&middot</span>by %1$s<span class="post-meta-separator">&middot</span>%2$s', 'pixova-lite' ),
                                        get_the_author(),
                                        // Translators: Category list separator.
                                        get_the_category_list( __( ', ', 'pixova-lite' ), '', false )
                                    ); ?>
                                </div><!--/.entry-meta-->

                                <?php if( has_post_thumbnail() ) { ?>
                                    <aside class="entry-featured-image">
                                        <?php echo get_the_post_thumbnail($post->ID, 'pixova-lite-featured-blog-image'); ?>
                                    </aside><!--/.entry-featured-image-->
                                <?php } ?>

                                <div class="entry-content">
                                    <?php
                                        echo apply_filters('the_content', substr(get_the_content(), 0, 200) );

                                        wp_link_pages( array(
                                            'before' => '<div class="page-links">' . __( 'Pages:', 'pixova-lite' ),
                                            'after'  => '</div>',
                                        ) );

                                    ?>
                                </div><!-- .entry-content -->

                                <div class="clearfix"></div><!--/.clearfix-->
                            </article><!-- #post-## -->

                        <?php } ?>
                    <?php } ?>

                </div><!--/.col-lg-8-->


                <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
                    <aside class="mt-blog-sidebar">
                        <?php
                        if(is_active_sidebar('blog-sidebar')) {
                            dynamic_sidebar('blog-sidebar');
                        } else {
                            the_widget( 'WP_Widget_Search', sprintf('title=%s', __('Search', 'pixova-lite') ) );
                            the_widget( 'WP_Widget_Calendar', sprintf('title=%s', __('Calendar', 'pixova-lite') ) );
                        }
                        ?>
                    </aside> <!--/.mt-blog-sidebar-->
                </div><!--/.col-lg-3-->

                <nav class="mt-custom-pagination col-lg-12">
                    <?php the_posts_pagination(); ?>
                </nav><!--/.mt-custom-pagination-->


            </section><!--/section-->
        </div><!--/.row-->
    </div><!--/.container-->

<?php get_footer(); ?>