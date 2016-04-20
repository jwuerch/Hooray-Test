<div class="bd-container">
	<div class="bd-main">

		<div id="bdayh-classic-v1" class="bdayh-classic-v1">
			<main id="site-main" class="site-main" role="main">
				<?php echo bdayh_blog_list(0); ?>
			</main>
			<div class="bdayh-posts-load-wait">
				<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
			</div>

			<div class="bdayh-load-more-btn">
				<span class="bdaia-grid-loadmore-btn">
					<?php _e( 'Load More', LANG ); ?>
				</span>
			</div>
		</div><!-- .bdayh-classic-v1 /-->
	</div><!-- .bd-main /-->

	<?php get_sidebar(); ?>
</div><!-- .bd-container /-->
<script type="text/javascript">
	<?php if( bdayh_get_option( 'bdayhTemplateListPagination' ) == 'infinite' ){ ?>
	var count = 2;
	var total = <?php global $bdayh_num_post; echo $bdayh_num_post; ?>;

	jQuery(window).on("scroll", function() {
		var footer_place = (jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - jQuery( '#bdayhFooter' ).height());
		if(footer_place){

			if(count>total){
				return false;
			}
			else{
				bdayhBlogClassicLoadMore();
			}
			count++;
		}
	});
	<?php } ?>
	jQuery(document).ready(function($) {
		jQuery('.bdayh-load-more-btn span').click(function(){
			bdayhBlogClassicLoadMore();
		});
	});
	var _bdBlogClassicPages = 1;
	function bdayhBlogClassicLoadMore() {
		_bdBlogClassicPages+=1;
		jQuery(".bdayh-posts-load-wait").css("display","block");
		jQuery(".bdayh-load-more-btn").css("display","none");
		jQuery.ajax({
			url : "<?php echo admin_url('admin-ajax.php'); ?>",
			type : "POST",
			data : "action=bdayh_blog_listM&page_no="+_bdBlogClassicPages,
			success: function(data) {
				jQuery(".bdayh-posts-load-wait").css("display","none");
				if (data.trim()!="") {
					var content = jQuery(data);
					jQuery("#site-main").append(content);
					jQuery(".bdayh-load-more-btn").css("display","block");
				}
			}
		}, 'html');
		return false;
	}
</script>