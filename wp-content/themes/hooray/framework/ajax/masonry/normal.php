<?php
function bdayhMasonryNormal( $cols = "2cols" ){
    ?>
    <div class="bd-container bd-blog-masonry loading">
        <div class="bd-main">

	        <?php get_template_part( 'framework/global/slider' );
	        // Global.
	        global $post;
	        $paged = ( get_query_var("paged") != ""?(int)get_query_var("paged"):(get_query_var("page") != ""?(int)get_query_var("page"):1) );

	        // Query Post.
	        $wpcats = bd_get_all_category_ids();
	        query_posts( 'ignore_sticky_posts=0&paged='.$paged.'', array( 'category__in' => $wpcats ) );

	        ?>

            <div class="blog-v1 blog-v">
                <div id="containn" class="bdayh-blog-standard">

                    <div id="content" class="posts-gird">
                        <main id="site-main" class="site-main" role="main">

                            <div id="container-grid" class="blog-masonry filterable-posts posts-gird-<?php echo $cols ?>" data-cols="<?php echo $cols ?>">
                                <?php if ( have_posts() ) : ?>

                                    <?php
                                    // Start the loop.
                                    while ( have_posts() ) : the_post();

	                                    get_template_part( 'framework/loop/loop-masonry' );

                                        // End the loop.
                                    endwhile;

                                // If no content, include the "No posts found" template.
                                else :

                                    get_template_part( 'framework/loop/not-found' );

                                endif;
                                ?>
                            </div>
                        </main>
                    </div><!-- #content /-->

                    <div id="loading">
                        <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
                    </div>

                </div>
            </div><!-- .blog-v1 /-->

            <?php
            // Page Navi
            echo '<div class="clear"></div><br><br>';

            bd_pagenavi();

            echo '<div class="clear"></div>';
            ?>
        </div><!-- .bd-main /-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container /-->

    <?php
}
?>