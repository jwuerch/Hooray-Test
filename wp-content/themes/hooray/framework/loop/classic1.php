<?php
// Classic v1
global $post, $wp_query, $bd_data;

// Thumb Size.
$size = 'bd-related-small';

$no_thumb = '';
if( ! has_post_thumbnail() )  $no_thumb = " no-thumb";
?>

<article class="classic1-item<?php echo $no_thumb; ?>">

    <?php
    // Post Thumb.
    if( function_exists("has_post_thumbnail") && has_post_thumbnail() ) { ?>
        <div class="arti-thumb">
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
	        if( $bd_post_format == "post_video" && $bd_video_type == "youtube" || $bd_video_type == "vimeo" || $bd_video_type == "daily" ) { ?>

		        <a href="<?php echo $bdaia_video_url;?>" class="post-video-play lightbox" title="<?php _e( 'Play Video', LANG ); ?>"><span><i class="fa fa-play"></i></span></a>
	        <?php } ?>

            <?php
            // Thumbs.
            if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
                ?><a class="lightbox" href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail($size); ?></a><?php
            }
            else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
                ?><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail($size); ?></a><?php
            }
            else {
                the_post_thumbnail($size);
            }
            ?>
        </div><!-- .arti-thumb /-->
    <?php } ?>

    <div class="arti-details">
        <?php if( bdayh_get_option( 'post_meta_date' ) ) { ?>
            <div class="post-date">
                <?php bd_get_time(); ?>
            </div>
        <?php } ?>


        <h3  class="arti-title entry-title">
            <a  href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title(); ?>">
                <?php the_title(); ?>
            </a>
        </h3>

        <?php
        // Post Excerpt.
        if( !$post->post_content=="" ) { ?>
            <div class="arti-excerpt">
                <?php bd_classic1(); ?>
            </div>

    </div><!--. arti-details /-->
        <?php } ?>

        <div class="arti-meta-info">
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
            <div class="flex-container-2">
                <div class="author-comments-read-time">

                    <?php if( bdayh_get_option( 'post_meta_author' ) ) { ?>
                        <div class="post-author">
                            <div class="author-link"><span style="color:#282a2b;font-family:Verdana,Geneva,sans-serif;">By </span><?php the_author_posts_link(); ?></div>
                        </div>
                    <?php } ?>
                </div>
                <a  href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" title="<?php the_title(); ?>">
                    <div class="read-more">
                    <div class="read-more-carrot"><div class="read-more-carrot-center"><span class="read-more-a">></span></div></div>
                    </div>
                </a>
            </div>

        </div>

</article>