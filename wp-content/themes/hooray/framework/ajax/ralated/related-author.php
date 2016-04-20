<div class="bdaia-ralated-content bdaia-posts-grid light grid-3col" id="content-more-author">
    <ul class="bdaia-posts-grid-list">
        <?php echo bdaia_related_author(0,get_the_author_meta( 'ID' )); ?>
    </ul>

    <div class="bdayh-clearfix"></div>

    <div class="bdayh-posts-load-wait">
        <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
    </div>

    <div class="bdayh-load-more-btn">
        <div class="bdaia-grid-loadmore-btn">
            <?php
            _e( 'Load More By', LANG );

            $user_id = get_query_var( 'author' );
            $author_name = get_the_author_meta( 'display_name', $user_id );
            if( $author_name !== null )
                echo '&nbsp;' . $author_name;
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery('#content-more-author .bdayh-load-more-btn .bdaia-grid-loadmore-btn').click(function(){
            bdaia_more_author();
        });
    });
    var _bdAuthorPages = 1;
    function bdaia_more_author() {
        _bdAuthorPages+=1;
        jQuery("#content-more-author .bdayh-posts-load-wait").css("display","block");
        jQuery("#content-more-author .bdayh-load-more-btn").css("display","none");
        jQuery.ajax({
            url : "<?php echo admin_url('admin-ajax.php'); ?>",
            type : "POST",
            data : "action=bdaia_related_author_fun&page_no="+_bdAuthorPages+"&user_id=<?php echo get_the_author_meta( 'ID' );?>",
            success: function(data) {
                jQuery("#content-more-author .bdayh-posts-load-wait").css("display","none");
                if (data.trim()!="") {
                    var content = jQuery(data);
                    jQuery("#content-more-author ul.bdaia-posts-grid-list").append(content);
                    jQuery("#content-more-author .bdayh-load-more-btn").css("display","block");
                }
            }
        }, 'html');
        return false;
    }
</script>