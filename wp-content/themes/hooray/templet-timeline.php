<?php
//Template Name: Timeline
get_header();
global $bd_data, $post; ?>


    <div class="bdayh-page-title-bar">
        <div class="bd-container">
            <div class="bdayh-page-title-wrapper">
                <div class="bdayh-page-title-captions">
                    <h1>
                        <?php the_title();?>
                    </h1>
                </div>

                <div class="bdayh-page-title-secondary">
                    <div class="entry-crumbs">
                        <?php breadcrumb_bd(); ?>
                    </div><!-- .entry-crumbs -->
                </div>
            </div>
        </div>
    </div><!-- .bdayh-page-title-bar /-->

    <div class="bd-container">
        <div class="bd-main">

            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>">
                    <div class="entry-content bottom40">
                        <?php

                        the_content();

                        $where          = apply_filters( 'getarchives_where', "WHERE post_type = 'post' AND post_status = 'publish'" );
                        $join           = apply_filters( 'getarchives_join', '' );
                        $query          = "SELECT YEAR(post_date) AS `year`, count(ID) as posts FROM $wpdb->posts $join $where GROUP BY YEAR(post_date) ORDER BY post_date DESC";
                        $key            = md5($query);
                        $cache          = wp_cache_get( 'wp_get_archives' , 'general');

                        if ( !isset( $cache[ $key ] ) )
                        {
                            $arcresults         = $wpdb->get_results($query);
                            $cache[ $key ]      = $arcresults;
                            wp_cache_set( 'wp_get_archives', $cache, 'general' );
                        }
                        else
                        {
                            $arcresults         = $cache[ $key ];
                        }

                        if ($arcresults)
                        {
                            foreach ( (array) $arcresults as $arcresult)
                            {
                                ?>
                                <h2 class="timeline-title"><b class="btn"><?php echo $arcresult->year ?></b></h2>
                                <?php $query = new WP_Query( array( 'year' => $arcresult->year , 'posts_per_page' => -1 ) ); ?>
                                <ul class="timeline-list">
                                    <?php while ( $query->have_posts() ) : $query->the_post()?>
                                        <li class="timeline-item">
                                            <div class="timeline-date"><span><?php the_time(get_option('date_format')); ?></span></div>
                                            <div class="timeline-link"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'bd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></div>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>

                                <div class="clear bottom24"> </div>
                            <?php
                            }
                        }
                        wp_link_pages();
                        ?>
                    </div>
                </div>
            <?php endwhile; ?>

        </div><!-- .bd-main-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container -->

<?php get_footer(); ?>