<?php
/**
 * Slider Options
 * ----------------------------------------------------------------------------- *
 */
$bd_options["slider_options"]["bd_sliders_options"][] = array(
    "name" 		=> "Slider Options",
    "type"  	=> "subtitle"
);

$bd_options["slider_options"]["bd_sliders_options"][] = array(
    "name" 		=> "Slider",
    "id"    	=> "slider_show",
    "exp"    	=> "Check to enable the Slider, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["slider_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider excerpt",
    "id"    	=> "slider_excerpt_show",
    "exp"    	=> "Check to enable the Slider excerpt, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["slider_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Speed",
    "id"    	=> "slider_speed",
    "exp"    	=> "Select the Slider speed, 1000 = 1 second.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(second)",
    "max" 		=> 50000,
    "min" 		=> 0
);

$bd_options["slider_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Animation Speed",
    "id"    	=> "slider_animation",
    "exp"    	=> "Select the animation speed, 1000 = 1 second.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(second)",
    "max" 		=> 5000,
    "min" 		=> 0
);

$bd_options["slider_options"]["bd_sliders_options"][] = array(
    "name" 		=> "Number of posts to show",
    "id"    	=> "slider_bumber",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in posts)",
    "max" 		=> 20,
    "min" 		=> 5
);

$bd_options["slider_options"]["bd_sliders_options"][] = array(
    "name" 		=> "Offset - number of posts to pass over",
    "id"    	=> "bd_main_slider_offset",
    "type"  	=> "ui_slider",
    "unit" 		=> "(Post)",
    "max" 		=> 20,
    "min" 		=> 0
);

$bd_options["slider_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Posts Order",
    "id" 		=> "slider_display",
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
        '
        <script type="text/javascript">
            jQuery(document).ready(function()
            {
                jQuery(".r_slider_display").change(function ()
                {
                    if(jQuery(this).val() == "lates")
                    {
                        jQuery(".lates").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".main_slider_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "popular")
                    {
                        jQuery(".popular").fadeIn();
                        jQuery(".views").hide();
                        jQuery(".lates").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".main_slider_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "views")
                    {
                        jQuery(".views").fadeIn();
                        jQuery(".lates").hide();
                        jQuery(".popular").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".main_slider_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "random")
                    {
                        jQuery(".random").fadeIn();
                        jQuery(".views").hide();
                        jQuery(".lates").hide();
                        jQuery(".popular").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".main_slider_js_page").hide();
                    }
                    else if(jQuery(this).val() == "tag")
                    {
                        jQuery(".get_slider_tags").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".main_slider_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "post")
                    {
                        jQuery(".main_slider_js_post").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".main_slider_js_page").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "page")
                    {
                        jQuery(".main_slider_js_page").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".get_slider_category").hide();
                        jQuery(".lates").hide();
                        jQuery(".random").hide();
                    }
                    else if(jQuery(this).val() == "category")
                    {
                        jQuery(".get_slider_category").fadeIn();
                        jQuery(".popular").hide();
                        jQuery(".views").hide();
                        jQuery(".lates").hide();
                        jQuery(".get_slider_tags").hide();
                        jQuery(".main_slider_js_post").hide();
                        jQuery(".main_slider_js_page").hide();
                        jQuery(".random").hide();
                    }
                });
            });
        </script>
        '
);

$slider_display_lates = (bdayh_get_option('slider_display') != 'lates') ? 'hidden' : '';

// popular
$bd_main_slider_posts_order_popular = ( bdayh_get_option( 'slider_display' ) != 'popular') ? 'hidden' : '';

// views
$bd_main_slider_posts_order_views = ( bdayh_get_option( 'slider_display' ) != 'views') ? 'hidden' : '';

// random
$bd_main_slider_posts_order_random = ( bdayh_get_option( 'slider_display' ) != 'random') ? 'hidden' : '';

$slider_display_category = (bdayh_get_option('slider_display') != 'category') ? 'hidden' : '';
$bd_options["slider_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Category",
    "id"		=> "slider_category",
    "type"  	=> "select",
    "class" 	=> $slider_display_category . " get_slider_category",
    "list"		=> "cats"
);
$slider_display_tags = (bdayh_get_option('slider_display') != 'tag') ? 'hidden' : '';
$bd_options["slider_options"]["bd_sliders_options"][] = array
(
    "name" 		=> "Slider Tags",
    "id"		=> "slider_tag",
    "class" 	=> $slider_display_tags . " get_slider_tags",
    "type"  	=> "tags"
);

// post
$bd_main_slider_posts_order_post = ( bdayh_get_option( 'slider_display') != 'post' ) ? 'hidden' : '';
$bd_options["slider_options"]["bd_sliders_options"][] = array(
    "name" 		=> "Added Posts ID",
    "exp"		=> "Example Post ID : 2,45,568",
    "id"		=> "bd_main_slider_posts_order_post",
    "class" 	=> $bd_main_slider_posts_order_post ." main_slider_js_post",
    "type"  	=> "text"
);

// page
$bd_main_slider_posts_order_page = ( bdayh_get_option( 'slider_display') != 'page' ) ? 'hidden' : '';
$bd_options["slider_options"]["bd_sliders_options"][] = array(
    "name" 		=> "Added Pages ID",
    "exp"		=> "Example Page ID : 34,878,90",
    "id"		=> "bd_main_slider_posts_order_page",
    "class" 	=> $bd_main_slider_posts_order_page ." main_slider_js_page",
    "type"  	=> "text"
);
?>