<?php
function bdayhMasonryLoadmore( $cols = "2cols" ){
    ?>
    <div class="bd-container bd-blog-masonry loading">
        <div class="bd-main">

	        <?php get_template_part( 'framework/global/slider' ); ?>

            <div class="blog-v1 blog-v">
                <div id="containn" class="bdayh-blog-standard">

                    <div id="content" class="posts-gird">
                        <main id="site-main" class="site-main" role="main">

                            <div id="container-grid" class="blog-masonry filterable-posts posts-gird-<?php echo $cols ?>" data-cols="<?php echo $cols ?>">
                                <?php echo bdayh_blog_masonry(0); ?>
                            </div>
                        </main>
                    </div><!-- #content /-->

                    <div id="loading">
                        <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
                    </div>

                </div>
            </div>

            <div class="bdayh-posts-load-wait">
                <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
            </div>

	        <div class="bdayh-load-more-btn">
                    <span class="bdaia-grid-loadmore-btn">
                        <?php _e( 'Load More Posts', LANG ); ?>
                    </span>
	        </div>
        </div><!-- .bd-main /-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container /-->
    <script type="text/javascript">
        <?php if( bdayh_get_option( 'bdayhTemplateMasonryPagination' ) == 'infinite' ){ ?>
        var count = 2;
        var total = <?php global $bdayh_num_post; echo $bdayh_num_post; ?>;
        jQuery(window).on("scroll", function() {
            var footer_place = (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - jQuery( '#bdayhFooter' ).height());
            if(footer_place){

                if(count>total){
                    return false;
                }
                else{
                    bdayhBlogMasonryLoadMore();
                }
                count++;
            }
        });
        <?php } ?>
        jQuery(document).ready(function($) {
            jQuery('.bdayh-load-more-btn span').click(function(){
                bdayhBlogMasonryLoadMore();
            });
        });

        var _bdBlogMasonryPages = 1;
        function bdayhBlogMasonryLoadMore() {
            _bdBlogMasonryPages+=1;
            jQuery(".bdayh-posts-load-wait").css("display","block");
            jQuery(".bdayh-load-more-btn").css("display","none");
            jQuery.ajax({
                url : "<?php echo admin_url('admin-ajax.php'); ?>",
                type : "POST",
                data : "action=bdayh_blog_masonryM&page_no="+_bdBlogMasonryPages,
                success: function(data) {
                    jQuery(".bdayh-posts-load-wait").css("display","none");
                    if (data.trim()!="") {
                        var content = jQuery(data);
                        content.fitVids();

	                    jQuery('#container-grid').append( content ).isotope( 'appended', content, function() {
		                    jQuery('#main-content #grid').isotope('layout');
		                    jQuery(window).resize();
	                    });

	                    jQuery(content).imagesLoaded(function() {
		                    jQuery('#main-content #grid').isotope('layout');
		                    jQuery(window).resize();
	                    });

	                    jQuery(window).resize();
	                    jQuery(".bdayh-load-more-btn").css("display","block");
                    }
                }
            }, 'html');
            return false;
        }
    </script>
    <?php
}
?>