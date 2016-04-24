<?php
/**
 * logo.php
 * ----------------------------------------------------------------------------- *
 */
global $post;
if( is_category() || is_single() ){
    if( is_category() ) $category_id = get_query_var('cat') ;
    if( is_single() ){
        $categories = get_the_category( $post->ID );
        if( !empty( $categories[0]->term_id ) ) {
            $category_id = $categories[0]->term_id;
        }
    }

    if( !empty( $category_id ) ) {
        $cat_options = get_option("bd_cat_$category_id");
    }

    if( isset($cat_options['logo_displays']) ){
        $cat_dis = $cat_options['logo_displays'];
    }
}

##
$cat_logo_title = "";
if( isset( $cat_dis['logo_title'] ) ){
    $cat_logo_title = $cat_dis['logo_title'];
}

##
$cat_logo_image = "";
if( isset( $cat_dis['logo_image'] ) ){
    $cat_logo_image = $cat_dis['logo_image'];
}

##
$cat_logoText = "";
if( isset( $cat_options['logoText'] ) ){
    $cat_logoText = $cat_options['logoText'];
}

##
$cat_tagline = "";
if( isset( $cat_options['tagline'] ) ){
    $cat_tagline = $cat_options['tagline'];
}

##
$cat_taglineText = "";
if( isset( $cat_options['taglineText'] ) ){
    $cat_taglineText = $cat_options['taglineText'];
}

##
$cat_logo_upload = "";
if( isset( $cat_options['logo_upload'] ) ){
    $cat_logo_upload = $cat_options['logo_upload'];
}

##
$cat_logo_retina = "";
if( isset( $cat_options['logo_retina'] ) ){
    $cat_logo_retina = $cat_options['logo_retina'];
}

##
$cat_retina_logo_width = "";
if( isset( $cat_options['retina_logo_width'] ) ){
    $cat_retina_logo_width = $cat_options['retina_logo_width'];
}

##
$cat_logo_displays = "";
if( isset( $cat_options['logo_displays'] ) ){
    $cat_logo_displays = $cat_options['logo_displays'];
}

$logo_top = '';
$logo_right = '';
$logo_bottom = '';
$logo_left = '';
$logo_margin = '';

if( bdayh_get_option( 'margin_logo_top' ) ){
    $logo_top     = 'margin-top:'.bdayh_get_option( 'margin_logo_top' ).'px;';
}

if( bdayh_get_option( 'margin_logo_right' ) ){
    $logo_right     = 'margin-right:'.bdayh_get_option( 'margin_logo_right' ).'px;';
}

if( bdayh_get_option( 'margin_logo_bottom' ) ){
    $logo_bottom     = 'margin-bottom:'.bdayh_get_option( 'margin_logo_bottom' ).'px;';
}

if( bdayh_get_option( 'margin_logo_left' ) ){
    $logo_left     = 'margin-left:'.bdayh_get_option( 'margin_logo_left' ).'px;';
}

$logo_margin = 'style="'.$logo_top.' '.$logo_right.' '.$logo_bottom.' '.$logo_left.'"';

//print_r($cat_options);
?>

<?php //if( $cat_logo_title || $cat_logo_image  ){

if( !empty($cat_options['logo_displays']) ){
    ?>
    <div class="logo"<?php echo $logo_margin ?>>
        <?php if( !is_singular() && !is_category() && !is_tag() ) echo '<h1 class="site-title">'; else echo '<h2 class="site-title">'; ?>
        <?php if( $cat_logo_displays == 'logo_image' ) { ?>
            <?php
            if( $cat_logo_upload ) {
                $logo = $cat_logo_upload;
            } else {
                $logo = get_template_directory_uri() .'/images/logo.png';
            }

            $logo_retina = ''; $logo_retina_width = '';
            if( $cat_logo_retina ) {
                $logo_retina        = $cat_logo_retina;
                $logo_retina_width  = $cat_retina_logo_width;
            }
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url($logo) ; ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $logo_retina_width; ?>" />
            </a>
        <?php if( $cat_logo_retina && $cat_retina_logo_width ) { ?>
            <script>jQuery(document).ready(function($) { var retina = window.devicePixelRatio > 1 ? true : false; if( retina ) { jQuery('.bd-header .logo img').attr('src', '<?php echo $logo_retina ?>'); jQuery('.bd-header .logo img').attr('width', '<?php echo $logo_retina_width ?>'); } });</script>
        <?php } ?>
        <?php } else { ?>

            <a rel="home" class="site-name" href="<?php echo home_url() ?>/"><?php echo single_cat_title( '', false ); ?></a>

            <?php if( $cat_tagline == true ){ ?>
            <span class="site-tagline">
                <?php
                if( $cat_taglineText ){
                    echo stripslashes( $cat_taglineText );
                } else {
                    bloginfo( 'description' );
                } // END Blog Tage Line ?>
            </span>
        <?php } ?>
        <?php } ?>
        <?php if( !is_singular() && !is_category() && !is_tag() ) echo '</h1>'; else echo '</h2>'; ?>
    </div><!-- End Logo -->
<?php }  else { ?>
    <div class="logo"<?php echo $logo_margin ?>>
        <?php if( !is_singular() && !is_category() && !is_tag() ) echo '<h1 class="site-title">'; else echo '<h2 class="site-title">'; ?>
        <?php if( bdayh_get_option( 'logo_displays' ) == 'logo_image' ) { ?>
            <?php
            if( bdayh_get_option( 'logo_upload' ) ) {
                $logo = bdayh_get_option( 'logo_upload' );
            } else {
                $logo = get_template_directory_uri() .'/images/logo.png';
            }

            $logo_retina = ''; $logo_retina_width = '';
            if( bdayh_get_option( 'logo_retina' ) ) {
                $logo_retina        = bdayh_get_option( 'logo_retina' );
                $logo_retina_width  = bdayh_get_option( 'retina_logo_width' );
            }
            ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <img src="<?php echo esc_url($logo) ; ?>" alt="<?php bloginfo('name'); ?>" width="<?php echo $logo_retina_width; ?>" />
            </a>
        <?php if( bdayh_get_option( 'logo_retina' ) && bdayh_get_option( 'retina_logo_width' ) ) { ?>
            <script>jQuery(document).ready(function($) { var retina = window.devicePixelRatio > 1 ? true : false; if( retina ) { jQuery('.bd-header .logo img').attr('src', '<?php echo $logo_retina ?>'); jQuery('.bd-header .logo img').attr('width', '<?php echo $logo_retina_width ?>'); } });</script>
        <?php } ?>
        <?php } else { ?>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="site-name">
                <?php
                if( bdayh_get_option( 'logoText' ) ){
                    echo stripslashes( bdayh_get_option( 'logoText' ) );
                } else {
                    bloginfo('name');
                } // END Blog Name ?>
            </a>
            <?php if( bdayh_get_option( 'logo_tagline' ) == 1 ){ ?>
            <span class="site-tagline">
                <?php
                if( bdayh_get_option( 'taglineText' ) ){
                    echo stripslashes( bdayh_get_option( 'taglineText' ) );
                } else {
                    bloginfo( 'description' );
                } // END Blog Tage Line ?>
            </span>
        <?php } ?>
        <?php } ?>
        <?php if( !is_singular() && !is_category() && !is_tag() ) echo '</h1>'; else echo '</h2>'; ?>
    </div><!-- End Logo -->
<?php } ?>