<?php
function bdaia_related_articles( $paged, $tag_ids ) {

    global $post, $bdayh_num_post;

    $orig_post  = $post;
    $numpost    = bdayh_get_option('article_related_numb') ? bdayh_get_option('article_related_numb') : 3;
    $bdaia_related_articles_cont = 0;

    $custom_related_args = array(
	    'post_type'             => 'post',
	    'post_status'           => 'publish',
        'tag__in'               => $tag_ids,
        //'post__not_in'          => array($post->ID),
        'posts_per_page'        => $numpost,
        'paged'                 => $paged,
        'ignore_sticky_posts'   => true,
        'no_found_rows'         => true,
        'cache_results'         => false
    );

    $custom_related_query = new wp_query( $custom_related_args );
    $bdayh_num_post       = $custom_related_query->max_num_pages;

    if ( $custom_related_query->have_posts() ) {

        while ( $custom_related_query->have_posts() ) : $custom_related_query->the_post();

            get_template_part( 'framework/loop/latest' );

            $bdaia_related_articles_cont++;

        endwhile;
    }
    $post = $orig_post;
    wp_reset_query();

    if ( $bdaia_related_articles_cont<$numpost ) { ?><script type='text/javascript'>jQuery(document).ready(function(){ 'use strict'; jQuery('#content-more-ralated .bdayh-load-more-btn').remove(); }); </script><?php }
}

function bdaia_related_articles_fun() {

    $paged   = 1;
    $tag_ids = "";

    if ( isset ($_POST['page_no'] ) ) $paged = $_POST['page_no'];
    if ( isset ($_POST['tag_id'] ) ) $tag_ids = $_POST['tag_id'];

    echo bdaia_related_articles( $paged, $tag_ids );

    die();
}
add_action( "wp_ajax_bdaia_related_articles_fun", "bdaia_related_articles_fun" );
add_action( "wp_ajax_nopriv_bdaia_related_articles_fun", "bdaia_related_articles_fun" );

function bdaia_related_author( $paged, $user_id ) {

	wp_reset_query();
    global $post, $bdayh_num_post;

    $orig_post  = $post;
    $numpost    = bdayh_get_option('article_related_numb') ? bdayh_get_option('article_related_numb') : 3;
    $bdaia_related_author_cont = 0;

    $custom_related_author_args = array(
	    'post_type'             => 'post',
	    'post_status'           => 'publish',
        'author'                => $user_id,
        //'post__not_in'          => array($post->ID),
        'posts_per_page'        => $numpost,
        'paged'                 => $paged,
	    'ignore_sticky_posts'   => true,
        'no_found_rows'         => true,
	    'caller_get_posts'      => 1,
        'cache_results'         => false
    );

    $custom_related_author_query    = new wp_query( $custom_related_author_args );
    $bdayh_num_post                 = $custom_related_author_query->max_num_pages;

    if ( $custom_related_author_query->have_posts() ) {

        while ($custom_related_author_query->have_posts()) : $custom_related_author_query->the_post();

            get_template_part( 'framework/loop/latest' );

            $bdaia_related_author_cont++;

        endwhile;
    }

    $post = $orig_post;
    wp_reset_query();

    if ( $bdaia_related_author_cont<$numpost ) { ?><script type='text/javascript'>jQuery(document).ready(function(){ 'use strict'; jQuery('#content-more-author .bdayh-load-more-btn').remove(); }); </script><?php }
}

function bdaia_related_author_fun() {

    $paged      = 1;
    $user_id    = '';

    if ( isset ($_POST['page_no'] ) ) $paged = $_POST['page_no'];
    if ( isset ($_POST['user_id'] ) ) $user_id = $_POST['user_id'];
    echo bdaia_related_author($paged, $user_id);

    die();
}
add_action( "wp_ajax_bdaia_related_author_fun", "bdaia_related_author_fun" );
add_action( "wp_ajax_nopriv_bdaia_related_author_fun", "bdaia_related_author_fun" );

function bdaia_related_cat( $paged, $cat_id ) {

    global $post, $bdayh_num_post;

    $orig_post  = $post;
    $numpost    = bdayh_get_option('article_related_numb') ? bdayh_get_option('article_related_numb') : 3;
    $bdaia_related_cat_cont = 0;

    $custom_related_cat_args = array(
	    'post_type'             => 'post',
	    'post_status'           => 'publish',
        'category__in'          => $cat_id,
        //'post__not_in'          => array($post->ID),
        'posts_per_page'        => $numpost,
        'paged'                 => $paged,
        'ignore_sticky_posts'   => true,
        'no_found_rows'         => true,
        'cache_results'         => false
    );

    $custom_related_cat_query  = new wp_query( $custom_related_cat_args );
    $bdayh_num_post            = $custom_related_cat_query->max_num_pages;

    if ( $custom_related_cat_query->have_posts() ) {

        while ($custom_related_cat_query->have_posts()) : $custom_related_cat_query->the_post();

            get_template_part( 'framework/loop/latest' );

            $bdaia_related_cat_cont++;

        endwhile;
    }

    $post = $orig_post;
    wp_reset_query();

    if ( $bdaia_related_cat_cont<$numpost ) { ?><script type='text/javascript'>jQuery(document).ready(function(){ 'use strict'; jQuery('#content-more-cat .bdayh-load-more-btn').remove(); }); </script><?php }
}

function bdaia_related_cat_fun() {

    $paged      = 1;
    $cat_id     = "";

    if ( isset ($_POST['page_no'] ) ) $paged = $_POST['page_no'];
    if ( isset ($_POST['cat_id'] ) ) $cat_id = $_POST['cat_id'];
    echo bdaia_related_cat( $paged, $cat_id );

    die();
}
add_action( "wp_ajax_bdaia_related_cat_fun", "bdaia_related_cat_fun" );
add_action( "wp_ajax_nopriv_bdaia_related_cat_fun", "bdaia_related_cat_fun" );