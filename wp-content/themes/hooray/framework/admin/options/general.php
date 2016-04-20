<?php
$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "General Options",
    "type"  	=> "subtitle"
);

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Disable Aqua Resizer",
    "id"    	=> "aq_resize_op",
    "exp"		=> "This small script will allow you to resize & crop WordPress images uploaded via the media uploader on the fly. It relies on WP's native functions to resize the images, and checks if there is an already resized version of the image so that it won't be wasting your server's resources to regenerate the images.",
    "type"  	=> "checkbox"

); // Responsive

$bd_options["general_options"]["bd_general"][] = array(

    "name" 		=> "Lazy Load",
    "id"    	=> "bd_lazyload",
    "type"  	=> "checkbox"
);

$bd_options["general_options"]["bd_general"][] = array(

    "name" 		=> "Live Search",
    "id"    	=> "bd_LiveSearch",
    "type"  	=> "checkbox"
); // live search

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Responsive Design",
    "id"    	=> "responsive",
    "exp"		=> "Check this box to use the responsive design features. If left unchecked then the fixed layout is used.",
    "type"  	=> "checkbox"

); // Responsive

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Notify On Theme Updates",
    "id"    	=> "notify_theme",
    "exp"		=> "Check the box to enable the Notify On Theme Updates.",
    "type"  	=> "checkbox"

); // Notify On Theme Updates

$bd_options["general_options"]["bd_general"][] = array(
    "name" 		=> "Allow Comments on Pages",
    "id"    	=> "comments_pages",
    "exp"		=> "Check the box to allow comments on regular pages.",
    "type"  	=> "checkbox"

); // Allow Comments on Pages

$bd_options["general_options"]["bd_general"][] = array
(
    "name" 		=> "Meta on pages",
    "id"    	=> "mmeta_pages",
    "exp"		=> "Enable or Disable : Meta on pages",
    "type"  	=> "checkbox"

);

// Time
$bd_options["general_options"]["bd_general"][] = array(

    "name" 		=> "Time format",
    "exp"       => "Time format for posts.",
    "id" 		=> "bdTimeFormat",
    "type"  	=> "radio",
    "options"   => array(

        "modern" => "Time Ago Format" ,
        "traditional" => "Traditional",
        "none" => " Disable all"
    )
);

$bd_options["general_options"]["general_cods"][] = array(
    "name" 		=> "Code",
    "type"  	=> "subtitle"
);

$bd_options["general_options"]["general_cods"][] = array(
    "name" 		=> "Tracking Code",
    "id"    	=> "google_analytics",
    "exp"		=> "Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.",
    "type"  	=> "textarea"

);

$bd_options["general_options"]["general_cods"][] = array(
    "name" 		=> "Space before &lt;/head&gt;",
    "id"    	=> "space_head",
    "exp"		=> "Add code before the &lt;/head&gt; tag.",
    "type"  	=> "textarea"

);

$bd_options["general_options"]["general_cods"][] = array(
    "name" 		=> "Space before &lt;/body&gt;",
    "id"    	=> "space_body",
    "exp"		=> "Add code before the &lt;/body&gt; tag.",
    "type"  	=> "textarea"
);
?>