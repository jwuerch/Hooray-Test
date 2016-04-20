<?php
get_header();
global $post, $bd_data;
?>

    <div class="bd-container <?php echo $sidebar; ?>">
        <div class="bd-main">
            <div class="blog-v1">
                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    get_template_part( 'content', get_post_format() );

                    // Post Pagination.
                    if(bdayh_get_option('post_pagination')){ ?>
                        <div class="new-box">
                            <nav class="post-navigation" role="navigation">
                                <div class="nav-links">
                                    <?php
                                    if ( is_attachment() ) {
                                        previous_post_link('%link', '<span class="meta-nav">'.__('Published In', LANG).'</span>%title');
                                    }
                                    else {
                                        echo '<span class="post-nav-left">';
                                        if( is_rtl() ) {
                                            previous_post_link('%link', '<span class="meta-nav"><i class="fa fa-chevron-right"></i> &nbsp; '.__('Previous Post', LANG).'</span>%title');
                                        }
                                        else {
                                            previous_post_link('%link', '<span class="meta-nav"><i class="fa fa-chevron-left"></i> &nbsp; '.__('Previous Post', LANG).'</span>%title');
                                        }
                                        echo '</span>';

                                        echo '<span class="post-nav-right">';
                                        if( is_rtl() ) {
                                            next_post_link('%link', '<span class="meta-nav">'.__('Next Post', LANG).' &nbsp; <i class="fa fa-chevron-left"></i></span>%title');
                                        }
                                        else {
                                            next_post_link('%link', '<span class="meta-nav">'.__('Next Post', LANG).' &nbsp; <i class="fa fa-chevron-right"></i></span>%title');
                                        }
                                        echo '</span>';
                                    }
                                    ?>
                                </div>
                            </nav>
                        </div><!-- .new-box /-->
                    <?php }

                    // Author Box.
                    if( bdayh_get_option('post_author_box') ){ ?>
                        <div class="new-box">
                            <div class="post-author-box">
                                <div class="box-title">
                                    <h2>
                                        <b><?php _e('About', LANG) ?> <?php the_author_posts_link(); ?></b>
                                    </h2>
                                </div><!-- .box-title /-->

                                <?php echo bd_author_box() ?>
                            </div>
                        </div><!-- .new-box /-->
                    <?php } ?>

	                <?php
                    // Related Posts.
                    get_template_part( 'framework/global/bdaia-related' );

                    // Facebook Comments.
                    get_template_part( 'framework/global/fb-comments' );

                    // Comments.
                    if( bdayh_get_option('post_comments_box') )
                        if ( comments_open() || get_comments_number() )
                            comments_template();

                    // Check Also.
                    get_template_part( 'framework/global/check-also' );

                    // End the loop.
                endwhile;
                ?>
            </div>
        </div><!-- .bd-main /-->

	    <?php get_sidebar(); ?>
    </div><!-- .bd-container -->

<?php get_footer(); ?>