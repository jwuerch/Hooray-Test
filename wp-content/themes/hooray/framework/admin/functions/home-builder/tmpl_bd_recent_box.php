<script id="bd_recent_box" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="home[{{= data}}][type]" value="recent_box" />
            <div class="boxes_title">
                <i class="handle fa fa-navicon"></i>
                <?php _e('Recent Posts',LANG) ?>
                <i class="del fa fa-remove" id="remove_{{= data}}"></i>

            </div>
            <div class="builder_content">
                <div class="bd_item_content of">
                    <div class="bd_option_item">
                        <h3><?php _e('Category',LANG) ?> </h3>
                        <select multiple="multiple" style="height: auto;" name="home[{{= data}}][cat][]" id="bd_setting_home_{{= data}}_cat">
                            {{= cats}}
                        </select>
                    </div>
                    <div class="bd_option_item">
                        <h3><?php _e('Title',LANG) ?> </h3>
                        <input type="text" name="home[{{= data}}][title]" value="Recent Posts">
                    </div>
                    <div class="bd_option_item">
                        <h3><?php _e('Number of posts',LANG) ?> </h3>
                        <input class="input_numb" name="home[{{= data}}][number]" type="text" value="6">
                    </div>
                    <div class="bd_option_item">
                        <h3>Layout Display </h3>
                        <select id="bd_setting_home_{{= data}}_display" name="home[{{= data}}][display]">
                            <option value="recent_box_default">Default Style</option>
                            <option value="recent_box_list">List Style</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>