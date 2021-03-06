jQuery(document).ready(function(){

    /*-----------------------------------------------------------------------------------*/
    // layouts-inner
    /*-----------------------------------------------------------------------------------*/
    jQuery(document).on("click", ".layouts-inner li" , function(){
        jQuery(this).parent('ul').find('li').removeClass('selectd');
        jQuery(this).addClass('selectd');
        jQuery(this).parent('ul').find('input').removeAttr('checked');
        jQuery(this).find('input').attr('checked','checked');
        return false;
    });

    /*-----------------------------------------------------------------------------------*/
    // on-of
    /*-----------------------------------------------------------------------------------*/
    jQuery('.on-of').checkbox({empty:''});

    jQuery( ".del-img" ).click( function(event) {
        event.preventDefault(event);
    });

    // Del Preview Image
    jQuery(document).on("click", ".del-img" , function(){
        jQuery(this).parent().fadeOut(function() {
            jQuery(this).hide();
            jQuery(this).parent().find('input[class="img-path"]').attr('value', '' );
        });
    });

    var selected_it=jQuery("select[name='bd_above_post_adv'] option:selected").val();if(selected_it=="yes"){jQuery("#item-bd_above_post_adv_code").show()}jQuery("select[name='bd_above_post_adv']").change(function(){var e=jQuery("select[name='bd_above_post_adv'] option:selected").val();if(e=="yes"){jQuery("#item-bd_above_post_adv_code").fadeIn()}if(e=="no"||e==""){jQuery("#item-bd_above_post_adv_code").hide()}});
    var selected_it=jQuery("select[name='bd_below_post_adv'] option:selected").val();if(selected_it=="yes"){jQuery("#item-bd_below_post_adv_code").show()}jQuery("select[name='bd_below_post_adv']").change(function(){var e=jQuery("select[name='bd_below_post_adv'] option:selected").val();if(e=="yes"){jQuery("#item-bd_below_post_adv_code").fadeIn()}if(e=="no"||e==""){jQuery("#item-bd_below_post_adv_code").hide()}});
    var selected_item=jQuery("select[name='bd_post_type'] option:selected").val();if(selected_item=="post_video"){jQuery("#video_setting").show()}if(selected_item=="post_soundcloud"){jQuery("#item-bd_soundcloud_url, #item-bd_soundcloud_auto").show()}if(selected_item=="post_googlemap"){jQuery("#item-bd_google_maps_url").show()}jQuery("select[name='bd_post_type']").change(function(){var e=jQuery("select[name='bd_post_type'] option:selected").val();if(e=="post_video"){jQuery("#item-bd_soundcloud_url, #item-bd_soundcloud_auto,#item-bd_google_maps_url").hide();jQuery("#video_setting").fadeIn()}if(e=="post_soundcloud"){jQuery("#video_setting, #item-bd_google_maps_url").hide();jQuery("#item-bd_soundcloud_url, #item-bd_soundcloud_auto").fadeIn()}if(e=="post_googlemap"){jQuery("#item-bd_soundcloud_url, #item-bd_soundcloud_auto, #video_setting").hide();jQuery("#item-bd_google_maps_url").fadeIn()}if(e=="post_image"||e=="none"||e==""){jQuery("#item-bd_soundcloud_url, #item-bd_soundcloud_auto,#item-bd_google_maps_url,#video_setting").hide()}if(e=="post_slider"||e=="none"||e==""){jQuery("#item-bd_soundcloud_url, #item-bd_soundcloud_auto,#item-bd_google_maps_url,#video_setting").hide()}});
    jQuery('#bd-panel li.trackcommentform, #bd-panel li.ignore_userlevel, #bd-panel li.version, #bd-panel li.msg, #bd-panel li.uastring, #bd-panel li.dlextensions, #bd-panel li.domainorurl, #bd-panel li.position, #bd-panel li.domain, #bd-panel li.ga_token, #bd-panel li.extraseurl, #bd-panel li.gajsurl, #bd-panel li.gfsubmiteventpv, #bd-panel li.trackprefix, #bd-panel li.internallink, #bd-panel li.internallinklabel, #bd-panel li.extrase, #bd-panel li.trackoutbound, #bd-panel li.admintracking, #bd-panel li.trackadsense, #bd-panel li.allowanchor, #bd-panel li.allowlinker, #bd-panel li.rsslinktagging, #bd-panel li.advancedsettings, #bd-panel li.trackregistration, #bd-panel li.theme_updated, #bd-panel li.cv_loggedin, #bd-panel li.cv_authorname, #bd-panel li.cv_category, #bd-panel li.cv_all_categories, #bd-panel li.cv_tags, #bd-panel li.cv_year, #bd-panel li.cv_post_type, #bd-panel li.outboundpageview, #bd-panel li.downloadspageview, #bd-panel li.gajslocalhosting, #bd-panel li.manual_uastring, #bd-panel li.taggfsubmit, #bd-panel li.wpec_tracking, #bd-panel li.shopp_tracking, #bd-panel li.anonymizeip, #bd-panel li.debug, #bd-panel li.firebuglite, #bd-panel li.tracking_popup, #bd-panel li.yoast_tracking, #bd-panel div#trackcommentform, #bd-panel div#ignore_userlevel, #bd-panel div#version, #bd-panel div#msg, #bd-panel div#uastring, #bd-panel div#dlextensions, #bd-panel div#domainorurl, #bd-panel div#position, #bd-panel div#domain, #bd-panel div#ga_token, #bd-panel div#extraseurl, #bd-panel div#gajsurl, #bd-panel div#gfsubmiteventpv, #bd-panel div#trackprefix, #bd-panel div#internallink, #bd-panel div#internallinklabel, #bd-panel div#extrase, #bd-panel div#trackoutbound, #bd-panel div#admintracking, #bd-panel div#trackadsense, #bd-panel div#allowanchor, #bd-panel div#allowlinker, #bd-panel div#rsslinktagging, #bd-panel div#advancedsettings, #bd-panel div#trackregistration, #bd-panel div#theme_updated, #bd-panel div#cv_loggedin, #bd-panel div#cv_authorname, #bd-panel div#cv_category, #bd-panel div#cv_all_categories, #bd-panel div#cv_tags, #bd-panel div#cv_year, #bd-panel div#cv_post_type, #bd-panel div#outboundpageview, #bd-panel div#downloadspageview, #bd-panel div#gajslocalhosting, #bd-panel div#manual_uastring, #bd-panel div#taggfsubmit, #bd-panel div#wpec_tracking, #bd-panel div#shopp_tracking, #bd-panel div#anonymizeip, #bd-panel div#debug, #bd-panel div#firebuglite, #bd-panel div#tracking_popup, #bd-panel div#yoast_tracking').remove();
    jQuery("div.inside > div.bd_c1").wrapAll('<div class="bd_c1_wrapper bd_criteria_wrapper" />');jQuery("div.inside > div.bd_c2").wrapAll('<div class="bd_c2_wrapper bd_criteria_wrapper" />');jQuery("div.inside > div.bd_c3").wrapAll('<div class="bd_c3_wrapper bd_criteria_wrapper" />');jQuery("div.inside > div.bd_c4").wrapAll('<div class="bd_c4_wrapper bd_criteria_wrapper" />');jQuery("div.inside > div.bd_c5").wrapAll('<div class="bd_c5_wrapper bd_criteria_wrapper" />');jQuery("div.inside > div.bd_c6").wrapAll('<div class="bd_c6_wrapper bd_criteria_wrapper" />');var init_rating=jQuery("input#bd_final_score").val();init_percentage=init_rating*20;jQuery("p#bd_final_score_description em").text(init_percentage);var rating_1a=jQuery("input#bd_c1_rating").val();var rating_1b=jQuery("input#bd_c1_description").val();var rating_2a=jQuery("input#bd_c2_rating").val();var rating_2b=jQuery("input#bd_c2_description").val();var rating_3a=jQuery("input#bd_c3_rating").val();var rating_3b=jQuery("input#bd_c3_description").val();var rating_4a=jQuery("input#bd_c4_rating").val();var rating_4b=jQuery("input#bd_c4_description").val();var rating_5a=jQuery("input#bd_c5_rating").val();var rating_5b=jQuery("input#bd_c5_description").val();var rating_6a=jQuery("input#bd_c6_rating").val();var rating_6b=jQuery("input#bd_c6_description").val();jQuery(".bd_add_another_1").click(function(){jQuery(".bd_c1").addClass("enabled");jQuery(".bd_c1_wrapper").fadeIn(1200);jQuery(this).hide(0)});jQuery(".bd_add_another_2").click(function(){jQuery(".bd_c2").addClass("enabled");jQuery(".bd_c2_wrapper").fadeIn(1200);jQuery(this).hide(0)});jQuery(".bd_add_another_3").click(function(){jQuery(".bd_c3").addClass("enabled");jQuery(".bd_c3_wrapper").fadeIn(1200);jQuery(this).hide(0)});jQuery(".bd_add_another_4").click(function(){jQuery(".bd_c4").addClass("enabled");jQuery(".bd_c4_wrapper").fadeIn(1200);jQuery(this).hide(0)});jQuery(".bd_add_another_5").click(function(){jQuery(".bd_c5").addClass("enabled");jQuery(".bd_c5_wrapper").fadeIn(1200);jQuery(this).hide(0)});jQuery(".bd_add_another_6").click(function(){jQuery(".bd_c6").addClass("enabled");jQuery(".bd_c6_wrapper").fadeIn(1200);jQuery(this).hide(0)});
    jQuery("input#bd_c1_rating, input#bd_c2_rating, input#bd_c3_rating, input#bd_c4_rating, input#bd_c5_rating, input#bd_c6_rating").change(function(){var e=0;var t=0;var n=jQuery("input#bd_c1_rating").val();var r=jQuery("input#bd_c2_rating").val();var i=jQuery("input#bd_c3_rating").val();var s=jQuery("input#bd_c4_rating").val();var o=jQuery("input#bd_c5_rating").val();var u=jQuery("input#bd_c6_rating").val();if(n!==""){e=e+1}else{n=0}if(r!==""){e=e+1}else{r=0}if(i!==""){e=e+1}else{i=0}if(s!==""){e=e+1}else{s=0}if(o!==""){e=e+1}else{o=0}if(u!==""){e=e+1}else{u=0}t=parseFloat(n)+parseFloat(r)+parseFloat(i)+parseFloat(s)+parseFloat(o)+parseFloat(u);t=t/e;t=Math.round(t*10)/10;percentage=t*20;jQuery("input#bd_final_score").val(t);jQuery("p#bd_final_score_description em").text(percentage)});jQuery("input#bd_c1_rating").change(function(){var e=jQuery(this).val();percent=e*20;jQuery("em#bd_preview_rating_1").text(" ("+percent+"%)")});jQuery("input#bd_c2_rating").change(function(){var e=jQuery(this).val();percent=e*20;jQuery("em#bd_preview_rating_2").text(" ("+percent+"%)")});jQuery("input#bd_c3_rating").change(function(){var e=jQuery(this).val();percent=e*20;jQuery("em#bd_preview_rating_3").text(" ("+percent+"%)")});jQuery("input#bd_c4_rating").change(function(){var e=jQuery(this).val();percent=e*20;jQuery("em#bd_preview_rating_4").text(" ("+percent+"%)")});jQuery("input#bd_c5_rating").change(function(){var e=jQuery(this).val();percent=e*20;jQuery("em#bd_preview_rating_5").text(" ("+percent+"%)")});jQuery("input#bd_c6_rating").change(function(){var e=jQuery(this).val();percent=e*20;jQuery("em#bd_preview_rating_6").text(" ("+percent+"%)")});

    var linkOptions     = jQuery('#item-bd_post_link_text, #item-bd_post_link_url, #link_options'),
        linkTrigger     = jQuery('#post-format-link'),
        quoteOptions    = jQuery('#item-bd_post_quote_author, #quote_options'),
        quoteTrigger    = jQuery('#post-format-quote'),
        group           = jQuery('#post-formats-select input');

    bd_hide(null);
    group.change( function(){
        $that = jQuery(this);
        bd_hide(null);
        if( $that.val() == 'link' ){
            linkOptions.stop().fadeIn('fast');
        }
        else if( $that.val() == 'quote' ) {
            quoteOptions.stop().fadeIn('fast');
        }
    });

    if(linkTrigger.is(':checked')) linkOptions.stop().fadeIn('fast');
    if(quoteTrigger.is(':checked')) quoteOptions.stop().fadeIn('fast');

    function bd_hide(notThisOne) {
        linkOptions.css('display', 'none');
        quoteOptions.css('display', 'none');
    }
});

// image Uploader Functions
function bd_set_uploader(field, styling ) {
    var bd_bg_uploader;
    jQuery(document).on("click", "#upload_"+field+"_button" , function( event ){
        event.preventDefault();
        bd_bg_uploader = wp.media.frames.bd_bg_uploader = wp.media({
            title: 'Choose Image',
            library: {type: 'image'},
            button: {text: 'Select'},
            multiple: false
        });

        bd_bg_uploader.on( 'select', function() {
            var selection = bd_bg_uploader.state().get('selection');
            selection.map( function( attachment ) {
                attachment = attachment.toJSON();

                if( styling )
                    jQuery('#'+field+'-img').val(attachment.url);
                else
                    jQuery('#'+field).val(attachment.url);

                jQuery('#'+field+'-preview').show();
                jQuery('#'+field+'-preview img').attr("src", attachment.url );
            });
        });
        bd_bg_uploader.open();
    });
}

(function($){var i=function(e){if(!e)var e=window.event;e.cancelBubble=true;if(e.stopPropagation)e.stopPropagation()};$.fn.checkbox=function(f){try{document.execCommand('BackgroundImageCache',false,true)}catch(e){}var g={cls:'jquery-checkbox',empty:'empty.png'};g=$.extend(g,f||{});var h=function(a){var b=a.checked;var c=a.disabled;var d=$(a);if(a.stateInterval)clearInterval(a.stateInterval);a.stateInterval=setInterval(function(){if(a.disabled!=c)d.trigger((c=!!a.disabled)?'disable':'enable');if(a.checked!=b)d.trigger((b=!!a.checked)?'check':'uncheck')},10);return d};return this.each(function(){var a=this;var b=h(a);if(a.wrapper)a.wrapper.remove();a.wrapper=$('<span class="'+g.cls+'"><span class="mark"></span></span>');a.wrapperInner=a.wrapper.children('span:eq(0)');a.wrapper.hover(function(e){a.wrapperInner.addClass(g.cls+'-hover');i(e)},function(e){a.wrapperInner.removeClass(g.cls+'-hover');i(e)});b.css({position:'absolute',zIndex:-1,visibility:'hidden'}).after(a.wrapper);var c=false;if(b.attr('id')){c=$('label[for='+b.attr('id')+']');if(!c.length)c=false}if(!c){c=b.closest?b.closest('label'):b.parents('label:eq(0)');if(!c.length)c=false}if(c){c.hover(function(e){a.wrapper.trigger('mouseover',[e])},function(e){a.wrapper.trigger('mouseout',[e])});c.click(function(e){b.trigger('click',[e]);i(e);return false})}a.wrapper.click(function(e){b.trigger('click',[e]);i(e);return false});b.click(function(e){i(e)});b.bind('disable',function(){a.wrapperInner.addClass(g.cls+'-disabled')}).bind('enable',function(){a.wrapperInner.removeClass(g.cls+'-disabled')});b.bind('check',function(){a.wrapper.addClass(g.cls+'-checked')}).bind('uncheck',function(){a.wrapper.removeClass(g.cls+'-checked')});$('img',a.wrapper).bind('dragstart',function(){return false}).bind('mousedown',function(){return false});if(window.getSelection)a.wrapper.css('MozUserSelect','none');if(a.checked)a.wrapper.addClass(g.cls+'-checked');if(a.disabled)a.wrapperInner.addClass(g.cls+'-disabled')})}})(jQuery);