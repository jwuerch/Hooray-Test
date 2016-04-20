<?php
function bdayh_blog_list($paged) {

	$wpcats             = bd_get_all_category_ids();
	$custom_args        = array( 'post_status' => 'publish', 'post_type' => 'post', 'paged' => $paged, 'category__in' => $wpcats, 'cache_results' => false );
	$custom_query       = new WP_Query($custom_args);

	global $bdayh_num_post;

	$bdayh_num_post     = $custom_query->max_num_pages;
	$bdayh_cont         = 0;
	$output             = '';

	if( empty($paged) ) $paged = 1;
	if ($paged>=$bdayh_num_post) { ?><script type='text/javascript'>jQuery(document).ready(function(){ 'use strict'; jQuery('.bdayh-load-more-btn').remove(); }); </script><?php }

	if ( $custom_query->have_posts() ) {

		while ($custom_query->have_posts()) : $custom_query->the_post();

			get_template_part( 'framework/loop/classic1');

			$bdayh_cont++;

		endwhile;

		wp_reset_postdata();
	}
	elseif ( $paged==0 ) {
		get_template_part('framework/loop/not-found');
	}

	return $output;
}

function bdayh_blog_listM() {

	$paged = 1;
	if ( isset ($_POST['page_no'] ) ) $paged = $_POST['page_no'];
	echo bdayh_blog_list($paged);

	die();
}
add_action( "wp_ajax_bdayh_blog_listM", "bdayh_blog_listM" );
add_action( "wp_ajax_nopriv_bdayh_blog_listM", "bdayh_blog_listM" ); ?>