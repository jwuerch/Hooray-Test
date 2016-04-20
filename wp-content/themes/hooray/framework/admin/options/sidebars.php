<?php
/**
 * Sidebars
 * ----------------------------------------------------------------------------- *
 */
$bd_options["sidebars"]["sidebar"][] = array(

    "name" => "Sidebar Options",
    "type"=> "subtitle"
);

$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Default Sidebar position",
    "exp"       => "Specify the sidebar to use by default.",
    "id"    	=> "site_sidebar_position",
    "type"  	=> "post_sidebars"
);

$bd_options["sidebars"]["sidebar"][] = array(
    "name" 		=> "Default Posts Sidebar Position",
    "id"    	=> "article_sidebar_position",
    "type"  	=> "post_sidebars"

);


$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Sticky Sidebar",
    "id"    	=> "sticky_sidebar",
    "exp"    	=> "Check to enable the Sticky Sidebar, uncheck to disable.",
    "type"  	=> "checkbox"
);

$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Disable on the homepage",
    "id"    	=> "ss_homepage",
    "type"  	=> "checkbox"
);

$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Disable on pages",
    "id"    	=> "ss_pages",
    "type"  	=> "checkbox"
);

$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Disable on category",
    "id"    	=> "ss_cat",
    "type"  	=> "checkbox"
);

$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Disable on posts",
    "id"    	=> "ss_posts",
    "type"  	=> "checkbox"
);

$bd_options["sidebars"]["sidebar"][] = array(

    "name" 		=> "Disable on tag pages",
    "id"    	=> "ss_disable_tag",
    "type"  	=> "checkbox"
);


?>