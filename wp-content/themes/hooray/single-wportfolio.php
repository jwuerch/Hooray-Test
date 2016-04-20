<?php
get_header();
global $bd_data;

setPostViews( get_the_ID() );
wp_reset_query();
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
query_posts( $query_string.'&paged='.$paged );

/*
 *  Project info
 */
global $post;
$project_url            = get_post_meta($post->ID, 'new_bd_project_url', true);
$project_url_text       = get_post_meta($post->ID, 'new_bd_project_url_text', true);
$copy_url               = get_post_meta($post->ID, 'new_bd_copy_url', true);
$copy_url_text          = get_post_meta($post->ID, 'new_bd_copy_url_text', true);
$address                = get_post_meta($post->ID, 'new_bd_address', true);
$phone                  = get_post_meta($post->ID, 'new_bd_phone', true);
$hos                    = get_post_meta($post->ID, 'new_bd_hours_of_service', true);
$mail                   = get_post_meta($post->ID, 'new_bd_mail', true);
$site                   = get_post_meta($post->ID, 'new_bd_site', true); ?>

<div class="folio-container bd-blog-masonry">
    <div id="folio-main">
        <div class="bd-container">
            <div class="folio-single">
            <?php if(have_posts()): the_post(); ?>
                <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
                    <div class="folio-media theiaa_sticky">
                        <div class="new-box">

                            <?php
                            ## Featured.
                            if( get_post_meta( get_the_ID(), 'new_bd_wportfolio_post_type', true ) )
                            {
                                $post_type = get_post_meta( get_the_ID(), 'new_bd_wportfolio_post_type', true );

                                if($post_type == 'post_image'){
                                    bd_home_img( $size = 'bd-gallery-grid' );
                                }

                                elseif($post_type == 'post_slider'){
                                    bd_wp_gallery( $img_w ='800', $img_h='500', $size = 'bd-gallery-grid' );
                                }

                                elseif($post_type == 'post_video'){

                                    $img_w          = '770';
                                    $img_h          = '500';
                                    $type           = get_post_meta( get_the_ID(), 'new_bd_wportfolio_video_type', true );
                                    $id             = get_post_meta( get_the_ID(), 'new_bd_video_url', true );

                                    if($type == 'youtube'){
                                        echo '<div class="post-image video-box"><iframe src="http://www.youtube.com/embed/'. $id .'?rel=0" frameborder="0" allowfullscreen></iframe></div>'."\n";
                                    }

                                    elseif($type == 'vimeo') {
                                        echo '<div class="post-image video-box"><iframe src="http://player.vimeo.com/video/'. $id .'?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>'."\n";
                                    }

                                    elseif($type == 'daily') {
                                        echo '<div class="post-image video-box"><iframe frameborder="0" src="http://www.dailymotion.com/embed/video/'. $id .'?logo=0"></iframe></div>'."\n";
                                    }
                                }
                            }
                            ?>

                        <?php if( bdayh_get_option( 'folio_social_sharing' ) ) { ?>
                            <div class="home-post-share">
                                <br />
                                <?php
                                /**
                                 * ----------------------------------------------------------------------------- *
                                 * Social Sharing
                                 * ----------------------------------------------------------------------------- *
                                 */
                                get_template_part( 'framework/global/social-sharing' ); ?>
                            </div>
                        <?php } ?>

                        </div>
                    </div><!-- .folio-media -->

                    <div class="folio-content new-box">

                        <div class="box-title">
                            <h3>
                                <b><?php _e( 'Project Description', LANG ); ?></b>
                            </h3>
                            <div class="title-line"></div>
                        </div>
                        <!-- .title-bd -->

                        <div class="folio-entry"><?php the_content(); ?></div>

                        <div class="folio-info">

                            <div class="box-title">
                                <h3>
                                    <b><?php _e( 'Project info', LANG ); ?></b>
                                </h3>
                                <div class="title-line"></div>
                            </div>
                            <!-- .title-bd -->

                            <ul>
                                <?php
                                if( $address ) {
                                    echo '<li>'. __( 'Address', 'bd' ) .' : <span> '. stripslashes( $address ) .' </span> </li>' ."\n";
                                }

                                if( $phone ) {
                                    echo '<li>'. __( 'Phone', 'bd' ) .' : <span> '. stripslashes( $phone ) .' </span> </li>' ."\n";
                                }

                                if( $hos ) {
                                    echo '<li>'. __( 'Hours of Service', 'bd' ) .' : <span> '. stripslashes( $hos ) .' </span> </li>' ."\n";
                                }

                                if( $mail ) {
                                    echo '<li>'. __( 'e-mail', 'bd' ) .' : <span> '. stripslashes( $mail ) .' </span> </li>' ."\n";
                                }

                                if( $site ) {
                                    echo '<li>'. __( 'website', 'bd' ) .' : <span> '. stripslashes( $site ) .' </span> </li>' ."\n";
                                }

                                if( get_the_term_list($post->ID, 'portfolio_skills', '', '', '') && bdayh_get_option( 'folio_skills' ) ) {
                                    echo '<li class="folio-cat">'. __( 'Skills Needed', 'bd' ) .' : <span> '. get_the_term_list($post->ID, 'portfolio_skills', '', ', ', '') .' </span> </li>' ."\n";
                                }

                                if( get_the_term_list($post->ID, 'portfolio_category', '', '', '') && bdayh_get_option( 'folio_categories' ) ) {
                                    echo '<li class="folio-cat">'. __( 'Categories', 'bd' ) .' : <span> '. get_the_term_list($post->ID, 'portfolio_category', '', ', ', '') .' </span> </li>' ."\n";
                                }

                                if( get_the_term_list($post->ID, 'portfolio_tags', '', '', '') && bdayh_get_option( 'wportfolio_tags' ) ) {
                                    echo '<li class="folio-tag">'. __( 'Tags', 'bd' ) .' : <span> '. get_the_term_list($post->ID, 'portfolio_tags', '', '', '') .' </span> </li>' ."\n";
                                }

                                if( bdayh_get_option( 'wportfolio_author' ) ) {
                                    echo '<li>'. __( 'By', 'bd' ) .' : <span> <a href="'. get_author_posts_url( get_the_author_meta( 'ID' ) ) .'">'. get_the_author_meta( 'display_name' ) .'</a> </span> </li>' ."\n";
                                }

                                if( $copy_url_text && $copy_url ) {
                                    echo '<li>'. __( 'Copyright', 'bd' ) .' : <span> <a href="'. stripslashes( $copy_url ) .'" target="_blank">'. stripslashes( $copy_url_text ) .'</a> </span> </li>' ."\n";
                                }

                                if( $project_url ) {

                                    if($project_url_text){
                                        $live_url = $project_url_text;
                                    } else {
                                        $live_url = __( 'Live preview', 'bd' );
                                    }

                                    echo '<li><a class="btn-link" href="'. $project_url .'" target="_blank">'. $live_url .'</a> </li>' ."\n";
                                }

                                ?>
                            </ul>
                        </div>
                    </div><!-- .folio-content -->
                </article>
                <?php endif;?>

                <?php $projects = get_related_projects( $post->ID ); ?>
                <?php if( $projects->have_posts() && bdayh_get_option( 'folio_related' ) ){ ?>

                    <div class="new-box">

                        <div class="box-title">
                            <h3>
                                <b><?php _e( 'Related Portfolio item', LANG ); ?></b>
                            </h3>
                            <div class="title-line"></div>
                        </div>
                        <!-- .title-bd -->

                    <?php
                    wp_enqueue_script( 'isotope' );
                    wp_enqueue_script( 'bd-isotope' );
                    $cols = "3cols";

                    ?>

                <div class="posts-gird" id="content" role="main">
                    <div id="container-grid" class="folio-3col folio-items blog-masonry posts-gird-<?php echo $cols ?>"  data-cols="<?php echo $cols ?>">
                        <?php while($projects->have_posts()): $projects->the_post(); ?>
                            <div class="folio-item portfolio-item isotope-item post-item <?php echo $item_classes; ?>" data-categories="<?php echo $item_classes; ?>">
                                <div class="inner-media">

                                    <?php
                                    ## Featured.
                                    if( get_post_meta( get_the_ID(), 'new_bd_wportfolio_post_type', true ) )
                                    {
                                        $post_type = get_post_meta( get_the_ID(), 'new_bd_wportfolio_post_type', true );

                                        if($post_type == 'post_image'){
                                            bd_home_img( $size = 'bd-gallery-grid' );
                                        }

                                        elseif($post_type == 'post_slider'){
                                            bd_wp_gallery( $img_w ='800', $img_h='500', $size = 'bd-gallery-grid' );
                                        }

                                        elseif($post_type == 'post_video'){

                                            $img_w          = '770';
                                            $img_h          = '500';
                                            $type           = get_post_meta( get_the_ID(), 'new_bd_wportfolio_video_type', true );
                                            $id             = get_post_meta( get_the_ID(), 'new_bd_video_url', true );

                                            if($type == 'youtube'){
                                                echo '<div class="post-image video-box"><iframe src="http://www.youtube.com/embed/'. $id .'?rel=0" frameborder="0" allowfullscreen></iframe></div>'."\n";
                                            }

                                            elseif($type == 'vimeo') {
                                                echo '<div class="post-image video-box"><iframe src="http://player.vimeo.com/video/'. $id .'?title=0&amp;byline=0&amp;portrait=0&amp;color=ba0d16" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>'."\n";
                                            }

                                            elseif($type == 'daily') {
                                                echo '<div class="post-image video-box"><iframe frameborder="0" src="http://www.dailymotion.com/embed/video/'. $id .'?logo=0"></iframe></div>'."\n";
                                            }
                                        }
                                    }
                                    ?>

                                </div><!-- .inner-media -->
                                <div class="inner-desc">
                                    <h3 class="tite"><a href="<?php the_permalink()?>" title="<?php printf(__( '%s', 'bd' ), the_title_attribute( 'echo=0' )); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
                                </div><!-- .inner-desc -->
                            </div><!-- .folio-item -->
                        <?php endwhile; ?>
                    </div><!-- .folio-items -->
                </div><!-- .posts-gird -->
                    </div>

                <?php } ?>

                <?php
                if( bdayh_get_option( 'wportfolio_comments' ) ){
                	comments_template();
                }
                ?>

            </div><!-- folio-single -->
        </div>
    </div><!-- #folio-main -->
</div>
<!-- .folio-container -->
<div class="clear"></div>
<?php get_footer(); ?>