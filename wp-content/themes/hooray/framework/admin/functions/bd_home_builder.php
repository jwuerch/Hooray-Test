<?php
/**
 * Home Builder
 */
function bd_home_builder( $input,$head = true ) {

    global $wp_cats, $wp_cate;
    $bd_option = unserialize(get_option('bdayh_setting'));
    if( $head == true ) {} ?>

    <div class="tab_content meta-box-sortables">
        <div class="bd_item" style="margin-bottom: 10px">
            <h2 class="bd-subtitle"><?php _e( 'Home Page Displays', LANG ); ?></h2>
            <div class="bd_option_item">
                <div class="check_radio_content">
                    <div class="clear"></div>
                    <div class="check_radio">
                        <input id="home_type_blog" name="home_type" class="on-of home_type" type="radio" <?php if($bd_option['bd_setting']['home_type'] == 'blog'){ ?>checked="checked" <?php } ?> value="blog" />
                        <div class="lab"><?php _e( 'Latest posts - Blog Layout', LANG ) ?></div> </label>
                    </div>

                    <div class="clear"></div>
                    <div class="check_radio">
                        <input id="home_type_blog" name="home_type" class="on-of home_type" type="radio" <?php if($bd_option['bd_setting']['home_type'] == 'blog_news'){ ?>checked="checked" <?php } ?> value="blog_news" />
                        <div class="lab"><?php _e( 'Latest posts With News Boxes', LANG ) ?></div> </label>
                    </div>

                    <div class="clear"></div>
                    <div class="check_radio">
                        <input id="home_type_box" name="home_type" class="on-of home_type" <?php if($bd_option['bd_setting']['home_type'] == 'box'){ ?>checked="checked" <?php }?> type="radio" value="box" />
                        <div class="lab"><?php _e( 'News Boxes - Home Builder', LANG ) ?></div></label>
                    </div>
                </div>
            </div>
            <div class="clear"></div>

            <div class="box_type_content" id="box_type_content" <?php if($bd_option['bd_setting']['home_type'] == 'blog'){ ?> style="display:none;" <?php } ?>>
                <div class="cf"></div>
                <div class="bd-subtitle-two">Home 1</div>
                <?php
                echo '<select id="bd_cats" style="display:none;">';
                foreach($wp_cats as $c_id => $c_name ) {
                    echo '<option value="'. $c_id .'">'. $c_name .'</option>';
                }
                echo '</select>';
                require_once (get_template_directory().'/framework/admin/functions/home-builder/navbuilder.php' ); // Nav builder
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_bd_add_gallery.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_bd_add_videos.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_bd_news_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_bd_scrolling_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_bd_recent_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_bd_ads_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_news_in_tabs_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/tmpl_slider_box.php' );
                ?>
                <div class="bdayh_list_boxes_home1" id="bdayh_list_boxes_home1">
                    <?php
                    /*-----------------------------------------------------------------------------------*/
                    if( isset( $bd_option['bd_setting']['home'] ) and count( $bd_option['bd_setting']['home'] ) > 0 )
                    {
                        foreach( $bd_option['bd_setting']['home'] as $k => $v )
                        {
                            switch($v['type'])
                            {
                                case"news_box":
                                    home_news_box($k,$v);
                                break;

                                case"scrolling_box":
                                    home_scrolling_box($k,$v);
                                break;

                                case"ads_box":
                                    home_ads_box($k,$v);
                                break;

                                case"recent_box":
                                    home_recent_box($k,$v);
                                break;

                                case"videos_box":
                                    home_videos_box($k,$v);
                                break;

                                case"gallery_box":
                                    home_gallery_box($k,$v);
                                break;

                                case"news_in_tabs_box":
                                    home_news_in_tabs_box($k,$v);
                                break;

                                case"slider_box":
                                    home_slider_box($k,$v);
                                break;
                            }
                        }
                    }
                    ?>
                </div>

                <br>
                <div class="cf"></div>
                <div class="bd-subtitle-two">Home 2</div>
                <?php
                echo '<select id="bd_cats2" style="display:none;">';
                foreach($wp_cats as $c_id => $c_name ) {
                    echo '<option value="'. $c_id .'">'. $c_name .'</option>';
                }
                echo '</select>';
                require_once (get_template_directory().'/framework/admin/functions/home-builder/navbuilder2.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_bd_add_gallery.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_bd_add_videos.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_bd_news_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_bd_scrolling_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_bd_recent_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_bd_ads_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_news_in_tabs_box.php' );
                require_once (get_template_directory().'/framework/admin/functions/home-builder/home2/tmpl_slider_box.php' );
                ?>

                <div class="bdayh_list_boxes_home2" id="bdayh_list_boxes_home2">
                    <?php
                    /*-----------------------------------------------------------------------------------*/
                    if( isset( $bd_option['bd_setting']['home2'] ) and count( $bd_option['bd_setting']['home2'] ) > 0 )
                    {
                        foreach( $bd_option['bd_setting']['home2'] as $k => $v )
                        {
                            switch($v['type'])
                            {
                                case"news_box_home2":
                                    home2_news_box($k,$v);
                                    break;

                                case"scrolling_box_home2":
                                    home2_scrolling_box($k,$v);
                                    break;

                                case"ads_box_home2":
                                    home2_ads_box($k,$v);
                                    break;

                                case"recent_box_home2":
                                    home2_recent_box($k,$v);
                                    break;

                                case"videos_box_home2":
                                    home2_videos_box($k,$v);
                                    break;

                                case"gallery_box_home2":
                                    home2_gallery_box($k,$v);
                                    break;

                                case"news_in_tabs_box_home2":
                                    home2_news_in_tabs_box($k,$v);
                                    break;

                                case"slider_box_home2":
                                    home2_slider_box($k,$v);
                                    break;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php if( $head == true ){}
} ?>