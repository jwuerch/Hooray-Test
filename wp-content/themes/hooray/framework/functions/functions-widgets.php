<?php
/**
 * Get Widgets
 * ----------------------------------------------------------------------------- *
 */
include (get_template_directory().'/includes/widgets/posts-list.php');
include (get_template_directory().'/includes/widgets/posts-grid.php');
include (get_template_directory().'/includes/widgets/tabs.php');
include (get_template_directory().'/includes/widgets/social-counter.php');
include (get_template_directory().'/includes/widgets/login.php');
include (get_template_directory().'/includes/widgets/new-in-pic.php');
include (get_template_directory().'/includes/widgets/widget-timeline.php');
include (get_template_directory().'/includes/widgets/slider.php');
include (get_template_directory().'/includes/widgets/category-posts.php');
include (get_template_directory().'/includes/widgets/widget-category-posts-grid.php');
include (get_template_directory().'/includes/widgets/comments.php');
include (get_template_directory().'/includes/widgets/youtube-subscribe.php');
include (get_template_directory().'/includes/widgets/fb.php');
include (get_template_directory().'/includes/widgets/soundcloud.php');
include (get_template_directory().'/includes/widgets/video.php');
include (get_template_directory().'/includes/widgets/google-follow.php');
include (get_template_directory().'/includes/widgets/social-links.php');
include (get_template_directory().'/includes/widgets/newsletter.php');
include (get_template_directory().'/includes/widgets/ads120.php');
include (get_template_directory().'/includes/widgets/ads125.php');
include (get_template_directory().'/includes/widgets/ads250.php');
include (get_template_directory().'/includes/widgets/ads300.php');
include (get_template_directory().'/includes/widgets/flickr.php');
include (get_template_directory().'/includes/widgets/search.php');
include (get_template_directory().'/includes/widgets/twittes.php');
include (get_template_directory().'/includes/widgets/related.php');
include (get_template_directory().'/includes/widgets/bio-author.php');
include (get_template_directory().'/includes/widgets/instagram.php');
include (get_template_directory().'/includes/widgets/about-me.php');


/**
 * Widget Slider
 * ----------------------------------------------------------------------------- *
 */
function bdayh_widget_slider ( $num = 5, $cats = '', $widget_id = '', $offset = '', $orderby )
{
    $query = new WP_Query( array( 'posts_per_page' => $num, 'cat' => $cats, 'offset' => $offset, 'orderby'=>$orderby, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    ?>
    <div class="widget flexslider widgetslider" id="<?php echo $widget_id; ?>">
        <ul class="slides">
            <?php
            if ( $query->have_posts() ) :
                while ( $query->have_posts() ) : $query->the_post();
                    ?>
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

	                    <?php bdaia_img( 'bd-related' ); ?>

                        <div class="slider-caption">
                            <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', LANG ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </div>
                    </li>
                <?php
                endwhile;
            endif;
            ?>
        </ul>
    </div>
    <!-- .widget -->

    <script>
        jQuery(document).ready(function(){
            jQuery('#<?php echo $widget_id; ?>').flexslider({slideshowSpeed: 7000,animationSpeed: 600,randomize: false,pauseOnHover: false,controlNav: false,directionNav: true,
                prevText : '<i class="fa fa-chevron-<?php if( is_rtl() ){ echo 'right'; } else { echo 'left'; } ?>"></i>',
                nextText : '<i class="fa fa-chevron-<?php if( is_rtl() ){ echo 'left'; } else { echo 'right'; } ?>"></i>'
            });
        });
    </script>
    <?php
    wp_reset_query();
}

/**
 * Widget News IN Pic
 * ----------------------------------------------------------------------------- *
 */
function bdayh_widget_news_in_pic ( $num = 5, $cats = '', $widget_id = '', $offset = '', $orderby )
{
    $query = new WP_Query( array( 'posts_per_page' => $num, 'cat' => $cats, 'offset' => $offset, 'orderby'=>$orderby, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
            bd_widget_img( 'ttip' );
        endwhile;
    endif;
    wp_reset_query();
}


/**
 * Widget Posts List
 * ----------------------------------------------------------------------------- *
 */
function bdayh_widget_posts_list ( $num = 5, $widget_id = '', $offset = '', $orderby, $cats )
{
    global $post;

    if( $orderby == 'rand') {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'rand', 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    elseif( $orderby == 'cat') {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'cat' => $cats, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    elseif( $orderby == 'modified') {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'modified', 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    elseif( $orderby == 'name') {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'name', 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    elseif( $orderby == 'popular') {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'comment_count',  'post_status' => 'publish' , 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    elseif( $orderby == 'views') {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'meta_key' => 'post_views_count', 'orderby'=> 'meta_value_num',  'post_status' => 'publish' , 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    elseif( $orderby == 'best') {
        global $idObj;
        $id = $idObj->term_id;
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'cat' => $id, 'meta_key' => 'bd_final_score', 'orderby'=> 'meta_value',  'post_status' => 'publish' , 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }
    else {
        $query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
    }

    echo '<div class="widget-posts-lists">';
    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post(); ?>

            <?php if ( has_post_thumbnail() ) { $has_class =  ''; } else { $has_class =  ' no-thumb'; } ?>
            <div class="post-warpper<?php echo $has_class ?>">
                <div class="post-item">
                    <?php bd_widget_img(); ?>
                    <div class="post-caption">
                        <h3 class="post-title">
                            <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
                        </h3>
                        <div class="post-meta">
                            <?php bd_get_time(); ?>
                            <?php echo bd_wp_post_rate() ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
    endif;
    wp_reset_query();
    echo '</div>';
}


/**
 * Widget Posts Grid
 * ----------------------------------------------------------------------------- *
 */
function bdayh_widget_posts_grid ( $num = 5, $widget_id = '', $offset = '', $orderby, $cats )
{
	global $post;
	$img_size = "bd-related";

	if( $orderby == 'rand') {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'rand', 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	elseif( $orderby == 'cat') {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'cat' => $cats, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	elseif( $orderby == 'modified') {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'modified', 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	elseif( $orderby == 'name') {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'name', 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	elseif( $orderby == 'popular') {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'orderby'=> 'comment_count',  'post_status' => 'publish' , 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	elseif( $orderby == 'views') {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'meta_key' => 'post_views_count', 'orderby'=> 'meta_value_num',  'post_status' => 'publish' , 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	elseif( $orderby == 'best') {
		global $idObj;
		$id = $idObj->term_id;
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'cat' => $id, 'meta_key' => 'bd_final_score', 'orderby'=> 'meta_value',  'post_status' => 'publish' , 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}
	else {
		$bdayh_widget_posts_grid_query = new WP_Query( array( 'posts_per_page' => $num, 'offset' => $offset, 'ignore_sticky_posts' => true, 'no_found_rows' => true, 'cache_results' => false ) );
	}

	echo '<div id="big-stories" class="widget-posts-grid">';
	if ( $bdayh_widget_posts_grid_query->have_posts() ) :
		while ( $bdayh_widget_posts_grid_query->have_posts() ) : $bdayh_widget_posts_grid_query->the_post(); ?>

			<?php $has_class = ""; if ( ! has_post_thumbnail() ) $has_class =  ' no-thumb'; ?>
			<div class="bdaia-article-container<?php echo $has_class ?>">
				<article class="post">

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

					<div class="bdaia-article-img">
						<?php bdaia_img( $img_size ); ?>
					</div>

					<div class="bdaia-article-content">
						<div class="bdaia-article-content-inner">

							<div class="post-cat">
								<?php
								// the_category(' ');
								foreach( ( get_the_category() ) as $cat )
								{
									echo '<a class="bd-cat-link bd-cat-'.$cat->cat_ID.'" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a>'."\n";
								}
								?>
							</div>

							<h3 class="post-title">
								<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
							</h3>

							<div class="post-review">
								<?php echo bd_wp_post_rate() ?>
							</div>
						</div>
					</div>

				</article>
			</div>
			<?php
		endwhile;
	endif;

	wp_reset_query();
	echo '</div>';
}

/**
 * Timeline
 * ----------------------------------------------------------------------------- *
 */
function bd_timeline($numberOfPosts = 5 , $cats = 1){
    global $post;
    $orig_post = $post;

    $lastPosts = get_posts('category='.$cats.'&no_found_rows=1&suppress_filters=0&numberposts='.$numberOfPosts);
    foreach($lastPosts as $post): setup_postdata($post);
        ?>
        <li class="timeline-article bd-uid<?php echo $cats; ?>">
            <a  href="<?php the_permalink(); ?>" class="timeline-article-url">
                <span class="timeline-article-date"><i class="fa fa-clock-o"></i><?php bd_get_time() ?><small><?php the_time('g:i') ?></small></span>
                <h3  class="timeline-article-title"><?php the_title(); ?></h3>
            </a>
        </li>
        <!-- .timeline-article -->
    <?php
    endforeach;
    $post = $orig_post;
    wp_reset_query();
}



/**
 * Comments
 * ----------------------------------------------------------------------------- *
 */
function bd_comments($comment_posts = 5 , $avatar_size = 52)
{
    echo '<div class="widget-posts-lists">';
    $comments = get_comments('status=approve&number='.$comment_posts);
    foreach ($comments as $comment){
        ?>
        <div class="post-warpper">
            <?php echo '<div class="post-thumb">'. get_avatar( $comment, $avatar_size ) .'</div><!-- .post-image/-->' ."\n"; ?>
            <div class="post-caption">
                <h3 class="post-title"><a href="<?php echo get_permalink($comment->comment_post_ID ); ?>#comment-<?php echo $comment->comment_ID; ?>"><?php echo strip_tags($comment->comment_author); ?>: <?php echo wp_html_excerpt( $comment->comment_content, 60 ); ?> ..</a></h3>
            </div>
        </div>
    <?php
    }
    echo '</div>';
}



/**
 * Sidebars
 * ----------------------------------------------------------------------------- *
 */
function remove_default_widgets()
{
    if (function_exists('unregister_widget'))
    {
        unregister_widget('WP_Widget_Search');
    }
}
add_action('widgets_init', 'remove_default_widgets');

function bd_widget_title($title)
{
    if( empty( $title ) )
        return ' ';
    else return $title;
}
add_filter('widget_title', 'bd_widget_title');

function bd_widgets()
{
    $before_widget                  =  '<div id="%1$s" class="widget %2$s">' ."\n";
    $after_widget                   =  '<div class="clear"></div></div>'."\n".'</div><!-- .widget/-->';
    $before_title                   =  '<div class="widget-title box-title">'."\n".'<h2><b>' ."\n";
    $after_title                    =  ''."\n".'</b></h2><div class="title-line"></div>'."\n".'</div>'."\n".'<div class="widget-inner video-box clearfix">' ."\n";

    register_sidebar(
        array(
            'name'                  =>  __('Primary Normal Widget Area', 'bd'),
            'id'                    => 'primary-widget',
            'description'           => __('The Primary Normal widget area appears in all pages .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    register_sidebar(
        array(
            'name'                  =>  __('Post Sidebar', 'bd'),
            'id'                    => 'post-widget',
            'description'           => __('This sidebar will be used by all of your posts .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    register_sidebar(
        array(
            'name'                  =>  __('Page Sidebar', 'bd'),
            'id'                    => 'page-widget',
            'description'           => __('This sidebar will be used by all of your standard pages .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    register_sidebar(
        array(
            'name'                  =>  __('Categories Sidebar', 'bd'),
            'id'                    => 'categories-widget',
            'description'           => __('This sidebar will be used by all of your standard categories .', 'bd'),
            'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
        )
    );

    /* Woocommerce */
    if (class_exists('Woocommerce'))
    {
        register_sidebar(
            array(
                'name'                  =>  __('Shop', LANG),
                'id'                    => 'woocommerce-widget',
                'description'           => __('This sidebar will be used by all of your standard Woocommerce .', LANG),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );

        register_sidebar(
            array(
                'name'                  =>  __('Shop : Products', LANG),
                'id'                    => 'single-pro-widget',
                'description'           => __('This sidebar will be used by all of your standard Shop : Products .', LANG),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );

        register_sidebar(
            array(
                'name'                  =>  __( 'Shop : Product category', LANG ),
                'id'                    => 'shop-archive-widget',
                'description'           => __('This sidebar will be used by all of your standard Shop : Product category .', LANG ),
                'before_widget'         => $before_widget , 'after_widget' => $after_widget , 'before_title' => $before_title , 'after_title' => $after_title ,
            )
        );
    }

    register_sidebar( array(
            'id'            => 'sidebar-footer-1',
            'name'          => __( 'Footer Widgets', LANG ),
            'before_title'  => '<div class="widget-title widget-footer-title"><h3 class="">',
            'after_title'   => '</h3></div>',
            'before_widget' => '<section id="%1$s" class="%2$s widget widget-area-first widget-footer">',
            'after_widget'  => '</section>',
        )
    );

}
add_action( 'widgets_init', 'bd_widgets' );
?>