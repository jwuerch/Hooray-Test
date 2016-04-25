<?php
/*  -----------------------------------------------------------------------------
    Theme Styling
 */
$bd_options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" => "Theme Styling",
    "type"=> "subtitle"
);


$bd_options["theme_styling"]["custom_theme_color_options"][] = array(

    "name" 		=> "Note : Choose Unlimited Color OR Theme Color",
    "type"  	=> "msginfo"
);


$bd_options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Choose Theme Color",
    "id"    	=> "custom_theme_colors",
    "type"  	=> "theme_colors"
);

$bd_options["theme_styling"]["custom_theme_color_options"][] = array
(
    "name" 		=> "Unlimited Color",
    "id"    	=> "custom_theme_color",
    "type"  	=> "color"
);



$bd_options["theme_styling"]["custom_background_box"][] = array(

    "name" => "Background options",
    "type"=> "subtitle"
);
$bd_options["theme_styling"]["custom_background_box"][] = array(

    "name" 		=> "Note : Background options below only work in boxed mode",
    "type"  	=> "msginfo"
);


$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Background display",
    "id" 		=> "background_displays",
    "exp"		=> "choose Background display",
    "type"  	=> "radio",
    "options"   => array
    (
        "bg_cutsom"       => "Custom Background" ,
        "bg_pattren"      => "Pattern",
    ),
    "js"		=>
        '
    <script type="text/javascript">
        jQuery(document).ready(function()
        {
            jQuery(".r_background_displays").change(function ()
            {
                if(jQuery(this).val() == "bg_cutsom")
                {
                    jQuery(".bd_custom_pattrens_color, .bd_custom_pattrens").hide();
                    jQuery(".bd_custom_background, .bd_custom_background_full").fadeIn();
                }
                else
                {
                    jQuery(".bd_custom_pattrens_color, .bd_custom_pattrens").fadeIn();
                    jQuery(".bd_custom_background, .bd_custom_background_full").hide();
                }
            });
        });
    </script>
    '
);

$bg_cus = (bdayh_get_option('background_displays') != 'bg_cutsom') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Custom Background",
    "id"    	=> "custom_background",
    "type"  	=> "bgop",
    "class" 	=> $bg_cus . " bd_custom_background",
);
$bg_cus_full = (bdayh_get_option('background_displays') != 'bg_cutsom') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Full Screen",
    "id"    	=> "custom_background_full",
    "type"  	=> "checkbox",
    "class" 	=> $bg_cus_full . " bd_custom_background_full",
);

$bg_pat_color = (bdayh_get_option('background_displays') != 'bg_pattren') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Background Color",
    "id"    	=> "custom_pattrens_color",
    "type"  	=> "color",
    "class" 	=> $bg_pat_color . " bd_custom_pattrens_color",
);
$bg_pat = (bdayh_get_option('background_displays') != 'bg_pattren') ? 'hidden' : '';
$bd_options["theme_styling"]['custom_background_box'][] = array
(
    "name" 		=> "Choose Pattern",
    "id"    	=> "custom_pattrens",
    "type"  	=> "pattrens_bg",
    "class" 	=> $bg_pat . " bd_custom_pattrens",
);

$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Global CSS",
    "id"    	=> "custom_css",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Tablets CSS Width from 768px to 985px",
    "id"    	=> "css_tablets",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Wide Phones CSS Width from 480px to 767px",
    "id"    	=> "css_wide_phones",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);
$bd_options["theme_styling"]["bd_css"][] = array
(
    "name" 		=> "Phones CSS Width from 320px to 479px",
    "id"    	=> "css_phones",
    "exp"       => "Any custom CSS from the user should go in this field, it will override the theme CSS",
    "type"  	=> "textarea"
);


?>
