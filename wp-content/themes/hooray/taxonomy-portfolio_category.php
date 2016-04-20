<?php
get_header();
global $post, $bd_data;

wp_enqueue_script( 'isotope' );
wp_enqueue_script( 'bd-isotope' );
$cols = "3cols";
?>

<?php
$term = get_term_by( 'slug', get_query_var( 'portfolio_category' ), get_query_var( 'wportfolio' ) );
global $wp_query;
query_posts( array_merge( $wp_query->query, array( 'posts_per_page' => bdayh_get_option( 'wportfolio_items' ) ) ) ); ?>

    <div class="folio-container bd-blog-masonry loading">
        <div id="folio-main">
            <div class="bd-container">
                <div class="posts-gird" id="content" role="main">
                    <div id="container-grid" class="folio-4col folio-items blog-masonry posts-gird-<?php echo $cols ?>"  data-cols="<?php echo $cols ?>">
                        <?php
                        if (have_posts()) : while ( have_posts() ) : the_post();

                            $permalink      = get_permalink();
                            $item_classes   = '';
                            $item_cats      = get_the_terms( get_the_ID(), 'portfolio_category' );

                            if($item_cats){
                                foreach( $item_cats as $item_cat ){
                                    $item_classes .= urldecode($item_cat->slug) . ' ';
                                }
                            }
                            ?>
                            <div class="folio-item portfolio-item isotope-item post-item <?php echo $item_classes; ?>" data-categories="<?php echo $item_classes; ?>">
                                <div class="inner-media">

                                    <?php
                                    ## Featured.
                                    if( get_post_meta( get_the_ID(), 'new_bd_wportfolio_post_type', true ) )
                                    {
                                        $post_type = get_post_meta( get_the_ID(), 'new_bd_wportfolio_post_type', true );

                                        if($post_type == 'post_image'){
                                            bd_home_img( $size = 'bd-gallery-grid' );
                                        }

                                        elseif($post_type == 'post_slider'){
                                            bd_wp_gallery( $img_w ='800', $img_h='500', $size = 'bd-gallery-grid' );
                                        }

                                        elseif($post_type == 'post_video'){

                                            $img_w          = '770';
                                            $img_h          = '500';
                                            $type           = get_post_meta( get_the_ID(), 'new_bd_wportfolio_video_type', true );
                                            $id             = get_post_meta( get_the_ID(), 'new_bd_video_url', true );

                                            if($type == 'youtube'){
                                                echo '<div class="post-image video-box"><iframe src="http://www.youtube.com/embed/'. $id .'?rel=0" frameborder="0" allowfullscreen></iframe></div>'."\n";
                                            }

                                            elseif($type == 'vimeo') {
                                                echo '<div class="post-image video-box"><iframe src="http://player.vimeo.com/video/'. $id .'?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>'."\n";
                                            }

                                            elseif($type == 'daily') {
                                                echo '<div class="post-image video-box"><iframe frameborder="0" src="http://www.dailymotion.com/embed/video/'. $id .'?logo=0"></iframe></div>'."\n";
                                            }
                                        }
                                    }
                                    ?>

                                </div><!-- .inner-media -->
                                <div class="inner-desc">
                                    <h3 class="tite"><a href="<?php echo $permalink; ?>"><?php the_title(); ?></a></h3>
                                </div><!-- .inner-desc -->
                            </div><!-- .folio-item -->
                        <?php endwhile; endif; ?>

                    </div><!-- .folio-items -->
                </div><!-- .posts-gird -->
            </div><!-- .bd-container -->
            <div class="clear"></div>

            <div class="bd-container">
                <?php bd_wpagination( $gallery->max_num_pages, $range = 2 ); ?>
            </div>
        </div><!-- #folio-main -->


        <div id="loading" class="rotating-plane">
            <i class="fa fa-spinner fa-spin"></i>
        </div><!-- #loading /-->
    </div>
    <!-- .folio-container -->
    <div class="clear"></div>
<?php get_footer(); ?>