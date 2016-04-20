<?php /* Template Name: Homepage masonry 3 column */ ?>
<?php get_header(); ?>

<?php
// Blog masonry.
global $post;

wp_enqueue_script( 'isotope' );
wp_enqueue_script( 'bd-isotope' );

if( bdayh_get_option( 'bdayhTemplateMasonryPagination' ) == 'infinite' || bdayh_get_option( 'bdayhTemplateMasonryPagination' ) == 'loadMore' ){
	include get_template_directory() . '/framework/ajax/masonry/loadMore.php';
	echo bdayhMasonryLoadmore( "3cols" );
}
else {
	include get_template_directory() . '/framework/ajax/masonry/normal.php';
	echo bdayhMasonryNormal( "3cols" );
}
?>

<?php get_footer(); ?>