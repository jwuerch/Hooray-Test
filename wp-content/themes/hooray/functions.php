<?php
/**
 * Define
 * ----------------------------------------------------------------------------- *
 */
$themename = "Hooray";
$shortname = "hooray";
$themefolder = "hooray";

define ('theme_name', $themename);
define ('SHORTNAME',	$shortname);
define ('THEME_VER', "20001122102");

define('LANG', 'bd');
define('BD_DIR', get_template_directory());
define('BD_URI', get_template_directory_uri());

if ( ! isset( $content_width ) ) $content_width = 620;

/**
 * Main Functions
 * ----------------------------------------------------------------------------- *
 */
require_once ( get_template_directory().'/framework/admin/framework-options.php'    );
require_once ( get_template_directory().'/framework/functions/functions-theme.php'  );
require_once ( get_template_directory().'/framework/ajax/functions.php'             );


/**
 * Google Fonts
 * ----------------------------------------------------------------------------- *
 */
function bd_fonts() {
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'Bdaia-GFonts', "$protocol://fonts.googleapis.com/css?family=Oswald:400,300,700|Lato:400,300,700,900|Work+Sans:400,300,500,600,700,800,900|Open+Sans:400,600,700,800|Playfair+Display:400,700,900,400italic|Raleway:400,300,500,600,700,800,900|Roboto+Slab:400,300,100,700|Montserrat:400,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic" );
}
add_action( 'wp_enqueue_scripts', 'bd_fonts' );
?>