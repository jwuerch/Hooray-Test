<?php
## Posts Options
$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Posts Options",
    "type"  	=> "subtitle"
);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Post Author Box",
    "id"    	=> "post_author_box",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Next/Prev Articles",
    "id"    	=> "post_pagination",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Tags",
    "id"    	=> "post_tags",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Comments",
    "id"    	=> "post_comments_box",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "fb Comments",
    "id"    	=> "post_fb_comments_box",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["bd_posts_options"][] = array(

    "name" 		=> "Comment Validation",
    "id"    	=> "post_comments_valid",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Posts Slideshow Images",
    "id"    	=> "posts_slideshow_number",
    "exp"		=> "Number of images in posts slideshow ( Featured Image 1, 2, 3 ... etc ).",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Featured Image)",
    "max" 		=> 100,
    "min" 		=> 0
);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "OG Meta",
    "id"    	=> "post_og_meta",
    "type"  	=> "checkbox"
);

$bd_options["posts_options"]["bd_posts_options"][] = array(
    "name" 		=> "Reading Position Indicator",
    "id"    	=> "post_reading_position_indicator",
    "type"  	=> "checkbox"
);

## Post Meta options
$bd_options["posts_options"]["post_meta"][] = array(
    "name" 		=> "Post Meta options",
    "type"  	=> "subtitle"
);

$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Post Meta",
    "id"    	=> "post_meta",
    "type"  	=> "checkbox",

);
$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Author Meta",
    "id"    	=> "post_meta_author",
    "type"  	=> "checkbox",

);
$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Categories Meta",
    "id"    	=> "post_meta_cats",
    "type"  	=> "checkbox",

);
$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Date Meta",
    "id"    	=> "post_meta_date",
    "type"  	=> "checkbox",

);

$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Post Reading Time",
    "id"    	=> "post_meta_timeread",
    "type"  	=> "checkbox",
);

$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Post Reading Time : Words per minute",
    "id"    	=> "words_per_minute",
    "type"  	=> "text",
);

$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Comments Meta",
    "id"    	=> "post_meta_comments",
    "type"  	=> "checkbox",

);
$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Views Meta",
    "id"    	=> "post_meta_views",
    "type"  	=> "checkbox",

);
$bd_options["posts_options"]["post_meta"][] = array
(
    "name" 		=> "Like Meta",
    "id"    	=> "post_heart_like",
    "type"  	=> "checkbox",

);

## Related Posts
$bd_options["posts_options"]["related_posts"][] = array(
	"name" 		=> "Related Box",
	"type"  	=> "subtitle"
);

$bd_options["posts_options"]["related_posts"][] = array(
	"name" 		=> "Related Articles",
	"id"    	=> "bdaia_related",
	"type"  	=> "checkbox"
);

$bd_options["posts_options"]["related_posts"][] = array(
	"name" 		=> "More By Author",
	"id"    	=> "bdaia_related_author",
	"type"  	=> "checkbox"
);

$bd_options["posts_options"]["related_posts"][] = array(
	"name" 		=> "More In Category",
	"id"    	=> "bdaia_related_cat",
	"type"  	=> "checkbox"
);

$bd_options["posts_options"]["related_posts"][] = array(

	"name" 		=> "Number Of related Posts",
	"id"    	=> "article_related_numb",
	"exp"		=> "Number Of related Posts .",
	"type"  	=> "ui_slider",
	"unit" 		=> "(post)",
	"max" 		=> 100,
	"min" 		=> 0
);

## Check Also
$bd_options["posts_options"]["check_slso"][] = array(
    "name" 		=> "Fly Check Also Box",
    "type"  	=> "subtitle"
);

$bd_options["posts_options"]["check_slso"][] = array(
    "name"    	=> "Check Also Box",
    "id"    	=> "check_also",
    "type"  	=> "checkbox"
);

$bd_options["posts_options"]["check_slso"][] = array(
    "name" 		=> "Check Also Box Position",
    "id" 		=> "check_also_position",
    "type"  	=> "radio",
    "options"   => array
    (
        "left"        => "Left",
        "right"           => "Right"
    ),
);

$bd_options["posts_options"]["check_slso"][] = array(
    "name" 		=> "Query Type",
    "id" 		=> "check_also_query",
    "type"  	=> "radio",
    "options"   => array
    (
        "categories"        => "Posts in the same Categories",
        "tags"           => "Posts in the same Tags",
        "author"           => "Posts by the same Author",
    ),
);
?>