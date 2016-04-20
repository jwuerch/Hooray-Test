<?php
/**
 * Post Meta
 * ----------------------------------------------------------------------------- *
 */
if ( is_single() ) {
    bd_post_meta();
}
elseif( is_page() ){
    if( bdayh_get_option( 'mmeta_pages' ) ){
        bd_post_meta();
    }
}
else {
    if ( ! has_post_format('aside') && ! has_post_format('link') && ! has_post_format('quote') && ! bdayh_get_option( 'home_post_meta' )) {
        bd_post_meta();
    }
}
?>