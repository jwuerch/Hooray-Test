<?php
get_header();
global $post, $bd_data;
?>

    <div class="bd-container">
        <div class="bd-main">

            <div class="blog-v1">

                <main class="site-main" role="main">

                    <?php
                    // Start the loop.
                    while ( have_posts() ) : the_post();

                        get_template_part( 'content', 'page' );

                        // Comments.
                        if( bdayh_get_option('comments_pages') )
                            if ( comments_open() || get_comments_number() )
                                comments_template();

                        // End the loop.
                    endwhile;
                    ?>

                </main>
            </div><!-- .blog-v1-->

        </div><!-- .bd-main-->

	    <?php get_sidebar(); ?>
    </div><!-- .bd-container -->

<?php get_footer(); ?>