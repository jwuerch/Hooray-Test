<?php
/**
 * home_news_box
 */
function home_news_box( $k,$arr ) {

    global $wp_cats; ?>

    <div class="builder_inner" id="home_box_<?php echo $k; ?>">
        <input type="hidden" name="home[<?php echo $k; ?>][type]" value="news_box" />
        <div class="boxes_title" title="News Box">
            <i class="handle fa fa-navicon"></i>
            <?php echo $wp_cats[$arr['cat']]; ?>
            <i class="del fa fa-remove" id="remove_<?php echo $k; ?>"></i>
        </div>
        <div class="builder_content">
            <div class="bd_item_content of">
                <div class="bd_option_item">
                    <h3>Category </h3>
                    <select name="home[<?php echo $k; ?>][cat]" id="bd_setting_home_<?php echo $k; ?>_cat">
                        <?php foreach($wp_cats as $c_id => $c_name ){ ?>
                            <option value="<?php echo $c_id;?>" <?php if($arr['cat'] == $c_id){echo "selected='selected'";} ?>><?php echo $c_name;?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="bd_option_item">
                    <h3>Posts Order By</h3>
                    <select name="home[<?php echo $k; ?>][order]" id="bd_setting_home_<?php echo $k; ?>_order">
                        <option <?php if( $arr['order'] == 'date' || $arr['order']=='' ) echo 'selected="selected"'; ?> value="date">Latest Posts</option>
                        <option <?php if( $arr['order'] == 'rand' ) echo 'selected="selected"'; ?> value="rand">Random Posts</option>
                        <option <?php if( $arr['order'] == 'modified' ) echo 'selected="selected"'; ?> value="modified">Last Modified</option>
                        <option <?php if( $arr['order'] == 'name' ) echo 'selected="selected"'; ?> value="name">Post Name</option>
                    </select>
                </div>

                <div class="bd_option_item">
                    <h3>Number of posts </h3>
                    <input class="input_numb" name="home[<?php echo $k; ?>][number]" type="text" value="<?php echo $arr['number']; ?>">
                </div>

                <div class="bd_option_item">
                    <h3>Box Layout </h3>
                    <ul class="box_layout_list layouts-inner">
                        <li <?php if($arr['layout'] == 1){?>class="selectd" <?php }?>>
                            <span class="layout-img home-box1"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if($arr['layout'] == 1){?> checked="checked" <?php }?> value="1"  />
                        </li>
                        <li <?php if($arr['layout'] == 2){?>class="selectd" <?php }?>>
                            <span class="layout-img home-box2"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if($arr['layout'] == 2){?> checked="checked" <?php }?> value="2"  />
                        </li>
                        <li <?php if($arr['layout'] == 3){?>class="selectd" <?php }?>>
                            <span class="layout-img home-box3"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if($arr['layout'] == 3){?> checked="checked" <?php }?>  value="3"  />
                        </li>
                        <li <?php if(intval($arr['layout']) == 4){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box4"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 4){?> checked="checked" <?php }?> value="4"  />
                        </li>

                        <li <?php if(intval($arr['layout']) == 5){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box5"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 5){?> checked="checked" <?php }?> value="5"  />
                        </li>

                        <li <?php if(intval($arr['layout']) == 6){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box6"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 6){?> checked="checked" <?php }?> value="6"  />
                        </li>

                        <li <?php if(intval($arr['layout']) == 7){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box7"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 7){?> checked="checked" <?php }?> value="7"  />
                        </li>

                        <li <?php if(intval($arr['layout']) == 8){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box8"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 8){?> checked="checked" <?php }?> value="8"  />
                        </li>

                        <li <?php if(intval($arr['layout']) == 9){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box9"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 9){?> checked="checked" <?php }?> value="9"  />
                        </li>

                        <li <?php if(intval($arr['layout']) == 10){echo 'class="selectd"';}?> >
                            <span class="layout-img home-box10"><i></i></span>
                            <input name="home[<?php echo $k; ?>][layout]" type="radio" <?php if(intval($arr['layout']) == 10){?> checked="checked" <?php }?> value="10"  />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php } ?>