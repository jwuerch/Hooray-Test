<?php
/**
 * Social Counter
 */
class COUNT_CLASS
{
    private $allow_cash;
    private $moeny_format;

    public function count_class()
    {
        $this->allow_cash = true; // Disable it for disable cashing sys
        $this->moeny_format = true; // Allow comma in number
    }

    private function formatMoney($number, $fractional=false)
    {

        if( !is_numeric( $number ) ) return $number ;

        if($number >= 1000000)
            return round( ($number/1000)/1000 , 1) . " M";

        elseif($number >= 100000)
            return round( $number/1000, 0) . " k";

        else
            return @number_format( $number );
    }

    public function get_posts_count() {
        $count_posts 	= wp_count_posts();
        return $result 	= $count_posts->publish ;
    }

    public function get_comments_count() {
        $comments_count = wp_count_comments() ;
        return $result  = $comments_count->approved ;
    }

    public function get_members_count() {
        $members_count  = count_users() ;
        return $result  = $members_count['total_users'] ;
    }


	/* Twitter Followers */
	public function get_twitter_count ( $id, $token ) {

		if( $id != '' ){

			if( $this->allow_cash == true ){
				$social_cash = get_transient('bdaia_transient_twitter');

				if($social_cash != '' and !empty( $social_cash ) ){
					return($social_cash);
				}
			}

			$consumerKey 		= bdayh_get_option('twitter_consumer_key');
			$consumerSecret 	= bdayh_get_option('twitter_consumer_secret');
			$token 				= get_option('bdTwitterToken');

			// getting new auth bearer only if we don't have one
			if(!$token)
			{
				// preparing credentials
				$credentials    = $consumerKey . ':' . $consumerSecret;
				$toSend         = base64_encode($credentials);

				// http post arguments
				$args = array(
					'method' 		=> 'POST',
					'httpversion' 	=> '1.1',
					'blocking' 		=> true,
					'headers' 		=> array(
						'Authorization' 	=> 'Basic ' . $toSend,
						'Content-Type' 		=> 'application/x-www-form-urlencoded;charset=UTF-8'
					),
					'body' => array( 'grant_type' => 'client_credentials' )
				);

				add_filter('https_ssl_verify', '__return_false');
				$response 	= wp_remote_post('https://api.twitter.com/oauth2/token', $args);
				$keys 		= json_decode(wp_remote_retrieve_body($response));

				if($keys)
				{
					// saving token to wp_options table
					update_option('bdTwitterToken', $keys->access_token);
					$token = $keys->access_token;
				}
			}

			$result = "";
			$args = array(
				'httpversion' 	=> '1.1',
				'blocking' 		=> true,
				'timeout'		=> 18,
				'headers' 		=> array(
					'Authorization' => "Bearer $token"
				)
			);

			add_filter('https_ssl_verify', '__return_false');
			$api_url 	= "https://api.twitter.com/1.1/users/show.json?screen_name=$id";
			$response 	= bdRemoteGET( $api_url, true, $args );

			if( !empty( $response['followers_count'] ) ) {
				$result = $response['followers_count'];
			}

			if( $this->allow_cash == true ){
				set_transient('bdaia_transient_twitter',$this->formatMoney($result),12*60*60);
			}
			return($this->formatMoney($result));
		}
		else {
			return(0);
		}
	}

	/* Facebook Fans */
    public function get_facebook_count( $fan_page, $access_token){

        if($fan_page != ''){

            if($this->allow_cash == true){

                $social_cash = get_transient('bdayh_soical_facebook');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }

            $data = @bdRemoteGET( "https://graph.facebook.com/v2.4/$fan_page?fields=likes&access_token=$access_token");
            $result = (int) $data['likes'];

            if($this->allow_cash == true){
                set_transient('bdayh_soical_facebook',$this->formatMoney($result),12*60*60);
            }
            return($this->formatMoney($result));
        }
        else {
            return(0);
        }
    }

	/* Instagram Followers */
    public function get_instgram_count( $id, $token )
    {
        if($id != '')
        {
            if($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_instgram');
                if($social_cash != '' and !empty($social_cash)){
                    return($social_cash);
                }
            }

	        $id = explode(".", $token);
	        $data 	= @bdRemoteGET("https://api.instagram.com/v1/users/$id[0]/?access_token=$token");
	        $result = (int) $data['data']['counts']['followed_by'];

            if($this->allow_cash == true){
                set_transient('bdayh_soical_instgram',$this->formatMoney($result),12*60*60);
            }
            return($this->formatMoney($result));
        }
        else {
            return(0);
        }
    }

	/* Google+ Followers */
    public function get_gplus_count($url, $api) {
        if ($url != '') {

            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_gplus');
                if ($social_cash != '' and !empty($social_cash)) {
                    return ($social_cash);
                }
            }

	        $result = "";
	        $googleplus_data = bdRemoteGET( 'https://www.googleapis.com/plus/v1/people/'. $url .'?key=' . $api );
	        if ( isset( $googleplus_data['circledByCount'] ) ) {
		        $googleplus_count 	= (int) $googleplus_data['circledByCount'] ;
		        $result 			= $googleplus_count;
	        }

	        if ($this->allow_cash == true) {
		        set_transient('bdayh_soical_gplus', $this->formatMoney($result), 12*60*60);
	        }
	        return ($this->formatMoney($result));
        }

        else {
            return(0);
        }
    }

	/* Dribbble Followers */
    public function get_dribbble_count( $drbl_un, $access_token ) {

        if( $drbl_un !=''  ) {

            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_dribbble');
                if ($social_cash != '' and !empty($social_cash)) {
                    return ($social_cash);
                }
            }

            $data 	= @bdRemoteGET("https://api.dribbble.com/v1/users/$drbl_un/?access_token=$access_token");
            $result = (int) $data['followers_count'];

            if ($this->allow_cash == true) {
                set_transient('bdayh_soical_dribbble', $this->formatMoney($result), 12*60*60);
            }
            return ($this->formatMoney($result));

        } else {
            return(0);
        }
    }

    public function get_forrst_count( $id ) {

        if( $id !=''  ) {

            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_forrst');
                if ($social_cash != '' and !empty($social_cash)) {
                    return ($social_cash);
                }
            }

            $data = @bdRemoteGET( "http://forrst.com/api/v2/users/info?username=$id" );
            $result = (int) $data['resp']['typecast_followers'];

            if ($this->allow_cash == true) {
                set_transient('bdayh_soical_forrst', $this->formatMoney($result), 12*60*60);
            }
            return ($this->formatMoney($result));

        } else {
            return(0);
        }
    }

	/* Delicious Followers */
    public function get_delicious_count( $id ) {

        if( $id !=''  ) {

            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_delicious');
                if ($social_cash != '' and !empty($social_cash)) {
                    return ($social_cash);
                }
            }

            $data = @bdRemoteGET("http://feeds.delicious.com/v2/json/userinfo/$id");
            $result = (int) $data[2]['n'];

            if ($this->allow_cash == true) {
                set_transient('bdayh_soical_delicious', $this->formatMoney($result), 12*60*60);
            }
            return ($this->formatMoney($result));

        } else {
            return(0);
        }
    }

	/* Youtube Subscribers */
    public function get_youtube_count( $channel_name, $api_key, $youtube_type )
    {
        if ($channel_name != '' and $api_key != '')
        {

            if ($this->allow_cash == true) {
                $social_cash = get_transient('bdayh_soical_youtube');
                if ($social_cash != '' and !empty($social_cash) ){
                    return ($social_cash);
                }
            }

	        if( $youtube_type == 'user' ){
		        $data = @bdRemoteGET("https://www.googleapis.com/youtube/v3/channels?part=statistics&forUsername=$channel_name&key=$api_key");
	        }
	        else{
		        $data = @bdRemoteGET("https://www.googleapis.com/youtube/v3/channels?part=statistics&id=$channel_name&key=$api_key");
	        }
	        $result = (int) $data['items'][0]['statistics']['subscriberCount'];

	        if ($this->allow_cash == true) {
		        set_transient('bdayh_soical_youtube', $this->formatMoney($result), 12*60*60);
	        }
	        return ($this->formatMoney($result));
        }
        else {
            return (0);
        }
    }

	/* Vimeo Subscribers */
    public function get_vimo_count($channel_name)
    {
        if($channel_name != '')
        {
            if($this->allow_cash == true)
            {
                $social_cash = get_transient('bdayh_soical_vimo');
                if($social_cash != '' and !empty($social_cash))
                {
                    return($social_cash);
                }
            }
            $data = @bdRemoteGET( "http://vimeo.com/api/v2/channel/$channel_name/info.json" );
            $result = (int) $data['total_subscribers'];
            if ($result <= 0) return 0;
            if($this->allow_cash == true){
                set_transient('bdayh_soical_vimo',$this->formatMoney($result), 12*60*60);
            }
            return($this->formatMoney($result));
        }
        return 0;
    }

	/* SoundCloud Followers */
    public function get_soundcloud_count( $channel_name,$api ){

        if($channel_name != ''){

            if($this->allow_cash == true){
                $social_cash = get_transient('bdayh_soical_soundcloud');

                if($social_cash != '' and !empty($social_cash)){
                    return($social_cash);
                }
            }

            $data = @bdRemoteGET("http://api.soundcloud.com/users/$channel_name.json?consumer_key=$api");
            $result = (int) $data['followers_count'];

            if($this->allow_cash == true){
                set_transient('bdayh_soical_soundcloud',$this->formatMoney($result), 12*60*60);
            }
            return($this->formatMoney($result));

        } else { return 0; }
    }
}

function bdFetchData($json_url='',$use_curl=false){
    if($use_curl){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $json_url);
        $json_data = curl_exec($ch);
        curl_close($ch);
        return json_decode($json_data);
    }else{
        $json_data = @file_get_contents($json_url);
        if($json_data == true){
            return json_decode($json_data);
        }else{ return null;}
    }
}


function bdRemoteGET( $url, $json = true, $args = array( 'timeout' => 18 , 'sslverify' => false ) ) {

    $get_request = preg_replace ( '/\s+/', '', $url);
    $get_request = wp_remote_get( $url , $args );

    $request 	 = wp_remote_retrieve_body( $get_request );

    if( $json ){
        $request = @json_decode( $request , true );
    }
    return $request;
}


add_action( 'widgets_init', 'bd_counter_widget' );
function bd_counter_widget(){
    register_widget( 'bd_counter_widget' );
}
class bd_counter_widget extends WP_Widget
{

    function bd_counter_widget()
    {
        $widget_ops     = array( 'classname' => 'bd-counter-widget', 'description' => 'Widget display a count of your social networks followers/fans numbers' );
        $control_ops    = array( 'id_base'   => 'bd-counter-widget' );
        parent::__construct( 'bd-counter-widget', '.: Bdaia - Social Counter', $widget_ops, $control_ops );
    }

    function widget( $args, $instance )
    {
        extract( $args );
        global $bd_data;
        $title                      = apply_filters('widget_title', $instance['title'] );
        $count                      = new COUNT_CLASS();
        $rssurl                     = $instance['rssurl'];
        $drbl_un                    = $instance['drbl_un'];
        $access_token               = $instance['access_token'];
        $forrst_id                  = $instance['forrst_id'];
        $delicious                  = $instance['delicious'];
        $facebookn                  = $instance['facebookn'];
        $fb_access_token            = $instance['fb_access_token'];
        $gplusn                     = $instance['gplusn'];
        $gplusn_api                 = $instance['gplusn_api'];
        $youtubeun                  = $instance['youtubeun'];
        $youtube_api_key            = $instance['youtube_api_key'];
        $vimocn                     = $instance['vimocn'];
        $soundcloudun               = $instance['soundcloudun'];
        $socialstyle                = $instance['socialstyle'];
        $youtube_type               = $instance['youtube_type'];
        $instgram                   = $instance['instgram'];
        $instgram_token             = $instance['instgram_token'];
        $soundcloud_api             = $instance['soundcloud_api'];

        $get_posts_count            = $instance['get_posts_count'];
        $get_comments_count         = $instance['get_comments_count'];
        $get_members_count          = $instance['get_members_count'];

        $social_count['get_posts_count'] 	= $count->get_posts_count( $get_posts_count );
        $social_count['get_comments_count'] = $count->get_comments_count( $get_comments_count );
        $social_count['get_members_count'] 	= $count->get_members_count( $get_members_count );

        $social_count['dribbble'] 	    = $count->get_dribbble_count( $drbl_un, $access_token );
        $social_count['forrst'] 	    = $count->get_forrst_count( $forrst_id );
        $social_count['delicious'] 	    = $count->get_delicious_count( $delicious );
        $social_count['facebook'] 	    = $count->get_facebook_count( $facebookn, $fb_access_token );
        $social_count['gplus'] 		    = $count->get_gplus_count( $gplusn,$gplusn_api );
        $social_count['instgram'] 	    = $count->get_instgram_count( $instgram, $instgram_token );
        $social_count['youtube'] 	    = $count->get_youtube_count( $youtubeun,$youtube_api_key, $youtube_type );
        $social_count['vimo'] 		    = $count->get_vimo_count( $vimocn );
        $social_count['soundcloud']     = $count->get_soundcloud_count( $soundcloudun, $soundcloud_api );

	    /* Twitter */
	    $bdaia_twitter_user			    = bdayh_get_option('twitter_username');
	    $bdaia_twitter_token            = bdayh_get_option('twitter_access_token');
        $social_count['bdaia_twitter']  = $count->get_twitter_count( $bdaia_twitter_user, $bdaia_twitter_token );

        $social_c_style = $instance['socialstyle'];
        $social_c_id = '';
        if( $social_c_style == 'style2' ){
            $social_c_id = "social-counter-widget-style2";
        } else {
            $social_c_id = "social-counter-widget";
        }

        echo $before_widget;
        if($title) {
            echo $before_title.$title.$after_title;
        }
        ?>
        <div id="social-counter-widget" class="<?php echo $instance['socialstyle']; ?>-SC">
            <ul class="social-counter-widget">
                <?php
                /**
                 * Twitter
                 */
                if (trim($bdaia_twitter_user) != '') {
                    echo '<li class="social-counter-twitter"><a href="http://twitter.com/'.$bdaia_twitter_user.'" target="_blank"><i class="fa fa-twitter"></i><span class="sc-num">'. $social_count['bdaia_twitter'] .'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }
                /**
                 * Facebook
                 */
                if (trim($facebookn) != '') {
                    echo '<li class="social-counter-facebook"><a href="http://www.facebook.com/'.$facebookn.'" target="_blank"><i class="fa fa-facebook"></i><span class="sc-num">'.$social_count['facebook'].'</span><small>'. __('Fans' , LANG ) .'</small></a></li> ';
                }
                /**
                 * Google+
                 */
                if (trim($gplusn) != '') {
                    echo '<li class="social-counter-gplus"><a href="http://plus.google.com/'.$gplusn.'" target="_blank"><i class="fa fa-google-plus"></i><span class="sc-num">'.$social_count['gplus'].'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }
                /**
                 * Youtube
                 */
                if (trim($youtubeun) != '') {

                    $type = 'user';
                    if( !empty($instance['youtube_type']) && $instance['youtube_type'] == 'channel' ) $type = 'channel';

                    echo '<li class="social-counter-youtube"><a href="http://www.youtube.com/'.$type.'/'.$youtubeun.'" target="_blank"><i class="fa fa-youtube"></i><span class="sc-num">'.$social_count['youtube'].'</span><small>'. __('Subscribers' , LANG ) .'</small></a></li> ';
                }
                /**
                 * Vimeo
                 */
                if (trim($vimocn) != '') {
                    echo '<li class="social-counter-vimo"><a href="http://vimeo.com/channels/'.$vimocn.'" target="_blank"><i class="fa fa-vimeo-square"></i><span class="sc-num">'.$social_count['vimo'].'</span><small>'. __('Subscribers' , LANG ) .'</small></a></li> ';
                }
                /**
                 * Souncloud
                 */
                if (trim($soundcloudun) != '') {
                    echo '<li class="social-counter-soundcloud"><a href="http://soundcloud.com/'.$soundcloudun.'" target="_blank"><i class="fa fa-soundcloud"></i><span class="sc-num">'.$social_count['soundcloud'].'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }

                /**
                 * Instgram
                 */
                if (trim($instgram) != '') {
                    echo '<li class="social-counter-instgram"><a href="http://instagram.com/'.$instgram.'" target="_blank"><i class="fa fa-instagram"></i><span class="sc-num">'.$social_count['instgram'].'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }

                /**
                 * dribbble
                 */
                if (trim($drbl_un) != '') {
                    echo '<li class="social-counter-dribbble"><a href="http://dribbble.com/'.$drbl_un.'" target="_blank"><i class="fa fa-dribbble"></i><span class="sc-num">'.$social_count['dribbble'].'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }

                /**
                 * forrst
                 */
                if (trim($forrst_id) != '') {
                    echo '<li class="social-counter-forrst"><a href="http://forrst.com/people/'.$forrst_id.'" target="_blank"><i class="fa fa-forrst"></i><span class="sc-num">'.$social_count['forrst'].'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }

                /**
                 * forrst
                 */
                if (trim($delicious) != '') {
                    echo '<li class="social-counter-delicious"><a href="http://delicious.com/'.$delicious.'" target="_blank"><i class="fa fa-delicious"></i><span class="sc-num">'.$social_count['delicious'].'</span><small>'. __('Followers' , LANG ) .'</small></a></li> ';
                }

                /**
                 * $get_posts_count
                 */
                if( trim($get_posts_count) !='' ){
                    echo '<li class="social-counter-posts"><a><i class="fa fa-file-text"></i><span class="sc-num">'.$social_count['get_posts_count'].'</span><small>'. __('Posts' , LANG ) .'</small></a></li> ';
                }

                /**
                 * $get_comments_count
                 */
                if( trim($get_comments_count) !='' ){
                echo '<li class="social-counter-comments"><a><i class="fa fa-comments"></i><span class="sc-num">'.$social_count['get_comments_count'].'</span><small>'. __('Comments' , LANG ) .'</small></a></li> ';
                }

                /**
                 * $get_members_count
                 */
                if( trim($get_members_count) !='' ){
                echo '<li class="social-counter-members"><a><i class="fa fa-user"></i><span class="sc-num">'.$social_count['get_members_count'].'</span><small>'. __('Members' , LANG ) .'</small></a></li> ';
                }
                ?>
            </ul>
        </div> <!-- End Social Counter/-->
        <?php
        echo $after_widget;
    }

    function update( $new_instance, $old_instance )
    {
        $instance 						= $old_instance;
        $instance['title']              = strip_tags( $new_instance['title']);
        $instance['get_posts_count']    = $new_instance['get_posts_count'] ;
        $instance['get_comments_count'] = $new_instance['get_comments_count'] ;
        $instance['get_members_count']  = $new_instance['get_members_count'] ;
        $instance['rssurl']             = $new_instance['rssurl'] ;
        $instance['drbl_un']            = $new_instance['drbl_un'] ;
        $instance['access_token']       = $new_instance['access_token'] ;
        $instance['forrst_id']          = $new_instance['forrst_id'] ;
        $instance['delicious']          = $new_instance['delicious'] ;
        $instance['facebookn']          = $new_instance['facebookn'] ;
        $instance['fb_access_token']    = $new_instance['fb_access_token'] ;
        $instance['gplusn']             = $new_instance['gplusn'] ;
        $instance['gplusn_api']         = $new_instance['gplusn_api'] ;
        $instance['youtubeun']          = $new_instance['youtubeun'] ;
        $instance['youtube_api_key']    = $new_instance['youtube_api_key'] ;
        $instance['vimocn']             = $new_instance['vimocn'] ;
        $instance['soundcloudun']       = $new_instance['soundcloudun'] ;
        $instance['socialstyle']        = $new_instance['socialstyle'] ;
        $instance['youtube_type']       = $new_instance['youtube_type'] ;
        $instance['instgram']           = $new_instance['instgram'] ;
        $instance['instgram_token']     = $new_instance['instgram_token'] ;
        $instance['soundcloud_api']     = $new_instance['soundcloud_api'] ;

        delete_transient('bdaia_transient_twitter');
        delete_transient('bdTwitterFollowers');
        delete_transient('bdayh_soical_soundcloud');
        delete_transient('bdayh_soical_vimo');
        delete_transient('bdayh_soical_youtube');
        delete_transient('bdayh_soical_gplus');
        delete_transient('bdayh_soical_facebook');
        delete_transient('bdayh_soical_instgram');
        delete_transient('bdayh_soical_dribbble');
        delete_transient('bdayh_soical_forrst');
        delete_transient('bdayh_soical_delicious');
        return $instance;
    }

    function form( $instance )
    {
        $defaults = array('title' =>__( 'Stay Connected' , LANG));
        $instance = wp_parse_args((array) $instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title : ',LANG)?></label>
            <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" type="text" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'socialstyle' ); ?>"><?php _e('Style : ', LANG) ?></label>
            <select id="<?php echo $this->get_field_id( 'socialstyle' ); ?>" name="<?php echo $this->get_field_name( 'socialstyle' ); ?>" class="widefat">
                <option <?php if ( 'style1' == $instance['socialstyle'] ) echo 'selected="selected"'; ?> value="style1">style1</option>
                <option <?php if ( 'style2' == $instance['socialstyle'] ) echo 'selected="selected"'; ?> value="style2">style2</option>
                <option <?php if ( 'style3' == $instance['socialstyle'] ) echo 'selected="selected"'; ?> value="style3">style3</option>
                <option <?php if ( 'style4' == $instance['socialstyle'] ) echo 'selected="selected"'; ?> value="style4">style4</option>
            </select>
        </p>

        <div class="bdayh-sc bdayh-sc-posts">
            <h3><?php _e( 'Posts counter', LANG ); ?></h3>
            <p>
                <input id="<?php echo $this->get_field_id( 'get_posts_count' ); ?>" name="<?php echo $this->get_field_name( 'get_posts_count' ); ?>"  value="true" <?php if( $instance['get_posts_count'] ) echo 'checked="checked"'; ?> type="checkbox"  />
            </p>
        </div><!-- .bdayh-sc-posts /-->

        <div class="bdayh-sc bdayh-sc-comments">
            <h3><?php _e( 'Comments counter', LANG ); ?></h3>
            <p>
                <input id="<?php echo $this->get_field_id( 'get_comments_count' ); ?>" name="<?php echo $this->get_field_name( 'get_comments_count' ); ?>"  value="true" <?php if( $instance['get_comments_count'] ) echo 'checked="checked"'; ?> type="checkbox"  />
            </p>
        </div><!-- .bdayh-sc-comments /-->

        <div class="bdayh-sc bdayh-sc-members">
            <h3><?php _e( 'Members counter', LANG ); ?></h3>
            <p>
                <input id="<?php echo $this->get_field_id( 'get_members_count' ); ?>" name="<?php echo $this->get_field_name( 'get_members_count' ); ?>"  value="true" <?php if( $instance['get_members_count'] ) echo 'checked="checked"'; ?> type="checkbox"  />
            </p>
        </div><!-- .bdayh-sc-members /-->

        <div class="bdayh-sc bdayh-sc-twitter">
            <h3><?php _e( 'Twitter', LANG ); ?></h3>
            <?php
            $consumer_key 			= bdayh_get_option('twitter_consumer_key');
            $consumer_secret 		= bdayh_get_option('twitter_consumer_secret');
            $twitter_id 			= bdayh_get_option('twitter_username');
            if( empty( $twitter_id ) && empty( $consumer_key ) && empty( $consumer_secret ) ){ ?>
                <p class="bdayh-sc-info">
                    <?php _e( 'Error : Setup Twitter API settings Go to Theme panel > Twitter API', LANG ); ?>
                </p>
            <?php } ?>

            <p>
                <input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>"  value="true" <?php if( $instance['twitter'] ) echo 'checked="checked"'; ?> type="checkbox"  />
            </p>
        </div><!-- .bdayh-sc-twitter /-->

        <div class="bdayh-sc bdayh-sc-facebook">
            <h3><?php _e( 'Facebook', LANG ); ?></h3>
            <p class="bdayh-sc-info">
                <strong><?php _e( 'Need Help ?', LANG ); ?></strong>
                <br>
                <?php _e( 'Get your App Access Token,', LANG ); ?> <a target="_blank" href="https://developers.facebook.com/tools/accesstoken/"><?php _e( 'Click here', LANG ) ?></a> <?php _e( 'For More Details.', LANG ); ?>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'fb_access_token' ); ?>"><strong><?php _e('Access Token Key',LANG); ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'fb_access_token' ); ?>" name="<?php echo $this->get_field_name( 'fb_access_token' ); ?>" value="<?php echo $instance['fb_access_token']; ?>" class="widefat" type="text" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'facebookn' ); ?>"><strong><?php _e('Page ID/Name',LANG); ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'facebookn' ); ?>" name="<?php echo $this->get_field_name( 'facebookn' ); ?>" value="<?php echo $instance['facebookn']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-facebook /-->

        <div class="bdayh-sc bdayh-sc-googlep">
            <h3><?php _e( 'Google+', LANG ); ?></h3>
            <p class="bdayh-sc-info">
                <strong><?php _e( 'Need Help ?', LANG ); ?></strong>
                <br>
                <?php _e( 'Enter Your Google+ page or profile ID and Google API Key', LANG ); ?> <a target="_blank" href="https://developers.google.com/+/api/oauth"><?php _e( 'Click here', LANG ) ?></a>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'gplusn_api' ); ?>"><strong><?php _e('Google plus API',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'gplusn_api' ); ?>" name="<?php echo $this->get_field_name( 'gplusn_api' ); ?>" value="<?php echo $instance['gplusn_api']; ?>" class="widefat" type="text" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'gplusn' ); ?>"><strong><?php _e('Page ID/Name',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'gplusn' ); ?>" name="<?php echo $this->get_field_name( 'gplusn' ); ?>" value="<?php echo $instance['gplusn']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-googlep /-->

        <div class="bdayh-sc bdayh-sc-youtube">
            <h3><?php _e( 'Youtube', LANG ); ?></h3>

            <p class="bdayh-sc-info">
                <strong><?php _e( 'Need Help ?', LANG ); ?></strong>
                <br>
                <a target="_blank" href="https://console.developers.google.com/project"><?php _e( 'Get API Click here', LANG ) ?></a>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'youtube_api_key' ); ?>"><strong><?php _e('Youtube API',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'youtube_api_key' ); ?>" name="<?php echo $this->get_field_name( 'youtube_api_key' ); ?>" value="<?php echo $instance['youtube_api_key']; ?>" class="widefat" type="text" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'youtube_type' ); ?>"><strong><?php _e('YouTube Type', LANG) ?></strong></label>
                <select id="<?php echo $this->get_field_id( 'youtube_type' ); ?>" name="<?php echo $this->get_field_name( 'youtube_type' ); ?>" class="widefat">
                    <option <?php if ( 'user' == $instance['youtube_type'] ) echo 'selected="selected"'; ?> value="user">User</option>
                    <option <?php if ( 'channel' == $instance['youtube_type'] ) echo 'selected="selected"'; ?> value="channel">Channel</option>
                </select>
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'youtubeun' ); ?>"><strong><?php _e('Username or Channel ID',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'youtubeun' ); ?>" name="<?php echo $this->get_field_name( 'youtubeun' ); ?>" value="<?php echo $instance['youtubeun']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-youtube /-->

        <div class="bdayh-sc bdayh-sc-vimeo">
            <h3><?php _e( 'Vimeo', LANG );?></h3>
            <p>
                <label for="<?php echo $this->get_field_id( 'vimocn' ); ?>"><strong><?php _e('Channel Name',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'vimocn' ); ?>" name="<?php echo $this->get_field_name( 'vimocn' ); ?>" value="<?php echo $instance['vimocn']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-vimeo /-->

        <div class="bdayh-sc bdayh-sc-soundcloud">
            <h3><?php _e( 'Soundcloud', LANG );?></h3>
            <p class="bdayh-sc-info">
                <strong><?php _e( 'To Setup SoundCloud you need to get an API Key', LANG ); ?></strong>
                <br>
                <?php _e( 'Go To', LANG );?> <a href="http://soundcloud.com/you/apps" target="_blank"> <?php _e( 'Your Applications', LANG );?></a>
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'soundcloud_api' ); ?>"><strong><?php _e('API Key',LANG); ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'soundcloud_api' ); ?>" name="<?php echo $this->get_field_name( 'soundcloud_api' ); ?>" value="<?php echo $instance['soundcloud_api']; ?>" class="widefat" type="text" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'soundcloudun' ); ?>"><strong><?php _e('UserName',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'soundcloudun' ); ?>" name="<?php echo $this->get_field_name( 'soundcloudun' ); ?>" value="<?php echo $instance['soundcloudun']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-soundcloud /-->

        <div class="bdayh-sc bdayh-sc-instgram">
            <h3><?php _e( 'Instgram', LANG );?></h3>
            <p>
                <label for="<?php echo $this->get_field_id( 'instgram' ); ?>"><strong><?php _e('UserName',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'instgram' ); ?>" name="<?php echo $this->get_field_name( 'instgram' ); ?>" value="<?php echo $instance['instgram']; ?>" class="widefat" type="text" />
            </p>
            <p>
                <label for="<?php echo $this->get_field_id( 'instgram_token' ); ?>"><strong><?php _e('Access Token Key',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'instgram_token' ); ?>" name="<?php echo $this->get_field_name( 'instgram_token' ); ?>" value="<?php echo $instance['instgram_token']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-instgram /-->

        <div class="bdayh-sc bdayh-sc-dribbble">
            <h3><?php _e( 'Dribbble', LANG ); ?></h3>

            <p>
                <label for="<?php echo $this->get_field_id( 'access_token' ); ?>"><strong><?php _e('Access Token',LANG); ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'access_token' ); ?>" name="<?php echo $this->get_field_name( 'access_token' ); ?>" value="<?php echo $instance['access_token']; ?>" class="widefat" type="text" />
            </p>

            <p>
                <label for="<?php echo $this->get_field_id( 'drbl_un' ); ?>"><strong><?php _e('UserName',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'drbl_un' ); ?>" name="<?php echo $this->get_field_name( 'drbl_un' ); ?>" value="<?php echo $instance['drbl_un']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-dribbble /-->

        <div class="bdayh-sc bdayh-sc-delicious">
            <h3><?php _e( 'Delicious', LANG ); ?></h3>

            <p>
                <label for="<?php echo $this->get_field_id( 'delicious' ); ?>"><strong><?php _e('UserName',LANG) ?></strong></label>
                <input id="<?php echo $this->get_field_id( 'delicious' ); ?>" name="<?php echo $this->get_field_name( 'delicious' ); ?>" value="<?php echo $instance['delicious']; ?>" class="widefat" type="text" />
            </p>
        </div><!-- .bdayh-sc-delicious /-->

        <style type="text/css">
            /**/
            .bdayh-sc {
                border-radius: 3px;
                margin: 6px 0;
                padding: 15px;
                background: #222;
                text-decoration: none !important;
            }
            .bdayh-sc a {
                text-decoration: none !important;

            }
            .bdayh-sc h3 {
                margin: 0 0 10px 0 !important;
                padding: 0 !important;
            }

            .bdayh-sc p {
                margin: 10px 0 0 0 !important;
                padding: 0 !important;
            }

            .bdayh-sc input {
                border: 0 none !important;
                border-radius: 3px;
                margin: 5px 0 0 0 !important;
            }

            .bdayh-sc h3,
            .bdayh-sc,
            .bdayh-sc a {
                color: #FFF;
            }
            .bdayh-sc a {font-weight: bold !important}

            .bdayh-sc .bdayh-sc-info {
                padding: 7px !important;
                margin: 15px 0;
                background: #fcf8e3 !important;


                clear: both;
                overflow: hidden;
                display: block;
                font-size: 12px;
                border-radius: 4px;
            }
            .bdayh-sc .bdayh-sc-info, .bdayh-sc .bdayh-sc-info a{
                color: #8a6d3b!important;
            }

            .bdayh-sc.bdayh-sc-facebook {background: #39599f !important}
            .bdayh-sc.bdayh-sc-twitter {background: #45b0e3 !important}
            .bdayh-sc.bdayh-sc-googlep {background: #fa0101 !important}
            .bdayh-sc.bdayh-sc-youtube {background: #cc181e !important}
            .bdayh-sc.bdayh-sc-vimeo {background: #44bbff !important}
            .bdayh-sc.bdayh-sc-soundcloud {background: #F76700 !important}
            .bdayh-sc.bdayh-sc-instgram {background: #3f729b !important}
            .bdayh-sc.bdayh-sc-dribbble {background: #d97aa5 !important}
            .bdayh-sc.bdayh-sc-delicious {background: #285da7 !important}
            .bdayh-sc.bdayh-sc-posts {background: #e29c04 !important}
            .bdayh-sc.bdayh-sc-comments {background: #4caf50 !important}
            .bdayh-sc.bdayh-sc-members {background: #e91e63 !important}
        </style>
        <?php
    }
}
?>