<section id="bdaia-latest" class="bdaia-posts-grid light grid-5col">

    <div class="bdayh-row">
        <header class="bdaia-section-head bdaia-posts-grid-head">
            <h2>Latest news</h2>
        </header>

        <ul class="bdaia-posts-grid-list">

            <?php if ( have_posts() ) : ?>

                <?php
                // Start the loop.
                while ( have_posts() ) : the_post();

                    get_template_part( 'framework/loop/latest' );

                endwhile;

                wp_reset_postdata();

                echo '<div class="bdayh-clearfix"></div>';

            else :

                get_template_part( 'framework/loop/not-found' );

            endif;
            ?>

        </ul>
    </div>

</section>