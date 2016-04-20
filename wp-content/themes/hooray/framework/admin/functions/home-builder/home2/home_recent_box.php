<?php

function home2_recent_box( $k,$arr ) {

    $categories = get_categories( 'hide_empty=0&orderby=name' );
    $wp_cats = array();

    foreach ($categories as $category_list ) {
        $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
    }

    global $wp_cats;
    if( isset( $wp_cats ) ) { ?>

        <div class="builder_inner" id="home2_box_<?php echo $k; ?>">
            <input type="hidden" name="home2[<?php echo $k; ?>][type]" value="recent_box_home2" />
            <div class="boxes_title"><i class="handle fa fa-navicon"></i><?php echo $arr['title']; ?>
                <i class="del fa fa-remove" id="remove_<?php echo $k; ?>"></i>

            </div>
            <div class="builder_content">
                <div class="bd_item_content of">
                    <div class="bd_option_item">
                        <h3>Category </h3>
                        <select multiple="multiple" style="height: auto;" name="home2[<?php echo $k; ?>][cat][]" id="bd_setting_home2_<?php echo $k; ?>_cat">
                            <?php foreach($wp_cats as $c_id => $c_name ) { ?>
                                <option value="<?php echo $c_id;?>" <?php if(in_array($c_id,$arr['cat'])){echo "selected='selected'";} ?>><?php echo $c_name;?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="bd_option_item">
                        <h3>Title </h3>
                        <input type="text" name="home2[<?php echo $k; ?>][title]" value="<?php echo $arr['title']; ?>">
                    </div>
                    <div class="bd_option_item">
                        <h3>Number of posts </h3>
                        <input class="input_numb" name="home2[<?php echo $k; ?>][number]" type="text" value="<?php echo $arr['number']; ?>">
                    </div>
                    <div class="bd_option_item">
                        <h3>Layout Display </h3>
                        <select id="bd_setting_home2_<?php echo $k; ?>_display" name="home2[<?php echo $k; ?>][display]">
                            <option value="recent_box_default" <?php if($arr['display'] == 'recent_box_default') { echo ' selected="selected"' ; } ?>>Default Style</option>
                            <option value="recent_box_list" <?php if($arr['display'] == 'recent_box_list') { echo ' selected="selected"' ; } ?>>List Style</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    <?php }
} ?>