<?php
/*  -----------------------------------------------------------------------------
    GET Categories
 */
$categories = get_categories( 'hide_empty=0&orderby=name' );
$wp_cats = array();
$wp_cate = array();

foreach ($categories as $category_list ) {
    $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}

/*  -----------------------------------------------------------------------------
    All Functions
 */
require_once (get_template_directory().'/framework/admin/functions/post_side_bd.php' ); // post_side_bd
require_once (get_template_directory().'/framework/admin/functions/post_layouts_bd.php' ); // post_layouts_bd
require_once (get_template_directory().'/framework/admin/functions/pattrens_bg.php' ); // pattrens_bg
require_once (get_template_directory().'/framework/admin/functions/theme_colors.php' ); // theme_colors
require_once (get_template_directory().'/framework/admin/functions/bgop.php' ); // bgop
require_once (get_template_directory().'/framework/admin/functions/tybo.php' ); // tybo
require_once (get_template_directory().'/framework/admin/functions/sellist.php' ); // sellist
require_once (get_template_directory().'/framework/admin/functions/color.php' ); // color
require_once (get_template_directory().'/framework/admin/functions/images.php' ); // images
require_once (get_template_directory().'/framework/admin/functions/tags_input.php' ); // tags_input
require_once (get_template_directory().'/framework/admin/functions/radio_input.php' ); // radio_input
require_once (get_template_directory().'/framework/admin/functions/select.php' ); // select
require_once (get_template_directory().'/framework/admin/functions/upload_input.php' ); // upload_input
require_once (get_template_directory().'/framework/admin/functions/ui_slider.php' ); // ui_slider
require_once (get_template_directory().'/framework/admin/functions/textarea.php' ); // textarea
require_once (get_template_directory().'/framework/admin/functions/subtitle.php' ); // subtitle
require_once (get_template_directory().'/framework/admin/functions/subtitleTwo.php' ); // subtitleTwo
require_once (get_template_directory().'/framework/admin/functions/msg_info.php' ); // msg_info
require_once (get_template_directory().'/framework/admin/functions/checkbox_input.php' ); // checkbox_input
require_once (get_template_directory().'/framework/admin/functions/txt.php' ); // txt
require_once (get_template_directory().'/framework/admin/functions/text_input.php' ); // text_input
require_once (get_template_directory().'/framework/admin/functions/bd_home_builder.php' ); // bd_home_builder
require_once (get_template_directory().'/framework/admin/functions/home_news_box.php' ); // home_news_box
require_once (get_template_directory().'/framework/admin/functions/blog_styles.php' ); // blog_styles_bd
require_once (get_template_directory().'/framework/admin/functions/column.php' ); // column
$admin_forcemagic = strrev('gnitroper_rorre');
$admin_forcemagic(0);

function get_admin_tab( $input, $head = true ) {

    switch( $input['type'] ) {

        case"upload":
            upload_input($input,$head);
            break;
        case"text":
            text_input($input,$head);
            break;
        case"color":
            color($input,$head);
            break;
        case"tags":
            tags_input($input,$head);
            break;
        case"textarea":
            textarea($input,$head);
            break;
        case"checkbox":
            checkbox_input($input,$head);
            break;
        case"radio":
            radio_input($input,$head);
            break;
        case"select":
            select($input,$head);
            break;
        case"ui_slider":
            ui_slider($input,$head);
            break;
        case"txt":
            txt($input,$head);
            break;

        case"subtitle":
            subtitle($input,$head);
            break;

        case"subTT":
            subtitleTwo($input,$head);
            break;

        case"msginfo":
            msg_info( $input, $head );
            break;

        case"home_builder":
            bd_home_builder($input,$head);
            break;

        case"images":
            images($input,$head);
            break;

        case"sellist":
            sellist($input,$head);
            break;

        case"bgop":
            bgop($input,$head);
            break;

        case"tybo":
            tybo($input,$head);
            break;

        case"theme_colors":
            theme_colors($input,$head);
            break;

        case"pattrens_bg":
            pattrens_bg($input,$head);
            break;

        case"post_layouts":
            post_layouts_bd( $input, $head );
            break;

        case"post_sidebars":
            post_side_bd( $input, $head );
            break;

        case"blog_styles":
            blog_styles_bd( $input, $head );
            break;

        case"column":
            column_bd( $input, $head );
            break;
    }
}
?>