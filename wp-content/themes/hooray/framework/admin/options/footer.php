<?php
/**
 * Instagram
 * ----------------------------------------------------------------------------- *
 */
$bd_options["footer"]["instagram"][] = array(
    "name" 		=> "Follow Instagram",
    "type"  	=> "subtitle"
);

## Instagram
$bd_options["footer"]["instagram"][] = array(
    "name" 		=> "Follow Instagram",
    "id"    	=> "bdayh_follow_instagram",
    "type"  	=> "checkbox"
);

## Username
$bd_options["footer"]["instagram"][] = array(
    "name" 		=> "Instagram UserName",
    "id"    	=> "bdayh_follow_instagram_user_name",
    "type"  	=> "text"
);

## Access token
$bd_options["footer"]["instagram"][] = array(
    "name" 		=> "Instagram Access token",
    "id"    	=> "bdayh_follow_instagram_access_token",
    "type"  	=> "text"
);

/**
 * Footer Widgets Area Options
 * ----------------------------------------------------------------------------- *
 */
$bd_options["footer"]["footer_wa"][] = array(
    "name" 		=> "Footer Widgets Area Options",
    "type"  	=> "subtitle"
);

## Footer Widgets
$bd_options["footer"]["footer_wa"][] = array(
    "name" 		=> "Footer Widgets",
    "id"    	=> "footerWidgets",
    "exp" 		=> "Check the box to display footer widgets.",
    "type"  	=> "checkbox"
);

## Number of Footer Columns
$bd_options["footer"]["footer_wa"][] = array(
    "name" 		=> "Number of Footer Columns",
    "id"    	=> "footerWidgetsColumns",
    "exp"		=> "Select the number of columns to display in the footer.",
    "type"  	=> "column"
);

/**
 * Copyright Area / Social Icons Options
 * ----------------------------------------------------------------------------- *
 */
$bd_options["footer"]["footer_op"][] = array(
    "name" 		=> "Copyright Area / Social Icons Options",
    "type"  	=> "subtitle"
);

$bd_options["footer"]["footer_op"][] = array(
    "name" 		=> "Go top",
    "id"    	=> "bdayhGoTop",
    "type"  	=> "checkbox"
);


$bd_options["footer"]["footer_op"][] = array(
    "name" 		=> "Display social icons on footer of the page",
    "id"    	=> "bdayhFooterSocialLinks",
    "exp" 		=> "Select the checkbox to show social media icons on the footer of the page.",
    "type"  	=> "checkbox"
);

$bd_options["footer"]["footer_op"][] = array(
    "name" 		=> "Copyright Text",
    "id"    	=> "footer_copyright_text",
    "exp"    	=> "Enter the text that displays in the copyright bar. HTML markup can be used.",
    "type"  	=> "textarea"
);
?>