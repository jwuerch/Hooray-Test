<?php

function home2_ads_box( $k,$arr ) {

    ?>
    <div class="builder_inner" id="home2_box_<?php echo $k; ?>">
        <input type="hidden" name="home2[<?php echo $k; ?>][type]" value="ads_box_home2" />
        <div class="boxes_title"><i class="handle fa fa-navicon"></i>Ads
            <i class="del fa fa-remove" id="remove_<?php echo $k; ?>"></i>

        </div>
        <div class="builder_content">
            <div class="bd_item_content of">
                <div class="bd_option_item ads_code" <?php if($arr[ad_type] == 'img'){echo '';}?>>
                    <textarea class="textarea_full" name="home2[<?php echo $k; ?>][ad_code]" rows="7"><?php echo stripcslashes($arr[ad_code]); ?></textarea>
                    <div>Text, HTML and Shortcodes</div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>