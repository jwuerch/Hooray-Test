<?php /* Template Name: Homepage masonry 2 column */ ?>
<?php get_header(); ?>

<?php
// Blog masonry.
global $post;

wp_enqueue_script( 'isotope' );
wp_enqueue_script( 'bd-isotope' );

if( bdayh_get_option( 'bdayhTemplateMasonryPagination' ) == 'infinite' || bdayh_get_option( 'bdayhTemplateMasonryPagination' ) == 'loadMore' ){
	include get_template_directory() . '/framework/ajax/masonry/loadMore.php';
	echo bdayhMasonryLoadmore( "2cols" );
}
else {
	include get_template_directory() . '/framework/ajax/masonry/normal.php';
	echo bdayhMasonryNormal( "2cols" );
}
?>

<?php get_footer(); ?>