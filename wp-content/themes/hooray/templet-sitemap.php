<?php
//Template Name: Sitemap
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

    <div class="bd-container">
        <div class="bd-main">

            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article class="article">
                    <div class="bottom40">

                        <?php
                        the_content();
                        ?>
                        <ul class="sitemap_content">
                            <li class="bottom24">
                                <div class="box-title bottom20"><h2><b><?php _e('Pages','bd'); ?></b></h2></div>
                                <ul class="bd_line_list">
                                    <?php wp_list_pages('title_li='); ?>
                                </ul>
                            </li>

                            <li class="bottom24">
                                <div class="box-title bottom20"><h2><b><?php _e('Categories','bd'); ?></b></h2></div>
                                <ul class="bd_line_list">
                                    <?php wp_list_categories('title_li='); ?>
                                </ul>
                            </li>

                            <li class="bottom24">
                                <div class="box-title bottom20"><h2><b><?php _e('Tags','bd'); ?></b></h2></div>

                                <div class="tagcloud">
                                    <?php $tags = get_tags();
                                    if ($tags)
                                    {
                                        foreach ($tags as $tag)
                                        {
                                            echo '<a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a> ';
                                        }
                                    }
                                    ?>
                                </div>
                            </li>

                            <li>
                                <div class="box-title bottom20"><h2><b><?php _e('Authors','bd'); ?></b></h2></div>
                                <ul class="bd_line_list" >
                                    <?php wp_list_authors('optioncount=1&exclude_admin=0'); ?>
                                </ul>
                            </li>

                        </ul>
                        <?php
                        wp_link_pages();
                        ?>

                    </div>
                </article>
            <?php endwhile; ?>

        </div><!-- .bd-main-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container -->

<?php
get_footer();