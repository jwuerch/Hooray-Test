jQuery(document).ready(function($) { "use strict",

    $window     = jQuery(window);
    $pos_id     = jQuery('.post-id');
    $wrapper    = jQuery("body");

    /**
     * Main JS
     * ----------------------------------------------------------------------------- *
     */
    initTabGroup();
    bd_ss();
    jQuery('.lightbox').lightbox();

    jQuery("#respond").addClass("new-box");
    jQuery('input, textarea').placeholder();
    jQuery("#container-grid").css({"visibility": "visible"});
    $wrapper.fitVids();
    jQuery(".prev, .nxt, .flex-next, .flex-prev").click(function(event){ event.preventDefault(); });

    /**
     * Lazy Load.
     * ----------------------------------------------------------------------------- *
     */
    if( bd.bd_lazyload ) {
        jQuery("img.lazy").lazyload();
    }


    /**
     * Login Popup
     * ----------------------------------------------------------------------------- *
     */
    jQuery('.login-pp a').magnificPopup({
        type: 'inline',
        fixedContentPos: true,
        fixedBgPos: true,
        overflowY: 'auto',
        closeBtnInside: true,
        preloader: false,
        midClick: true,
        removalDelay: 300,
        mainClass: 'my-mfp-zoom-in'
    });

    /**
     * Go Top
     * ----------------------------------------------------------------------------- *
     */
    var bdGoTopOffset      = 220;
    var bdGoTopDuration    = 500;
    $bdGoTopClass     = jQuery('.gotop');
    $window.scroll(function() {
        if (jQuery(this).scrollTop() > bdGoTopOffset){
            $bdGoTopClass.css({ opacity: "1", bottom: "5px" });
        }
        else {
            $bdGoTopClass.css({ opacity: "0", bottom: "-45px" });
        }
    });
    $bdGoTopClass.click(function(event){
        event.preventDefault();
        jQuery( "html, body" ).animate( {scrollTop: 0}, bdGoTopDuration );
        return false;
    });


    /**
     * Mobile Menu
     * ----------------------------------------------------------------------------- *
     */
    jQuery(".bd-ClickAOpen").click(function() {
        $bd_page        = jQuery('#page');
        $bd_body        = jQuery('body');
        $bd_MMClass     = jQuery('#bd-MobileSiderbar');
        $bd_MMClickOpen = jQuery('.bd-ClickAOpen');

        if( jQuery(this).hasClass( "bd-ClickAOpen" )) {

            $bd_page.css( {overflow:"hidden"} );
            $bd_body.addClass( 'js-nav' );
            $bd_MMClass.addClass( 'bd-MobileSiderbarShow' );
            jQuery(this).removeClass('bd-ClickAOpen').addClass('bd-ClickAClose');

            return false;
        }
        else if( jQuery(this).hasClass( "bd-ClickAClose" ) ) {

            $bd_page.css({overflow:"auto"});
            $bd_body.removeClass( 'js-nav' );
            $bd_MMClass.removeClass( 'bd-MobileSiderbarShow' );
            jQuery(this).removeClass('bd-ClickAClose').addClass('bd-ClickAOpen');

            return false;
        }
    });

    // Add Mobile Menu item icon
    jQuery( "#bd-MobileSiderbar #mobile-menu .menu-item-has-children" ).append( '<i class="mobile-arrows fa fa-chevron-down"></i>' );
    jQuery(document).on("click", "#mobile-menu .menu-item-has-children i.mobile-arrows", function()
    {
        if( jQuery(this).hasClass( "fa-chevron-down" ) ) {
            jQuery(this).removeClass("fa-chevron-down").addClass("fa-chevron-up");
        }
        else {
            jQuery(this).removeClass("fa-chevron-up").addClass("fa-chevron-down");
        }
        jQuery(this).parent().find('ul:first').toggle();
    });


    /**
     * Check Also
     * ----------------------------------------------------------------------------- *
     */
    var $bdCheckAlso = jQuery("#bdCheckAlso");
    $bdCheckAlsoRight  = jQuery(".bdCheckAlso-right");

    if( !bdayh_isMobile.any() && bd.is_singular && $bdCheckAlso.length > 0 )
    {
        var articleOffset = $pos_id.offset().top + ( $pos_id.outerHeight()/2 );
        var bdCheckAlsoClosed = false;

        if( $window.width() <= 1120 ) {
            $bdCheckAlso.hide()
        }
        else {
            $bdCheckAlso.show()
        }

        $window.resize(function(e){
            if( $window.width() <= 1120 ){
                $bdCheckAlso.hide()
            }
            else {
                $bdCheckAlso.show()
            }
        });

        $window.scroll(function() {
            if( ! bdCheckAlsoClosed ) {
                if ($window.scrollTop() > articleOffset) {
                    if ($bdCheckAlsoRight.length) {
                        //$bdCheckAlso.css({'opacity': '1', 'right': '0'}, 300);
                        $bdCheckAlso.addClass("bdCheckAlsoShow");
                    }
                    else {
                        //$bdCheckAlso.css({'opacity': '1', 'left': '0'}, 300);
                        $bdCheckAlso.addClass("bdCheckAlsoShow");
                    }
                }
                else if ($window.scrollTop() <= articleOffset) {
                    if ($bdCheckAlsoRight.length) {
                        //$bdCheckAlso.css({'opacity': '0', 'right': '-350px'}, 300);
                        $bdCheckAlso.removeClass("bdCheckAlsoShow");
                    }
                    else {
                        //$bdCheckAlso.css({'opacity': '0', 'left': '-350px'}, 300);
                        $bdCheckAlso.removeClass("bdCheckAlsoShow");
                    }
                }
            }
        });

        jQuery("#check-also-close").click(function(){
            $bdCheckAlso.removeClass("bdCheckAlsoShow");
            bdCheckAlsoClosed = true ;
            return false;
        });
    }


    /**
     * Reading Post
     * ----------------------------------------------------------------------------- *
     */
    if( !bdayh_isMobile.any() && bd.is_singular && bd.post_reading_position_indicator ) {

        /*
        var getMax = function () {
            return jQuery(document).height() - jQuery(window).height() - jQuery('#bdayhFooter').height();
        };

        var getValue = function () {
            return jQuery(window).scrollTop();
        };

        if ( 'max' in document.createElement('progress') ) {
            var progressBar = jQuery( '#reading-position-indicator' ),
                max = getMax(),
                value, width;

            var getWidth = function () {
                value = getValue();
                width = (value / max) * 100;
                width = width + '%';
                return width;
            };

            var setWidth = function () {
                progressBar.css({width: getWidth()});
            };

            jQuery(document).on('scroll', setWidth);
            jQuery(window).on('resize', function () {
                max = getMax();
                setWidth();
            });
        }
        */

        var reading_content = jQuery('.bdMain .post' );
        if( reading_content.length > 0 )
        {
            reading_content.imagesLoaded(function()
            {
                var content_height	= reading_content.height();
                window_height	= jQuery(window).height();
                jQuery(window).scroll(function() {
                    var percent 		= 0,
                        content_offset	= reading_content.offset().top;
                    window_offest	= jQuery(window).scrollTop();

                    if (window_offest > content_offset) {
                        percent = 100 * (window_offest - content_offset) / (content_height - window_height);
                    }
                    jQuery('#reading-position-indicator').css('width', percent + '%');
                });
            });
        }
    }


    /**
     * YouTube z-index fix
     * ----------------------------------------------------------------------------- *
     */
    jQuery('iframe[src*="youtube.com"]').each(function() {
        var url = jQuery(this).attr('src');
        if (jQuery(this).attr('src').indexOf('?') > 0) {
            jQuery(this).attr({
                'src'   : url + '&wmode=transparent',
                'wmode' : 'Opaque'
            });
        } else {
            jQuery(this).attr({
                'src'   : url + '?wmode=transparent',
                'wmode' : 'Opaque'
            });
        }
    });


    /**
     * Related Height
     * ----------------------------------------------------------------------------- *
     */
    jQuery(window).smartresize(function(){
        jQuery(".related-re_scroll").each(function(i, el) {
            var he = jQuery(this).find( '.post-item:first-child' ).height();
            jQuery(this).height( he );
        });
    });


    /**
     * Loading
     * ----------------------------------------------------------------------------- *
     */
    jQuery(window).bind("load", function() {
        loadComplete();
        jQuery(window).resize();
    });

    setTimeout(function(){loadComplete();}, 6000);

    /**
     * Menu Search Overlay
     * ----------------------------------------------------------------------------- *
     */
    var $trigger  = jQuery('.bdayh-main-menu-search');
    var $formWrap = jQuery('.bdayh-searchform-overlay');
    var $input    = $formWrap.find('.search-text');
    var escKey    = 27;

    function clearSearch() {
        $formWrap.toggleClass('in');
        setTimeout(function() { $input.val(''); }, 350);
    }

    $trigger.on('touchstart click', function(e) {
        e.preventDefault();
        $formWrap.toggleClass('in');
        $input.focus();
    });

    $formWrap.on('touchstart click', function(e) {
        if ( ! jQuery(e.target).hasClass('search-text') ) {
            clearSearch();
        }
    });

    jQuery(document).keydown(function(e) {
        if ( e.which === escKey ) {
            if ( $formWrap.hasClass('in') ) {
                clearSearch();
            }
        }
    });

    /**
     * Sticky navigation
     * ----------------------------------------------------------------------------- *
     */
    var stickySidebarTop = 0;
    if ( !bdayh_isMobile.any() ) {
        if ($window.width() > 1000) {
            if (jQuery('body').hasClass('sticky-nav-on')) {

                $bd_nav = jQuery('#navigation');
                $bd_wpadminbar = jQuery('#wpadminbar');

                if ($bd_wpadminbar.length) {
                    stickySidebarTop = 82;
                }
                else {
                    stickySidebarTop = 50;
                }

                jQuery('.header').imagesLoaded(function () {
                    var bd_above_Height = jQuery('.header').outerHeight();

                    $window.scroll(function () {
                        if ($window.scrollTop() > bd_above_Height) {
                            if ($bd_wpadminbar.length) {
                                $bd_nav.addClass('sticky-nav').css('top', '32px');
                            }
                            else {
                                $bd_nav.addClass('sticky-nav').css('top', '0');
                            }
                        }
                        else {
                            $bd_nav.removeClass('sticky-nav').css('top', 0);
                        }
                    });
                });
            }
        }
    }


    /**
     * Sticky Sidebar
     * ----------------------------------------------------------------------------- *
     */
    if ( !bdayh_isMobile.any() && bd.sticky_sidebar ) {
        jQuery( '.theia_sticky' ).theiaStickySidebar({"containerSelector":".bd-main","additionalMarginTop": stickySidebarTop });
    }


    /**
     * Gallery Popup
     * ----------------------------------------------------------------------------- *
     */
    jQuery( 'figure.wp-caption,  figure.gallery-item' ).each(function(){
        var caption_text = jQuery(this).children('figcaption').html();
        jQuery(this).children('a').data('caption', caption_text);
    });

    jQuery( '.post' ).each(function() {
        jQuery(this).magnificPopup({
            delegate: '.gallery-item a, figure.wp-caption a',
            type: 'image',
            tLoading: 'Loading ...',
            mainClass: 'mfp-img-mobile',
            gallery: { enabled: true },
            image:{
                tError: "<a href=\'%url%\'>The image #%curr%</a> could not be loaded.",
                titleSrc: function(item) {
                    var current_caption_bd = jQuery(item.el).data('caption');
                    if (typeof current_caption_bd != "undefined") {
                        return current_caption_bd;
                    } else {
                        return '';
                    }
                }
            },
            zoom: {
                enabled: true,
                duration: 300,
                opener: function(element) {
                    return element.find('img');
                }
            }
        });
    });


    /**
     * Criteria Percent
     * ----------------------------------------------------------------------------- *
     */
    setTimeout(function(){
        jQuery('.bd-criteria-percent .bd-criteria-percentage').each(function(){
            var me = jQuery(this);
            var perc = me.attr("data-percentage");
            var current_perc = 0;
            var progress = setInterval(function(){
                if (current_perc>=perc){ clearInterval(progress); }
                else { current_perc +=1; me.css('width', (current_perc)+'%'); }
                me.text((current_perc)+'%');
            }, 10);
        });
    },10);


    /**
     * Shortcodes toggle
     * ----------------------------------------------------------------------------- *
     */
    jQuery('div.toggle h4').click(function () {
        var text = jQuery(this).siblings('div.panel');
        if (text.is(':hidden')) {
            text.slideDown('200');
            jQuery(this).siblings('span').html('-');
        } else {
            text.slideUp('200');
            jQuery(this).siblings('span').html('+');
        }
    });


    /**
     * Tipsy
     * ----------------------------------------------------------------------------- *
     */
    jQuery('.ttip').tipsy({fade: true, gravity: 's'});
    jQuery('.tooldown, .tooltip-s').tipsy({fade: true, gravity: 'n'});
    jQuery('.tooltip-nw').tipsy({fade: true, gravity: 'nw'});
    jQuery('.tooltip-ne').tipsy({fade: true, gravity: 'ne'});
    jQuery('.tooltip-w').tipsy({fade: true, gravity: 'w'});
    jQuery('.tooltip-e').tipsy({fade: true, gravity: 'e'});
    jQuery('.tooltip-sw').tipsy({fade: true, gravity: 'w'});
    jQuery('.tooltip-se').tipsy({fade: true, gravity: 'e'});


    /**
     * Top Navigation Select
     * ----------------------------------------------------------------------------- *
     */
    jQuery("<select />").appendTo("#top-navigation");jQuery("<option />",{selected:"selected",value:"",text:js_local_vars.dropdown_goto}).appendTo("#top-navigation select");jQuery("#top-navigation li").each(function(){var e=jQuery(this).parents("ul").length-1;var t="";if(e>0){t=" - "}if(e>1){t=" - - "}if(e>2){t=" - - -"}if(e>3){t=" - - - -"}var n=jQuery(this).children("a");jQuery("<option />",{value:n.attr("href"),text:t+n.text()}).appendTo("#top-navigation select")});jQuery("#top-navigation select").change(function(){window.location=jQuery(this).find("option:selected").val()});


    /**
     * Navigation Select
     * ----------------------------------------------------------------------------- *
     */
    jQuery("<select />").appendTo("#navigation");jQuery("<option />",{selected:"selected",value:"",text:js_local_vars.dropdown_goto}).appendTo("#navigation select");jQuery("#navigation li").each(function(){var e=jQuery(this).parents("ul").length-1;var t="";if(e>0){t=" - "}if(e>1){t=" - - "}if(e>2){t=" - - -"}if(e>3){t=" - - - -"}var n=jQuery(this).children("a");jQuery("<option />",{value:n.attr("href"),text:t+n.text()}).appendTo("#navigation select")});jQuery("#navigation select").change(function(){window.location=jQuery(this).find("option:selected").val()});
});


/**
 * Loading
 * ----------------------------------------------------------------------------- *
 */
function loadComplete() {
    jQuery('#loading').remove();
    jQuery('.bd-blog-masonry').removeClass('loading');
}


/**
 * Tabs Shortcodes
 * ----------------------------------------------------------------------------- *
 */
function initTabGroup(e) {
    if(typeof e === 'undefined'){
        e = document;
    }
    if (jQuery('.tabgroup', jQuery(e)).length) {
        jQuery('.tabgroup', jQuery(e)).tabs().show();
    }
}