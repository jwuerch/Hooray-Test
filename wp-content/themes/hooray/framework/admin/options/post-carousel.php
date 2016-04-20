<?php
$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Post Carousel",
    "type"  	=> "subtitle"
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "id"    	=> "bd_post_carousel",
    "exp"		=> "Check the box to show Post Carousel in header",
    "type"  	=> "checkbox"
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Autoplay",
    "id"    	=> "bd_post_carousel_ap",
    "type"  	=> "checkbox"
);

/*
$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Position",
    "id" 		=> "bd_post_carousel_pos",
    "type"  	=> "radio",
    "options"   => array(
        "before"       => "Before header",
        "after"       => "After header"
    )
);
*/

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Author Name",
    "id"    	=> "bd_post_carousel_an",
    "type"  	=> "checkbox"
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Category Name",
    "id"    	=> "bd_post_carousel_cn",
    "type"  	=> "checkbox"
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Date",
    "id"    	=> "bd_post_carousel_d",
    "type"  	=> "checkbox"
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Number of posts to show",
    "id"    	=> "bd_post_carousel_np",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Post)",
    "max" 		=> 20,
    "min" 		=> 0
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Offset - number of posts to pass over",
    "id"    	=> "bd_post_carousel_offset",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Post)",
    "max" 		=> 20,
    "min" 		=> 0
);

$bd_options["post_carousel"]["post_carousel_options"][] = array(

    "name" 		=> "Posts Order",
    "id" 		=> "bd_post_carousel_posts_order",
    "type"  	=> "radio",
    "options"   => array (
        "lates"     => "Most recent",
        "random"     => "Random Posts",
        "popular"   => "Popular / Comments",
        "views"     => "Popular / Views",
        "category"  => "Category",
        "tag"       => "Tags",
        "post"      => "Selctive Posts",
        "page"      => "Selctive Pages",
    ),
    "js"		=>
        '<script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery(".r_bd_post_carousel_posts_order").change(function (){
                    if(jQuery(this).val() == "lates")
                    {
                        jQuery(".lates").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "popular")
                    {
                        jQuery(".popular").fadeIn();
                        jQuery(".views").hide();
                        jQuery(".lates").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "views")
                    {
                        jQuery(".views").fadeIn();
                        jQuery(".lates").hide();
                        jQuery(".popular").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "random")
                    {
                        jQuery(".random").fadeIn();
                        jQuery(".views").hide();
                        jQuery(".lates").hide();
                        jQuery(".popular").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_page").hide();
                    }
                    else if(jQuery(this).val() == "tag")
                    {
                        jQuery(".post_carousel_js_tag").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "post")
                    {
                        jQuery(".post_carousel_js_post").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".post_carousel_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "page")
                    {
                        jQuery(".post_carousel_js_page").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "category")
                    {
                        jQuery(".post_carousel_js_category").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".lates").hide();
                        jQuery(".post_carousel_js_tag").hide();
                        jQuery(".post_carousel_js_post").hide();
                        jQuery(".post_carousel_js_page").hide();
                        jQuery(".random").hide();
                    }
                });
            });
        </script>'
);

// latest
$bd_post_carousel_posts_order_lates = ( bdayh_get_option( 'bd_post_carousel_posts_order' ) != 'lates') ? 'hidden' : '';

// popular
$bd_post_carousel_posts_order_popular = ( bdayh_get_option( 'bd_post_carousel_posts_order' ) != 'popular') ? 'hidden' : '';

// views
$bd_post_carousel_posts_order_views = ( bdayh_get_option( 'bd_post_carousel_posts_order' ) != 'views') ? 'hidden' : '';

// random
$bd_post_carousel_posts_order_random = ( bdayh_get_option( 'bd_post_carousel_posts_order' ) != 'random') ? 'hidden' : '';

// category
$bd_post_carousel_posts_order_category = ( bdayh_get_option( 'bd_post_carousel_posts_order' ) != 'category') ? 'hidden' : '';
$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Select Category",
    "id"		=> "bd_post_carousel_posts_order_category",
    "type"  	=> "select",
    "class" 	=> $bd_post_carousel_posts_order_category ." post_carousel_js_category",
    "list"		=> "cats"
);

// tag
$bd_post_carousel_posts_order_tag = ( bdayh_get_option( 'bd_post_carousel_posts_order' ) != 'tag' ) ? 'hidden' : '';
$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Select Tag",
    "id"		=> "bd_post_carousel_posts_order_tag",
    "class" 	=> $bd_post_carousel_posts_order_tag ." post_carousel_js_tag",
    "type"  	=> "tags"
);

// post
$bd_post_carousel_posts_order_post = ( bdayh_get_option( 'bd_post_carousel_posts_order') != 'post' ) ? 'hidden' : '';
$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Added Posts ID",
    "exp"		=> "Example Post ID : 2,45,568",
    "id"		=> "bd_post_carousel_posts_order_post",
    "class" 	=> $bd_post_carousel_posts_order_post ." post_carousel_js_post",
    "type"  	=> "text"
);

// page
$bd_post_carousel_posts_order_page = ( bdayh_get_option( 'bd_post_carousel_posts_order') != 'page' ) ? 'hidden' : '';
$bd_options["post_carousel"]["post_carousel_options"][] = array(
    "name" 		=> "Added Pages ID",
    "exp"		=> "Example Page ID : 34,878,90",
    "id"		=> "bd_post_carousel_posts_order_page",
    "class" 	=> $bd_post_carousel_posts_order_page ." post_carousel_js_page",
    "type"  	=> "text"
);
?>