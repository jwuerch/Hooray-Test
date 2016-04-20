<section id="bdaia-latest" class="bdaia-posts-grid light grid-5col">

    <div class="bdayh-row">

        <?php $bdaia_latest_news_headline = bdayh_get_option( 'bdaia_latest_news_headline' ); ?>

        <?php if( $bdaia_latest_news_headline ) { ?>
            <header class="bdaia-section-head bdaia-posts-grid-head">
                <h2><?php echo $bdaia_latest_news_headline; ?></h2>
            </header>
        <?php } ?>

        <ul class="bdaia-posts-grid-list">

            <?php echo bdaia_latest(0); ?>

        </ul>

    </div>

    <?php if( bdayh_get_option( 'bdaia_latest_news_pagination' ) == 'loadmore' ) { ?>

        <div class="bdayh-clearfix"></div>

        <div class="bdayh-posts-load-wait">
            <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
        </div>

        <div class="bdayh-load-more-btn">
            <div class="bdaia-grid-loadmore-btn">
                <?php _e( 'Load More Posts', LANG ); ?>
            </div>
        </div>

    <?php } ?>

</section>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery('.bdayh-load-more-btn .bdaia-grid-loadmore-btn').click(function(){
            bdayhLoadMore();
        });
    });
    var _bdPages = 1;
    function bdayhLoadMore() {
        _bdPages+=1;
        jQuery(".bdayh-posts-load-wait").css("display","block");
        jQuery(".bdayh-load-more-btn").css("display","none");
        jQuery.ajax({
            url : "<?php echo admin_url('admin-ajax.php'); ?>",
            type : "POST",
            data : "action=bdaia_latestM&page_no="+_bdPages,
            success: function(data) {
                jQuery(".bdayh-posts-load-wait").css("display","none");
                if (data.trim()!="") {
                    var content = jQuery(data);
                    jQuery("#bdaia-latest ul.bdaia-posts-grid-list").append(content);
                    jQuery(".bdayh-load-more-btn").css("display","block");
                }
            }
        }, 'html');
        return false;
    }
</script>