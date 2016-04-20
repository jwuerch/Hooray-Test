<?php
/**
 * Login
 * ----------------------------------------------------------------------------- *
 */
function bd_login_form( $login_only  = 0 )
{
    global $user_ID, $user_identity;

    echo '<div class="post-warpper">'. "\n";
    if ( $user_ID ) : ?>

        <?php if( empty( $login_only ) ): ?>

            <div class="login_user">

            <div class="bio-author-desc">
                <?php _e( 'Welcome' , LANG ) ?>

                <?php echo $user_identity; ?>
            </div>

            <div class="avatar">

                <?php
                // Avatar
                echo get_avatar( $user_ID, $size = '79'); ?>

            </div>

            <div class="post-caption">
                <ul class="login_list">
                    <li class="userWpAdmin">
                        <a href="<?php echo home_url() ?>/wp-admin/"><?php _e( 'Dashboard' , LANG ) ?></a>
                    </li>
                    <li class="userprofile">
                        <a href="<?php echo home_url() ?>/wp-admin/profile.php"><?php _e( 'Your Profile' , LANG ) ?></a>
                    </li>
                    <li class="userlogout">
                        <a href="<?php echo wp_logout_url(); ?>"><?php _e( 'Logout' , LANG ) ?></a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>

                <div class="social-icons icon-12 bio-author-social">

                    <?php
                    // Home.
                    if ( get_the_author_meta( 'url', $user_ID ) ) { ?>
                        <a class="si-home" href="<?php echo esc_url( get_the_author_meta( 'url' , $user_ID ) ); ?>"><i class="fa fa-home"></i></a>
                    <?php } ?>

                    <?php
                    // Facebook.
                    if ( get_the_author_meta( 'facebook', $user_ID ) ) { ?>
                        <a class="si-facebook" href="<?php echo esc_url( get_the_author_meta( 'facebook' , $user_ID ) ); ?>"><i class="fa fa-facebook"></i></a>
                    <?php } ?>

                    <?php
                    // Twitter.
                    if ( get_the_author_meta( 'twitter',$user_ID ) ) { ?>
                        <a class="si-twitter" href="http://www.twitter.com/<?php the_author_meta( 'twitter', $user_ID ); ?>"><i class="fa fa-twitter"></i></a>
                    <?php } ?>

                    <?php
                    // Google.
                    if ( get_the_author_meta( 'google',$user_ID ) ) { ?>
                        <a class="si-google-plus" href="<?php echo esc_url( get_the_author_meta( 'google' , $user_ID ) ); ?>"><i class="fa fa-google-plus"></i></a>
                    <?php } ?>

                    <?php
                    // Youtube.
                    if ( get_the_author_meta( 'youtube', $user_ID ) ) { ?>
                        <a class="si-youtube" href="<?php echo esc_url( get_the_author_meta( 'youtube' , $user_ID ) ); ?>"><i class="fa fa-youtube"></i></a>
                    <?php } ?>

                    <?php
                    // Linkdin
                    if ( get_the_author_meta( 'linkedin', $user_ID ) ) { ?>
                        <a class="si-linkedin" href="<?php echo esc_url( get_the_author_meta( 'linkedin' , $user_ID ) ); ?>"><i class="fa fa-linkedin"></i></a>
                    <?php } ?>

                    <?php
                    // Pinterest.
                    if ( get_the_author_meta( 'pinterest', $user_ID ) ) { ?>
                        <a class="si-pinterest" href="<?php echo esc_url( get_the_author_meta( 'pinterest' , $user_ID ) ); ?>"><i class="fa fa-pinterest"></i></a>
                    <?php } ?>

                    <?php
                    // Flickr.
                    if ( get_the_author_meta( 'flickr', $user_ID ) ) { ?>
                        <a class="si-flickr" href="<?php echo esc_url( get_the_author_meta( 'flickr' , $user_ID ) ); ?>"><i class="fa fa-flickr"></i></a>
                    <?php } ?>

                </div><!-- .social-icons /-->

        </div>
    <?php endif; ?>
    <?php else: ?>
        <div class="login_form">
            <form action="<?php echo home_url() ?>/wp-login.php" method="post">
                <input type="text" name="log" id="log" size="30" placeholder="User Name"  value="<?php _e( 'Username' , LANG ) ?>"  />
                <input type="password" name="pwd" size="30" placeholder="Password" value="<?php _e( 'Password' , LANG ) ?>" />
                <div class="remember">
                    <input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" />
                    <?php _e( 'Remember Me' , LANG ) ?>
                    <button value="<?php _e( 'Login' , LANG ) ?>" name="Submit" type="submit" class="btn"><?php _e( 'Login' , LANG ) ?></button>
                </div>
                <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
                <ul class="login_list">
                    <li>
                        <a href="<?php echo home_url() ?>/wp-login.php?action=lostpassword">
                            <?php _e( 'Forgot your password?' , LANG ) ?>
                        </a>
                    </li>
                </ul>

            </form>
        </div>
    <?php
    endif;
    echo "\n" .'</div>'. "\n";
}
?>