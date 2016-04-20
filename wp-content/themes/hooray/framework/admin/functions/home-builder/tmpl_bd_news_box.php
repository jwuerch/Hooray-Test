<script id="add_news" type="text/x-tmpl">
    <div>
        <div class="builder_inner" id="home_box_{{= data}}">
            <input type="hidden" name="home[{{= data}}][type]" value="news_box" />
            <div class="boxes_title">
                <i class="handle fa fa-navicon"></i>

                <i class="del fa fa-remove" id="remove_{{= data}}"></i>

                </div>
            <div class="builder_content">
                <div class="bd_item_content of" >
                    <div class="bd_option_item">
                        <h3><?php _e('Category',LANG) ?> </h3>
                        <select name="home[{{= data}}][cat]" id="bd_setting_home_{{= data}}_cat">
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
                        <h3><?php _e('Number of posts',LANG) ?> </h3>
                        <input class="input_numb" name="home[{{= data}}][number]" type="text" value="5">
                    </div>

                    <div class="bd_option_item">
                        <h3><?php _e('Box Layout',LANG) ?> </h3>
                        <ul class="box_layout_list layouts-inner">
                            <li class="selectd">
                                <span class="layout-img home-box1"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" checked="checked" value="1"  />
                            </li>

                            <li>
                                <span class="layout-img home-box2"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="2"  />
                            </li>

                            <li>
                                <span class="layout-img home-box4"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="3"  />
                            </li>

                            <li>
                                <span class="layout-img home-box4"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="4"  />
                            </li>

                            <li>
                                <span class="layout-img home-box5"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="5"  />
                            </li>

                            <li>
                                <span class="layout-img home-box6"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="6"  />
                            </li>

                            <li>
                                <span class="layout-img home-box7"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="7"  />
                            </li>

                            <li>
                                <span class="layout-img home-box8"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="8"  />
                            </li>

                            <li>
                                <span class="layout-img home-box9"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="9"  />
                            </li>

                            <li>
                                <span class="layout-img home-box10"><i></i></span>
                                <input name="home[{{= data}}][layout]" type="radio" value="10"  />
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</script>