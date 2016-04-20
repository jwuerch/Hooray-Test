<?php
function bdayhBlogScroll($paged) {

    if( is_category() ) {
        $wp_cats = get_query_var('cat') ;
    }

    $wpcats = bd_get_all_category_ids();

    $custom_args        = array( 'post_status' => 'publish', 'post_type' => 'post', 'paged' => $paged, 'category__in' => $wpcats, 'cache_results' => false );
    $custom_query       = new WP_Query($custom_args);

    global $bdayh_num_post;

    $bdayh_num_post     = $custom_query->max_num_pages;
    $bdayh_cont         = 0;
    $output             = '';

    if ( $custom_query->have_posts() ) {

        while ($custom_query->have_posts()) : $custom_query->the_post();

	        get_template_part( 'content', get_post_format() );

            $bdayh_cont++;

        endwhile;

        wp_reset_postdata();
    }
    elseif ( $paged==0 ) {
        get_template_part('framework/loop/not-found');
    }

    if( empty($paged) ) $paged = 1;
    if ($paged>=$bdayh_num_post) { ?><script type='text/javascript'>jQuery(document).ready(function(){ 'use strict'; jQuery('.bdayh-load-more-btn').remove(); }); </script><?php }

    return $output;
}

function bdayhBlogScrollM() {

    $paged = 1;
    if ( isset ($_POST['page_no'] ) ) $paged = $_POST['page_no'];
    echo bdayhBlogScroll($paged);

    die();
}
add_action( "wp_ajax_bdayhBlogScrollM", "bdayhBlogScrollM" );
add_action( "wp_ajax_nopriv_bdayhBlogScrollM", "bdayhBlogScrollM" );

add_action('wp_enqueue_scripts', 'bdayhBlogScroll_mejs');
function bdayhBlogScroll_mejs() {
    wp_enqueue_script( 'mediaelement' );
    wp_enqueue_script( 'wp-mediaelement' );
    wp_enqueue_style( 'mediaelement' );
    wp_enqueue_style( 'wp-mediaelement' );
}
?>