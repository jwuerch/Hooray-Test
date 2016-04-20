
<?php
global $post;
$categories     = get_the_category( $post->ID );
$category_ids   = array();
foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id; ?>

<div class="bdaia-ralated-content bdaia-posts-grid light grid-3col" id="content-more-cat">
    <ul class="bdaia-posts-grid-list">
        <?php echo bdaia_related_cat( 0, $category_ids[0] ); ?>
    </ul>

    <div class="bdayh-clearfix"></div>

    <div class="bdayh-posts-load-wait">
        <div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>
    </div>

    <div class="bdayh-load-more-btn">
        <div class="bdaia-grid-loadmore-btn">
            <?php
            _e( 'Load More In', LANG );

            global $post;
            $categories     = get_the_category( $post->ID );
            $category_ids   = array();
            foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;

            echo '&nbsp;' . get_cat_name( $category_ids[0] );
            ?>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        jQuery('#content-more-cat .bdayh-load-more-btn .bdaia-grid-loadmore-btn').click(function(){
            bdaia_more_cat();
        });
    });
    var _bdCatPages = 1;
    function bdaia_more_cat() {
        _bdCatPages+=1;
        jQuery("#content-more-cat .bdayh-posts-load-wait").css("display","block");
        jQuery("#content-more-cat .bdayh-load-more-btn").css("display","none");
        jQuery.ajax({
            url : "<?php echo admin_url('admin-ajax.php'); ?>",
            type : "POST",
            data : "action=bdaia_related_cat_fun&page_no="+_bdCatPages+"&cat_id=<?php echo $category_ids[0];?>",
            success: function(data) {
                jQuery("#content-more-cat .bdayh-posts-load-wait").css("display","none");
                if (data.trim()!="") {
                    var content = jQuery(data);
                    jQuery("#content-more-cat ul.bdaia-posts-grid-list").append(content);
                    jQuery("#content-more-cat .bdayh-load-more-btn").css("display","block");
                }
            }
        }, 'html');
        return false;
    }
</script>