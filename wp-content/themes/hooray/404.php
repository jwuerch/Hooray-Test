<?php get_header(); ?>

    <div class="bd-container post_full_width">
        <div class="bd-main">

            <div class="page-head">
                <div class="page-title">
                    <h1 class="na">
                        <?php _e( 'Ooops ! Error 404', LANG ); ?>
                    </h1>
                    <div>
                        <i class="fa fa-coffee"></i>
                    </div>
                    <h4 class="error-message"><?php _e('Sorry, the page you were looking for was not found', LANG ); ?></h4>
                </div>
                <div class="cf"></div>

                <div class="new-box">
                <div class="box-title">
                    <h3>
                        <?php _e( 'Maybe do a search', LANG ) ?>
                    </h3>
                    <div class="title-line"></div>
                </div><!-- .title-bd -->

                <div class="search-form">
                    <?php get_search_form(); ?>
                </div><!--- .search-form -->
                </div><!-- .new-box -->

            </div>

        </div><!-- .bd-main-->
    </div><!-- .bd-container -->

<?php get_footer(); ?>
