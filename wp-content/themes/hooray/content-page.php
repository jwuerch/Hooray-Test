<?php
/**
 * Page.
 * ----------------------------------------------------------------------------- *
 */
global $post, $wp_query, $bd_data;

$bdCurrentID = get_the_ID();
$post_type = get_post_meta($bdCurrentID, 'bd_post_type', true);

// Rating
$bd_criteria_display = get_post_meta($bdCurrentID, 'bd_criteria_display', true);

// Title Position.
$title_position = "";
$bdayh_post_title = bdayh_get_option('bdayh_post_title');

if( $bdayh_post_title == 'above' ) { $title_position = " title-position-above"; }
elseif ($bdayh_post_title == 'below') { $title_position = " title-position-below"; }
?>

<article class="isotope-item post-item post-id<?php echo $title_position; ?>">

    <?php
    // Post Top Des
    get_template_part( 'framework/loop/post-topdes' ); ?>

    <div class="bdayh-post-Featured">

        <?php if( $bdayh_post_title == 'above' ){ ?>
            <?php get_template_part( 'framework/global/post-title' ); ?>
            <?php get_template_part( 'framework/global/post-meta' ); ?>
        <?php } ?>
        <div class="clear"></div>

        <?php
        // Page Feat
        global $post;
        $id             = get_post_meta($post->ID, 'bd_video_url', true);
        $embed          = get_post_meta($post->ID, 'bd_embed_code', true);

        if($post_type == 'post_image'){
            bd_home_img();
        }
        elseif($post_type == 'post_slider') {
            bd_wp_gallery();
        }
        elseif($post_type == 'post_grid_gallery') {
            bd_wp_gallery_grid();
        }
        elseif($post_type == 'post_googlemap'){
            $src            = get_post_meta(get_the_ID(), 'bd_google_maps_url', true);
            $width          = 800;
            $height         = 330;
            echo '<div class="post-image google-box"><iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed"></iframe></div>';
        }
        elseif($post_type == 'post_video'){
            if($id || $embed)
                bd_wp_video( '800', '350' );
        }
        elseif($post_type == 'post_soundcloud'){

            bd_home_img();

            if($url)
                bd_wp_sc();
        }
        ?>
        <div class="clear"></div>

        <?php if( $bdayh_post_title == 'below' ){ ?>
            <?php get_template_part( 'framework/global/post-title' ); ?>
            <?php get_template_part( 'framework/global/post-meta' ); ?>
        <?php } ?>

    </div><!-- .bdayh-post-Featured /-->


    <?php
    // No Contnet
    if($post->post_content=="")
        $no_content = " no-content";
    else
        $no_content = "";
    ?>

    <div class="entry entry-content<?php echo $no_content; ?>">

        <?php
        // Above Ad.
        echo bd_post_above_ads();

        // The Content.
        the_content( __( 'Read more', LANG) );

        // Post Links.
        $defaults = array(
            'before' => '<div class="clear"></div><div class="main-pagination post-pagination">',
            'after' => '</div><div class="clear"></div>',
            'link_before' => '<span>',
            'link_after' => '</span>',
            'next_or_number'   => 'next',
            'separator'        => ' ',
            'nextpagelink'     => '<i class="fa fa-chevron-right"></i>',
            'previouspagelink' => '<i class="fa fa-chevron-left"></i>',
            'pagelink'         => '%',
        );
        wp_link_pages( $defaults ); ?>

        <?php
            // Bellow Ad.
            echo bd_post_below_ads(); ?>

        <?php
        // Page Sharing.
        $social_sharing = '<div class="home-post-share">'.bd_load_template_part('framework/global/social-sharing').'</div>';
        if( bdayh_get_option( 'bdayh_page_social_sharing' ) ) echo $social_sharing;
        ?>

    </div><!-- .entry-content /-->

</article><!-- .post /-->