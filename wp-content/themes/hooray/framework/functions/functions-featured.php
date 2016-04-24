<?php
/**
 * Img
 * ----------------------------------------------------------------------------- *
 */
function bdaia_img( $size = 'bd-large' )
{
	if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
		echo '<div class="post-image">';
		?><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($size); ?></a><?php
		echo '</div>';
	}
	elseif( bd_first_post_image() ) {
		// Set the first image from the editor.
		echo '<div class="post-image">';
		echo '<a href="' . get_the_permalink() . '"><img  src="' . bd_first_post_image() . '" class="wp-post-image" alt="' . get_the_title() . '" /></a>';
		echo '</div>';
	}
}

/**
 * Slider img
 * ----------------------------------------------------------------------------- *
 */
function bd_slider_img()
{
    $size = 'bd-large';
    $fea_h  = '500';
    $fea_w  = '800';

    $bdSiteSidebarPos           = bdayh_get_option('site_sidebar_position');
    $bdPostSidebarPos           = bdayh_get_option('article_sidebar_position');
    $bdPostSidebarPos_MetaFull  = get_post_meta( get_the_ID(), 'bd_full_width', true );

    if( is_singular() ){

        if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ){
            $fea_w  = '1138';
            $fea_h  = '640';
            $size   = 'full';
        }
    }
    elseif( is_home() || is_front_page() || is_singular() ) {

        if( $bdSiteSidebarPos == 'sideNo' ){
            $fea_w  = '1138';
            $fea_h  = '640';
            $size   = 'full';
        }
    }

    if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
    {
        if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
            bd_home_thumb($fea_w, $fea_h, '', '');
        }
        else {
            ?>
            <a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail($size); ?></a>
        <?php
        }
    }
}

/**
 * Home img
 * ----------------------------------------------------------------------------- *
 */
function bd_home_img( $size = 'bd-large' )
{
    global $post;

    if( bdayh_get_option( 'fea_width' ) ) {
        $fea_w  = bdayh_get_option( 'fea_width' );
    } else {
        $fea_w  = '800';
    }

    if( bdayh_get_option( 'fea_height' ) ) {
        $fea_h  = bdayh_get_option( 'fea_height' );
    } else {
        $fea_h  = '500';
    }

    $bdSiteSidebarPos           = bdayh_get_option('site_sidebar_position');
    $bdPostSidebarPos           = bdayh_get_option('article_sidebar_position');
    $bdPostSidebarPos_MetaFull  = get_post_meta( get_the_ID(), 'bd_full_width', true );

    if( is_singular() ){

        if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ){
            $fea_w  = '1138';
            $fea_h  = '640';
            $size   = 'full';
        }
    }
    elseif( is_home() || is_front_page() || is_singular() ) {

        if( $bdSiteSidebarPos == 'sideNo' ){
            $fea_w  = '1138';
            $fea_h  = '640';
            $size   = 'full';
        }
    }

    $fea_lightbox        = bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox';

    $lightbox = "";
    if( $fea_lightbox ) $lightbox='lightbox';


    if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
        if ( ! bdayh_get_option( 'aq_resize_op' ) ) {

            if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
                bd_home_thumb( $fea_w, $fea_h, 'lightbox' );
            }
            else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
                bd_home_thumb( $fea_w, $fea_h );
            }
            else {
                bd_home_thumb( $fea_w, $fea_h );
            }
        }
        else {
            if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
                ?><div class="post-image"><a class="lightbox" href="<?php echo bd_thumb_src( 'full' ); ?>"><?php the_post_thumbnail($size); ?></a></div><?php
            }
            else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
                ?><div class="post-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail($size); ?></a></div><?php
            }
            else {
	            echo '<div class="post-image">';
                the_post_thumbnail($size);
	            echo '</div>';
            }
        }
    }
    elseif( bd_first_post_image() ) {

        // Set the first image from the editor.
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-image">';
            echo '<a class="lightbox" href="' . bd_first_post_image() . '"><img  src="' . bd_first_post_image() . '" class="wp-post-image" alt="' . get_the_title() . '" /></a>';
            echo '</div>';
        }
        else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            echo '<div class="post-image">';
            echo '<a href="' . get_the_permalink() . '"><img  src="' . bd_first_post_image() . '" class="wp-post-image" alt="' . get_the_title() . '" /></a>';
            echo '</div>';
        }
        else {
            echo '<div class="post-image">';
            echo '<img  src="' . bd_first_post_image() . '" class="wp-post-image" alt="' . get_the_title() . '" />';
            echo '</div>';
        }
    }
}

/**
 * Slider widget img
 * ----------------------------------------------------------------------------- *
 */
function bd_slider_widget_img()
{
    global $post;

    $fea_h  = '168';
    $fea_w  = '245';
    $size = 'bd-related-small';

    $bdSiteSidebarPos           = bdayh_get_option('site_sidebar_position');
    $bdPostSidebarPos           = bdayh_get_option('article_sidebar_position');
    $bdPostSidebarPos_MetaFull  = get_post_meta( get_the_ID(), 'bd_full_width', true );

    if( is_singular() ){

        if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ){
            $fea_h  = '330';
            $fea_w  = '620';
            $size = 'bd-related';
        }
    }
    elseif( is_home() || is_front_page() || is_singular() ) {

        if( $bdSiteSidebarPos == 'sideNo' ){
            $fea_h  = '330';
            $fea_w  = '620';
            $size = 'bd-related';
        }
    }

    if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
    {
        if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
            bd_home_thumb($fea_w, $fea_h, '', 'ttip');
        }
        else {
            ?>
            <a class="ttip" href="<?php the_permalink(); ?>" ><?php the_post_thumbnail($size); ?></a>
        <?php
        }
    }
}

/**
 * widget img
 * ----------------------------------------------------------------------------- *
 */
function bd_widget_img( $ttip = "" )
{
    $fea_h  = '55';
    $fea_w  = '55';
    $size = 'bd-small';


    if ( function_exists("has_post_thumbnail") && has_post_thumbnail() )
    {
        if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
            bd_home_thumb($fea_w, $fea_h, '', $ttip );
        }
        else {
            ?>
            <div class="post-thumb"><a class="<?php echo $ttip;?>" href="<?php the_permalink(); ?>"  title="<?php the_title();?>"><?php the_post_thumbnail($size); ?></a></div>
        <?php
        }
    }
}


/**
 * Formats : Images
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_thumb( $img_w ='60', $img_h='60', $light_box='lightbox', $tip ='ttip' )
{
    global $post;
    $thumb      = bd_post_image( 'full' );
    $image      = aq_resize( $thumb, $img_w, $img_h, true );

    $alt        = get_the_title();
    $link       = get_permalink();

    if( $tip == 'ttip' ){
        $ttip = $tip;
    }

    else {
        $ttip = '';
    }

    if( $light_box == 'lightbox' ) {
        $light_box      = "lightbox";
        $light_box_href = $thumb;
    }

    else {
        $light_box      = '';
        $light_box_href = $link;
    }

    if ( has_post_thumbnail() ) {
        if( $image ) {
            echo '<div class="post-thumb"><a href="'. $light_box_href .'" title="'. $alt .'" class="'. $light_box . $ttip .'"> <img  src="'. $image .'" width="'. $img_w .'" height="'. $img_h .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        }
    }
}

function bd_home_thumb( $img_w ='', $img_h='', $light_box='lightbox', $tip ='' ){
    global $post;
    $thumb      = bd_post_image( 'full' );
    $image      = aq_resize( $thumb, $img_w, $img_h, true );
    $alt        = get_the_title();
    $link       = get_permalink();

    if( $light_box == 'lightbox' )
    {
        $light_box_c    = " lightbox ";
        $light_box_href = $thumb;
    }
    else {
        $light_box_c      = '';
        $light_box_href = $link;
    }

    if( $tip == 'ttip' ){
        $ttip_c = $tip;
    }
    else {
        $ttip_c = '';
    }

    if ( strpos( bd_post_image(), 'youtube' ) )
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-thumb"><a href="'. $light_box_href .'" title="'. $alt .'" class="'.$light_box_c, $ttip_c.'"> <img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-thumb"><a href="'. $permalink .'" title="'. $alt .'" class="'.$ttip_c.'"> <img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-thumb"><img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-thumb"><img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
    elseif ( strpos(bd_post_image(), 'vimeo' ) )
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-thumb"><a href="'. $light_box_href .'" title="'. $alt .'" class="'.$light_box_c, $ttip_c.'"> <img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-thumb"><a href="'. $permalink .'" title="'. $alt .'" class="'.$ttip_c.'"> <img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-thumb"><img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-thumb"><img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
    elseif ( strpos(bd_post_image(), 'dailymotion' ) )
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-thumb"><a href="'. $light_box_href .'" title="'. $alt .'" class="'.$light_box_c, $ttip_c.'"> <img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-thumb"><a href="'. $permalink .'" title="'. $alt .'" class="'.$ttip_c.'"> <img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-thumb"><img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-thumb"><img  src="'. bd_post_image('full') .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
    else
    {
        if( bdayh_get_option( 'all_featured_image' ) == 'fea_lightbox' ) {
            echo '<div class="post-thumb"><a href="'. $light_box_href .'" title="'. $alt .'" class="'.$light_box_c, $ttip_c.'"> <img  src="'. $image .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'fea_link' ) {
            $permalink = get_permalink( $post->ID );
            echo '<div class="post-thumb"><a href="'. $permalink .'" title="'. $alt .'" class="'.$ttip_c.'"> <img  src="'. $image .'" alt="'. $alt .'" border="0" /> </a></div><!-- .post-image/-->' ."\n";
        } else if( bdayh_get_option( 'all_featured_image' ) == 'none' ) {
            echo '<div class="post-thumb"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        } else {
            echo '<div class="post-thumb"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></div><!-- .post-image/-->' ."\n";
        }
    }
}



/**
 * Formats : Video
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_video(){

    $video_type           = get_post_meta(get_the_ID(), 'bd_video_type', true);
    $video_id             = get_post_meta(get_the_ID(), 'bd_video_url', true);
    $embed          = get_post_meta(get_the_ID(), 'bd_embed_code', true);
    $protocol = is_ssl() ? 'https' : 'http';

    if ( $video_type == 'youtube' && $video_id ) {
        echo '
        <div class="post-image video-box">
            <iframe src="'.$protocol.'://www.youtube.com/embed/' . $video_id . '?rel=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>
        </div>';
    }
    elseif ( $video_type == 'vimeo' && $video_id ) {
        echo '
        <div class="post-image video-box">
            <iframe src="'.$protocol.'://player.vimeo.com/video/' . $video_id . '?wmode=opaque" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
        </div>';
    }
    elseif ( $video_type == 'daily' && $video_id ) {
        echo'
        <div class="post-image video-box">
            <iframe frameborder="0" src="'.$protocol.'://www.dailymotion.com/embed/video/' . $video_id . '"></iframe>
        </div>';
    }
    else {
        echo '<div class="post-image video-box">    '. stripslashes( $embed ) .' </div>'."\n";
    }
}



/**
 * Formats : Gallery
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_gallery( $img_w ='800', $img_h='500', $size = 'bd-large' )
{
    global $post;
    $alt                        = get_the_title();
    $bdSiteSidebarPos           = bdayh_get_option('site_sidebar_position');
    $bdPostSidebarPos           = bdayh_get_option('article_sidebar_position');
    $bdPostSidebarPos_MetaFull  = get_post_meta( get_the_ID(), 'bd_full_width', true );

    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'attachment',
        'post_parent'    => $post->ID,
        'post_mime_type' => 'image',
        'post_status'    => null,
        'orderby'		 => 'menu_order',
        'exclude' => get_post_thumbnail_id()
    );
    $attachments = get_posts($args);

    echo '<div id="slider-post-'. get_the_ID() .'" class="flexslider post-image"> <ul class="slides">' ."\n";

    if ( has_post_thumbnail() ) {

        $attachment_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

        if( is_singular() ){
            if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) $size = 'full';
        }
        elseif( is_home() || is_front_page() || is_singular() ) {
            if( $bdSiteSidebarPos == 'sideNo' ) $size = 'full';
        }

        if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
            $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
        }
        else {
            $image = bd_thumb_src( $size );
        }

        if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' )
        {
            echo '<li><a href="'.$attachment_image[0].'" class="lightbox" rel="group'. get_the_ID() .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
        }
        elseif( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' )
        {
            $permalink = get_permalink($post->ID);
            echo '<li><a href="'. $permalink .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
        }
        else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' )
        {
            echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
        }
        else {
            echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
        }
    }

    $i = 2;
    while( $i <= 99 ):
        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
        if($attachment_new_id):

            if( is_singular() ){
                if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) $size = 'full';
            }
            elseif( is_home() || is_front_page() || is_singular() ) {
                if( $bdSiteSidebarPos == 'sideNo' ) $size = 'full';
            }

            $attachment_image = wp_get_attachment_image_src($attachment_new_id, $size);
            $attachment_full = wp_get_attachment_image_src($attachment_new_id, 'full');

            if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
                $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
            }
            else {
                $image = $attachment_image[0];
            }

            if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' )
            {
                echo '<li><a href="'.$attachment_full[0].'" class="lightbox" rel="group'. get_the_ID() .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            }
            elseif( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' )
            {
                $permalink = get_permalink($post->ID);
                echo '<li><a href="'. $permalink .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            }
            else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' )
            {
                echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }
            else {
                echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }

        endif; $i++; endwhile;

    $i = 2;
    while( $i <= 99 ):
        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'page');
        if($attachment_new_id):

            if( is_singular() ){
                if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) $size = 'full';
            }
            elseif( is_home() || is_front_page() || is_singular() ) {
                if( $bdSiteSidebarPos == 'sideNo' ) $size = 'full';
            }

            $attachment_image = wp_get_attachment_image_src($attachment_new_id, $size);
            $attachment_full = wp_get_attachment_image_src($attachment_new_id, 'full');

            if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
                $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
            }
            else {
                $image = $attachment_image[0];
            }

            if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' )
            {
                echo '<li><a href="'.$attachment_full[0].'" class="lightbox" rel="group'. get_the_ID() .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            }
            elseif( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' )
            {
                $permalink = get_permalink($post->ID);
                echo '<li><a href="'. $permalink .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            }
            else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' )
            {
                echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }
            else {
                echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }

        endif; $i++; endwhile;

    $i = 2;
    while( $i <= 99 ):
        $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'wportfolio');
        if($attachment_new_id):

            if( is_singular() ){
                if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) $size = 'full';
            }
            elseif( is_home() || is_front_page() || is_singular() ) {
                if( $bdSiteSidebarPos == 'sideNo' ) $size = 'full';
            }

            $attachment_image = wp_get_attachment_image_src($attachment_new_id, $size);
            $attachment_full = wp_get_attachment_image_src($attachment_new_id, 'full');

            if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
                $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
            }
            else {
                $image = $attachment_image[0];
            }

            if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' )
            {
                echo '<li><a href="'.$attachment_full[0].'" class="lightbox" rel="group'. get_the_ID() .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            }
            elseif( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' )
            {
                $permalink = get_permalink($post->ID);
                echo '<li><a href="'. $permalink .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a></li>';
            }
            else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' )
            {
                echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }
            else {
                echo '<li><img  src="'. $image .'" alt="'. $alt .'" border="0" /></li>';
            }

        endif; $i++; endwhile;

    echo "\n". '</ul></div>' ."\n"; ?>
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery('#slider-post-<?php the_ID(); ?>').flexslider({
                animation: "fade",
                easing: "swing",
                keyboard: false,
                slideshowSpeed: 5000,
                animationSpeed: 500,
                randomize: false,
                pauseOnHover: false,
                controlNav: false,
                directionNav: true,
                smoothHeight: true,
                prevText        : '<i class="fa fa-chevron-left"></i>',
                nextText        : '<i class="fa fa-chevron-right"></i>'
            });
        });
    </script>
<?php
}



/**
 * Formats : Gallery Grid
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_gallery_grid( $img_w ='800', $img_h='500' )
{
    global $post;
    $alt                        = get_the_title();
    $bdSiteSidebarPos           = bdayh_get_option('site_sidebar_position');
    $bdPostSidebarPos           = bdayh_get_option('article_sidebar_position');
    $bdPostSidebarPos_MetaFull  = get_post_meta( get_the_ID(), 'bd_full_width', true );

    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'attachment',
        'post_parent'    => $post->ID,
        'post_mime_type' => 'image',
        'post_status'    => null,
        'orderby'		 => 'menu_order',
        'exclude' => get_post_thumbnail_id()
    );
    $attachments = get_posts($args);

    ?>
    <div class="grid-gallery justifiedgall_ztqoevjbhc justified-gallery">
        <?php
        if (function_exists("has_post_thumbnail") && has_post_thumbnail()) {

	        $attachment_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

	        $size = 'bd-gallery-grid';
	        if ( is_singular() ) {
		        if ( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) {
			        $size = 'full';
		        }
	        } elseif ( is_home() || is_front_page() || is_singular() ) {
		        if ( $bdSiteSidebarPos == 'sideNo' ) {
			        $size = 'full';
		        }
	        }

	        if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
		        $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
	        } else {
		        $image = bd_thumb_src( $size );
	        }

	        if ( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' ) {
		        echo '<a href="' . $attachment_image[0] . '" class="lightbox" rel="lightbox_' . get_the_ID() . '"><img  src="' . $image . '" alt="' . $alt . '" border="0" /></a>';
	        }

	        elseif ( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' ) {
		        $permalink = get_permalink( $post->ID );
		        echo '<a href="' . $permalink . '"><img  src="' . $image . '" alt="' . $alt . '" border="0" /></a>';
	        }

	        else if ( bdayh_get_option( 'gallery_featured_image' ) == 'none' ) {
		        echo '<img  src="' . $image . '" alt="' . $alt . '" border="0" /></li>';
	        }

	        else {
		        echo '<img  src="' . $image . '" alt="' . $alt . '" border="0" />';
	        }
        }

        $i = 2;
        while( $i <= 99 ):
            $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'post');
            if($attachment_new_id):

                $size = 'bd-gallery-grid';
                if( is_singular() ){
                    if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) $size = 'full';
                }
                elseif( is_home() || is_front_page() || is_singular() ) {
                    if( $bdSiteSidebarPos == 'sideNo' ) $size = 'full';
                }

                $attachment_image = wp_get_attachment_image_src($attachment_new_id, $size);
                $attachment_full = wp_get_attachment_image_src($attachment_new_id, 'full');

                if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
                    $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
                }
                else {
                    $image = $attachment_image[0];
                }

                if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' )
                {
                    echo '<a href="'.$attachment_full[0].'" class="lightbox" rel="lightbox_'. get_the_ID() .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a>';
                }
                elseif( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' )
                {
                    $permalink = get_permalink($post->ID);
                    echo '<a href="'. $permalink .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a>';
                }
                else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' )
                {
                    echo '<img  src="'. $image .'" alt="'. $alt .'" border="0" />';
                }
                else {
                    echo '<img  src="'. $image .'" alt="'. $alt .'" border="0" /><';
                }

            endif; $i++; endwhile;

        $i = 2;
        while( $i <= 99 ):
            $attachment_new_id = kd_mfi_get_featured_image_id('featured-image-'.$i, 'page');
            if($attachment_new_id):

                $size = 'bd-gallery-grid';
                if( is_singular() ){
                    if( $bdPostSidebarPos == 'sideNo' || $bdPostSidebarPos_MetaFull == true ) $size = 'full';
                }
                elseif( is_home() || is_front_page() || is_singular() ) {
                    if( $bdSiteSidebarPos == 'sideNo' ) $size = 'full';
                }

                $attachment_image = wp_get_attachment_image_src($attachment_new_id, $size);
                $attachment_full = wp_get_attachment_image_src($attachment_new_id, 'full');

                if ( ! bdayh_get_option( 'aq_resize_op' ) ) {
                    $image = aq_resize( $attachment_image[0], $img_w, $img_h, true );
                }
                else {
                    $image = $attachment_image[0];
                }

                if( bdayh_get_option( 'gallery_featured_image' ) == 'fea_lightbox' )
                {
                    echo '<a href="'.$attachment_full[0].'" class="lightbox" rel="lightbox_'. get_the_ID() .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a>';
                }
                elseif( bdayh_get_option( 'gallery_featured_image' ) == 'fea_link' )
                {
                    $permalink = get_permalink($post->ID);
                    echo '<a href="'. $permalink .'"><img  src="'. $image .'" alt="'. $alt .'" border="0" /></a>';
                }
                else if( bdayh_get_option( 'gallery_featured_image' ) == 'none' )
                {
                    echo '<img  src="'. $image .'" alt="'. $alt .'" border="0" />';
                }
                else {
                    echo '<img  src="'. $image .'" alt="'. $alt .'" border="0" />';
                }

            endif; $i++; endwhile;
        ?>
    </div><!-- zoom-gallery -->

<script type="text/javascript">
jQuery(document).ready(function () {
    jQuery(".justifiedgall_ztqoevjbhc").justifiedGallery({ rowHeight: 400, fixedHeight: false, lastRow: 'justify', margins: 8, captions : false, randomize: false });
});
</script>
<?php
}



/**
 * Formats : Soundcloud
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_sc()
{
    global $post;

    $post_type       = get_post_meta($post->ID, 'bd_post_type', true);
    $url             = get_post_meta($post->ID, 'bd_soundcloud_url', true);

    if($post_type == 'post_soundcloud'){
        echo '<div class="post-image soundcloud-box"> <script src="https://w.soundcloud.com/player/api.js" type="text/javascript"></script><iframe style="width:100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='. $url .'&amp;auto_play=false&amp;show_artwork=true"></iframe></div>'."\n";
    }
}
?>
