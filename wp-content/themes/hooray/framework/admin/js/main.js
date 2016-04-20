jQuery(document).ready(function(){

    jQuery("a").each(function(){this.onmouseup = this.blur();});
    jQuery(".r_background_displays").change(function(){if(jQuery(this).val()=="bg_pattren"){jQuery("#custom_pattrens_color, #custom_pattrens").fadeIn();jQuery("#custom_background, #item-custom_background_full").hide()}else{jQuery("#custom_background, #item-custom_background_full").fadeIn();jQuery("#custom_pattrens_color, #custom_pattrens").hide()}});
    jQuery(".postbox input:checked").parent().addClass("selected");jQuery(".postbox .checkbox-select").click(function(e){e.preventDefault(e);jQuery(".postbox li").removeClass("selected");jQuery(this).parent().addClass("selected");jQuery(this).parent().find(":radio").attr("checked","checked")});

    /*-----------------------------------------------------------------------------------*/
    // select_plugin
    /*-----------------------------------------------------------------------------------*/
    jQuery(".select_plugin li input").css('display','none');
    jQuery(".select_plugin li").click(function() {
        jQuery(this).parent('ol').find('li').removeClass('selectd');
        jQuery(this).addClass('selectd');
        jQuery(this).find('input').attr('checked','checked');
    });

    /*-----------------------------------------------------------------------------------*/
    // preventDefault
    /*-----------------------------------------------------------------------------------*/
    jQuery( ".select_plugin li a, #add_news, #add_scrolling_box, #add_recent_box, #add_videos, #add_gallery, #add_news_in_tabs, #add_ads_box, .bd-subtitle.fadeToggle, #ad_type, .bd_box_layout li a, .layouts-inner li a, .bd_box_layout a, .navbuilder a" ).click(function(event) {
        event.preventDefault(event);
    });

    /*-----------------------------------------------------------------------------------*/
    // add_news
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_news_home1").click(function() {
        var template = jQuery('#add_news'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_scrolling_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_scrolling_box_home1").click(function(){
        var template = jQuery('#bd_scrolling_box'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_scrolling_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_slider_home1").click(function(){
        var template = jQuery('#bd_slider_box'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_recent_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_recent_box_home1").click(function() {
        var template = jQuery('#bd_recent_box'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_videos
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_videos_home1").click(function(){
        var template = jQuery('#bd_add_videos'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_gallery
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_gallery_home1").click(function() {
        var template = jQuery('#bd_add_gallery_home1'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_news_in_tabs
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_news_in_tabs_home1").click(function(){
        var template = jQuery('#bd_news_in_tabs'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').addClass('on');
        jQuery('#bd_cats option').clone().appendTo('#bd_setting_home_'+ total_boxes +'_cat');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_ads_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_ads_box_home1").click(function() {
        var template = jQuery('#bd_ads_box'),data = {data: total_boxes};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home1').append(compile);
        jQuery('#home_box_'+total_boxes+' .bd_item_content').css('display','block');
        total_boxes++;
    });

    /*-----------------------------------------------------------------------------------*/
    // del
    /*-----------------------------------------------------------------------------------*/
    jQuery(document).on("click", ".del" , function(){
        var box_id = jQuery(this).attr('id').replace('remove_','');
        jQuery('#home_box_'+box_id).fadeOut( 'fast' ).remove();
    });

    jQuery(document).on("click", ".del" , function(){
        var box_id = jQuery(this).attr('id').replace('remove_','');
        jQuery('#home2_box_'+box_id).fadeOut( 'fast' ).remove();
    });

    /*-----------------------------------------------------------------------------------*/
    // fadeToggle
    /*-----------------------------------------------------------------------------------*/
    jQuery(document).on("click", ".bd-subtitle.fadeToggle" , function(){
        var elm_id = jQuery(this).parent().attr('id');
        if(jQuery('#'+elm_id).find('.fadeToggle').hasClass( 'on' )){
            jQuery('#'+elm_id).find('.fadeToggle').removeClass( "on" );
        } else {
            jQuery('#'+elm_id).find('.fadeToggle').addClass( "on" );
        }
    });

    /*-----------------------------------------------------------------------------------*/
    // boxes_title
    /*-----------------------------------------------------------------------------------*/
    jQuery(document).on("click", ".boxes_title" , function(){
        var elm_id = jQuery(this).parent().attr('id');
        if(jQuery('#'+elm_id).find('.bd_item_content').hasClass( 'on' )) {
            jQuery('#'+elm_id).find('.bd_item_content').removeClass( "on" );
            jQuery('#'+elm_id).find('.bd_item_content').addClass( "of" );
        } else {
            jQuery('#'+elm_id).find('.bd_item_content').addClass( "on" );
            jQuery('#'+elm_id).find('.bd_item_content').removeClass( "of" );
        }
    });

    /*-----------------------------------------------------------------------------------*/
    // placeholder
    /*-----------------------------------------------------------------------------------*/
    jQuery( "#bdayh_list_boxes_home1, #bdayh_list_boxes_home2" ).sortable({ placeholder: "ui-state-highlight" });
    jQuery( "#bdayh_list_boxes_home1, #bdayh_list_boxes_home2" ).sortable({
        connectWith: "#bdayh_list_boxes_home1, #bdayh_list_boxes_home2",
        start: function(e, ui){
            ui.placeholder.height(ui.item.height());
        }
    });

    /*-----------------------------------------------------------------------------------*/
    // ad_type
    /*-----------------------------------------------------------------------------------*/
    jQuery(".ad_type").live("change",function() {

        jQuery(this).parents('.bd_item_content').find('.ads_code').addClass( "on" );
        jQuery(this).parents('.bd_item_content').find('.ads_img').addClass( "on" );

        if(jQuery(this).val() == 'code') {
            jQuery(this).parents('.bd_item_content').find('.ads_img').hide();
            jQuery(this).parents('.bd_item_content').find('.ads_code').show();
            jQuery(this).parents('.bd_item_content').find('.ads_code').addClass( "on" );
            jQuery(this).parents('.bd_item_content').find('.ads_img').removeClass( "on" );

        } else {
            jQuery(this).parents('.bd_item_content').find('.ads_code').hide();
            jQuery(this).parents('.bd_item_content').find('.ads_img').show();
            jQuery(this).parents('.bd_item_content').find('.ads_img').addClass( "on" );
            jQuery(this).parents('.bd_item_content').find('.ads_code').removeClass( "on" );

        }
    });

    /*-----------------------------------------------------------------------------------*/
    // home_type
    /*-----------------------------------------------------------------------------------*/
    jQuery(".home_type").change(function () {
        if(jQuery(this).val() == "blog") {
            jQuery("#box_type_content").hide();
        } else {
            jQuery("#box_type_content").show();
        }
    });

    /*-----------------------------------------------------------------------------------*/
    // bd_box_layout
    /*-----------------------------------------------------------------------------------*/
    jQuery(document).on("click", ".bd_box_layout li" , function(){
        jQuery(this).parent('ul').find('li').removeClass('selectd');
        jQuery(this).addClass('selectd');
        jQuery(this).parent('ul').find('input').removeAttr('checked');
        jQuery(this).find('input').attr('checked','checked');
        return false;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_news
    /*-----------------------------------------------------------------------------------*/
    jQuery(".box_tabs_container").hide();
    jQuery("#bd-panel-tabs li:first").addClass("active").show();
    jQuery(".box_tabs_container:first").show();
    jQuery("#bd-panel-tabs li").click(function() {
        jQuery("#bd-panel-tabs li").removeClass("active");
        jQuery(this).addClass("active");
        jQuery(".box_tabs_container").hide();
        var activeTab = jQuery(this).find("a").attr("href");
        jQuery(activeTab).fadeIn('fast');
        return false;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_news
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_news_home2").click(function() {
        var template = jQuery('#bd_news_box_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_scrolling_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_scrolling_box_home2").click(function(){
        var template = jQuery('#bd_scrolling_box_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_scrolling_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_slider_home2").click(function(){
        var template = jQuery('#bd_slider_box_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_recent_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_recent_box_home2").click(function() {
        var template = jQuery('#bd_recent_box_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_videos
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_videos_home2").click(function(){
        var template = jQuery('#bd_add_videos_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_gallery
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_gallery_home2").click(function() {
        var template = jQuery('#bd_add_gallery_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_news_in_tabs
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_news_in_tabs_home2").click(function(){
        var template = jQuery('#bd_news_in_tabs_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').addClass('on');
        jQuery('#bd_cats2 option').clone().appendTo('#bd_setting_home2_'+ total_boxes2 +'_cat');
        total_boxes2++;
    });

    /*-----------------------------------------------------------------------------------*/
    // add_ads_box
    /*-----------------------------------------------------------------------------------*/
    jQuery("#add_ads_box_home2").click(function() {
        var template = jQuery('#bd_ads_box_home2'),data = {data: total_boxes2};
        var compile = template.tmpl(data).html();
        jQuery('.bdayh_list_boxes_home2').append(compile);
        jQuery('#home2_box_'+total_boxes2+' .bd_item_content').css('display','block');
        total_boxes2++;
    });

});