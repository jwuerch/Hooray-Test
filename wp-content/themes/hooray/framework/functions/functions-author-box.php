<?php
/**
 * Author Box
 * ----------------------------------------------------------------------------- *
 */
function bd_author_box($avatar = true, $social = true, $name = false , $user_id = false)
{
    ?>
    <div class="post-warpper">

        <div class="box-title">
            <?php if (!empty($name)): ?>
                <h3><a href="<?php echo get_author_posts_url($user_id); ?>"><?php echo $name ?> </a></h3>
                <div class="title-line"></div>
            <?php endif; ?>
        </div>

        <div class="taxonomy-description">
            <div class="avatar">
                <?php
                // Avatar.
                if ($avatar) {
                    echo get_avatar(get_the_author_meta('user_email', $user_id), 96);
                } ?>
            </div>

            <div class="post-caption">
                <div class="bio-author-desc">
                    <?php the_author_meta('description', $user_id); ?>
                </div>

                <?php if ($social) { ?>

                    <div class="social-icons icon-12 bio-author-social">

                        <?php
                        // Home.
                        if (get_the_author_meta('url', $user_id)) { ?>
                            <a class="si-home" href="<?php echo esc_url(get_the_author_meta('url', $user_id)); ?>"><i
                                    class="fa fa-home"></i></a>
                        <?php } ?>

                        <?php
                        // Facebook.
                        if (get_the_author_meta('facebook', $user_id)) { ?>
                            <a class="si-facebook"
                               href="<?php echo esc_url(get_the_author_meta('facebook', $user_id)); ?>"><i
                                    class="fa fa-facebook"></i></a>
                        <?php } ?>

                        <?php
                        // Twitter.
                        if (get_the_author_meta('twitter', $user_id)) { ?>
                            <a class="si-twitter"
                               href="http://www.twitter.com/<?php the_author_meta('twitter', $user_id); ?>"><i
                                    class="fa fa-twitter"></i></a>
                        <?php } ?>

                        <?php
                        // Google.
                        if (get_the_author_meta('google', $user_id)) { ?>
                            <a class="si-google-plus"
                               href="<?php echo esc_url(get_the_author_meta('google', $user_id)); ?>"><i
                                    class="fa fa-google-plus"></i></a>
                        <?php } ?>

                        <?php
                        // Youtube.
                        if (get_the_author_meta('youtube', $user_id)) { ?>
                            <a class="si-youtube"
                               href="<?php echo esc_url(get_the_author_meta('youtube', $user_id)); ?>"><i
                                    class="fa fa-youtube"></i></a>
                        <?php } ?>

                        <?php
                        // Linkdin
                        if (get_the_author_meta('linkedin', $user_id)) { ?>
                            <a class="si-linkedin"
                               href="<?php echo esc_url(get_the_author_meta('linkedin', $user_id)); ?>"><i
                                    class="fa fa-linkedin"></i></a>
                        <?php } ?>

                        <?php
                        // Pinterest.
                        if (get_the_author_meta('pinterest', $user_id)) { ?>
                            <a class="si-pinterest"
                               href="<?php echo esc_url(get_the_author_meta('pinterest', $user_id)); ?>"><i
                                    class="fa fa-pinterest"></i></a>
                        <?php } ?>

                        <?php
                        // Flickr.
                        if (get_the_author_meta('flickr', $user_id)) { ?>
                            <a class="si-flickr" href="<?php echo esc_url(get_the_author_meta('flickr', $user_id)); ?>"><i
                                    class="fa fa-flickr"></i></a>
                        <?php } ?>

                    </div><!-- .social-icons /-->

                <?php } ?>
            </div>
            <!-- .post-caption /-->
        </div>
        <!-- .taxonomy-description /-->
    </div><!-- .post-warpper /-->
<?php
}
?>