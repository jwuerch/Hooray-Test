<?php
if( bdayh_get_option( 'check_also' ) )
{
    global $post, $do_not_duplicate;

    $check_also_position = bdayh_get_option( 'check_also_position' ) ? bdayh_get_option( 'check_also_position' ) : 'right';
    $do_not_duplicate[] = $post->ID;
    $query_type = bdayh_get_option( 'check_also_query' );
    $size = 'bd-related-small';
    switch ( $query_type )
    {
        case 'categories' :
            $categories = get_the_category($post->ID);
            $category_ids = array();
            foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
            $args = array(
                'post_status' => 'publish',
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'post__not_in' => $do_not_duplicate,
                'category__in' => $category_ids,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'tags' :
            $tags = wp_get_post_tags($post->ID);
            $tags_ids = array();
            foreach($tags as $individual_tag) $tags_ids[] = $individual_tag->term_id;
            $args = array(
                'post_status' => 'publish',
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'post__not_in' => $do_not_duplicate,
                'tag__in' => $tags_ids,
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;

        case 'author' :
            $args = array(
                'post_status' => 'publish',
                'post_type'      => 'post',
                'posts_per_page' => 1,
                'post__not_in' => $do_not_duplicate,
                'author' => get_the_author_meta( 'ID' ),
                'ignore_sticky_posts' => true,
                'no_found_rows' => true,
                'cache_results' => false
            );
            break;
    }
    $query = new WP_Query( $args );

    if( $query->have_posts() ) : ?>
            <section id="bdCheckAlso" class="bdCheckAlso-<?php echo $check_also_position ?>">
                <div class="box-title">
                    <h3>
                        <b><?php _e('Check Also', LANG); ?></b>
                    </h3>

                    <div class="title-linee"></div>
                    <a href="#" id="check-also-close"><i class="fa fa-close"></i></a>
                </div>

                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="check-also-post">
                        <?php if (function_exists("has_post_thumbnail") && has_post_thumbnail()) : ?>
                            <figure
                                class="check-also-thumb"  style="background-image:url(<?php echo bd_thumb_src($size); ?>);">
                            </figure>
                        <?php endif; ?>

                        <h2 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

                        <p><?php bd_check_slso(); ?></p>
                    </div>
                <?php endwhile; ?>
            </section>
        <?php
    endif;
    wp_reset_query();
}
?>