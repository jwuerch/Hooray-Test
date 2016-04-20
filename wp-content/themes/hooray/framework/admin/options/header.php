<?php
/**
 * Logo options
 * ----------------------------------------------------------------------------- *
 */
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Logo options",
    "type"  	=> "subtitle"
);

// What kind of logo?
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "What kind of logo?",
    "exp"       => "Select whether you want your main logo to be an image or text. If you select 'image' you can put in the image url in the next option, and if you select 'text' your Site Title will be shown instead.",
    "id" 		=> "logo_displays",
    "type"  	=> "radio",
    "options"   => array(
        "logo_title"       => "Display Site Title" ,
        "logo_image"       => "Custom Image" ,
    )
);

// Logo Center
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Logo Center",
    "id"    	=> "logo_center",
    "type"  	=> "checkbox"
);

// Logo upload
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Upload Logo",
    "id"    	=> "logo_upload",
    "exp"		=> "Recommended size (MAX) : 190px x 60px",
    "type"  	=> "upload"
);

// Logo (Retina Version @2x)
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Logo (Retina Version @2x)",
    "id"    	=> "logo_retina",
    "exp"		=> "Please choose an image file for the retina version of the logo. It should be 2x the size of main logo.",
    "type"  	=> "upload"
);

// Standard Logo Width for Retina Logo
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Standard Logo Width for Retina Logo",
    "id"    	=> "retina_logo_width",
    "exp"       =>  "If retina logo is uploaded, please enter the standard logo (1x) version width, do not enter the retina logo width.",
    "type"  	=> "ui_slider",
    "unit" 		=> "(pixels)",
    "max" 		=> 1000,
    "min" 		=> 0
);

// logo Top Margin
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "logo Top Margin",
    "id"    	=> "margin_logo_top",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0
);

// logo Right Margin
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "logo Right Margin",
    "id"    	=> "margin_logo_right",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0
);

// logo Bottom Margin
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "logo Bottom Margin",
    "id"    	=> "margin_logo_bottom",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0
);

// logo Left Margin
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "logo Left Margin",
    "id"    	=> "margin_logo_left",
    "type"  	=> "ui_slider",
    "unit" 		=> "(in pixels)",
    "max" 		=> 300,
    "min" 		=> 0
);

// Logo Typography
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Logo Typography",
    "exp"       => 'Choose your prefered font for menu. Note: fonts marked with * symbol will be loaded from the <a href="http://www.google.com/webfonts">Google Web Fonts</a> library.',
    "id"    	=> "logo_typography",
    "type"  	=> "tybo"
);

// Display logo tagline?
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Display logo tagline?",
    "id"    	=> "logo_tagline",
    "type"  	=> "checkbox"

);

// Tagline Text color
$bd_options["header_options"]["logo_options"][] = array(

    "name" 		=> "Tagline Text color",
    "id"    	=> "tagline_color",
    "type"  	=> "color"
);

/**
 * Main Nav options
 * ----------------------------------------------------------------------------- *
 */
$bd_options["header_options"]["main_nav_options"][] = array(
    "name" 		=> "Main Nav options",
    "type"  	=> "subtitle"
);

$bd_options["header_options"]["main_nav_options"][] = array(
    "name" 		=> "Menu Search Overlay",
    "id"    	=> "bdayh_main_menu_search",
    "type"  	=> "checkbox"
);

$bd_options["header_options"]["main_nav_options"][] = array(
    "name" 		=> "Sticky The Navigation menu",
    "id"    	=> "header_fix",
    "type"  	=> "checkbox"
);

$bd_options["header_options"]["main_nav_options"][] = array(
    "name" 		=> "Logo in the sticky Navigation menu",
    "id"    	=> "nav_logo",
    "exp"		=> "Recommended size (MAX) : 136px x 27px",
    "type"  	=> "upload"
);

$bd_options["header_options"]["mobile"][] = array(
    "name" 		=> "Mobile Menu options",
    "type"  	=> "subtitle"
);
$bd_options["header_options"]["mobile"][] = array(
    "name" 		=> "Enable the Mobile Menu",
    "id"    	=> "mobile_menu",
    "type"  	=> "checkbox"
);
$bd_options["header_options"]["mobile"][] = array(
    "name" 		=> "Top menu",
    "id"    	=> "mobile_topmenu",
    "type"  	=> "checkbox"
);
$bd_options["header_options"]["mobile"][] = array(
    "name" 		=> "Search",
    "id"    	=> "mobile_search",
    "type"  	=> "checkbox"
);
$bd_options["header_options"]["mobile"][] = array(
    "name" 		=> "Social links",
    "id"    	=> "mobile_social",
    "type"  	=> "checkbox"
);

$bd_options["header_options"]["bd_topbar_options"][] = array
(
    "name" 		=> "Topbar Options",
    "type"  	=> "subtitle"
);
$bd_options["header_options"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Top bar ?",
    "id"    	=> "show_top_bar",
    "exp"		=> "Check to enable the Top bar, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> ""
);
$bd_options["header_options"]["bd_topbar_options"][] = array
(
    "name" 		=> "Disable Top Bar In mobile and tablet",
    "id"    	=> "topBarMobile",
    "type"  	=> "checkbox",
);

$bd_options["header_options"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Search ?",
    "id"    	=> "show_top_search_right",
    "exp"		=> "Check to enable the Search, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> "",
);

$bd_options["header_options"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Top Menu ?",
    "id"    	=> "show_top_menu_right",
    "exp"		=> "Check to enable the Top Menu, uncheck to disable",
    "type"  	=> "checkbox",
    "class"  	=> "",
);
$bd_options["header_options"]["bd_topbar_options"][] = array
(
    "name" 		=> "Show Social Links ?",
    "id"    	=> "show_top_social_right",
    "exp"		=> "Check to enable the Social Links, uncheck to disable",
    "type"  	=> "checkbox",

);

/**
 * Favicon Icons
 * ----------------------------------------------------------------------------- *
 */
$bd_options["header_options"]["bd_favicon"][] = array(

    "name" 		=> "Favicon Icons",
    "type"  	=> "subtitle"
);

// Custom Favicon
$bd_options["header_options"]["bd_favicon"][] = array(

    "name" 		=> "Custom Favicon",
    "id"    	=> "favicon",
    "exp"		=> "You can put url of an ico image that will represent your website favicon (16px x 16px)",
    "type"  	=> "upload"
);

// Apple iPhone Icon Upload
$bd_options["header_options"]["bd_favicon"][] = array(

    "name" 		=> "Apple iPhone Icon Upload",
    "id"    	=> "iphoneIconUpload",
    "exp"		=> "Icon for Apple iPhone (57px x 57px)",
    "type"  	=> "upload"
);

// Apple iPhone Retina Icon Upload
$bd_options["header_options"]["bd_favicon"][] = array(

    "name" 		=> "Apple iPhone Retina Icon Upload",
    "id"    	=> "iphoneIconRetinaUpload",
    "exp"		=> "Icon for Apple iPhone Retina Version (114px x 114px)",
    "type"  	=> "upload"
);

// Apple iPad Icon Upload
$bd_options["header_options"]["bd_favicon"][] = array(

    "name" 		=> "Apple iPad Icon Upload",
    "id"    	=> "ipadIconUpload",
    "exp"		=> "Icon for Apple iPhone (72px x 72px)",
    "type"  	=> "upload"
);

// Apple iPad Retina Icon Upload
$bd_options["header_options"]["bd_favicon"][] = array(

    "name" 		=> "Apple iPad Retina Icon Upload",
    "id"    	=> "ipadIconRetinaUpload",
    "exp"		=> "Icon for Apple iPad Retina Version (144px x 144px)",
    "type"  	=> "upload"
);

?>