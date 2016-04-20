<?php
/*-----------------------------------------------------------------------------------*/
// Character sets
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Character sets",
    "class" => "fadeToggle",
    "type"  	=> "subtitle"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Latin Extended",
    "id"    	=> "wp_typography_latin_extended",
    "class"     => "fadeToggle",
    "exp"		=> "Check to enable the Latin Extended, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Cyrillic",
    "id"    	=> "wp_typography_cyrillic",
    "class" => "fadeToggle",
    "exp"		=> "Check to enable the Cyrillic, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Cyrillic Extended",
    "id"    	=> "wp_typography_cyrillic_extended",
    "class" => "fadeToggle",
    "exp"		=> "Check to enable the Cyrillic Extended, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Greek",
    "id"    	=> "wp_typography_greek",
    "class" => "fadeToggle",
    "exp"		=> "Check to enable the Greek, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Greek Extended",
    "id"    	=> "wp_typography_greek_extended",
    "class" => "fadeToggle",
    "exp"		=> "Check to enable the Greek Extended, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Khmer",
    "id"    	=> "wp_typography_khmer",
    "class" => "fadeToggle",
    "exp"		=> "Check to enable the Khmer, uncheck to disable",
    "type"  	=> "checkbox"
);

$bd_options["typography"]["bd_character_sets"][] = array(

    "name" 		=> "Vietnamese",
    "id"    	=> "wp_typography_vietnamese",
    "class" => "fadeToggle",
    "exp"		=> "Check to enable the Vietnamese, uncheck to disable",
    "type"  	=> "checkbox"
);
/*-----------------------------------------------------------------------------------*/
// General typography
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["tybo_general"][] = array(

    "name" => "General",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["tybo_general"][] = array(

    "name" => "General typography",
    "id" => "general_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
$bd_options["typography"]["tybo_general"][] = array(

    "name" => "Links Color",
    "id" => "general_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["tybo_general"][] = array(

    "name" => "Links Decoration",
    "id" => "general_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["tybo_general"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "general_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["tybo_general"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "general_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post typography
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_title"][] = array(

    "name" => "Single Post Title",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_title"][] = array(

    "name" => "Typography",
    "id" => "post_title_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);

/*-----------------------------------------------------------------------------------*/
// Titles
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["bdaia_blog_standard_post_title"][] = array
(
    "name"      => "Blog Standard Post Title",
    "class"     => "fadeToggle",
    "type"      => "subtitle"
);

$bd_options["typography"]["bdaia_blog_standard_post_title"][] = array
(
    "name"      => "Typography",
    "id"        => "bdaia_blog_standard_post_title",
    "class"     => "fadeToggle",
    "type"      => "tybo"
);

$bd_options["typography"]["bdaia_blog_masonry_post_title"][] = array
(
    "name"      => "Blog Masonry Post Title",
    "class"     => "fadeToggle",
    "type"      => "subtitle"
);

$bd_options["typography"]["bdaia_blog_masonry_post_title"][] = array
(
    "name"      => "Typography",
    "id"        => "bdaia_blog_masonry_post_title",
    "class"     => "fadeToggle",
    "type"      => "tybo"
);

$bd_options["typography"]["bdaia_blog_classic_post_title"][] = array
(
    "name"      => "Blog Classic Post Title",
    "class"     => "fadeToggle",
    "type"      => "subtitle"
);

$bd_options["typography"]["bdaia_blog_classic_post_title"][] = array
(
    "name"      => "Typography",
    "id"        => "bdaia_blog_classic_post_title",
    "class"     => "fadeToggle",
    "type"      => "tybo"
);

/*-----------------------------------------------------------------------------------*/
// Post Content typography
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_content"][] = array(

    "name" => "Post Content",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_content"][] = array(

    "name" => "Post Content typography",
    "id" => "post_content_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
$bd_options["typography"]["post_content"][] = array(

    "name" => "Links Color",
    "id" => "post_content_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_content"][] = array(

    "name" => "Links Decoration",
    "id" => "post_content_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_content"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_content_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_content"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_content_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post H1 Tag
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_h1_tag"][] = array(

    "name" => "Post H1 Tag",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_h1_tag"][] = array(

    "name" => "Post H1 Tag",
    "id" => "post_h1_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);

##
$bd_options["typography"]["post_h1_tag"][] = array(

    "name" => "Links Color",
    "id" => "post_h1_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h1_tag"][] = array(

    "name" => "Links Decoration",
    "id" => "post_h1_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_h1_tag"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_h1_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h1_tag"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_h1_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);

/*-----------------------------------------------------------------------------------*/
// Post H2 Tag
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_h2_tag"][] = array(

    "name" => "Post H2 Tag",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_h2_tag"][] = array(

    "name" => "Post H2 Tag",
    "id" => "post_h2_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
##
$bd_options["typography"]["post_h2_tag"][] = array(

    "name" => "Links Color",
    "id" => "post_h2_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h2_tag"][] = array(

    "name" => "Links Decoration",
    "id" => "post_h2_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_h2_tag"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_h2_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h2_tag"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_h2_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post H3 Tag
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_h3_tag"][] = array(

    "name" => "Post H3 Tag",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_h3_tag"][] = array(

    "name" => "Post H3 Tag",
    "id" => "post_h3_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
##
$bd_options["typography"]["post_h3_tag"][] = array(

    "name" => "Links Color",
    "id" => "post_h3_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h3_tag"][] = array(

    "name" => "Links Decoration",
    "id" => "post_h3_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_h3_tag"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_h3_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h3_tag"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_h3_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post H4 Tag
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_h4_tag"][] = array(

    "name" => "Post H4 Tag",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_h4_tag"][] = array(

    "name" => "Post H4 Tag",
    "id" => "post_h4_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
##
$bd_options["typography"]["post_h4_tag"][] = array(

    "name" => "Links Color",
    "id" => "post_h4_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h4_tag"][] = array(

    "name" => "Links Decoration",
    "id" => "post_h4_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_h4_tag"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_h4_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h4_tag"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_h4_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post H5 Tag
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_h5_tag"][] = array(

    "name" => "Post H5 Tag",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_h5_tag"][] = array(

    "name" => "Post H5 Tag",
    "id" => "post_h5_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
##
$bd_options["typography"]["post_h5_tag"][] = array(

    "name" => "Links Color",
    "id" => "post_h5_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h5_tag"][] = array(

    "name" => "Links Decoration",
    "id" => "post_h5_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_h5_tag"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_h5_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h5_tag"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_h5_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post H6 Tag
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_h6_tag"][] = array(

    "name" => "Post H6 Tag",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_h6_tag"][] = array(

    "name" => "Post H6 Tag",
    "id" => "post_h6_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
##
$bd_options["typography"]["post_h6_tag"][] = array(

    "name" => "Links Color",
    "id" => "post_h6_lc",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h6_tag"][] = array(

    "name" => "Links Decoration",
    "id" => "post_h6_ld",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
$bd_options["typography"]["post_h6_tag"][] = array(

    "name" => "Links Color on mouse over",
    "id" => "post_h6_lch",
    "class" => "fadeToggle",
    "type" => "color"
);
$bd_options["typography"]["post_h6_tag"][] = array(

    "name" => "Links Decoration on mouse over",
    "id" => "post_h6_ldh",
    "class" => "fadeToggle",
    "type" => "sellist",
    "options" => array( ""=>"Default", "none"=>"none","underline"=>"underline","overline"=>"overline","line-through"=>"line-through" )
);
/*-----------------------------------------------------------------------------------*/
// Post Blockquote
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_blockquote"][] = array(

    "name" => "Post Blockquote",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["post_blockquote"][] = array(

    "name" => "Post Blockquote",
    "id" => "post_blockquote_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
/*-----------------------------------------------------------------------------------*/
// Widgets Title
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["widgets_title"][] = array(

    "name" => "Widgets Title",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["widgets_title"][] = array(

    "name" => "Widgets Title",
    "id" => "widgets_title_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);
/*-----------------------------------------------------------------------------------*/
// Top Menu
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["top_menu"][] = array(

    "name" => "Top Menu",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["top_menu"][] = array(

    "name" => "Top Menu",
    "id" => "top_menu_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);

/*-----------------------------------------------------------------------------------*/
// Primary Menu
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["primary_menu"][] = array(

    "name" => "Primary Menu",
    "class"=> "fadeToggle",
    "type"=> "subtitle"
);
$bd_options["typography"]["primary_menu"][] = array(

    "name" => "Primary Menu",
    "id" => "primary_menu_bd",
    "class" => "fadeToggle",
    "type" => "tybo"
);


/*-----------------------------------------------------------------------------------*/
// Post Carousel
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["post_carousel"][] = array(
    "name"      => "Post Carousel",
    "class"     => "fadeToggle",
    "type"      => "subtitle"
);

$bd_options["typography"]["post_carousel"][] = array(
    "name"      => "Post Carousel",
    "id"        => "bdayh_post_carousel",
    "class"     => "fadeToggle",
    "type"      => "tybo"
);

/*-----------------------------------------------------------------------------------*/
// Featured Slider
/*-----------------------------------------------------------------------------------*/
$bd_options["typography"]["featured_slider"][] = array(
    "name"      => "Featured Slider",
    "class"     => "fadeToggle",
    "type"      => "subtitle"
);

$bd_options["typography"]["featured_slider"][] = array(
    "name"      => "Featured Slider",
    "id"        => "bdayh_featured_slider",
    "class"     => "fadeToggle",
    "type"      => "tybo"
);
?>