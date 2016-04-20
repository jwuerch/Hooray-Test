<?php get_header(); ?>
<?php
// Blog Standard.
if( bdayh_get_option( 'bdayhTemplateStandardPagination' ) == 'infinite' || bdayh_get_option( 'bdayhTemplateStandardPagination' ) == 'loadMore' ){
	include get_template_directory() . '/framework/ajax/standard/loadMore.php';
}
else {
	include get_template_directory() . '/framework/ajax/standard/normal.php';
}
?>
<?php get_footer(); ?>