<?php global $bd_data; ?>
<style type="text/css">
<?php
/*-----------------------------------------------------------------------------------*/
// START Custom Background
/*-----------------------------------------------------------------------------------*/
$background_displays = bdayh_get_option( 'background_displays' );
if ( $background_displays == 'bg_cutsom' )
{
    echo 'body {';

        $bg = bdayh_get_option( 'custom_background' );
        if( !empty( $bg['color'] ) ){
            echo 'background-color:'. $bg['color'] .';';
        }

        if( !empty( $bg['img'] ) ){
            echo 'background-image:url("'. $bg['img'] .'");';
        }

        if( !empty( $bg['repeat'] ) ){
            echo 'background-repeat:'. $bg['repeat'] .';';
        }

        if( !empty( $bg['attachment'] ) ){
            echo 'background-attachment:'. $bg['attachment'] .';';
        }

        if( !empty( $bg['hor']  ) || !empty( $bg['ver'] ) ){
            echo 'background-position:'. $bg['hor'] .' '. $bg['ver'] .';';
        }

        if( bdayh_get_option( 'custom_background_full' ) ){
            echo 'background-size: cover; -o-background-size: cover; -moz-background-size: cover; -webkit-background-size: cover;';
        }

    echo '}';
}
elseif ( $background_displays == 'bg_pattren' )
{
    $pa = bdayh_get_option( 'pattrens_bg' );
    $pa_c = bdayh_get_option( 'custom_pattrens_color' );
    if ( $pa || $pa_c )
    {
        echo 'body {';

            if( $pa_c ){
                echo 'background-color:'. $pa_c .';';
            }

            if( $pa == 'pat1' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-1.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat2' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-2.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat3' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-3.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat4' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-4.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat5' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-5.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat6' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-6.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat7' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-7.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat8' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-8.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat9' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-9.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat10' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-10.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat11' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-11.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat12' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-12.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat13' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-13.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat14' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-14.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat15' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-15.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat16' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-16.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat17' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-17.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat18' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-18.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat19' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-19.png" ); background-position: center center; background-repeat: repeat;';
            }

            if( $pa == 'pat20' ){
                echo 'background-image: url( "'. get_template_directory_uri() .'/images/pattrens/pat-20.png" ); background-position: center center; background-repeat: repeat;';
            }

        echo '}';
    }
}
/*-----------------------------------------------------------------------------------*/
// END Custom Background
/*-----------------------------------------------------------------------------------*/?>
<?php if(array_key_exists('custom_css',$bd_data)){ $css_var = $bd_data['custom_css'];}else{$css_var = '';} $css_code =  str_replace("<pre>", "", stripslashes($css_var));  echo $css_code = str_replace("</pre>", "", $css_code )  , "\n";?>
<?php if( bdayh_get_option('css_tablets') ) { ?>
@media only screen and (max-width: 985px) and (min-width: 768px){
<?php echo stripslashes( bdayh_get_option( 'css_tablets' ) ) , "\n";?>
}
<?php } ?>
<?php if( bdayh_get_option('css_wide_phones') ) { ?>
@media only screen and (max-width: 767px) and (min-width: 480px){
<?php echo stripslashes( bdayh_get_option( 'css_wide_phones' ) ) , "\n";?>
}
<?php } ?>
<?php if( bdayh_get_option('css_phones') ) { ?>
@media only screen and (max-width: 479px) and (min-width: 320px){
<?php echo stripslashes( bdayh_get_option( 'css_phones' ) ) , "\n";?>
}
<?php } ?>


<?php if( !empty( $bd_data['main_text_color'] ) ){ ?>
    body {color: <?php echo $bd_data['main_text_color'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['links_color'] ) ){ ?>
    a {color: <?php echo $bd_data['links_color'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['links_decoration'] ) ){ ?>
    a {text-decoration: <?php echo $bd_data['links_decoration'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['links_color_hover'] ) ){ ?>
    a:hover {color: <?php echo $bd_data['links_color_hover'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['links_decoration_hover'] ) ){ ?>
    a:hover {text-decoration: <?php echo $bd_data['links_decoration_hover'] ?> ;}
<?php } ?>

<?php if( !empty( $bd_data['links_decoration_hover'] ) ){ ?>
a:hover {text-decoration: <?php echo $bd_data['links_decoration_hover'] ?> ;}
<?php } ?>
<?php
/* topbar */
if(array_key_exists('s_top',$bd_data))
{
	$topbar =$bd_data['s_top'];
}
if( !empty($topbar['color']) || !empty($topbar['img']) ) :
?>
.top-bar
{
<?php if( !empty( $topbar['color'] ) ){ ?>background-color:<?php echo $topbar['color'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['img'] ) ){ ?>background-image: url('<?php echo $topbar['img'] ?>') ; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['repeat'] ) ){ ?>background-repeat:<?php echo $topbar['repeat'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['attachment'] ) ){ ?>background-attachment:<?php echo $topbar['attachment'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $topbar['hor'] ) || !empty( $topbar['ver'] ) ){ ?>background-position:<?php echo $topbar['hor'] ?> <?php echo $topbar['ver'] ?> ; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* header */
if(array_key_exists('s_header',$bd_data))
{
	$header =$bd_data['s_header'];
}
if( !empty($header['color']) || !empty($header['img']) ) :
?>
.bd-header
{
<?php if( !empty( $header['color'] ) ){ ?>background-color:<?php echo $header['color'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $header['img'] ) ){ ?>background-image: url('<?php echo $header['img'] ?>') ; <?php echo "\n"; } ?>
<?php if( !empty( $header['repeat'] ) ){ ?>background-repeat:<?php echo $header['repeat'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $header['attachment'] ) ){ ?>background-attachment:<?php echo $header['attachment'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $header['hor'] ) || !empty( $header['ver'] ) ){ ?>background-position:<?php echo $header['hor'] ?> <?php echo $header['ver'] ?> ; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* widget */
if(array_key_exists('s_widget',$bd_data))
{
	$widget =$bd_data['s_widget'];
}
if( !empty($widget['color']) || !empty($widget['img']) ) :
?>
.widget
{
    <?php if( !empty( $widget['color'] ) ){ ?>background-color:<?php echo $widget['color'] ?> ; <?php echo "\n"; } ?>
    <?php if( !empty( $widget['img'] ) ){ ?>background-image: url('<?php echo $widget['img'] ?>') ; <?php echo "\n"; } ?>
    <?php if( !empty( $widget['repeat'] ) ){ ?>background-repeat:<?php echo $widget['repeat'] ?> ; <?php echo "\n"; } ?>
    <?php if( !empty( $widget['attachment'] ) ){ ?>background-attachment:<?php echo $widget['attachment'] ?> ; <?php echo "\n"; } ?>
    <?php if( !empty( $widget['hor'] ) || !empty( $widget['ver'] ) ){ ?>background-position:<?php echo $widget['hor'] ?> <?php echo $widget['ver'] ?> ; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* widget */
if(array_key_exists('s_footer',$bd_data))
{
	$foot = $bd_data['s_footer'];
}
if( !empty($foot['color']) || !empty($foot['img']) ) :
?>
.footer
{
    <?php if( !empty( $foot['color'] ) ){ ?>background-color:<?php echo $foot['color'] ?> ; <?php echo "\n"; } ?>
    <?php if( !empty( $foot['img'] ) ){ ?>background-image: url('<?php echo $foot['img'] ?>') ; <?php echo "\n"; } ?>
    <?php if( !empty( $foot['repeat'] ) ){ ?>background-repeat:<?php echo $foot['repeat'] ?> ; <?php echo "\n"; } ?>
    <?php if( !empty( $foot['attachment'] ) ){ ?>background-attachment:<?php echo $foot['attachment'] ?> ; <?php echo "\n"; } ?>
    <?php if( !empty( $foot['hor'] ) || !empty( $foot['ver'] ) ){ ?>background-position:<?php echo $foot['hor'] ?> <?php echo $foot['ver'] ?> ; <?php echo "\n"; } ?>
}
<?php endif; ?>
<?php
/* post */
if(array_key_exists('s_post',$bd_data))
{
	$footer =$bd_data['s_post'];
}
if( !empty($footer['color']) || !empty($footer['img']) ) :
?>
.blog-v1 article
{
<?php if( !empty( $footer['color'] ) ){ ?>background-color:<?php echo $footer['color'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $footer['img'] ) ){ ?>background-image: url('<?php echo $footer['img'] ?>') ; <?php echo "\n"; } ?>
<?php if( !empty( $footer['repeat'] ) ){ ?>background-repeat:<?php echo $footer['repeat'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $footer['attachment'] ) ){ ?>background-attachment:<?php echo $footer['attachment'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $footer['hor'] ) || !empty( $footer['ver'] ) ){ ?>background-position:<?php echo $footer['hor'] ?> <?php echo $footer['ver'] ?> ; <?php echo "\n"; } ?>
}
<?php if( !empty( $footer['color'] ) ){ ?>#footer-widgets .widget .post-warpper{ border-color: <?php echo $footer['color'] ?> ; }<?php echo "\n"; } ?>
<?php endif; ?>
<?php
/* Begin Tagline color */
if( bdayh_get_option( 'tagline_color' ) ){ ?>
span.site-tagline { color:<?php echo bdayh_get_option( 'tagline_color' ) ?> }
<?php } /* End Tagline color */ ?>
<?php /* Nav Text Transform */ if( bdayh_get_option('main_nav_tt') ) { ?>#navigation ul#menu-nav > li > a { text-transform: <?php echo bdayh_get_option('main_nav_tt') ?> ; }<?php } ?>
<?php /* Page Text Transform */ if( bdayh_get_option('page_tt') ) { ?>.page-title h2 { text-transform: <?php echo bdayh_get_option('page_tt') ?> ; }<?php } ?>
<?php /* Post Text Transform */ if( bdayh_get_option('singel_tt') ) { ?>.blog-v1 article h1.entry-title { text-transform: <?php echo bdayh_get_option('singel_tt') ?> ; }<?php } ?>
<?php /* Widget Text Transform */ if( bdayh_get_option('widgets_tt') ) { ?>.widget .widget-title h2, ul.tabs_nav li a { text-transform: <?php echo bdayh_get_option('widgets_tt') ?> ; }<?php } ?>
<?php /* Boxes Text Transform */ if( bdayh_get_option('boxes_tt') ) { ?>.box-title h2 { text-transform: <?php echo bdayh_get_option('boxes_tt') ?> ; }<?php } ?>
<?php
if(array_key_exists('read_btn',$bd_data)){
	$read_btn =   $bd_data['read_btn'];
}
if( !empty($read_btn['color']) || !empty($read_btn['img']) ) {
?>
a.more-link, button, .btn-link, input[type="button"], input[type="reset"], input[type="submit"] {
<?php if( !empty( $read_btn['color'] ) ){ ?>background-color:<?php echo $read_btn['color'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $read_btn['img'] ) ){ ?>background-image: url('<?php echo $read_btn['img'] ?>') ; <?php echo "\n"; } ?>
<?php if( !empty( $read_btn['repeat'] ) ){ ?>background-repeat:<?php echo $read_btn['repeat'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $read_btn['attachment'] ) ){ ?>background-attachment:<?php echo $read_btn['attachment'] ?> ; <?php echo "\n"; } ?>
<?php if( !empty( $read_btn['hor'] ) || !empty( $read_btn['ver'] ) ){ ?>background-position:<?php echo $read_btn['hor'] ?> <?php echo $read_btn['ver'] ?> ; <?php echo "\n"; } ?>
}
<?php } ?>
<?php if( bdayh_get_option( 'read_btn_text_color' ) ) { ?>
a.more-link, button, .btn-link, input[type="button"], input[type="reset"], input[type="submit"] {
    color: <?php echo bdayh_get_option( 'read_btn_text_color' ) ?> ;
}
<?php } ?>
<?php
/**
 * Unlimited colors
 * ----------------------------------------------------------------------------- *
 */
function bd_theme_colors($unlimited_colors){
    echo 'a:hover{color:'.$unlimited_colors.'} ::selection{background:'.$unlimited_colors.'} a.more-link, button, .btn-link, input[type="button"], input[type="reset"], input[type="submit"] { background-color:'.$unlimited_colors.'} button:active, .btn-link:active, input[type="button"]:active, input[type="reset"]:active, input[type="submit"]:active { background-color:'.$unlimited_colors.'} .gotop:hover { background-color:'.$unlimited_colors.'} .top-search { background-color:'.$unlimited_colors.'} .primary-menu ul#menu-primary > li.current-menu-parent, .primary-menu ul#menu-primary > li.current-menu-ancestor, .primary-menu ul#menu-primary > li.current-menu-item, .primary-menu ul#menu-primary > li.current_page_item { color: '.$unlimited_colors.'; }
.primary-menu ul#menu-primary > li.current-menu-parent i, .primary-menu ul#menu-primary > li.current-menu-ancestor i, .primary-menu ul#menu-primary > li.current-menu-item i, .primary-menu ul#menu-primary > li.current_page_item i, .primary-menu ul#menu-primary > li.current-menu-parent > a, .primary-menu ul#menu-primary > li.current-menu-ancestor > a, .primary-menu ul#menu-primary > li.current-menu-item > a, .primary-menu ul#menu-primary > li.current_page_item > a { color: '.$unlimited_colors.'; }
.primary-menu ul#menu-primary > li:hover > a { color: '.$unlimited_colors.'; }
.primary-menu ul#menu-primary li.bd_menu_item ul.sub-menu li:hover > ul.sub-menu, .primary-menu ul#menu-primary li.bd_mega_menu:hover > ul.bd_mega.sub-menu, .primary-menu ul#menu-primary li.bd_menu_item:hover > ul.sub-menu, .primary-menu ul#menu-primary .sub_cats_posts { border-top-color: '.$unlimited_colors.'; }
div.nav-menu.primary-menu-dark a.menu-trigger:hover i, div.nav-menu.primary-menu-light a.menu-trigger:hover i, div.nav-menu.primary-menu-light a.menu-trigger.active i, div.nav-menu.primary-menu-dark a.menu-trigger.active i { background: '.$unlimited_colors.'; }
span.bd-criteria-percentage { background: '.$unlimited_colors.'; color: '.$unlimited_colors.'; }
.divider-colors { background: '.$unlimited_colors.'; }
.blog-v1 article .entry-meta a { color: '.$unlimited_colors.'; }
.blog-v1 article .article-formats { background-color: '.$unlimited_colors.'; }
.cat-links { background-color: '.$unlimited_colors.'; }
.pagenavi span.pagenavi-current { border-color: '.$unlimited_colors.'; background-color: '.$unlimited_colors.'; }
.pagenavi a:hover { border-color: '.$unlimited_colors.'; color: '.$unlimited_colors.'; }
.widget { border-top-color: '.$unlimited_colors.'; }
.new-box { border-top-color: '.$unlimited_colors.'; }
.widget a:hover { color: '.$unlimited_colors.'; }
.tagcloud a:hover { background: '.$unlimited_colors.'; }
.masonry-more-link,
.bdaia-cats-more-btn,
ul.tabs_nav li.active a { color: '.$unlimited_colors.'; }
.bd-tweets ul.tweet_list li.twitter-item a { color: '.$unlimited_colors.'; }
.widget.bd-login .login_user .bio-author-desc a { color: '.$unlimited_colors.'; }
.comment-reply-link, .comment-reply-link:link, .comment-reply-link:active { color: '.$unlimited_colors.'; }
.gallery-caption { background-color: '.$unlimited_colors.'; }
.slider-flex ol.flex-control-paging li a.flex-active { background: '.$unlimited_colors.'; }
#folio-main ul#filters li a.selected { background: '.$unlimited_colors.'; }
.search-mobile button.search-button { background: '.$unlimited_colors.'; }
.gotop{background: '.$unlimited_colors.';}

.bdaia-posts-grid-post.format-video .post-image:after,
.sk-circle .sk-child:before,
#reading-position-indicator{background: '.$unlimited_colors.';}
#bdCheckAlso{border-top-color: '.$unlimited_colors.';}
.primary-menu ul#menu-primary > li:hover > a,
.primary-menu ul#menu-primary > li.current-menu-item > a,
.primary-menu ul#menu-primary > li.current_page_item > a,
.primary-menu ul#menu-primary > li.current-menu-parent > a,
.primary-menu ul#menu-primary > li.current-menu-ancestor > a {background: '.$unlimited_colors.';}
.woocommerce .product .onsale, .woocommerce .product a.button:hover, .woocommerce .product #respond input#submit:hover, .woocommerce .checkout input#place_order:hover, .woocommerce .woocommerce.widget .button:hover, .single-product .product .summary .cart .button:hover, .woocommerce-cart .woocommerce table.cart .button:hover, .woocommerce-cart .woocommerce .shipping-calculator-form .button:hover, .woocommerce .woocommerce-message .button:hover, .woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce-checkout .woocommerce input.button:hover, .woocommerce-page .woocommerce a.button:hover, .woocommerce-account div.woocommerce .button:hover, .woocommerce.widget .ui-slider .ui-slider-handle, .woocommerce.widget.widget_layered_nav_filters ul li a {background: none repeat scroll 0 0 '.$unlimited_colors.' !important}
';
}
if( bdayh_get_option( 'custom_theme_color' ) ){
	bd_theme_colors( bdayh_get_option( 'custom_theme_color' ) );
}

## Custom Post Color
global $post;
if(is_category() || is_singular())
{
    $cat_bg = '';
    $cat_bg_color = '';
    $cat_full = '';
    if(is_category())
	{
		$category_id = get_query_var('cat') ;
		$cat_get_options = get_option( "bd_cat_$category_id");
		$cat_options = $cat_get_options['custom_styles_bd'];

        if( !empty( $cat_get_options['cat_color'] ) ){
            $cat_color = $cat_get_options['cat_color'];
        }

        if( !empty( $cat_options['img'] ) ){
            $cat_bg = $cat_options['img'];
        }

        if( !empty( $cat_options['color'] ) ){
            $cat_bg_color = $cat_options['color'];
        }

        if( !empty( $cat_options['repeat'] ) ){
            $cat_bg_repeat = $cat_options['repeat'];
        }

        if( !empty( $cat_options['attachment'] ) ){
            $cat_bg_attachment = $cat_options['attachment'];
        }

        if( !empty( $cat_options['hor'] ) ){
            $cat_bg_hor = $cat_options['hor'];
        }

        if( !empty( $cat_options['ver'] ) ){
            $cat_bg_ver = $cat_options['ver'];
        }

        if( !empty( $cat_get_options['full_scr'] ) ){
            $cat_full = $cat_get_options['full_scr'];
        }
	}

	if( is_singular() )
	{
		$current_ID = $post->ID;
        $get_meta = get_post_meta( $current_ID, 'custom_styles_bd', true );

		if(!empty($get_meta["post_color"])){
			$cat_color = $get_meta["post_color"];
        }

		if(!empty($get_meta["img"])){
			$cat_bg = $get_meta["img"];
        }

        if(!empty($get_meta["color"])){
			$cat_bg_color = $get_meta["color"];
        }

        if(!empty($get_meta["repeat"])){
			$cat_bg_repeat = $get_meta["repeat"];
        }

        if(!empty($get_meta["attachment"])){
			$cat_bg_attachment = $get_meta["attachment"];
        }

        if(!empty($get_meta["hor"])){
			$cat_bg_hor = $get_meta["hor"];
        }

        if(!empty($get_meta["ver"])){
			$cat_bg_ver = $get_meta["ver"];
        }

		if(!empty($get_meta["full_scr"])){
			$cat_full = $get_meta['full_scr'];
        }

        if( is_single() ){
			$categories = get_the_category( $post->ID );
			$category_id = $categories[0]->term_id ;
            $cat_get_options = get_option( "bd_cat_$category_id");
		    $cat_options = $cat_get_options['custom_styles_bd'];

            if( empty($cat_color) && !empty( $cat_get_options['cat_color'] ) ){
                $cat_color = $cat_get_options['cat_color'];
            }

            if( empty($cat_bg) && !empty( $cat_options['img'] ) ){
                $cat_bg = $cat_options['img'];
            }

            if( empty($cat_bg_color) && !empty( $cat_options['color'] ) ){
                $cat_bg_color = $cat_options['color'];
            }

            if( empty($cat_bg_repeat) && !empty( $cat_options['repeat'] ) ){
                $cat_bg_repeat = $cat_options['repeat'];
            }

            if( empty($cat_bg_attachment) && !empty( $cat_options['attachment'] ) ){
                $cat_bg_attachment = $cat_options['attachment'];
            }

            if( empty($cat_bg_hor) && !empty( $cat_options['hor'] ) ){
                $cat_bg_hor = $cat_options['hor'];
            }

            if( empty($cat_bg_ver) && !empty( $cat_options['ver'] ) ){
                $cat_bg_ver = $cat_options['ver'];
            }

            if( empty($cat_full) && !empty( $cat_get_options['full_scr'] ) ){
                $cat_full = $cat_get_options['full_scr'];
            }
		}
	}

    if(!empty($cat_color)){
        bd_theme_colors($cat_color);
    }

    if( $cat_bg || $cat_bg_color ){
        echo 'body {';
            if( !empty( $cat_bg_color ) ){
                echo 'background-color:'. $cat_bg_color .';';
            }
            if( !empty( $cat_bg ) ){
                echo 'background-image:url("'. $cat_bg .'");';
            }
            if( !empty( $cat_bg_repeat ) ){
                echo 'background-repeat:'. $cat_bg_repeat .';';
            }
            if( !empty( $cat_bg_attachment ) ){
                echo 'background-attachment:'. $cat_bg_attachment .';';
            }
            if( !empty( $cat_bg_hor  ) || !empty( $cat_bg_ver ) ){
                echo 'background-position:'. $cat_bg_hor .' '. $cat_bg_ver .';';
            }
            if( $cat_full ){
                echo 'background-size: cover; -o-background-size: cover; -moz-background-size: cover; -webkit-background-size: cover;';
            }
        echo '}';
    }
}
## Custom Post Color
$color = get_post_meta( get_the_ID(), 'bd_custom_post_color', true);

if( is_singular() ){
    if( $color && $color !='#' ){
        bd_theme_colors($color);
    }
}
/* Category Name Bg Color */
//if( bdayh_get_option( 'bdayh_blog_cats_colors' ) ) {
$categories_obj = get_categories('hide_empty=0');
foreach ($categories_obj as $pn_cat)
{
    $category_id = $pn_cat->cat_ID ;
    $cat_get_options = get_option( "bd_cat_$category_id");

    if( !empty( $cat_get_options['cat_color'] ) )
    {
        $cat_custom_color = $cat_get_options['cat_color'];
        echo '.bd-cat-' . $category_id . '{ background : ' . $cat_custom_color . ' !important }';
    }
}
//}
?>
<?php if( !empty( $bd_data['post_text_color'] ) ){ ?>
.single .entry-content {color: <?php echo $bd_data['post_text_color'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['post_links_color'] ) ){ ?>
.single .entry-content a {color: <?php echo $bd_data['post_links_color'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['post_links_decoration'] ) ){ ?>
.single .entry-content a {text-decoration: <?php echo $bd_data['post_links_decoration'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['post_links_color_hover'] ) ){ ?>
.single .entry-content a:hover {color: <?php echo $bd_data['post_links_color_hover'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['post_links_decoration_hover'] ) ){ ?>
.single .entry-content a:hover {text-decoration: <?php echo $bd_data['post_links_decoration_hover'] ?> ;}
<?php } ?>
<?php if( !empty( $bd_data['post_links_decoration_hover'] ) ){ ?>
.single .entry-content a:hover {text-decoration: <?php echo $bd_data['post_links_decoration_hover'] ?> ;}
<?php } ?>
<?php
/* Begin Typo */
global $custom_typography;
foreach( $custom_typography as $selector => $input ){
$option = bdayh_get_option( $input );
if( $option['font'] || $option['color'] || $option['size'] || $option['lineheight'] || $option['weight'] || $option['style'] || $option['texttransform'] ):
echo $selector."{"; ?>
<?php if($option['font'] ) { echo "font-family: ". stripslashes( bd_get_font( $option['font'] ) )."; "; } ?>
<?php if($option['color'] ) { echo "color :". $option['color']."; "; } ?>
<?php if($option['size'] ) { echo "font-size : ".$option['size']."px; "; } ?>
<?php if($option['lineheight'] ) { echo "line-height : ".$option['lineheight']."px; "; }?>
<?php if($option['weight'] ) { echo "font-weight: ".$option['weight']."; "; } ?>
<?php if($option['style'] ) { echo "font-style: ". $option['style']."; "; } ?>
<?php if($option['texttransform'] ) { echo "text-transform: ". $option['texttransform']."; "; } ?>
}
<?php endif; } /* End Typo */ ?>
<?php
/*-----------------------------------------------------------------------------------*/
$general_lc = bdayh_get_option( 'general_lc' );
$general_ld = bdayh_get_option( 'general_ld' );
$general_lch = bdayh_get_option( 'general_lch' );
$general_ldh = bdayh_get_option( 'general_ldh' );
if ( $general_lc || $general_ld ) { echo 'a, .widget a, a, a:link, a:active{' . 'color:' . $general_lc . '; ' . 'text-decoration:' . $general_ld . ';' . '}'; }
if ( $general_lch || $general_ldh ) { echo 'a:hover, .widget a:hover{' . 'color:' . $general_lch . '; ' . 'text-decoration:' . $general_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
$post_content_lc = bdayh_get_option( 'post_content_lc' );
$post_content_ld = bdayh_get_option( 'post_content_ld' );
$post_content_lch = bdayh_get_option( 'post_content_lch' );
$post_content_ldh = bdayh_get_option( 'post_content_ldh' );
if ( $post_content_lc || $post_content_ld ) { echo '.single article.post .entry a, .page article.page .entry a{' . 'color:' . $post_content_lc . '; ' . 'text-decoration:' . $post_content_ld . ';' . '}'; }
if ( $post_content_lch || $post_content_ldh ) { echo '.single article.post .entry a:hover, .page article.page .entry a:hover{' . 'color:' . $post_content_lch . '; ' . 'text-decoration:' . $post_content_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
/*-----------------------------------------------------------------------------------*/
$post_h1_lc = bdayh_get_option( 'post_h1_lc' ); $post_h1_ld = bdayh_get_option( 'post_h1_ld' ); $post_h1_lch = bdayh_get_option( 'post_h1_lch' ); $post_h1_ldh = bdayh_get_option( 'post_h1_ldh' );
if ( $post_h1_lc || $post_h1_ld ) { echo '.single article.post .entry h1 a, .page article.page .entry h1 a {' . 'color:' . $post_h1_lc . '; ' . 'text-decoration:' . $post_h1_ld . ';' . '}'; }
if ( $post_h1_lch || $post_h1_ldh ) { echo '.single article.post .entry h1 a:hover, .page article.page .entry h1 a:hover {' . 'color:' . $post_h1_lch . '; ' . 'text-decoration:' . $post_h1_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
$post_h2_lc = bdayh_get_option( 'post_h2_lc' ); $post_h2_ld = bdayh_get_option( 'post_h2_ld' ); $post_h2_lch = bdayh_get_option( 'post_h2_lch' ); $post_h2_ldh = bdayh_get_option( 'post_h2_ldh' );
if ( $post_h2_lc || $post_h2_ld ) { echo '.single article.post .entry h2 a, .page article.page .entry h2 a {' . 'color:' . $post_h2_lc . '; ' . 'text-decoration:' . $post_h2_ld . ';' . '}'; }
if ( $post_h2_lch || $post_h2_ldh ) { echo '.single article.post .entry h1 a:hover, .page article.page .entry h1 a:hover {' . 'color:' . $post_h2_lch . '; ' . 'text-decoration:' . $post_h2_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
$post_h3_lc = bdayh_get_option( 'post_h3_lc' ); $post_h3_ld = bdayh_get_option( 'post_h3_ld' ); $post_h3_lch = bdayh_get_option( 'post_h3_lch' ); $post_h3_ldh = bdayh_get_option( 'post_h3_ldh' );
if ( $post_h3_lc || $post_h3_ld ) { echo '.single article.post .entry h3 a, .page article.page .entry h3 a {' . 'color:' . $post_h3_lc . '; ' . 'text-decoration:' . $post_h3_ld . ';' . '}'; }
if ( $post_h3_lch || $post_h3_ldh ) { echo '.single article.post .entry h3 a:hover, .page article.page .entry h3 a:hover {' . 'color:' . $post_h3_lch . '; ' . 'text-decoration:' . $post_h3_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
$post_h4_lc = bdayh_get_option( 'post_h4_lc' ); $post_h4_ld = bdayh_get_option( 'post_h4_ld' ); $post_h4_lch = bdayh_get_option( 'post_h4_lch' ); $post_h4_ldh = bdayh_get_option( 'post_h4_ldh' );
if ( $post_h4_lc || $post_h4_ld ) { echo '.single article.post .entry h4 a, .page article.page .entry h4 a {' . 'color:' . $post_h4_lc . '; ' . 'text-decoration:' . $post_h4_ld . ';' . '}'; }
if ( $post_h4_lch || $post_h4_ldh ) { echo '.single article.post .entry h4 a:hover, .page article.page .entry h4 a:hover {' . 'color:' . $post_h4_lch . '; ' . 'text-decoration:' . $post_h4_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
$post_h5_lc = bdayh_get_option( 'post_h5_lc' ); $post_h5_ld = bdayh_get_option( 'post_h5_ld' ); $post_h5_lch = bdayh_get_option( 'post_h5_lch' ); $post_h5_ldh = bdayh_get_option( 'post_h5_ldh' );
if ( $post_h5_lc || $post_h5_ld ) { echo '.single article.post .entry h5 a, .page article.page .entry h5 a {' . 'color:' . $post_h5_lc . '; ' . 'text-decoration:' . $post_h5_ld . ';' . '}'; }
if ( $post_h5_lch || $post_h5_ldh ) { echo '.single article.post .entry h5 a:hover, .page article.page .entry h5 a:hover {' . 'color:' . $post_h5_lch . '; ' . 'text-decoration:' . $post_h5_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
$post_h6_lc = bdayh_get_option( 'post_h6_lc' ); $post_h6_ld = bdayh_get_option( 'post_h6_ld' ); $post_h6_lch = bdayh_get_option( 'post_h6_lch' ); $post_h6_ldh = bdayh_get_option( 'post_h6_ldh' );
if ( $post_h6_lc || $post_h6_ld ) { echo '.single article.post .entry h6 a, .page article.page .entry h6 a {' . 'color:' . $post_h6_lc . '; ' . 'text-decoration:' . $post_h6_ld . ';' . '}'; }
if ( $post_h6_lch || $post_h6_ldh ) { echo '.single article.post .entry h6 a:hover, .page article.page .entry h6 a:hover {' . 'color:' . $post_h6_lch . '; ' . 'text-decoration:' . $post_h6_ldh . ';' . '}'; }
/*-----------------------------------------------------------------------------------*/
?>
</style>
