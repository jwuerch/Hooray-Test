
<div class="clear"></div>

    <?php global $bd_data; ?>


</div><!-- .bdMain -->

<?php
// Footer Ads.

$footerAdsNewTab        = bdayh_get_option('footerAdsNewTab');
$footerAdsNoFollow      = bdayh_get_option('footerAdsNoFollow');
$footer_ads_code        = bdayh_get_option( 'footer_ads_code' );

$target = $nofollow = "";
if( $footerAdsNewTab ) $target='target="_blank"';
if( $footerAdsNoFollow ) $nofollow='rel="nofollow"';

if( bdayh_get_option( 'margin_header_adv_top' ) ){
    $m_adv_top = 'style="margin-top: '. bdayh_get_option( 'margin_header_adv_top' ) .'px"';
} else {
    $m_adv_top ='';
}

if( bdayh_get_option('show_footer_ads') ){ ?>

    <div class="bdayh-clearfix"></div>
    <div class="footer-adv">

        <?php if( $footer_ads_code != '' ){ ?>
            <?php echo do_shortcode( stripslashes( $footer_ads_code ) ); ?>
        <?php } else { ?>
            <a href="<?php echo stripcslashes( bdayh_get_option( 'footer_ads_img_url' ) ); ?>" title="<?php echo stripcslashes( bdayh_get_option( 'footer_ads_img_altname' ) ); ?>" <?php echo $target, $nofollow; ?>><img src="<?php echo stripcslashes( bdayh_get_option( 'footer_ads_img' ) ); ?>" alt="<?php echo stripcslashes( bdayh_get_option( 'footer_ads_img_altname' ) ); ?>" /></a>
        <?php } ?>
    </div>
    <div class="bdayh-clearfix"></div>

<?php } ?>

<div id="bdayhFooter">
<?php
// Follow  @ Instagram.
get_template_part( 'framework/classes/instagram' ); ?>

    <?php if( bdayh_get_option('footerWidgets') ){ ?>
        <?php
        ## The footer widget area
        $footer_layout = bdayh_get_option( 'footerWidgetsColumns' );
        if( $footer_layout == 'col_one' ) {
            $cc = ' col-one';
        } elseif( $footer_layout == 'col_two' ) {
            $cc = ' col-two';
        } elseif( $footer_layout == 'col_three' ) {
            $cc = ' col-three';
        } else {
            $cc = ' col-four';
        }
        ?>
        <div class="bdayh-footer<?php echo ($cc); ?>">
            <div class="bd-container">
                <div class="bdayh-footer-widget-area">
                    <?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) { ?>
                        <?php dynamic_sidebar( 'sidebar-footer-1' ); ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="footer">
        <div class="bd-container">
            <div class="footer-cr">
                <?php if( bdayh_get_option( 'footer_copyright_text' ) ) { echo stripslashes( bd_footer_copy_rigths() ); } ?>
            </div>

            <?php if( bdayh_get_option( 'bdayhFooterSocialLinks' ) ){ ?>
                <div class="bdayh-footer-social-links">
                    <?php bd_social( 'yes', '25', '' ); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div><!-- #bdayhFooter /-->


    </div><!-- #warp -->
</div><!-- .inner-wrapper -->
</div><!-- #page -->

</div><!-- .page-outer -->

    <?php wp_footer(); ?>
    </body>
</html>