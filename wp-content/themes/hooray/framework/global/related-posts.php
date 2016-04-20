<?php
global $post, $bd_data;
if( bdayh_get_option( 'article_related' ) ){

    $related_no = bdayh_get_option('article_related_numb') ? bdayh_get_option('article_related_numb') : 3;

    global $bd_count;
    $bd_count = 0;

    $orig_post = $post;

    $query_type = bdayh_get_option('related_query');
    if( $query_type == 'author' ){

        $args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'author'=> get_the_author_meta( 'ID' ));

    } elseif( $query_type == 'tag' ) {

        $tags = wp_get_post_tags( $post->ID );
        $tags_ids = array();
        foreach($tags as $individual_tag) $tags_ids[] = $individual_tag->term_id;
        $args=array('post__not_in' => array($post->ID),'posts_per_page'=> $related_no , 'tag__in'=> $tags_ids );

    } else {

        $categories     = get_the_category( $post->ID );
        $category_ids   = array();
        foreach( $categories as $individual_category ) $category_ids[] = $individual_category->term_id;
        $args=array('post__not_in' => array( $post->ID ),'posts_per_page'=> $related_no , 'category__in'=> $category_ids );

    }
    $related_query = new wp_query( $args );
    if( $related_query->have_posts() ) :
        $count=0;
        ?>
        <div class="single-post-related new-box">
            <div class="box-title">
                <h3>
                    <b><?php _e( 'Related Posts', 'bd' ) ?></b>
                </h3>
                <div class="title-line"></div>
            </div>
            <section id="related-posts">
                <div class="related-re_scroll">

                    <?php
                    $size = 'bd-related-small';
                    if( isset($get_post_meta_fw) &&  bdayh_get_option( 'site_sidebar_position_type', true ) == 'site_sidebar_position_no' ) {
                        $size = 'bd-related';
                    }
                    ?>
                    <?php
                        $coun = 1;
                        while ( $related_query->have_posts() ) : $related_query->the_post(); $bd_count++; ?>

                        <?php if( $coun % 3 == 1 ) { echo '<div class="post-items">'; } ?>

                        <div class="post-item <?php if( $bd_count == 3 ) { echo 'last-column'; $bd_count= 0; }?>" role="article"  <?php if(function_exists( "has_post_thumbnail" ) && has_post_thumbnail()) : ?> style="background-image:url(<?php echo bd_thumb_src( $size ); ?>);" <?php endif; ?>>
                            <a class="boxs-url" href="<?php the_permalink(); ?>" rel="bookmark"></a>
                            <div class="post-caption">
                                <h3 class="post-title"><a href="<?php the_permalink()?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h3><!-- .post-title/-->
                                <div class="post-meta"><span class="meta-date"><?php bd_get_time(); ?></span></div><!-- .post-meta/-->
                            </div><!-- .post-caption/-->
                        </div> <!-- .post -->

                        <?php if( $coun % 3 == 0 ) { echo "</div>\n"; } ?>
                        <?php $coun++;  ?>

                    <?php endwhile;?>

                    <?php if ( $coun % 3 != 1 ) echo "</div>"; ?>

                    <script type="text/javascript">
                        jQuery(document).ready(function() {

                            jQuery(".related-re_scroll .post-item").show();

                            jQuery(function() {
                                jQuery('.related-re_scroll').cycle({
                                    fx:     'scrollHorz',
                                    timeout: 3000,
                                    pager:  '.single-post-related .scroll-nav',
                                    slideExpr: '.post-items',
                                    speed: 300,
                                    slideResize: false,
                                    pause: true
                                });
                            });
                        });

                    </script>

                </div><!-- #related-posts -->
                <div class="clear"></div>
            </section><!-- #related-posts -->

            <div class="scroll-nav"></div>

        </div><!-- .post-related -->
    <?php endif;
    $post = $orig_post;
    wp_reset_query();
}
?>