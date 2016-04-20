<?php

global $post, $get_meta, $wp_query, $bd_data, $i_cont;

$categories     = get_the_category();
$category_id    = $categories[0]->cat_ID;
$cat_id         = ' bd-cat-'.$category_id;
$get_meta       = get_post_custom( get_the_ID() );

?>

<li class="bdaia-posts-grid-post post-item post-id post">

    <div class="bdaia-posts-grid-post-inner">

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

		    <a href="<?php echo $bdaia_video_url;?>" class="post-video-play lightbox" title="<?php _e( 'Play Video', LANG ); ?>"><span><i class="fa fa-play"></i></span></a>
	    <?php } ?>

	    <?php
	    // Post Media.
	    $is_home        = bdayh_get_option('home_featured_image');
	    $is_post        = bdayh_get_option('post_featured_image');

	    $bd_post_format     = '';

	    if( isset($get_meta["bd_post_type"][0]) ){
	        $bd_post_format = $get_meta["bd_post_type"][0];
	    }

	    if( $is_home == 1 || $bd_post_format == 'post_image' ) {
	        bdaia_img( 'bd-related' );
	    }
	    ?>
    <div class="clear"></div>

    <div class="bdayh-post-header">

        <?php
        // Cat.
        if( bdayh_get_option( 'post_meta_cats' ) == 1 ) : ?>
            <div class="bdayh-post-header-cat">
                <div class="bdayh-post-header-cat-inner">
                    <?php
                    // the_category(' ');
                    foreach( ( get_the_category() ) as $cat )
                    {
                        echo '<a class="bd-cat-link bd-cat-'.$cat->cat_ID.'" href="' . get_category_link( $cat->cat_ID ) . '">' . $cat->cat_name . '</a>'."\n";
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <?php the_title( '<h3  class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h3>' ); ?>

        <?php
        global $post;
        if( !$post->post_content=="" ){
            ?>
            <div class="bdaia-post-excerpt"><?php bd_gird(); ?></div>
        <?php
        }
        ?>

        <div class="bbd-post-cat">
            <div class="bbd-post-cat-content">

                <div class="bdayh-post-meta-date">
                    <i class='fa fa-clock-o'></i>
                    <?php bd_get_time(); ?>
                </div>

                <span class="bdayh-post-meta-time-read">
                        <i class='fa fa-bookmark'></i> <?php bdayh_post_read_time(); ?>
                </span>

            </div>
        </div>
    </div><!-- .bdayh-post-header /-->
    </div>
</li>