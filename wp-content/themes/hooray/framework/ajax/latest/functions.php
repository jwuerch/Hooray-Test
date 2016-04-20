<?php
function bdaia_latest($paged) {

    wp_reset_query();
    global $post;

    $numpost    = bdayh_get_option( 'bdaia_latest_news_num' );
    $bdayh_cont = 0;

    $wpcats = bd_get_all_category_ids();

    $custom_args        = array(
        'post_status'   => 'publish',
        'post_type'     => 'post',
        'posts_per_page'=> $numpost,
        'paged'         => $paged,
        'category__in'  => $wpcats,
        'cache_results' => false
    );
    $custom_query       = new WP_Query($custom_args);

    global $bdayh_num_post;

    $bdayh_num_post     = $custom_query->max_num_pages;
    $output             = '';

    if ( $custom_query->have_posts() ) {

        while ($custom_query->have_posts()) : $custom_query->the_post();

            get_template_part( 'framework/loop/latest' );

            $bdayh_cont++;

        endwhile;

        wp_reset_query();
    }
    elseif ( $paged==0 ) {
        get_template_part('framework/loop/not-found');
    }

    if ($bdayh_cont<$numpost) { ?><script type='text/javascript'>jQuery(document).ready(function(){ 'use strict'; jQuery('.bdayh-load-more-btn').remove(); }); </script><?php }

    return $output;
}

function bdaia_latestM() {

    $paged = 1;
    if ( isset ($_POST['page_no'] ) ) $paged = $_POST['page_no'];
    echo bdaia_latest($paged);

    die();
}
add_action( "wp_ajax_bdaia_latestM", "bdaia_latestM" );
add_action( "wp_ajax_nopriv_bdaia_latestM", "bdaia_latestM" );
?>