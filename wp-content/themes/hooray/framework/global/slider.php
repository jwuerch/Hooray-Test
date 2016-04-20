<?php
if ( bdayh_get_option( 'slider_show' ) ) {

    global $bd_data, $post_carousel_entry_id;
    $post_carousel_entry_id = get_the_ID();

    $bd_main_slider_posts_order_category = $bd_main_slider_posts_order_tag = $bd_main_slider_offset = $count = $args = $display = '';

    $slider_speed       = bdayh_get_option('slider_speed');
    $slider_animation   = bdayh_get_option('slider_animation');

    $size       = 'bd-xlarge';
    $count      = bdayh_get_option( 'slider_bumber' );
    $display    = bdayh_get_option( 'slider_display' );

    // GET Categories
    if ( bdayh_get_option( 'slider_category' ) ) {
        $bd_main_slider_posts_order_category = bdayh_get_option( 'slider_category' );
    }

    // GET Tags
    if ( bdayh_get_option( 'slider_tag' ) ) {
        $bd_main_slider_posts_order_tag = bdayh_get_option( 'slider_tag' );
    }

    // Post Offset
    if ( bdayh_get_option( 'bd_main_slider_offset' ) ) {
        $bd_main_slider_offset = bdayh_get_option('bd_main_slider_offset');
    }


    switch ( $display ) {

        case 'popular' :
            $args = array(
                'post_status' => 'publish',
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'orderby'        => 'comment_count',
                'order'          => 'DESC',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'views' :
            $args = array(
                'post_status' => 'publish',
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'orderby'        => 'meta_value_num',
                'meta_key' => 'post_views_count',
                'order'          => 'DESC',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'category' :
            $args = array(
                'post_type'      => 'post',
                'cat' => $bd_main_slider_posts_order_category,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'tag' :
            $args = array(
                'post_type'      => 'post',
                'tag' => $bd_main_slider_posts_order_tag,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'post' :
            $posts_var = explode (',' , bdayh_get_option( 'bd_main_slider_posts_order_post' ) );
            $args = array(
                'post_type'      => 'post',
                'post__in' => $posts_var,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'page' :
            $page_var = explode (',' , bdayh_get_option( 'bd_main_slider_posts_order_page' ) );
            $args = array(
                'post_type'      => 'page',
                'post__in' => $page_var,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'random' :
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'orderby'        => 'rand',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'lates' :
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_main_slider_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;
    }

    ?>
    <div class="slider-flex">
        <div id="slider" class="slider-warpper flexslider">
            <ul class="slides">
                <?php
                $query = new WP_Query( $args );
                update_post_thumbnail_cache( $query );
                if ( $query->have_posts() ) :
                    while ( $query->have_posts() ) : $query->the_post();

                        if ( has_post_thumbnail() ) { ?>
                            <li>
	                            <?php
	                            // GET Video Link.
	                            $get_meta               = get_post_custom( get_the_ID() );
	                            $bd_video_id            = '';
	                            $bd_video_type          = '';
	                            $bd_post_format         = '';
	                            $bdaia_video_url        = '';

	                            if( isset($get_meta["bd_video_url"][0]) ){
		                            $bd_video_id    = $get_meta["bd_video_url"][0];
	                            }

	                            if( isset($get_meta["bd_video_type"][0]) ){
		                            $bd_video_type = $get_meta["bd_video_type"][0];
	                            }

	                            if( isset($get_meta["bd_post_type"][0]) ){
		                            $bd_post_format = $get_meta["bd_post_type"][0];
	                            }

	                            if( $bd_video_type == "youtube" ) {
		                            $bdaia_video_url = "http://www.youtube.com/watch?v=$bd_video_id";
	                            }

	                            elseif( $bd_video_type == "vimeo" ) {
		                            $bdaia_video_url = "http://www.vimeo.com/$bd_video_id";
	                            }

	                            elseif( $bd_video_type == "daily" ) {
		                            $bdaia_video_url = "http://www.dailymotion.com/video/$bd_video_id";
	                            }
	                            if( $bd_video_id ) { ?>

		                            <a href="<?php echo $bdaia_video_url;?>" class="lightbox" title="Play Video"><span class="post-video-play"><i class="fa fa-play"></i></span></a>
	                            <?php } ?>

                                <?php bdaia_img( $size ); ?>
                                <div class="slide-caption">
                                    <div class="post-caption-content">
	                                    <?php
	                                    // the_category(' ');
	                                    foreach( ( get_the_category() ) as $cat )
	                                    {
		                                    echo '<a class="bd-cat-link bd-cat-'.$cat->cat_ID.'" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a>'."\n";
	                                    }
	                                    ?>
	                                    &nbsp;
                                        <?php bd_get_time(); ?>
                                        <h3  class="post-title"><a href="<?php the_permalink()?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                        <div class="clear"></div>

                                        <?php if(array_key_exists('slider_excerpt_show', $bd_data )) { ?>
                                            <div class="post-excerpt"><?php bd_slider_excerpt(); ?></div><!-- .post-excerpt/-->
                                        <?php } ?>
                                    </div>
                                </div><!-- .post-caption/-->
                            </li><!-- article/-->
                        <?php }
                    endwhile;
                endif;
                wp_reset_query();
                ?>
            </ul>
        </div>
    </div>

    <script>
        jQuery(document).ready(function() {
            jQuery('#slider').flexslider({
                slideshowSpeed  : <?php if( bdayh_get_option( 'slider_speed' ) != '') echo bdayh_get_option( 'slider_speed' ); else echo 6666; ?>,
                animationSpeed  : <?php if( bdayh_get_option( 'slider_animation' ) != '') echo bdayh_get_option( 'slider_animation' ); else echo 555; ?>,
                randomize       : false,
                pauseOnHover    : true,
                controlNav      : true,
                directionNav    : true,
                smoothHeight    : true,
                prevText        : '<i class="fa fa-chevron-left"></i>',
                nextText        : '<i class="fa fa-chevron-right"></i>'
            });

        });
    </script>
<?php
}
?>