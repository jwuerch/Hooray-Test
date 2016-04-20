<?php
global $post;

$current_ID = $post->ID;
$cat_link = get_the_category_list( __( ", ", "Used between list items, there is a space after the comma.", LANG ) );
$bd_custom_post_color = get_post_meta( $current_ID, 'bd_custom_post_color', true);

switch( get_post_format() ){
    case 'gallery':
        $format_class = 'format-gallery';
        break;

    case 'aside':
        $format_class = 'format-aside';
        break;

    case 'link':
        $format_class = 'format-links';
        break;

    case 'image':
        $format_class = 'format-image';
        break;

    case 'quote':
        $format_class = 'format-quote';
        break;

    case 'video':
        $format_class = 'format-video';
        break;

    case 'audio':
        $format_class = 'format-audio';
        break;

    case 'chat':
        $format_class = 'format-status';
        break;

    default:
        $format_class = 'admin-post';
        break;
}
?>

<div class="divider-colors" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>>

</div><!-- .divider-colors /-->

<?php
// Format Icons
if( bdayh_get_option( 'post_format_icon' ) == 0 ) {

    if( has_post_format('gallery') || has_post_format('aside') || has_post_format('link') || has_post_format('image') || has_post_format('quote') || has_post_format('video') || has_post_format('audio') ) {

    ?>
        <span class="article-formats" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>>
            <i class="bdico dashicons-<?php echo $format_class ?>"></i>
        </span>
    <?php

    }
    else {}
}
?>

<?php
// Category Name
if( bdayh_get_option( 'category_top_post' ) == 0 ) {

    if ( has_post_thumbnail() || has_post_format('gallery') || has_post_format('image') || has_post_format('video') || has_post_format('audio') ) {

    ?>
        <span class="cat-links" <?php if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ){ echo 'style= "background-color: '. $bd_custom_post_color .'"'; } else {} ?>>
            <?php echo $cat_link ?>
        </span>
    <?php

    }
    else {}
}
?>

<?php
// Custom Color Cass
if( strlen( $bd_custom_post_color ) != 1 and $bd_custom_post_color != '' ) {
    echo '<style type="text/css"> #post-'. get_the_ID() .' a.more-link {background-color:'. $bd_custom_post_color .' } #post-'. get_the_ID() .' .entry-meta a { color :'. $bd_custom_post_color .' }</style>';
}
else {} ?>