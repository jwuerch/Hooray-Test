<div class="bd-container">

    <div class="bd-main">

	    <?php get_template_part( 'framework/global/slider' ); ?>

        <div class="blog-v1 blog-v">
            <div id="content" class="bdayh-blog-standard">

                <main id="site-main" class="site-main bdayh-def" role="main">
                    <?php echo bdayhBlogScroll(0); ?>
                </main>

                <div class="bdayh-posts-load-wait">
                    <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
                </div>

                <div class="bdayh-load-more-btn">
                    <span class="bdaia-grid-loadmore-btn">
                        <?php _e( 'Load More Posts', LANG ); ?>
                    </span>
                </div>

            </div><!-- #content /-->

        </div>
    </div><!-- .bd-main /-->

    <?php
    //GET Sidebar.
    get_sidebar(); ?>

</div>
<script type="text/javascript">
<?php if( bdayh_get_option( 'bdayhTemplateStandardPagination' ) == 'infinite' ){ ?>
var count = 2;
var total = <?php global $bdayh_num_post; echo $bdayh_num_post; ?>;
jQuery(window).on("scroll", function() {
    var footer_place = (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - jQuery( '#bdayhFooter' ).height());
    if(footer_place){

        if(count>total){
            return false;
        }
        else{
            bdayhBlogStandardLoadMore();
        }
        count++;
    }
});
<?php } ?>
jQuery(document).ready(function($) {
    jQuery('.bdayh-load-more-btn span').click(function(){
        bdayhBlogStandardLoadMore();
    });
});
var _bdBlogStandardPages = 1;
function bdayhBlogStandardLoadMore() {
    _bdBlogStandardPages+=1;
    jQuery(".bdayh-posts-load-wait").css("display","block");
    jQuery(".bdayh-load-more-btn").css("display","none");
    jQuery.ajax({
        url : "<?php echo admin_url('admin-ajax.php'); ?>",
        type : "POST",
        data : "action=bdayhBlogScrollM&page_no="+_bdBlogStandardPages,
        success: function(data) {
            jQuery(".bdayh-posts-load-wait").css("display","none");
            if (data.trim()!="") {
                var content = jQuery(data);
                content.fitVids();
                content.each(function(index){
                    if(jQuery().mediaelementplayer){
                        jQuery(this).find('.wp-audio-shortcode, .wp-video-shortcode').mediaelementplayer();
                    }
                });
                jQuery("#site-main").append(content);
                jQuery(".bdayh-load-more-btn").css("display","block");
            }
        }
    }, 'html');
    return false;
}
</script>