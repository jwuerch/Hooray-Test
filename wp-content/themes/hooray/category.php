<?php get_header(); ?>

    <div class="bd-container">
        <div class="bd-main">

            <div class="blog-v1 blog-v">
                <div id="containn">

                    <div id="content">
                        <main id="site-main" class="site-main" role="main">

                            <?php if ( have_posts() ) : ?>

                                <?php
                                // Show an optional term description.
                                $term_description = term_description();
                                if ( ! empty( $term_description ) ) :
                                    printf( '<div class="new-box">%s</div>', $term_description );
                                endif;
                                ?>

                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post();

                                    get_template_part( 'content', get_post_format() );

                                    // End the loop.
                                endwhile;

                                // Page Navi
                                bd_pagenavi();

                            // If no content, include the "No posts found" template.
                            else :

                                get_template_part( 'framework/loop/not-found' );

                            endif;
                            ?>

                        </main>
                    </div><!-- #content /-->

                </div>
            </div><!-- .blog-v1 /-->

            <div class="clear"></div>
        </div><!-- .bd-main /-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container /-->

<?php get_footer(); ?>