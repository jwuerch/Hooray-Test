<?php

    global $post_carousel_entry_id;
    $post_carousel_entry_id = get_the_ID();

    $bd_post_carousel_posts_order_category = $bd_post_carousel_posts_order_tag = $bd_post_carousel_offset = $count = $args = $bd_post_carousel_offset = '';

    $size       = 'bd-carousel';
    $count      = bdayh_get_option( 'bd_post_carousel_np' );
    $display    = bdayh_get_option( 'bd_post_carousel_posts_order' );


    // GET Categories
    if ( bdayh_get_option( 'bd_post_carousel_posts_order_category' ) ) {
        $bd_post_carousel_posts_order_category = bdayh_get_option( 'bd_post_carousel_posts_order_category' );
    }

    // GET Tags
    if ( bdayh_get_option( 'bd_post_carousel_posts_order_tag' ) ) {
        $bd_post_carousel_posts_order_tag = bdayh_get_option( 'bd_post_carousel_posts_order_tag' );
    }

    // Post Offset
    if ( bdayh_get_option( 'bd_post_carousel_offset' ) ) {
        $bd_post_carousel_offset = bdayh_get_option( 'bd_post_carousel_offset' );
    }

    switch ( $display ) {

        case 'popular' :
            $args = array(
                'post_status' => 'publish',
                'post_type'      => 'post',
                'posts_per_page' => $count,
                'orderby'        => 'comment_count',
                'order'          => 'DESC',
                'offset' => $bd_post_carousel_offset,
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
                'offset' => $bd_post_carousel_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'category' :
            $args = array(
                'post_type'      => 'post',
                'cat' => $bd_post_carousel_posts_order_category,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_post_carousel_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'tag' :
            $args = array(
                'post_type'      => 'post',
                'tag' => $bd_post_carousel_posts_order_tag,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_post_carousel_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'post' :
            $posts_var = explode (',' , bdayh_get_option( 'bd_post_carousel_posts_order_post' ) );
            $args = array(
                'post_type'      => 'post',
                'post__in' => $posts_var,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_post_carousel_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'page' :
            $page_var = explode (',' , bdayh_get_option( 'bd_post_carousel_posts_order_page' ) );
            $args = array(
                'post_type'      => 'page',
                'post__in' => $page_var,
                'posts_per_page' => $count,
                'orderby'        => 'date',
                'offset' => $bd_post_carousel_offset,
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
                'offset' => $bd_post_carousel_offset,
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
                'offset' => $bd_post_carousel_offset,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;
    }
?>
<script>
	jQuery(document).ready(function() {
		jQuery('.bd-post-carousel').slick({
			<?php if( is_rtl() ) : ?>
			rtl: true,
			<?php endif;?>
			speed          : 600,
			slide          : 'li',
			<?php if( bdayh_get_option( 'bd_post_carousel_ap' ) ){ ?>
			autoplay       : true,
			autoplaySpeed  : 4000,
			<?php } ?>
			slidesToShow   : 4,
			slidesToScroll : 1,
			responsive     : [
				{ breakpoint : 1500, settings : { speed : 500, slide : 'li', slidesToShow : 4 } },
				{ breakpoint : 1200, settings : { speed : 500, slide : 'li', slidesToShow : 3 } },
				{ breakpoint : 979,  settings : { speed : 500, slide : 'li', slidesToShow : 2 } },
				{ breakpoint : 550,  settings : { speed : 500, slide : 'li', slidesToShow : 1 } }
			]
		});
	});
</script>
<div class="bd-container">
    <ul class="bd-post-carousel bd-new">
        <?php
        $query = new WP_Query( $args );
        update_post_thumbnail_cache( $query );
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post();
                ?>
	            <li class="bd-post-carousel-item">
		            <article>

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

			            <a class="img" href="<?php the_permalink(); ?>" <?php if( has_post_thumbnail() ) { ?> style="background-image:url(<?php echo bd_thumb_src( $size ); ?>);" <?php } ?>></a>

			            <div class="bd-meta-info-container">
				            <div class="bd-meta-info-align">
					            <div class="bd-meta">

						            <div class="bd-meta-cat">
							            <?php
							            // the_category(' ');
							            foreach( ( get_the_category() ) as $cat )
							            {
								            echo '<a class="bd-cat-link bd-cat-'.$cat->cat_ID.'" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a>'."\n";
							            }
							            ?>
						            </div>

						            <h3 ><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					            </div>
					            <div class="bd-meta-info">
						            <?php bd_get_time(); ?>
					            </div>
				            </div>
			            </div><!-- .bd-meta-info-container /-->

		            </article>
	            </li>
            <?php
            endwhile;
        endif;
        wp_reset_query();
        ?>
    </ul>
</div>