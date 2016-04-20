<?php
global $post;
if( bdayh_get_option( 'post_fb_comments_box' ) ){

    if( bdayh_get_option( 'post_sharing_lang_bd' ) ) {
        $social_lang_type = bdayh_get_option( 'social_lang_type' );
    } else {
        $social_lang_type ='en-US';
    }

    $permalink  = get_permalink( $post->ID );
    $titleget   = get_the_title();
    $url = (!empty($_SERVER['HTTPS'])) ? "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] : "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>

    <div class="cf"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];  if (d.getElementById(id)) return;  js = d.createElement(s); js.id = id;  js.src = "//connect.facebook.net/<?php echo $social_lang_type ?>/all.js#xfbml=1";  fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));</script>
    <div class="new-box">
        <div class="box-title">
            <h3>
                <b><?php _e( 'Facebook Comments', LANG ); ?></b>
            </h3>
            <div class="title-line"></div>
        </div>

        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="6" mobile="false" data-width="100%"></div>
    </div>
    <div class="cf"></div>
<?php } ?>