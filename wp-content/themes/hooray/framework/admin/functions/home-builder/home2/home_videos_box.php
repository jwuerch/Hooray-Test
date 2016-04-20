<?php
function home2_videos_box( $k,$arr ) {

    $categories = get_categories('hide_empty=0&orderby=name');
    $wp_cats = array();

    foreach ($categories as $category_list ) {
        $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
    }

    global $wp_cats;
    if( isset( $wp_cats ) ) { ?>

        <div class="builder_inner" id="home2_box_<?php echo $k; ?>">
            <input type="hidden" name="home2[<?php echo $k; ?>][type]" value="videos_box_home2" />

            <div class="boxes_title" title="Video Box"><i class="handle fa fa-navicon"></i><?php echo $arr['title']; ?>
                <i class="del fa fa-remove" id="remove_<?php echo $k; ?>"></i>

            </div>

            <div class="builder_content">
                <div class="bd_item_content of">

                    <div class="bd_option_item">
                        <h3>Category </h3>
                        <select name="home2[<?php echo $k; ?>][cat]" id="bd_setting_home2_<?php echo $k; ?>_cat">
                            <?php foreach($wp_cats as $c_id => $c_name ) { ?>
                                <option value="<?php echo $c_id;?>" <?php if($arr['cat'] == $c_id){echo "selected='selected'";} ?>><?php echo $c_name;?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="bd_option_item">
                        <h3>Title </h3>
                        <input type="text" name="home2[<?php echo $k; ?>][title]" value="<?php echo $arr['title']; ?>">
                    </div>

                    <div class="bd_option_item">
                        <h3>Posts Order By</h3>
                        <select name="home2[<?php echo $k; ?>][order]" id="bd_setting_home2_<?php echo $k; ?>_order">
                            <option <?php if( $arr['order'] == 'date' || $arr['order']=='' ) echo 'selected="selected"'; ?> value="date">Latest Posts</option>
                            <option <?php if( $arr['order'] == 'rand' ) echo 'selected="selected"'; ?> value="rand">Random Posts</option>
                            <option <?php if( $arr['order'] == 'modified' ) echo 'selected="selected"'; ?> value="modified">Last Modified</option>
                            <option <?php if( $arr['order'] == 'name' ) echo 'selected="selected"'; ?> value="name">Post Name</option>
                        </select>
                    </div>

                </div>
            </div>
        </div>
    <?php }
} ?>