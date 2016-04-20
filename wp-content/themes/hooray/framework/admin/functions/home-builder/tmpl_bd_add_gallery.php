<script id="bd_add_gallery_home1" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="home[{{= data}}][type]" value="gallery_box" />

            <div class="boxes_title">
                <i class="handle fa fa-navicon"></i>
                <?php _e('News In Gallery',LANG) ?>
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
                        <h3>Posts Order By</h3>
                        <select name="home[{{= data}}][order]" id="bd_setting_home_{{= data}}_order">
                            <option selected="selected" value="date">Latest Posts</option>
                            <option value="rand">Random Posts</option>
                            <option value="modified">Last Modified</option>
                            <option value="name">Post Name</option>
                        </select>
                    </div>

                    <div class="bd_option_item">
                        <h3><?php _e('Title',LANG) ?> </h3>
                        <input type="text" name="home[{{= data}}][title]" value="News In Gallery">
                    </div>

                    <div class="bd_option_item">
                        <h3><?php _e('Number of posts',LANG) ?> </h3>
                        <input class="input_numb" name="home[{{= data}}][number]" type="text" value="6">
                    </div>

                </div>
            </div>
        </div>
    </div>
</script>