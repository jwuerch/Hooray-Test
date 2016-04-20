<?php
/**
 * Woo Sidebar
 * ----------------------------------------------------------------------------- *
 */
global $post;

$current_ID = $post->ID;
if(function_exists('is_woocommerce') && is_woocommerce()){
	$current_ID = woocommerce_get_page_id('shop');
}
?>

<div class="bd-sidebar theia_sticky">
    <div class="theiaStickySidebar">
        <?php
        if ( function_exists('is_product') && is_product() )
        {
	        if ( is_active_sidebar( 'single-pro-widget' ) ) {
		        dynamic_sidebar('single-pro-widget');
	        }

	        else {
		        dynamic_sidebar('woocommerce-widget');
	        }
        }

        elseif ( function_exists('is_cart') && is_cart() )
        {
	        if ( is_active_sidebar( 'cart-widget' ) ) {
		        dynamic_sidebar('cart-widget');
	        }

	        else {
		        dynamic_sidebar('woocommerce-widget');
	        }
        }

        elseif ( function_exists('is_product_category') && is_product_category() || function_exists('is_product_tag') && is_product_tag() )
        {
	        if ( is_active_sidebar( 'shop-archive-widget' ) ) {
		        dynamic_sidebar('shop-archive-widget');
	        }

	        else {
		        dynamic_sidebar('woocommerce-widget');
	        }
        }


        elseif ( function_exists('is_shop') && is_shop() )
        {
	        if ( is_active_sidebar( 'woocommerce-widget' ) ) {
		        dynamic_sidebar('woocommerce-widget');
	        }
        }

        else {
	        dynamic_sidebar('sidebar');
        }
        wp_reset_query();
        ?>
    </div>
</div><!-- #sidebar -->
