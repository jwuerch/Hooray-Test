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
                        <span class="post_meta_cats">
                            <?php _e('', LANG); ?>
                            <span class="category-tag"><?php the_category('</span><span class="category-tag"> '); ?>
                        </span>
                    </div><!-- .bdayh-post-meta-cat /-->
                <?php
                }
            }

            // Views


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