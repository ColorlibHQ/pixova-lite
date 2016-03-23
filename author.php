<?php get_header(); ?>
<?php get_template_part('sections/section', 'header'); ?>
    <div class="container">
        <div class="row">



            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="has-padding">


                    <div class="row mt-author-area">
                        <div class="col-lg-2">
                            <a class="mt-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
                                <?php echo get_avatar( get_the_author_meta( 'user_email' ), 110 ); ?>
                            </a>
                        </div>

                        <div class="col-lg-10">
                            <h3> <?php echo __('Written by: ', 'pixova-lite') .get_the_author(); ?></h3>
                            <div class="mt-author-info">
                                <?php the_author_meta( 'description' ); ?>
                            </div>
                        </div><!--/.col-lg-9-->
                    </div>

                    <div class="clearfix"></div>



                    <?php if(have_posts() ) { while(have_posts() ) { the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                            <!-- Check that the date is enabled before displaying it -->

                            <div class="mt-date">
                                <time datetime="<?php printf( '%s-%s-%s', get_the_date( 'Y' ), get_the_date( 'm' ), get_the_date( 'd' ) ); ?>"><?php echo get_the_date( get_option('date_format'), $post->ID); ?></time>
                            </div>

                            <header class="entry-header">
                                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
                            </header><!-- .entry-header -->



                            <div class="entry-meta">


                                <?php echo __('Written by: ', 'pixova-lite'). get_the_author(); ?>

                                
                                <?php

                                    echo '&middot;';
                                    echo __('Posted in:', 'pixova-lite') . get_the_category_list(', ', '', false);

                                ?>
                                
                                <?php

                                echo '&middot;';
                                 the_tags( __('Tags:', 'pixova-lite') , ', ', '<br />' );

                                ?>
                            </div><!--/.entry-meta-->
                            
                            <?php
                                if( has_post_thumbnail() ) { ?>
                                    <aside class="entry-featured-image">
                                        <?php echo get_the_post_thumbnail($post->ID, 'pixova-lite-featured-blog-image'); ?>
                                    </aside><!--/.entry-featured-image-->
                                <?php }  ?>

                            <div class="entry-content">
                                <?php

                                echo apply_filters('the_content', substr(get_the_content(), 0, 200) );

                                wp_link_pages( array(
                                    'before' => '<nav class="page-links">' . __( 'Pages:', 'pixova-lite' ),
                                    'after'  => '</nav>',
                                ) );
                                ?>
                            </div><!-- .entry-content -->
                        </article><!-- #post-## -->

                    <?php } ?>
                    <?php } ?>

            </div><!--/.col-lg-8-->


            <aside class="col-lg-3 col-md-3 col-sm-3 hidden-xs pull-right">
                <div class="mt-blog-sidebar">
                    <?php
                    if(is_active_sidebar('blog-sidebar')) {
                        dynamic_sidebar('blog-sidebar');
                    } else {
                        the_widget( 'WP_Widget_Search', sprintf('title=%s', __('Search', 'pixova-lite') ) );
                        the_widget( 'WP_Widget_Calendar', sprintf('title=%s', __('Calendar', 'pixova-lite') ) );
                    }
                    ?>
                </div> <!--/.mt-blog-sidebar-->
            </aside><!--/.col-md-3-->


        <nav class="mt-custom-pagination col-lg-12">
            <?php pixova_lite_pagination(); ?>
        </nav><!--/.mt-custom-pagination-->

    </div><!-- SECTION -->
            </div><!--/.row-->
    </div><!--/.container-->

<?php get_footer(); ?>