<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<?php
global $is_IE;
if($is_IE) echo '<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />'; ?>
<?php if( bdayh_get_option( 'responsive' ) ) { ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
<?php } ?>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>

<?php
global $post, $wp_query, $bd_data;

$body_styles = null;
if( is_singular() ){
    $body_styles = "style='";
    if(get_post_meta(get_the_ID(), 'bd_post_background_color', true) && get_post_meta(get_the_ID(), 'bd_post_background_color', true) !='#'){
        $body_styles .=   "background:".get_post_meta(get_the_ID(), 'bd_post_background_color', true)." !important;";
    }

    if(get_post_meta(get_the_ID(), 'bd_post_background_custom', true)){
        $att_id = get_post_meta(get_the_ID(), 'bd_post_background_custom', true);
        $attachment = wp_get_attachment_image_src( $att_id, 'full' );
        $body_styles .=   "background: ".get_post_meta(get_the_ID(), 'bd_post_background_color', true)." url(".$attachment[0].")".get_post_meta(get_the_ID(), 'bd_post_background_repeat', true)." ".get_post_meta(get_the_ID(), 'bd_post_background_attachment', true)." ".get_post_meta(get_the_ID(), 'bd_post_background_x', true)." ".get_post_meta(get_the_ID(), 'bd_post_background_y', true)." !important;";
    } else {}
    $body_styles .=  "'";
}
?>
<body <?php body_class(); echo $body_styles; ?>>

<?php
// Sidebar.
$sidebar = '';
if( bdayh_get_option( 'site_sidebar_position' ) == 'sideLeft' ){
    $sidebar = ' site_sidebar_position_left';
}
elseif( bdayh_get_option( 'site_sidebar_position' ) == 'sideNo' ){
    $sidebar = ' layout-full-width';
}
elseif( bdayh_get_option( 'site_sidebar_position' ) == 'sideRight' ){
    $sidebar = ' site_sidebar_position_right';
}

if( is_singular() || ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) )
{
    global $post;
    $bdCurrentID = $post->ID;
    if (function_exists('is_woocommerce') && is_woocommerce()) $bdCurrentID = woocommerce_get_page_id('shop');

    $sidebar_pos = get_post_meta( $bdCurrentID, 'bd_sidebar_position', true );
    $sidebar_ful = get_post_meta( $bdCurrentID, 'bd_full_width', true );

    if( bdayh_get_option( 'article_sidebar_position' ) == 'sideLeft' ){
        $sidebar = ' site_sidebar_position_left';
    }

    elseif( bdayh_get_option( 'article_sidebar_position' ) == 'sideNo' ){
        $sidebar = ' layout-full-width';
    }

    elseif( bdayh_get_option( 'article_sidebar_position' ) == 'sideRight' ){
        $sidebar = ' site_sidebar_position_right';
    }

    if( $sidebar_pos == 'left' ) {
        $sidebar = ' site_sidebar_position_left';
    }

    elseif( $sidebar_pos == 'right' ) {
        $sidebar = ' site_sidebar_position_right';
    }

    elseif( $sidebar_ful ) {
        $sidebar = ' layout-full-width';
    }
}


##
global $post;
$category_id = '';
if( is_category() ) {
    $category_id = get_query_var('cat');
}
if( is_single() ) {
    $categories = get_the_category( $post->ID );
    $category_id = $categories[0]->term_id ;
}
$cat_options = get_option( "bd_cat_$category_id" );

$logo_align = '';
if( is_category() || is_singular() || (function_exists('is_woocommerce') && is_woocommerce()) ) {

    if( isset( $cat_options['logo_center'] ) ){
        $logo_align = $cat_options['logo_center'];
    }
}

## Logo center
if( $logo_align =='' ){
    $logo_align = bdayh_get_option( 'logo_center' );
}
if ( $logo_align ) {
    $logo_align = ' logo-center';
} else {
    $logo_align = ' logo-left';
}
?>

<div class="page-outer">
    <div class="bg-cover"></div>

<?php if( bdayh_get_option( 'mobile_menu' ) ){
        $if_mobile_menu = ' mobile-menu-on';
    ?>
    <aside id="bd-MobileSiderbar">

    <?php if( bdayh_get_option( 'mobile_search' ) ){ ?>
            <div class="search-mobile">
                <form method="get" id="searchform-mobile" action="<?php echo home_url(); ?>/">
                    <button class="search-button" type="submit" value="<?php echo _e( 'Search', LANG ); ?>"><i class="fa fa-search"></i></button>
                    <input type="search" id="s-mobile" placeholder="<?php echo _e( 'Search', LANG ); ?>" value="<?php echo get_search_query() ?>" name="s" autocomplete="on" />
                </form>
            </div>
        <?php } ?>

        <div id="mobile-menu">

            <?php if ( has_nav_menu( 'primary' ) ) { ?>
                <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu main-default-menu' ) ); ?>
            <?php } else { ?>
                <span class="menu-info"><?php _e( 'Select your Main Menu from wp menus', LANG ) ?></span>
            <?php } ?>

            <?php if( bdayh_get_option( 'mobile_topmenu' ) ){ ?>
                <?php if ( has_nav_menu( 'topmenu' ) ) { ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'topmenu', 'menu_class' => 'nav-menu' ) ); ?>
                <?php } else { ?>
                    <span class="menu-info"><?php _e( 'Select your Top Menu from wp menus', LANG ) ?></span>
                <?php } ?>
            <?php } ?>

        </div>

        <?php if( bdayh_get_option( 'mobile_social' ) ){ ?>
            <div class="social-links-widget">
                <div class="sl-widget-inner">
                    <?php bd_social( 'yes', '25', '' ); ?>
                </div>
            </div>
        <?php } ?>

    </aside>
<?php } ?>

    <div id="page">
        <div class="inner-wrapper">

            <?php if( !bdayh_get_option('bdTopBarLoginPopup') ){ ?>
                <div id="login-pp" class="zoom-anim-dialog mfp-hide widget bd-login">
                    <div class="widget-title box-title">
                        <h2><b><?php _e( 'Login', LANG );?></b></h2><div class="title-linee"></div>
                    </div>

                    <?php bd_login_form(); ?>
                </div>
            <?php } ?>


    <div id="warp" class="clearfix <?php echo $sidebar ?>">

        <?php
        // Post Carousel.
        if( is_home()
            || is_front_page()
            || is_page_template( 'template-blog-2col.php' )
            || is_page_template( 'template-blog-3col.php' )
            || is_page_template( 'template-blog-4col.php' )
            || is_page_template( 'template-classic1.php'  ) )
        {
            if(  bdayh_get_option( 'bd_post_carousel' ) == 1 ) {
                if (bdayh_get_option('bd_post_carousel_pos') == 'before') get_template_part('framework/global/post-carousel');
            }
        }
        ?>

        <div class="bd-header<?php echo $logo_align, $if_mobile_menu ?>">

            <?php
            if( bdayh_get_option( 'topBarMobile' ) ){
                $of_topbar_mobile = ' of-topbar-mobile';
            }
            ?>

            <?php if( bdayh_get_option( 'show_top_bar' ) ){ ?>
                <div class="top-bar<?php echo $of_topbar_mobile; ?>">
                    <div class="bd-container">
                    <?php if( bdayh_get_option( 'show_top_search_right' ) ){ ?>
                    <div class="top-search">
                        <?php bd_search(); ?>
                    </div><!-- .top-search -->
                    <?php } ?>

                    <?php if( bdayh_get_option( 'show_top_social_right' ) ){ ?>
                    <div class="top-social">
                        <?php echo bd_social('yes', '', 'tooldown'); ?>
                    </div><!-- .top-social -->
                    <?php } ?>

                    <?php if( bdayh_get_option( 'show_top_menu_right' ) ){ ?>
                    <div class="top-menu-area">
                        <div id="top-navigation">
                            <?php wp_nav_menu(array('theme_location' => 'topmenu', 'depth' => 5, 'container' => false, 'menu_id' => 'menu-top', 'fallback_cb' => 'nav_fallback' ) ); ?>
                        </div>
                    </div><!-- .top-social -->
                    <?php } ?>
                    </div>
                </div><!-- .top-bar -->
            <?php } ?>

            <?php
            $header_fix = '';
            if( bdayh_get_option( 'header_fix' ) ) { $header_fix = ' fixed-on'; }

            $header_tran = '';
            if( bdayh_get_option( 'header_fix_transparency' ) ) { $header_tran = ' header-fixed-trans'; } ?>

            <div id="header-fix" class="header<?php echo $header_fix; echo $header_tran; ?>">
                <div class="bd-container">

                    <?php if( bdayh_get_option( 'mobile_menu' ) ){ ?>
                        <a class="bd-ClickOpen bd-ClickAOpen" href="#"><span></span></a>
                    <?php } ?>

                    <?php get_template_part( 'framework/global/logo' ); ?>

                    <div id="navigation" class="nav-menu">

                        <div class="primary-menu">

                            <?php if( bdayh_get_option( 'nav_logo' ) ) { ?>
                                <a class="nav-logo" title="<?php bloginfo('name'); ?>" href="<?php echo home_url(); ?>/">
                                    <img src="<?php echo bdayh_get_option( 'nav_logo' ) ?>" width="195" height="50" alt="<?php bloginfo('name'); ?>">
                                </a>
                            <?php } ?>

                            <ul id="menu-primary">
                                <?php
                                //wp_nav_menu(array('theme_location' => 'primary', 'depth' => 5, 'container' => false, 'menu_id' => 'menu-nav', 'fallback_cb' => 'nav_fallback' ) );
                                //wp_nav_menu( array( 'theme_location' => 'primary', 'echo' => true, 'menu_class' => '','menu_id'=> 'menu-primary', 'walker' => new BD_Walker() ) );
                                wp_nav_menu( array( 'theme_location' => 'primary', 'depth' => 5, 'container' => false, 'echo' => true, 'menu_class' => '','menu_id'=> 'menu-primary', 'items_wrap' => '%3$s', 'walker' => new BD_Walker() ) );
                                ?>

                                <?php if( bdayh_get_option( 'bdayh_main_menu_search' ) ){ ?>

                                    <li id="bdayh-main-menu-search" class="bdayh-main-menu-search">
                                        <a heref="#">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </li>

                                    <?php
                                    add_action('wp_footer', 'bdayh_wp_footer');
                                    function bdayh_wp_footer() {
                                        ?>
                                        <div class="bdayh-searchform-overlay">
                                            <div class="bdayh-searchform-overlay-inner">
                                                <div class="bdayh-searchform-container">

                                                    <form method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                        <input type="text" id="sss" class="search-text" name="s" value="<?php _e( 'Search', LANG ) ?>" onfocus="if (this.value == '<?php _e( 'Search', LANG ) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e( 'Search', LANG ) ?>';}"  />
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                }
                                ?>

                            </ul>
                        </div>

                        <?php
                        //Reading Position Indicator.
                        if( bdayh_get_option( 'header_fix' ) == 1 ) {
                            if (is_single() || !is_page() && !is_home() && !is_front_page()) echo '<div id="reading-position-indicator"></div>';
                        }
                        ?>
                    </div><!-- #navigation -->
                </div>
            </div><!-- .header -->


        </div><!-- .bd-header -->
        <div class="bdayh-clearfix"></div>

        <?php if( is_archive() ) { ?>
            <div class="bdayh-page-title-bar">
                <div class="bd-container">
                    <div class="bdayh-page-title-wrapper">

                        <div class="bdayh-page-title-captions">
                            <h1>
                                <?php if ( is_day() ) : ?>
                                    <?php printf( __( 'Daily Archives: %s', LANG ), '<span>' . get_the_date() . '</span>' ); ?>
                                <?php elseif ( is_month() ) : ?>
                                    <?php printf( __( 'Monthly Archives: %s', LANG ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', LANG ) ) . '</span>' ); ?>
                                <?php elseif ( is_year() ) : ?>
                                    <?php printf( __( 'Yearly Archives: %s', LANG ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', LANG ) ) . '</span>' ); ?>
                                <?php elseif ( is_author() ) : ?>
                                    <?php
                                    $curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug', $author_name ) : get_userdata( intval( $author ) );
                                    echo $curauth->nickname;
                                    ?>
                                <?php else : ?>
                                    <?php single_cat_title(); ?>
                                <?php endif; ?>
                            </h1>
                        </div>

                        <div class="bdayh-page-title-secondary">
                            <div class="entry-crumbs">
                                <?php breadcrumb_bd(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if( is_search() ) { ?>
            <div class="bdayh-page-title-bar">
                <div class="bd-container">
                    <div class="bdayh-page-title-wrapper">

                        <div class="bdayh-page-title-captions">
                            <h1>
                                <?php _e( 'Search Results for:', LANG ); echo "\n", get_search_query(); ?>
                            </h1>
                        </div>

                        <div class="bdayh-page-title-secondary">
                            <div class="entry-crumbs">
                                <?php breadcrumb_bd(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        <?php } ?>

	    <?php
	    if(
             is_page_template( 'templet-authors.php'        )
          || is_page_template( 'portfolio-four-col.php'     )
          || is_page_template( 'portfolio-grid.php'         )
          || is_page_template( 'portfolio-three-col.php'    )
          || is_page_template( 'portfolio-two-col.php'      )
	    )
	    { ?>

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
	    <?php } ?>

	    <?php if( is_singular('wportfolio') ){ ?>
		    <div class="bdayh-page-title-bar">
			    <div class="bd-container">
				    <div class="bdayh-page-title-wrapper">
					    <div class="bdayh-page-title-captions">
						    <h1>
							    <?php the_title(); ?>
						    </h1>
						    <div class="folio-like">
							    <?php
							    if( bdayh_get_option( 'folio_like' ) ) {
								    echo getPostLikeLink( get_the_ID() );
							    }
							    ?>
						    </div>
					    </div>

					    <div class="bdayh-page-title-secondary">
						    <div class="entry-crumbs">
							    <?php bd_crumbs(); ?>
						    </div><!-- .entry-crumbs -->
					    </div>
				    </div>
			    </div>
		    </div><!-- .bdayh-page-title-bar /-->
	    <?php } ?>

        <?php
        // Header Ads.

        $customAdsNewTab        = bdayh_get_option('headerAdsNewTab');
        $customAdsNoFollow      = bdayh_get_option('headerAdsNoFollow');
        $header_ads_code        = bdayh_get_option( 'header_ads_code' );

        $target = $nofollow = "";
        if( $customAdsNewTab ) $target='target="_blank"';
        if( $customAdsNoFollow ) $nofollow='rel="nofollow"';

        if( bdayh_get_option( 'margin_header_adv_top' ) ){
            $m_adv_top = 'style="margin-top: '. bdayh_get_option( 'margin_header_adv_top' ) .'px"';
        } else {
            $m_adv_top ='';
        }

        if( bdayh_get_option('show_header_ads') ){ ?>

            <div class="bdayh-clearfix"></div>
            <div class="header-adv">

                <?php if( $header_ads_code != '' ){ ?>
                    <?php echo do_shortcode( stripslashes( $header_ads_code ) ); ?>
                <?php } else { ?>
                    <a href="<?php echo stripcslashes( bdayh_get_option( 'header_ads_img_url' ) ); ?>" title="<?php echo stripcslashes( bdayh_get_option( 'header_ads_img_altname' ) ); ?>" <?php echo $target, $nofollow; ?>><img src="<?php echo stripcslashes( bdayh_get_option( 'header_ads_img' ) ); ?>" alt="<?php echo stripcslashes( bdayh_get_option( 'header_ads_img_altname' ) ); ?>" /></a>
                <?php } ?>
            </div>
            <div class="bdayh-clearfix"></div>

        <?php } ?>

        <?php
        // Post Carousel.
        if( is_home()
            || is_front_page()
            || is_page_template( 'template-blog-2col.php' )
            || is_page_template( 'template-blog-3col.php' )
            || is_page_template( 'template-blog-4col.php' )
            || is_page_template( 'template-classic1.php'  )
        ) {
            if(  bdayh_get_option( 'bd_post_carousel' ) == 1 ) {
                get_template_part('framework/global/post-carousel');
            }
        }
        ?>

        <div class="bdMain">