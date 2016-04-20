<?php
/**
 * Custom typography
 * ----------------------------------------------------------------------------- *
 */
if(file_exists(get_template_directory().'/framework/admin/framework-gfonts.php')) {
    require_once (get_template_directory().'/framework/admin/framework-gfonts.php');
}


/**
 * Enqueue Google fonts
 * ----------------------------------------------------------------------------- *
 */
function bd_enqueue_font( $got_font )
{
    if ( $got_font )
    {
        $char_set = '';
        if( bdayh_get_option( 'wp_typography_latin_extended' ) || bdayh_get_option( 'wp_typography_cyrillic' ) || bdayh_get_option( 'wp_typography_cyrillic_extended' ) || bdayh_get_option( 'wp_typography_greek' ) || bdayh_get_option( 'wp_typography_greek_extended' ) || bdayh_get_option( 'wp_typography_vietnamese' ) || bdayh_get_option( 'wp_typography_khmer' ) ){
            $char_set = '&subset=latin';
            if( bdayh_get_option( 'wp_typography_latin_extended' ) )
                $char_set .= ',latin-ext';

            if( bdayh_get_option( 'wp_typography_cyrillic' ) )
                $char_set .= ',cyrillic';

            if( bdayh_get_option( 'wp_typography_cyrillic_extended' ) )
                $char_set .= ',cyrillic-ext';

            if( bdayh_get_option( 'wp_typography_greek' ) )
                $char_set .= ',greek';

            if( bdayh_get_option( 'wp_typography_greek_extended' ) )
                $char_set .= ',greek-ext';

            if( bdayh_get_option( 'wp_typography_khmer' ) )
                $char_set .= ',khmer';

            if( bdayh_get_option( 'wp_typography_vietnamese' ) )
                $char_set .= ',vietnamese';
        }

        $font_pieces = explode(":", $got_font);
        $font_name = $font_pieces[0];
        $font_type = $font_pieces[1];

        if( $font_type == 'non-google' ){}

        elseif( $font_type == 'early-google' ){
            $font_name = str_replace (" ","", $font_pieces[0] );
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/earlyaccess/'.$font_name);
        }

        else {
            $font_name = str_replace (" ","+", $font_pieces[0] );
            $font_variants = str_replace ("|",",", $font_pieces[1] );
            $protocol = is_ssl() ? 'https' : 'http';
            wp_enqueue_style( $font_name , $protocol.'://fonts.googleapis.com/css?family='.$font_name . ':' . $font_variants.$char_set );
        }
    }
}

function bd_get_font( $got_font )
{
    if($got_font){
        $font_pieces = explode(":", $got_font);
        $font_name = $font_pieces[0];
        $font_name = str_replace('&quot;' , '"' , $font_pieces[0] );
        if (strpos($font_name, ',') !== false)
            return $font_name;
        else
            return "'".$font_name."'";
    }
}


$google_font_array  = json_decode ($google_api_output,true) ;
$options_fonts      = array();
$options_fonts['']  = __( 'Default Font', 'bd' );
foreach ($google_font_array as $item)
{
    $variants='';
    $variantCount=0;
    foreach ($item['variants'] as $variant) {
        $variantCount++;
        if ($variantCount>1) { $variants .= '|'; }
        $variants .= $variant;
    }
    $variantText = ' (' . $variantCount .' '. __( 'Variants', LANG ) . ')';
    if ($variantCount <= 1) $variantText = '';
    $options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
}

function bd_typography()
{
    global $custom_typography;
    foreach( $custom_typography as $selector => $input){
        $option = bdayh_get_option( $input );
        if( !empty($option['font']))
            bd_enqueue_font( $option['font'] ) ;
    }
    bd_enqueue_font( '' ) ;
}
add_action('wp_enqueue_scripts', 'bd_typography');

$custom_typography = array(

    "
    body" => "general_bd",

    "
    .blog-v1 article h2.entry-title,
    article.format-quote .entry-title" => "bdaia_blog_standard_post_title",

    "
    .blog-masonry article h2.entry-title,
    .blog-v1 .blog-masonry article.format-quote h1.entry-title" => "bdaia_blog_masonry_post_title",

    "
    .blog-v1 article.classic1-item h2.entry-title,
    .blog-v1 article.classic1-item.format-quote h1.entry-title,
    article.classic1-item .arti-title" => "bdaia_blog_classic_post_title",

    "
    body.single .blog-v1 article .entry-title,
    body.single .format-standard .entry-title,
    body.single .format-audio .entry-title,
    body.single .format-video .entry-title,
    body.single .format-gallery .entry-title,
    body.page .blog-v1 article h1.entry-title,
    body.page .format-standard h1.entry-title,
    body.page .format-audio h1.entry-title,
    body.page .format-video h1.entry-title,
    body.page .format-gallery h1.entry-title" => "post_title_bd",

    "
    article .entry-content" => "post_content_bd",

    ".single article.post .entry h1, .page article.page .entry h1" => "post_h1_bd",
    ".single article.post .entry h2, .page article.page .entry h2" => "post_h2_bd",
    ".single article.post .entry h3, .page article.page .entry h3" => "post_h3_bd",
    ".single article.post .entry h4, .page article.page .entry h4" => "post_h4_bd",
    ".single article.post .entry h5, .page article.page .entry h5" => "post_h5_bd",
    ".single article.post .entry h6, .page article.page .entry h6" => "post_h6_bd",

    "
    blockquote,
    blockquote p
    "
    => "post_blockquote_bd",

    "
    .bdayh-insta-title,
    .comment-header h3,
    .box-title h3 b,
	.widget .widget-title h2 b,
    ul.tabs_nav li a,
    .bd-sidebar .widget-title h4,
    .bd-sidebar .widget .widget-title h2,
    .widget-footer-title h3,
    .post-sharing-box .title,
    .box-title h2,
    #reply-title,
    ul.tabs_nav li a,
    .box-title h3,
    .widget .widget-title h2
    "
    => "widgets_title_bd",

    "
    .top-menu-area
    "
    => "top_menu_bd",

    "
    .nav-menu,
    .primary-menu ul ul li, .nav-menu .entry-title
    "
    => "primary_menu_bd",

    "
    .bd-post-carousel-item article .bd-meta-info-align h3,
    ul.bd-post-carousel article h3 span
    "
    => "bdayh_post_carousel",

    "
    .slider-flex ul.slides li .slide-caption h3
    "
    => "bdayh_featured_slider",

	".logo .site-name"
	=> "logo_typography"

);
?>