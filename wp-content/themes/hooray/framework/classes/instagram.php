<?php
// Instagram.
if( bdayh_get_option( 'bdayh_follow_instagram' ) == true ) {

    class BdayhInstagram
    {
        public function userID()
        {
            $username   = strtolower( $this->username );
            $token      = $this->access_token;
            $url        = "https://api.instagram.com/v1/users/search?q=".$username."&access_token=".$token;

            if ( false === ( $get = get_transient( 'instagram_user_data' ) ) )
            {
                $get = file_get_contents($url);
                set_transient( 'instagram_user_data', $get, 2*60*60 );
            }
            $json = json_decode($get);

            foreach( $json->data as $user )
            {
                if( $user->username == $username ) {
                    return $user->id;
                }
            }
            return '';
        }

        public function userMedia()
        {
            $url = 'https://api.instagram.com/v1/users/'.$this->userID().'/media/recent/?access_token='.$this->access_token;

            if ( false === ( $get = get_transient( 'instagram_user_feed' ) ) )
            {
                $get = file_get_contents( $url );
                set_transient( 'instagram_user_feed', $get, 2*60*60 );
            }

            return $json = json_decode($get, true);
        }
    }

    $username               = bdayh_get_option( "bdayh_follow_instagram_user_name" );
    $access_token           = bdayh_get_option( "bdayh_follow_instagram_access_token" );
    $count                  = 10;
    $insta                  = new BdayhInstagram();
    $insta->username        = $username;
    $insta->access_token    = $access_token; ?>

    <div class="clear"></div>
    <div class="bdayh-follow-insta">
        <h4 class="bdayh-insta-title">
            <a target="_blank" href="http://instagram.com/<?php echo $username; ?>">
                <?php _e( 'Follow Instagram', LANG ); ?> @ <?php echo $username; ?>
            </a>
        </h4>

        <ul class="bdayh-insta-items">
            <?php
            $ins_media = $insta->userMedia();
            $i = 0;

            foreach( $ins_media['data'] as $vm )
            {
                if( $count == $i ){
                    break;
                }

                $i++;
                $img = $vm['images']['low_resolution']['url'];
                $link = $vm["link"]; ?>

                <li class="bdayh-insta-item pic<?php echo $i; ?>">
                    <a target="_blank" href="<?php echo $link ?>">
                        <?php if( bdayh_get_option( 'bd_lazyload' ) ) { ?>
                            <img class="lazy" data-original="<?php echo $img; ?>" alt="" />
                        <?php } else { ?>
                            <img src="<?php echo $img; ?>" alt="" />
                        <?php } ?>
                    </a>
                </li>

            <?php } ?>
        </ul>
    </div><!-- .bdayh-follow-instagram /-->
<?php } ?>