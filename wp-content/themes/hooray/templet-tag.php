<?php
//Template Name: Tags
get_header();
global $bd_data; ?>

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

    <div class="bd-container <?php echo $post_po; echo $post_full; ?>">
        <div class="bd-main">

            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article class="article">
                    <div class="tagcloud bottom40">
                        <?php
                        the_content();
                        $args = array(
                            'smallest'                  => 8,
                            'largest'                   => 22,
                            'unit'                      => 'pt',
                            'number'                    => 0);
                        wp_tag_cloud( $args );
                        wp_link_pages();
                        ?>

                    </div>
                </article>
            <?php endwhile; ?>

        </div><!-- .bd-main-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container -->

<?php get_footer(); ?>