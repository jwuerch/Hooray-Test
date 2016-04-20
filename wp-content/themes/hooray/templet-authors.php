<?php
//Template Name: Authors
get_header();
global $bd_data, $post; ?>
    <div class="bd-container">
        <div class="bd-main">

            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
                <article class="article">
                    <div class="post-entry bottom40">
                        <?php the_content(); ?>
                        <ul class="authors-wrap">
                            <?php
                            $users = get_users('blog_id=1&orderby=post_count&order=DESC');
                            foreach ($users as $user)
                            {
                                ?>
                                <li class="post-warpper clear">
                                    <div class="new-box">
                                        <?php bd_author_box( true , true , $user->display_name , $user->ID ); ?>
                                    </div><!-- .new-box /-->
                                </li>
                            <?php } ?>
                        </ul>

                    </div>
                </article>
            <?php endwhile; ?>

        </div><!-- .bd-main-->

        <?php get_sidebar(); ?>
    </div><!-- .bd-container -->

<?php get_footer(); ?>