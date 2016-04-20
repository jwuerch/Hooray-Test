<?php
/**
 * Above Post AD
 * ----------------------------------------------------------------------------- *
 */
function bd_post_above_ads()
{
    global $bd_data;
    $bd_above_post_adv          = get_post_meta(get_the_ID(), 'bd_above_post_adv', true);
    $bd_above_post_adv_code     = get_post_meta(get_the_ID(), 'bd_above_post_adv_code', true);

    $customAdsNewTab        = bdayh_get_option('articleAboveAdsNewTab');
    $customAdsNoFollow      = bdayh_get_option('articleAboveAdsNoFollow');

    $target = $nofollow = "";

    if( $customAdsNewTab ) $target='target="_blank"';
    if( $customAdsNoFollow ) $nofollow='rel="nofollow"';

    if($bd_above_post_adv == 'yes') {
        if((empty($bd_above_post_adv_code)) || $bd_above_post_adv == 'yes') {
            echo '<div class="post-adv">'."\n". do_shortcode(stripslashes($bd_above_post_adv_code)) .'</div><!-- .post-adv/-->' ."\n";
        }

    }
    else {
        if(bdayh_get_option('show_article_above_ads')) {
            if($bd_data['article_above_ads_code'] != '') {
                echo '<div class="post-adv"> '. do_shortcode(stripslashes(bdayh_get_option('article_above_ads_code'))) .'</div><!-- .post-adv/-->' ."\n";
            }
            else {
                echo '<div class="post-adv"> <a href="'. bdayh_get_option('article_above_ads_img_url') .'" title="'. $bd_data['article_above_ads_img_altname'] .'" '. $target, $nofollow.'> <img src="'. $bd_data['article_above_ads_img'] .'" alt="'. $bd_data['article_above_ads_img_altname'] .'" /> </a></div><!-- .post-adv/-->' ."\n";
            }
        }
    }
}



/**
 * Below Post Ad
 * ----------------------------------------------------------------------------- *
 */
function bd_post_below_ads()
{
    global $bd_data;
    $bd_below_post_adv          = get_post_meta(get_the_ID(), 'bd_below_post_adv', true);
    $bd_below_post_adv_code     = get_post_meta(get_the_ID(), 'bd_below_post_adv_code', true);

    $customAdsNewTab        = bdayh_get_option('articleBelowAdsNewTab');
    $customAdsNoFollow      = bdayh_get_option('articleBelowAdsNoFollow');

    $target = $nofollow = "";

    if( $customAdsNewTab ) $target='target="_blank"';
    if( $customAdsNoFollow ) $nofollow='rel="nofollow"';


    if($bd_below_post_adv == 'yes')
    {
        if((empty($bd_below_post_adv_code)) || $bd_below_post_adv == 'yes')
        {
            echo '<div class="post-adv">'."\n".  do_shortcode(stripslashes($bd_below_post_adv_code)) .'</div><!-- .post-adv/-->' ."\n";
        }
    }
    else
    {
        if(bdayh_get_option('show_article_below_ads'))
        {
            if(bdayh_get_option('article_below_ads_code') != '')
            {
                echo '<div class="post-adv"> '. do_shortcode(stripslashes(bdayh_get_option('article_below_ads_code'))) . '</div><!-- .post-adv/-->' ."\n";
            }
            else
            {
                echo '<div class="post-adv"> <a href="'. $bd_data['article_below_ads_img_url'] .'" title="'. $bd_data['article_below_ads_img_altname'] .'" '. $target, $nofollow .'> <img src="'. $bd_data['article_below_ads_img'] .'" alt="'. $bd_data['article_below_ads_img_altname'] .'" /> </a></div><!-- .post-adv/-->' ."\n";
            }
        }
    }
}
?>