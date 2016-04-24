<?php
/**
 * Posts meta
 * ----------------------------------------------------------------------------- *
 */
function bd_post_meta(){

    $bd_hide_post_meta = get_post_meta(get_the_ID(), 'bd_hide_post_meta', true);
    if((bdayh_get_option('post_meta') && empty($bd_hide_post_meta)) || $bd_hide_post_meta == 'yes'):
        ?>
        <div class="entry-meta">
            <?php
            // Home Rating
            if( bdayh_get_option( 'home_review' ) ) {
                if ( ! is_singular() ) {
                    echo bd_wp_post_rate();
                    echo '<div class="clear"></div>';
                }
            }

            // Author
            if( bdayh_get_option('post_meta_author') ) {
                ?>
                <div class="bdayh-post-meta-author">
                    <?php if(is_single()) echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'MFW_author_bio_avatar_size', 24 ) ); ?>
                    <span><?php _e('By',LANG); ?> <?php the_author_posts_link(); ?></span>
                </div><!-- .bdayh-post-meta-author /-->
            <?php
            }

            // Date
            if( bdayh_get_option('post_meta_date') ) {
                ?>
                <div class="bdayh-post-meta-date">
                    <i class='fa fa-clock-o'></i>
                    <?php bd_get_time(); ?>
                </div><!-- .bdayh-post-meta-date /-->
            <?php
            }

            // Time.
            if( bdayh_get_option( 'post_meta_timeread' ) ){
                ?>
                <div class="bdayh-post-meta-time-read">
                    <i class='fa fa-bookmark'></i>
                    <?php bdayh_post_read_time(); ?>
                </div>
            <?php
            }


        // Comments
            if( bdayh_get_option('post_meta_comments') ) {
                if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
                    ?>
                    <div class="bdayh-post-meta-comments">
                        <i class='fa fa-comments-o'></i>
                        <span class="comments-link">
                            <?php comments_popup_link(__('Leave a comment', LANG), __('1 Comment', LANG), '% ' .__('Comments', LANG)); ?>
                        </span>
                    </div><!-- .bdayh-post-meta-comments /-->
                <?php
                }
            }

            // Cats
            if ( ! is_page() ) {
                if( bdayh_get_option('post_meta_cats') ){
                    ?>
                    <div class="bdayh-post-meta-cat">
                        <i class='fa fa-files-o'></i>
                        <span class="post_meta_cats">
                            <?php _e('In', LANG); ?>
                            <?php the_category(', '); ?>
                        </span>
                    </div><!-- .bdayh-post-meta-cat /-->
                <?php
                }
            }

            // Views
            if(bdayh_get_option('post_meta_views')) {

                if(is_singular()){
                    global $page, $post;

                    echo "<div class='bdayh-post-meta-views'><i class='fa fa-eye'></i><span class='post_meta_views'>\n";
                        if ($page == 1) setPostViews($post->ID);
                        echo getPostViews(get_the_ID());
                    echo "</span></div><!-- .bdayh-post-meta-views /-->\n";
                }
                else {
                    echo "<div class='bdayh-post-meta-views'><i class='fa fa-eye'></i><span class='post_meta_views'>\n";
                        echo getPostViews(get_the_ID());
                    echo "</span></div><!-- .bdayh-post-meta-views /-->\n";
                }
            }

            // Like
            if( is_singular() && bdayh_get_option( 'post_heart_like' ) ) {
                echo "<div class='bdayh-post-meta-like'>\n";
                    echo getPostLikeLink( get_the_ID() );
                echo "</div><!-- .bdayh-post-meta-like /-->\n";
            }

            // Edit
            edit_post_link( __( 'Edit', LANG ), '<div class="bdayh-post-meta-edit"><span class="edit-link">', '</span></div><!-- .bdayh-post-meta-edit /-->' );
            ?>
        </div><!-- .entry-meta -->
    <?php
    endif;
}
?>