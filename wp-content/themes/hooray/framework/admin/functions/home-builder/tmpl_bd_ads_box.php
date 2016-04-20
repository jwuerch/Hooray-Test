<script id="bd_ads_box" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="home[{{= data}}][type]" value="ads_box" />
            <div class="boxes_title">
                <i class="handle fa fa-navicon"></i>
                <?php _e ('Ads',LANG) ?>
                <i class="del fa fa-remove" id="remove_{{= data}}"></i>

            </div>
            <div class="builder_content">
                <div class="bd_item_content on">
                    <div class="bd_option_item ads_code">
                        <textarea class="textarea_full" name="home[{{= data}}][ad_code]" rows="7"></textarea>
                        <div>Text, HTML and Shortcodes</div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>