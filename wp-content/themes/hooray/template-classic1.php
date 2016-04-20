<?php /* Template Name: Blog Classic Small 1 */ ?>
<?php get_header(); ?>

<?php
// Blog List.
if( bdayh_get_option( 'bdayhTemplateListPagination' ) == 'infinite' || bdayh_get_option( 'bdayhTemplateListPagination' ) == 'loadMore' ){
	include get_template_directory() . '/framework/ajax/classic/loadMore.php';
}
else {
	include get_template_directory() . '/framework/ajax/classic/normal.php';
}
?>


<?php get_footer(); ?>