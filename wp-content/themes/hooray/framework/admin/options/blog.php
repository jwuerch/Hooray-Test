<?php
$bd_options["blog_options"]["blog_template_options"][] = array(
	"name" 		=> "Blog Template options",
	"type"  	=> "subtitle"
);
$bd_options["blog_options"]["blog_template_options"][] = array(
	"name" 		=> "Blog Standard Pagination Style",
	"id" 		=> "bdayhTemplateStandardPagination",
	"type"  	=> "sellist",
	"options"   => array(
		""              => "Normal pagination",
		"infinite"     => "Infinite + Load More",
		"loadMore"     => "Load More"
	),
);

$bd_options["blog_options"]["blog_template_options"][] = array(
	"name" 		=> "Blog List Pagination Style",
	"id" 		=> "bdayhTemplateListPagination",
	"type"  	=> "sellist",
	"options"   => array(
		""              => "Normal pagination",
		"infinite"     => "Infinite + Load More",
		"loadMore"     => "Load More"
	),
);

$bd_options["blog_options"]["blog_template_options"][] = array(
	"name" 		=> "Blog Masonry Pagination Style",
	"id" 		=> "bdayhTemplateMasonryPagination",
	"type"  	=> "sellist",
	"options"   => array(
		""              => "Normal pagination",
		"infinite"     => "Infinite + Load More",
		"loadMore"     => "Load More"
	),
);

$bd_options["blog_options"]["bd_blog"][] = array
(
    "name" 		=> "Blog Options",
    "type"  	=> "subtitle"
);

$bd_options["blog_options"]["bd_blog"][] = array(
    "name" 		=> "Post Title Position",
    "id" 		=> "bdayh_post_title",
    "type"  	=> "radio",
    "options"   => array(
        "above"       => "Above Featured image",
        "below"       => "Below Featured image"
    ),
);

$bd_options["blog_options"]["bd_blog"][] = array(
    "name" 		=> "Blog Display",
    "id" 		=> "blog_display",
    "exp"		=> "will appears in all archives pages like categories and tags and search and in homepage blog style",
    "type"  	=> "radio",
    "options"   => array(
        "excerpt"       => "Excerpt + Featured image",
        "content"       => "Content"
    ),
);

$bd_options["blog_options"]["bd_ele"][] = array
(
    "name" 		=> "Blog Elements",
    "type"  	=> "subtitle"
);
$bd_options["blog_options"]["bd_ele"][] = array(
    "name" 		=> "Format Icon In Top Post",
    "exp"		=> "Check to disable the Format Icon Top Post, uncheck to enable",
    "id"    	=> "post_format_icon",
    "type"  	=> "checkbox"
); /* Format Icon Top Post */
$bd_options["blog_options"]["bd_ele"][] = array(
    "name" 		=> "Category Name In Top Post",
    "exp"		=> "Check to disable the Category Name In Top Post, uncheck to enable",
    "id"    	=> "category_top_post",
    "type"  	=> "checkbox"
); /* Format Icon Top Post */
$bd_options["blog_options"]["bd_ele"][] = array(
    "name" 		=> "Review",
    "exp"		=> "Check to enable the Review in Home page, uncheck to disable",
    "id"    	=> "home_review",
    "type"  	=> "checkbox"
);
$bd_options["blog_options"]["bd_ele"][] = array
(
    "name" 		=> "Post meta",
    "exp"		=> "Check to disable the Post meta in Home page, uncheck to enable",
    "id"    	=> "home_post_meta",
    "type"  	=> "checkbox"
);


$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images",
    "type"  	=> "subtitle"
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Posts Featured Images in Home page",
    "exp"		=> "Check to enable the Featured Images in Home page, uncheck to disable",
    "id"    	=> "home_featured_image",
    "type"  	=> "checkbox"
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Posts Featured Image In Article ",
    "exp"		=> "Check to enable the Featured Images in Article, uncheck to disable",
    "id"    	=> "post_featured_image",
    "type"  	=> "checkbox"

);

$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images",
    "id" 		=> "all_featured_image",
    "exp"		=> "Choose Featured Images open",
    "type"  	=> "radio",
    "options"   => array
    (
        "none"       => "None" ,
        "fea_lightbox"       => "Light Box" ,
        "fea_link"       => "Post Link" ,
    ),
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Gallery Featured Images",
    "id" 		=> "gallery_featured_image",
    "exp"		=> "Choose Gallery Featured Images open",
    "type"  	=> "radio",
    "options"   => array
    (
        "none"       => "None" ,
        "fea_lightbox"       => "Light Box" ,
        "fea_link"       => "Post Link" ,
    ),
);

$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images Width",
    "id"    	=> "fea_width",
    "exp"       => "Enter the Featured Images Width width ( Default 800px ) .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 10000,
    "min" 		=> 0
);
$bd_options["blog_options"]["fea_images"][] = array
(
    "name" 		=> "Featured Images Height",
    "id"    	=> "fea_height",
    "exp"       => "Enter the Featured Images Width Height ( Default 500px ) .",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 10000,
    "min" 		=> 0
);
?>