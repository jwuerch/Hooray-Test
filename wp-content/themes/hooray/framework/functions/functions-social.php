<?php
/**
 * Add user's social accounts
 * ----------------------------------------------------------------------------- *
 */
add_action( 'show_user_profile', 'bd_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'bd_show_extra_profile_fields' );
function bd_show_extra_profile_fields( $user )
{
    ?>
    <h3><?php _e('User Social Networking', LANG) ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="facebook"><?php _e('Facebook URL',LANG);?></label></th>
            <td>
                <input type="text" name="facebook" id="facebook" value="<?php echo esc_attr( get_the_author_meta( 'facebook', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="twitter"><?php _e('Twitter Username', LANG);?></label></th>
            <td>
                <input type="text" name="twitter" id="twitter" value="<?php echo esc_attr( get_the_author_meta( 'twitter', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="google"><?php _e('Google + URL', LANG);?></label></th>
            <td>
                <input type="text" name="google" id="google" value="<?php echo esc_attr( get_the_author_meta( 'google', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="linkedin"><?php _e('linkedIn URL', LANG);?></label></th>
            <td>
                <input type="text" name="linkedin" id="linkedin" value="<?php echo esc_attr( get_the_author_meta( 'linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="pinterest"><?php _e('Pinterest URL', LANG); ?></label></th>
            <td>
                <input type="text" name="pinterest" id="pinterest" value="<?php echo esc_attr( get_the_author_meta( 'pinterest', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="youtube"><?php _e('YouTube URL', LANG); ?></label></th>
            <td>
                <input type="text" name="youtube" id="youtube" value="<?php echo esc_attr( get_the_author_meta( 'youtube', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
        <tr>
            <th><label for="flickr"><?php _e('Flickr URL', LANG);?></label></th>
            <td>
                <input type="text" name="flickr" id="flickr" value="<?php echo esc_attr( get_the_author_meta( 'flickr', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>
    </table>
<?php
}

// Save user's social accounts
add_action( 'personal_options_update', 'bd_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'bd_save_extra_profile_fields' );
function bd_save_extra_profile_fields( $user_id ){

    if (!current_user_can( 'edit_user', $user_id )) return false;
    update_user_meta( $user_id, 'google', $_POST['google'] );
    update_user_meta( $user_id, 'pinterest', $_POST['pinterest'] );
    update_user_meta( $user_id, 'twitter', $_POST['twitter'] );
    update_user_meta( $user_id, 'facebook', $_POST['facebook'] );
    update_user_meta( $user_id, 'linkedin', $_POST['linkedin'] );
    update_user_meta( $user_id, 'flickr', $_POST['flickr'] );
    update_user_meta( $user_id, 'youtube', $_POST['youtube'] );
}



/**
 * Social Sharing Links
 * ----------------------------------------------------------------------------- *
 */
if ( ! function_exists( 'bd_social' ) )
{
    function bd_social( $newtab='yes', $icon_size=' ', $tooltip='ttip' )
    {
        if ( $newtab == 'yes' ){
            $newtab = "target=\"_blank\"";
        } else {
            $newtab = '';
        }
        echo '<div class="social-icons icon-size-'. $icon_size .'">' ."\n";

        // Facebook
        $social_facebook_url = bdayh_get_option( 'social_facebook_url' );
        if ( $social_facebook_url ) { echo'<a class="'. $tooltip .' si-facebook" title="Facebook" href="'. esc_url( $social_facebook_url ) .'" '. $newtab .'><i class="fa fa-facebook"></i></a>'."\n"; }

        // Twitter
        $social_twitter_url = bdayh_get_option( 'social_twitter_url' );
        if ( $social_twitter_url ) { echo'<a class="'. $tooltip .' si-twitter" title="Twitter" href="'. esc_url( $social_twitter_url ) .'" '. $newtab .'><i class="fa fa-twitter"></i></a>'."\n"; }

        // Google+
        $social_google_plus_url = bdayh_get_option( 'social_google_plus_url' );
        if ( $social_google_plus_url ) { echo '<a class="'. $tooltip .' si-google-plus" title="Google+" href="'. esc_url( $social_google_plus_url ) .'" '. $newtab .'><i class="fa fa-google-plus"></i></a>'."\n"; }

        // Pinterest
        $social_pinterest_url = bdayh_get_option( 'social_pinterest_url' );
        if ( $social_pinterest_url ) { echo'<a class="'. $tooltip .' si-pinterest" title="Pinterest" href="'. esc_url( $social_pinterest_url ) .'" '. $newtab .'><i class="fa fa-pinterest"></i></a>'."\n"; }

        // dribbble
        $social_dribbble_url = bdayh_get_option( 'social_dribbble_url' );
        if ( $social_dribbble_url ) { echo'<a class="'. $tooltip .' si-dribbble" title="Dribbble" href="'. esc_url( $social_dribbble_url ) .'" '. $newtab .'><i class="fa fa-dribbble"></i></a>'."\n"; }

        // LinkedIN
        $social_linkedin_url = bdayh_get_option( 'social_linkedin_url' );
        if ( $social_linkedin_url ) { echo'<a class="'. $tooltip .' si-linkedin" title="LinkedIn" href="'. esc_url( $social_linkedin_url ) .'" '. $newtab .'><i class="fa fa-linkedin"></i></a>'."\n"; }

        // Flickr
        $social_flickr_url = bdayh_get_option( 'social_flickr_url' );
        if ( $social_flickr_url ) { echo'<a class="'. $tooltip .' si-flickr" title="Flickr" href="'. esc_url( $social_flickr_url ) .'" '. $newtab .'><i class="fa fa-flickr"></i></a>'."\n"; }

        // YouTube
        $social_youtube_url = bdayh_get_option( 'social_youtube_url' );
        if ( $social_youtube_url ) { echo'<a class="'. $tooltip .' si-youtube" title="Youtube" href="'. esc_url( $social_youtube_url ) .'" '. $newtab .'><i class="fa fa-youtube"></i></a>'."\n"; }

        // Skype
        $social_skype_url = bdayh_get_option( 'social_skype_url' );
        if ( $social_skype_url ) { echo'<a class="'. $tooltip .' si-skype" title="Skype" href="'. esc_url( $social_skype_url ) .'" '. $newtab .'><i class="fa fa-skype"></i></a>'."\n"; }

        // Digg
        $social_digg_url = bdayh_get_option( 'social_digg_url' );
        if ( $social_digg_url ) { echo'<a class="'. $tooltip .' si-digg" title="Digg" href="'. esc_url( $social_digg_url ) .'" '. $newtab .'><i class="fa fa-digg"></i></a>'."\n"; }

        // Reddit
        $social_reddit_url = bdayh_get_option( 'social_reddit_url' );
        if ( $social_reddit_url ) { echo'<a class="'. $tooltip .' si-reddit" title="Reddit" href="'. esc_url( $social_reddit_url ) .'" '. $newtab .'><i class="fa fa-reddit"></i></a>'."\n"; }

        // Delicious
        $social_delicious_url = bdayh_get_option( 'social_delicious_url' );
        if ( $social_delicious_url ) { echo'<a class="'. $tooltip .' si-delicious" title="Delicious" href="'. esc_url( $social_delicious_url ) .'" '. $newtab .'><i class="fa fa-delicious"></i></a>'."\n"; }

        // stumbleuponUpon
        $social_stumbleupon_url = bdayh_get_option( 'social_stumbleupon_url' );
        if ( $social_stumbleupon_url ) { echo'<a class="'. $tooltip .' si-stumbleupon" title="StumbleUpon" href="'. esc_url( $social_stumbleupon_url ) .'" '. $newtab .'><i class="fa fa-stumbleupon"></i></a>'."\n"; }

        // Tumblr
        $social_tumblr_url = bdayh_get_option( 'social_tumblr_url' );
        if ( $social_tumblr_url ) { echo'<a class="'. $tooltip .' si-tumblr" title="Tumblr" href="'. esc_url( $social_tumblr_url ) .'" '. $newtab .'><i class="fa fa-tumblr"></i></a>'."\n"; }

        // Vimeo
        $social_vimeo_url = bdayh_get_option( 'social_vimeo_url' );
        if ( $social_vimeo_url ) { echo'<a class="'. $tooltip .' si-vimeo-square" title="Vimeo" href="'. esc_url( $social_vimeo_url ) .'" '. $newtab .'><i class="fa fa-vimeo-square"></i></a>'."\n"; }

        // Wordpress
        $social_wordpress_url = bdayh_get_option( 'social_wordpress_url' );
        if ( $social_wordpress_url ) { echo'<a class="'. $tooltip .' si-wordpress" title="WordPress" href="'. esc_url( $social_wordpress_url ) .'"  '. $newtab .'><i class="fa fa-wordpress"></i></a>'."\n"; }

        // Yelp
        $social_yelp_url = bdayh_get_option( 'social_yelp_url' );
        if ( $social_yelp_url ) { echo'<a class="'. $tooltip .' si-yelp" title="Yelp" href="'. esc_url( $social_yelp_url ) .'" '. $newtab .'><i class="fa fa-yelp"></i></a>'."\n"; }

        // Last.fm
        $social_lastfm_url = bdayh_get_option( 'social_lastfm_url' );
        if ( $social_lastfm_url ) { echo'<a class="'. $tooltip .' si-lastfm" title="Last.fm" href="'. esc_url( $social_lastfm_url ) .'" '. $newtab .'><i class="fa fa-lastfm"></i></a>'."\n"; }

        // xing.me
        $social_xing_url = bdayh_get_option( 'social_xing_url' );
        if ( $social_xing_url ) { echo'<a class="'. $tooltip .' si-xing" title="Xing" href="'. esc_url( $social_xing_url ) .'"  '. $newtab .' ><i class="fa fa-xing"></i></a>'."\n"; }

        // DeviantArt
        $social_deviantart_url = bdayh_get_option( 'social_deviantart_url' );
        if ( $social_deviantart_url ) { echo'<a class="'. $tooltip .' si-deviantart" title="DeviantArt" href="'. esc_url( $social_deviantart_url ) .'"  '. $newtab .' ><i class="fa fa-deviantart"></i></a>'."\n"; }

        // openid
        $social_openid_url = bdayh_get_option( 'social_openid_url' );
        if ( $social_openid_url ) { echo'<a class="'. $tooltip .' si-openid" title="OpenID" href="'. esc_url( $social_openid_url ) .'"  '. $newtab .' ><i class="fa fa-openid"></i></a>'."\n"; }

        // behance
        $social_behance_url = bdayh_get_option( 'social_behance_url' );
        if ( $social_behance_url ) { echo'<a class="'. $tooltip .' si-behance" title="Behance" href="'. esc_url( $social_behance_url ) .'"  '. $newtab .' ><i class="fa fa-behance"></i></a>'."\n"; }

        // instagram
        $social_instagram_url = bdayh_get_option( 'social_instagram_url' );
        if ( $social_instagram_url ) { echo'<a class="'. $tooltip .' si-instagram" title="instagram" href="'. esc_url( $social_instagram_url ) .'"  '. $newtab .' ><i class="fa fa-instagram"></i></a>'."\n"; }

        // paypal
        $social_paypal_url = bdayh_get_option( 'social_paypal_url' );
        if ( $social_paypal_url ) { echo'<a class="'. $tooltip .' si-paypal" title="paypal" href="'. esc_url( $social_paypal_url ) .'"  '. $newtab .' ><i class="fa fa-paypal"></i></a>'."\n"; }

        // spotify
        $social_spotify_url = bdayh_get_option( 'social_spotify_url' );
        if ( $social_spotify_url ) { echo'<a class="'. $tooltip .' si-spotify" title="spotify" href="'. esc_url( $social_spotify_url ) .'"  '. $newtab .' ><i class="fa fa-spotify"></i></a>'."\n"; }

        // Google Play
        $social_google_play_url = bdayh_get_option( 'social_google_play_url' );
        if ( $social_google_play_url ) { echo'<a class="'. $tooltip .' si-google" title="Google Play" href="'. esc_url( $social_google_play_url ) .'"  '. $newtab .' ><i class="fa fa-google"></i></a>'."\n"; }

        // VK
        $social_vk_url = bdayh_get_option( 'social_vk_url' );
        if ( $social_vk_url ) { echo'<a class="'. $tooltip .' si-vk" title="vk.com" href="'. esc_url( $social_vk_url ) .'"  '. $newtab .' ><i class="fa fa-vk"></i></a>'."\n"; }

        // Apple
        $social_apple_url = bdayh_get_option( 'social_apple_url' );
        if ( $social_apple_url ) { echo'<a class="'. $tooltip .' si-apple" title="Apple" href="'. esc_url( $social_apple_url ) .'"  '. $newtab .' ><i class="fa fa-apple"></i></a>'."\n"; }

        // soundcloud
        $social_soundcloud_url = bdayh_get_option( 'social_soundcloud_url' );
        if ( $social_soundcloud_url ) { echo'<a class="'. $tooltip .' si-soundcloud" title="soundcloud" href="'. esc_url( $social_soundcloud_url ) .'"  '. $newtab .' ><i class="fa fa-soundcloud"></i></a>'."\n"; }

        // RSS
        $rss_url = bdayh_get_option( 'rss_url' );
        if ( $rss_url ){ echo '<a class="'. $tooltip .' si-rss" title="Rss" href="'. esc_url( $rss_url ) .'" '. $newtab .'><i class="fa fa-rss"></i></a>'."\n"; }

        echo '</div>';
    }
}
?>