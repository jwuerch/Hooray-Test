<?php
/**
 * Main Functions
 * ----------------------------------------------------------------------------- *
 */
if(file_exists(get_template_directory().'/framework/functions/functions-typo.php')) {
    require_once ( get_template_directory().'/framework/functions/functions-typo.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-widgets.php')) {
    require_once (get_template_directory().'/framework/functions/functions-widgets.php');
}

if(file_exists(get_template_directory().'/framework/plugins/aq_resizer.php')) {
    require_once (get_template_directory().'/framework/plugins/aq_resizer.php');
}

if(file_exists(get_template_directory().'/framework/portfolio/portfolio-functions.php')) {
    require_once (get_template_directory().'/framework/portfolio/portfolio-functions.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-featured.php')) {
    require_once (get_template_directory().'/framework/functions/functions-featured.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-social.php')) {
    require_once (get_template_directory().'/framework/functions/functions-social.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-pagenavi.php')) {
    require_once (get_template_directory().'/framework/functions/functions-pagenavi.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-login.php')) {
    require_once (get_template_directory().'/framework/functions/functions-login.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-post-like.php')) {
    require_once (get_template_directory().'/framework/functions/functions-post-like.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-breadcrumb.php')) {
    require_once (get_template_directory().'/framework/functions/functions-breadcrumb.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-author-box.php')) {
    require_once (get_template_directory().'/framework/functions/functions-author-box.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-post-meta.php')) {
    require_once (get_template_directory().'/framework/functions/functions-post-meta.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-post-ad.php')) {
    require_once (get_template_directory().'/framework/functions/functions-post-ad.php');
}

if(file_exists(get_template_directory().'/framework/functions/functions-rating.php')) {
    require_once (get_template_directory().'/framework/functions/functions-rating.php');
}

if(file_exists(get_template_directory().'/framework/admin/framework-mega.php')) {
    require_once (get_template_directory().'/framework/admin/framework-mega.php');
}

if(file_exists(get_template_directory().'/framework/admin/framework-category.php')) {
    require_once (get_template_directory().'/framework/admin/framework-category.php');
}
if(file_exists(get_template_directory().'/includes/plugins/multiple-featured-images/multiple-featured-images.php')) {
    require_once (get_template_directory().'/includes/plugins/multiple-featured-images/multiple-featured-images.php');
}

if(file_exists(get_template_directory().'/includes/plugins/multiple_sidebars.php')) {
    require_once (get_template_directory().'/includes/plugins/multiple_sidebars.php');
}

if(file_exists(get_template_directory().'/includes/shortcode/shortcodes.php')) {
    require_once (get_template_directory().'/includes/shortcode/shortcodes.php');
}

if(file_exists(get_template_directory().'/includes/metaboxes/meta-box.php')) {
    require_once (get_template_directory().'/includes/metaboxes/meta-box.php');
}

if(file_exists(get_template_directory().'/includes/metaboxes/theme_metaboxes.php')) {
    require_once (get_template_directory().'/includes/metaboxes/theme_metaboxes.php');
}

function bd_post_rate(){
    if(file_exists(get_template_directory().'/framework/functions/functions-rating-box.php')) { require_once (get_template_directory().'/framework/functions/functions-rating-box.php'); }
}

if(bdayh_get_option('bd_LiveSearch')){
    if(file_exists(get_template_directory().'/framework/global/search-ajax.php')) { require_once (get_template_directory().'/framework/global/search-ajax.php'); }
}

if(!class_exists('TwitterOAuth', false)){
    if(file_exists(get_template_directory().'/includes/twitteroauth//twitteroauth.php')) { require_once (get_template_directory().'/includes/twitteroauth//twitteroauth.php'); }
}


/**
 * Load template part.
 * ----------------------------------------------------------------------------- *
 */
function bd_load_template_part($template_name, $part_name=null)
{
    ob_start();
    get_template_part($template_name, $part_name);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}

/**
 * Get The First Image From a Post.
 * ----------------------------------------------------------------------------- *
 */
function bd_first_post_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    if( preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches ) ){
        $first_img = $matches[1][0];
        return $first_img;
    }
}

/**
 * Portfolio per page
 * ----------------------------------------------------------------------------- *
 */
$option_posts_per_page = get_option( 'posts_per_page' );
add_action( 'init', 'bdayh_folio_cat_ac', 0);
function bdayh_folio_cat_ac() {
    add_filter( 'option_posts_per_page', 'bdayh_folio_cat' );
}
function bdayh_folio_cat() {
    global $option_posts_per_page;
    if ( is_tax( 'portfolio_category') ) {
        return 2;
    }
    elseif ( is_tax( 'portfolio_tags') ) {
        return 2;
    }
    elseif ( is_tax( 'portfolio_skills') ) {
        return 2;
    }
    else {
        return $option_posts_per_page;
    }
}

/**
 * Setup theme
 * ----------------------------------------------------------------------------- *
 */
add_action( 'after_setup_theme', 'bdayhSetup' );
function bdayhSetup()
{
    add_theme_support('title-tag');
    add_theme_support('woocommerce');
    add_theme_support('automatic-feed-links');
    load_theme_textdomain(LANG, get_template_directory().'/languages');
    add_theme_support('html5', array( 'search-form', 'comment-form', 'comment-list'));
    add_theme_support('post-formats', array('aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery'));

    global $args;
    add_theme_support( 'custom-header', $args );
    add_theme_support( 'custom-background', $args );

    if ( function_exists( 'add_theme_support' ) )
    {
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 55, 55, true );
        set_post_thumbnail_size( 800, 500, true );
        set_post_thumbnail_size( 245, 168, true );
        set_post_thumbnail_size( 620, 330, true );
        set_post_thumbnail_size( 1000, 600, true );
        set_post_thumbnail_size( 311, 444, true );
        set_post_thumbnail_size( 800, 9999999, true );
    }

    if ( function_exists( 'add_image_size' ) )
    {
        add_image_size( 'bd-small', 55, 55, true );
        add_image_size( 'bd-large', 800, 500, true );
        add_image_size( 'bd-xlarge', 1000, 600, true );
        add_image_size( 'bd-related', 620, 330, true );
        add_image_size( 'bd-carousel', 311, 444, true );
        add_image_size( 'bd-related-small', 245, 168, true );
        add_image_size( 'bd-gallery-grid', 800, 9999999, true );
    }



}


/**
 * Register Nav Menu
 * ----------------------------------------------------------------------------- *
 */
if ( function_exists( 'register_nav_menu' ) ) {
    register_nav_menus(
        array(
            'primary'   => __('Navigation Menu', LANG),
            'topmenu'   => __('Top Menu', LANG),
        )
    );
}



/**
 * breadcrumbs
 * ----------------------------------------------------------------------------- *
 */
function breadcrumb_bd () {
    include ( get_template_directory() .'/framework/functions/functions-breadcrumbs.php' );
    breadcrumbs_plus();
}



/**
 * WP head
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_head()
{
    $default_favicon = get_template_directory_uri()."/images/favicon.png";
    if(bdayh_get_option('favicon')){
        $custom_favicon = bdayh_get_option('favicon');
    }
    $favicon = (empty($custom_favicon)) ? $default_favicon : $custom_favicon;
    echo '<link rel="shortcut icon" href="'. $favicon .'" type="image/x-icon" />'."\n";

    if(bdayh_get_option('iphone_icon_upload')){
        if(bdayh_get_option('iphone_icon_upload')){
            echo '<link rel="apple-touch-icon-precomposed" href="'.bdayh_get_option('iphone_icon_upload').'" />'."\n";
        }
    }

    // Favicon iPhone 4 Retina display
    if(bdayh_get_option('iphone_icon_retina_upload')){
        if(bdayh_get_option('iphone_icon_retina_upload')){
            echo '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="'.bdayh_get_option('iphone_icon_retina_upload').'" />'."\n";
        }
    }

    // Favicon iPad
    if(bdayh_get_option('ipad_icon_upload')){
        if(bdayh_get_option('ipad_icon_upload')){
            echo '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="'.bdayh_get_option('ipad_icon_upload').'" />'."\n";
        }
    }

    // Favicon iPad Retina display
    if(bdayh_get_option('ipad_icon_retina_upload')){
        if(bdayh_get_option('ipad_icon_retina_upload')){
            echo '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="'.bdayh_get_option('ipad_icon_retina_upload').'" />'."\n";
        }
    }

    // Tracking Code
    $trackingCode = bdayh_get_option( 'google_analytics' );
    if( $trackingCode ) {
        echo stripslashes( $trackingCode );
    }

    // Space before </head>
    $spaceHead = bdayh_get_option( 'space_head' );
    if( $spaceHead ){
        echo stripslashes( $spaceHead );
    }

    // Custom Css
    if(file_exists(get_template_directory().'/framework/custom/css.php')) {
        require_once (get_template_directory().'/framework/custom/css.php');
    }

?>
<script type="text/javascript">
    var bd_url = '<?php echo get_template_directory_uri(); ?>';
</script>
<!--[if lt IE 9]><script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script><![endif]-->
<?php
}
add_action('wp_head', 'bd_wp_head');



/**
 * WP Footer
 * ----------------------------------------------------------------------------- *
 */
function bd_wp_footer()
{
    // Space body </head>
    if(bdayh_get_option('space_body')){
        echo bdayh_get_option('space_body')."\n";
    }

    // Go top
    if(bdayh_get_option('bdayhGoTop')){
        echo '<div class="gotop" title="Go Top"><i class="fa fa-chevron-up"></i></div>'."\n";
    }

    //Reading Position Indicator
    if ( is_single() || ! is_page() && ! is_home() && ! is_front_page() ) echo '<div id="reading-position-indicator"></div>';

    // Custom Js
    if(file_exists(get_template_directory().'/framework/custom/js.php')) {
        require_once (get_template_directory().'/framework/custom/js.php');
    }
}
add_action('wp_footer',  'bd_wp_footer');



/**
 * Footer copy rights
 * ----------------------------------------------------------------------------- *
 */
function bd_footer_copy_rigths()
{
    echo '<span class="copyright">'.stripslashes(bdayh_get_option('footer_copyright_text')).'</span>';
}



/**
 * Enqueue scripts and styles for front end
 * ----------------------------------------------------------------------------- *
 */
add_action( 'wp_enqueue_scripts', 'bdayhScriptsStyles');
function bdayhScriptsStyles()
{
    global $wp_styles, $bd_data, $post;


    // General scripts
    wp_register_script( 'isotope', get_template_directory_uri().'/js/jquery.isotope.min.js', array('jquery'), '1.5.25',true);
    if(is_rtl()) {
        wp_register_script('bd-isotope', get_template_directory_uri().'/js/isotope-rtl.js', array('jquery'), '1.5.25', true);
    }
    else {
        wp_register_script('bd-isotope', get_template_directory_uri().'/js/isotope.js', array('jquery'), '1.5.25', true);
    }

    wp_register_script('jquery-cycle', get_template_directory_uri().'/js/jquery.cycle.all.js', array('jquery'));
    wp_register_script('jquery-placeholder', get_template_directory_uri().'/js/jquery.placeholder.js', array('jquery'));
    wp_register_script('comment-validation', get_template_directory_uri().'/js/validation.js', array('jquery'));
    wp_register_script('bdayh-min', get_template_directory_uri().'/js/min.js', array('jquery'));
    wp_register_script('bdayh-main', get_template_directory_uri().'/js/main.js', array('jquery'));

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-cycle');
    wp_enqueue_script('jquery-placeholder');
    if(is_singular() && comments_open() && get_option('thread_comments')){
        wp_enqueue_script( 'comment-reply' );
    }

    if(bdayh_get_option('post_comments_valid') && (is_page() || is_single()) && comments_open()){
        wp_enqueue_script('comment-validation');
    }

    wp_localize_script('bdayh-main', 'js_local_vars', array('dropdown_goto' => __('Go to...', LANG)));
    wp_enqueue_script('bdayh-min');
    wp_enqueue_script('bdayh-main');

    if(is_singular() && bdayh_get_option('post_og_meta') && ( !function_exists('bp_current_component') || (function_exists('bp_current_component') && !bp_current_component()))) {
        bd_og_data();
    }

    $sticky_sidebar = false;
    if( bdayh_get_option( 'sticky_sidebar' ) ){
        $sticky_sidebar = true;
        if( ( ( is_home() || is_front_page() ) && bdayh_get_option( 'ss_homepage' ) ) || (   is_page() && bdayh_get_option( 'ss_pages' ) ) || (   is_category() && bdayh_get_option( 'ss_cat' ) ) || (   is_single() && bdayh_get_option( 'ss_posts' ) ) || (   is_tag() && bdayh_get_option( 'ss_disable_tag' ) )  )
        {
            $sticky_sidebar = false;
        }
    }

    $bd_lazyload = false;
    if( bdayh_get_option( 'bd_lazyload' ) ){
        $bd_lazyload = true;
    }

    $bd_vars = array(
        "is_singular" => is_singular(),
        "bd_lazyload" => $bd_lazyload,
        "sticky_sidebar" => $sticky_sidebar,
        "post_reading_position_indicator" => bdayh_get_option( 'post_reading_position_indicator' ),
    );
    wp_localize_script('bdayh-main', 'bd', $bd_vars);


    // stylesheets
    wp_enqueue_style( 'default', get_stylesheet_uri(), array( 'dashicons' ), '2.2.0' );
    wp_enqueue_style( 'main', get_template_directory_uri().'/css/main.css', array(), '2.2.0', 'all' );

    if (class_exists('Woocommerce')){
        wp_register_style('bdayh-woocommerce', get_template_directory_uri().'/css/woocommerce.css' , array(), '', 'all');
        wp_enqueue_style('bdayh-woocommerce');
    }

    $bdayhChooseThemeColor = bdayh_get_option('theme_colors');
    if($bdayhChooseThemeColor)
    {
        if($bdayhChooseThemeColor == 'color2'){
            wp_enqueue_style('color-2', get_template_directory_uri() . '/css/color-2.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color3'){
            wp_enqueue_style('color-3', get_template_directory_uri() . '/css/color-3.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color4'){
            wp_enqueue_style('color-4', get_template_directory_uri() . '/css/color-4.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color5'){
            wp_enqueue_style('color-5', get_template_directory_uri() . '/css/color-5.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color6'){
            wp_enqueue_style('color-6', get_template_directory_uri() . '/css/color-6.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color7'){
            wp_enqueue_style('color-7', get_template_directory_uri() . '/css/color-7.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color8'){
            wp_enqueue_style('color-8', get_template_directory_uri() . '/css/color-8.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color9'){
            wp_enqueue_style('color-9', get_template_directory_uri() . '/css/color-9.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color10'){
            wp_enqueue_style('color-10', get_template_directory_uri() . '/css/color-10.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color0'){
	        wp_enqueue_style('color-0', get_template_directory_uri() . '/css/color-0.css', 'style');
        }

        elseif($bdayhChooseThemeColor == 'color01'){
	        wp_enqueue_style('color-01', get_template_directory_uri() . '/css/color-1.css', 'style');
        }
    }
}



/**
 * Multiple Featured Images
 * ----------------------------------------------------------------------------- *
 */
if(class_exists('kdMultipleFeaturedImages')){

    $i = 2;
    $bdKdNumber = bdayh_get_option('posts_slideshow_number');

    while($i <= $bdKdNumber){
        $args = array(
            'id' => 'featured-image-'.$i,
            'post_type' => 'post',
            'labels' => array(
                'name'      => 'Featured image '.$i,
                'set'       => 'Set featured image '.$i,
                'remove'    => 'Remove featured image '.$i,
                'use'       => 'Use as featured image '.$i,
            )
        );
        new kdMultipleFeaturedImages($args);

        $args = array(
            'id' => 'featured-image-'.$i,
            'post_type' => 'page',
            'labels' => array(
                'name'      => 'Featured image '.$i,
                'set'       => 'Set featured image '.$i,
                'remove'    => 'Remove featured image '.$i,
                'use'       => 'Use as featured image '.$i,
            )
        );
        new kdMultipleFeaturedImages($args);

        $args = array(
            'id' => 'featured-image-'.$i,
            'post_type' => 'wportfolio',
            'labels' => array(
                'name'      => 'Featured image '.$i,
                'set'       => 'Set featured image '.$i,
                'remove'    => 'Remove featured image '.$i,
                'use'       => 'Use as featured image '.$i,
            )
        );
        new kdMultipleFeaturedImages($args);

        $i++;
    }
}



/**
 * Images Functions
 * ----------------------------------------------------------------------------- *
 */
function bd_pin_image(){
    global $post;
    if (has_post_thumbnail($post->ID )) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        echo $image[0];
    }

    else {
        echo catch_that_image();
    }
}

function catch_that_image(){

    global $post;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    if(isset($matches[1][0])){
        $first_img = $matches[1][0];
    }

    else{
        $first_img = get_template_directory_uri().'/images/no-image.svg';
    }
    return $first_img;
}

function bd_post_image($size = 'thumbnail'){

    global $post;
    $image = '';
    $image_id = get_post_thumbnail_id($post->ID);
    $image = wp_get_attachment_image_src($image_id, 'full');
    $image = $image[0];

    if ($image) return $image;

    $vtype = get_post_meta($post->ID, 'bd_video_type', true);
    $vId = get_post_meta($post->ID, 'bd_video_url', true);

    if($vId != ''){
        if($vtype == 'youtube'){
            $image = 'http://img.youtube.com/vi/'.$vId.'/0.jpg';
        }

        elseif($vtype == 'vimeo') {
            $hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vId.php"));
            $image = $hash[0]['thumbnail_large'];
        }

        elseif ($vtype == 'daily') {
            $image = 'http://www.dailymotion.com/thumbnail/video/'.$vId;
        }
    }
    if ($image) return $image;
    return bd_get_first_image();
}

function bd_get_first_image(){

    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);

    if(isset($matches[1][0])){
        $first_img = $matches[1][0];
    }

    else {
        $first_img = get_template_directory_uri().'/images/no-image.svg';
    }
    return $first_img;
}



/**
 * Titles for WordPress before 4.1
 * ----------------------------------------------------------------------------- *
 */
if ( ! function_exists( '_wp_render_title_tag' ) )
{
    function bd_slug_render_title()
    {
        ?>
        <title><?php wp_title('|', true, 'right'); ?></title>
    <?php
    }

    add_action('wp_head', 'bd_slug_render_title');

    function bd_wp_title($title, $sep)
    {
        global $paged, $page;
        if (is_feed())
            return $title;

        // Add the site name.
        $title .= get_bloginfo('name');

        // Add the site description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            $title = "$title $sep $site_description";

        // Add a page number if necessary.
        if ($paged >= 2 || $page >= 2)
            $title = "$title $sep " . sprintf(__('Page %s', LANG), max($paged, $page));

        return $title;
    }

    add_filter('wp_title', 'bd_wp_title', 10, 2);
}



/**
 * OG Meta for posts
 * ----------------------------------------------------------------------------- *
 */
function bd_og_data()
{
    global $post;

    if (function_exists("has_post_thumbnail") && has_post_thumbnail()) {
        $post_thumb = bd_thumb_src('bd-related');
    }

    else {

        $idd = get_post_meta(get_the_ID(), 'bd_video_url', true);
        $protocol = is_ssl() ? 'https' : 'http';
        $video_type = '';
        if (get_post_meta(get_the_ID(), 'bd_video_type', true)) {
            $video_type = get_post_meta(get_the_ID(), 'bd_video_type', true);
        }

        if (!empty($idd)) {
            $video_url = $idd;
            if ($video_type == 'youtube') {
                $post_thumb = $protocol . '://img.youtube.com/vi/' . $video_url . '/0.jpg';
            } elseif ($video_type == 'vimeo') {
                $video_url = $idd;
                $url = $protocol . '://vimeo.com/api/v2/video/' . $video_url . '.php';;
                $contents = @file_get_contents($url);
                $thumb = @unserialize(trim($contents));
                $post_thumb = $thumb[0]['thumbnail_large'];
            } elseif ($video_type == 'daily') {
                $video_url = $idd;
                $post_thumb = 'http://www.dailymotion.com/thumbnail/video/' . $video_url;
            }
        }
    }
    $description = strip_tags(strip_shortcodes($post->post_content));
    ?>
    <meta property="og:title" content="<?php echo strip_shortcodes(strip_tags((get_the_title()))) ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="<?php echo strip_shortcodes(strip_tags((bd_content_limit($description, 100)))) ?>"/>
    <meta property="og:url" content="<?php the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo('name') ?>"/>
    <?php
    if (!empty($post_thumb)) {
        echo '<meta property="og:image" content="'.$post_thumb.'" />' . "\n";
    }
}

function bd_content_limit($text, $chars = 120){
    $text = $text . " ";
    $text = mb_substr($text, 0, $chars, 'UTF-8');
    $text = $text . "...";
    return $text;
}



/**
 * Search
 * ----------------------------------------------------------------------------- *
 */
function bd_search()
{
    ?>
    <div class="search-block">
        <form method="get" id="searchform" action="<?php echo home_url(); ?>/">
            <input type="text" class="search-field search-live" id="s" name="s" value="<?php _e('Search' , LANG) ?>" onfocus="if (this.value == '<?php _e('Search' , LANG) ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search' , LANG) ?>';}"  />
            <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
        </form>
    </div><!-- .search-block/--><?php
}



/**
 * Override theme default specification for product 3 per row
 * ----------------------------------------------------------------------------- *
 */
add_filter('loop_shop_columns', 'bdayh_wc_loop_shop_columns', 1, 10);
function bdayh_wc_loop_shop_columns($number_columns) {

    return 3;
}



/**
 * Number of product per page
 * ----------------------------------------------------------------------------- *
 */
$page_nu = "";
$bdayh_shop_per_page = bdayh_get_option( 'bdayh_shop_per_page' );
if( $bdayh_shop_per_page ){
    $page_nu = $bdayh_shop_per_page;
} else {
    $page_nu = 6;
}
add_filter('loop_shop_per_page', create_function('$cols', 'return '.$page_nu.';'));



/**
 * Woo Breadcrumb
 * ----------------------------------------------------------------------------- *
 */
add_filter('woocommerce_breadcrumb_defaults', 'bdayh_woocommerce_breadcrumbs');
function bdayh_woocommerce_breadcrumbs() {

    return array(
        'delimiter' => ' <i class="fa fa-angle-right bdayh-bread-sep"></i> ',
        'wrap_before' => '<div class="entry-crumbs">',
        'wrap_after' => '</div>',
        'before' => '',
        'after' => '',
        'home' => _x('Home', 'breadcrumb', 'woocommerce'),
    );
}

/**
 * Use own pagination
 * ----------------------------------------------------------------------------- *
 */
if (!function_exists('woocommerce_pagination')) {

    function woocommerce_pagination() {
        echo bd_pagenavi();
    }
}



/**
 * Post Categories
 * ----------------------------------------------------------------------------- *
 */
if ( ! function_exists( 'bd_post_categories' ) ) {

    function bd_post_categories(){

        $categories = get_the_terms(get_the_ID(), 'category');
        $separator = ', ';
        $categories_list = '';

        foreach ($categories as $category) {
            $categories_list .= $category->name . $separator;
        }

        $categories_output = trim($categories_list, $separator);

        return $categories_output;

    }
}


/**
 * Get the post time
 * ----------------------------------------------------------------------------- *
 */
function bd_get_time( $return = false ) {

    global $post ;
    if( bdayh_get_option( 'bdTimeFormat' ) == 'none' ){
        return false;
    }elseif( bdayh_get_option( 'bdTimeFormat' ) == 'modern' ){
        $to = current_time('timestamp'); //time();
        $from = get_the_time('U') ;

        $diff = (int) abs($to - $from);
        if ($diff <= 3600) {
            $mins = round($diff / 60);
            if ($mins <= 1) {
                $mins = 1;
            }
            $since = sprintf(_n('%s min', '%s mins', $mins), $mins) .' '. __( 'ago', LANG );
        }
        else if (($diff <= 86400) && ($diff > 3600)) {
            $hours = round($diff / 3600);
            if ($hours <= 1) {
                $hours = 1;
            }
            $since = sprintf(_n('%s hour', '%s hours', $hours), $hours) .' '. __( 'ago', LANG );
        }
        elseif ($diff >= 86400) {
            $days = round($diff / 86400);
            if ($days <= 1) {
                $days = 1;
                $since = sprintf(_n('%s day', '%s days', $days), $days) .' '. __( 'ago', LANG );
            }
            elseif( $days > 29){
                $since = get_the_time(get_option('date_format'));
            }
            else{
                $since = sprintf(_n('%s day', '%s days', $days), $days) .' '. __( 'ago', LANG );
            }
        }
    }else{
        $since = get_the_time(get_option('date_format'));
    }

    $post_time = '<span class="date updated bdayh-date">'.$since.'</span>';

    if( $return )
        return $post_time;
    else
        echo $post_time;
}


/**
 * The actual function that does the work and output the string of the estimated reading time of the post.
 * ----------------------------------------------------------------------------- *
 */
function bdayh_post_read_time() {

    $words_per_second_option = bdayh_get_option('words_per_minute');
    $prefix = "";
    $suffix = "";
    $time = "1";

    $post_id = get_the_ID();

    $content = apply_filters('the_content', get_post_field('post_content', $post_id));
    $num_words = str_word_count(strip_tags($content));
    $minutes = floor($num_words / $words_per_second_option);
    $seconds = floor($num_words % $words_per_second_option / ($words_per_second_option / 60));
    $estimated_time = $prefix;

    /*
    if($time == "1") {
        if($seconds >= 30) {
            $minutes = $minutes + 1;
        }
        $estimated_time = $estimated_time.' '.$minutes . ' min read'. ($minutes == 1 ? '' : '');
    }

    else {
        $estimated_time = $estimated_time.' '.$minutes . ' min read'. ($minutes == 1 ? '' : '') . ', ' . $seconds . ' second' . ($seconds == 1 ? '' : '');
    }
    */

    if($minutes){
        $estimated_time = $estimated_time . $minutes . '&nbsp;'. __( 'min read', LANG ) . ($minutes == 1 ? '' : '');
    }
    else {
        $estimated_time = $estimated_time . $seconds . '&nbsp;'. __( 'second read', LANG ) . ($seconds == 1 ? '' : '');
    }

    if($minutes < 1) {
        $estimated_time = $estimated_time." "; //Less than a minute
    }

    $estimated_time = $estimated_time.$suffix;

    echo $estimated_time;

}


/**
 * Remove Query Strings From Static Resources
 * ----------------------------------------------------------------------------- *
 */
function bd_remove_query_strings_1( $src ){
    $rqs = explode( '?ver', $src );
    return $rqs[0];

}
function bd_remove_query_strings_2( $src ){
    $rqs = explode( '&ver', $src );
    return $rqs[0];
}

if ( !is_admin() ) {
    add_filter( 'script_loader_src', 'bd_remove_query_strings_1', 15, 1 );
    add_filter( 'style_loader_src', 'bd_remove_query_strings_1', 15, 1 );
    add_filter( 'script_loader_src', 'bd_remove_query_strings_2', 15, 1 );
    add_filter( 'style_loader_src', 'bd_remove_query_strings_2', 15, 1 );
}



/**
 * Remove Shortcodes in excerpts
 * ----------------------------------------------------------------------------- *
 */
function bd_remove_shortcodes($text = '') {
    $raw_excerpt = $text;
    if ( '' == $text ) {
        $text = get_the_content('');

        $text = preg_replace( '/(\[(padding)\s?.*?\])/' , '' , $text);
        $text = str_replace( array ( '[notification]','[/notification]','[no_list]','[/no_list]','[yes_list]','[/yes_list]','[bd_table]','[/bd_table]','[line_list]','[/line_list]','[star_list]','[/star_list]','[button]','[/button]','[toggle title="Toggle title"]','[/toggle]','[divider]','[/divider]','[clear]','[three_fourth last=last]','[/three_fourth]','[three_fourth]','[/three_fourth]','[two_third last=last]','[/two_third]','[two_third]','[/two_third]','[one_fourth last=last]','[/one_fourth]','[one_fourth]','[/one_fourth]','[one_third last=last]','[/one_third]','[one_third]','[/one_third]','[dropcap]','[/dropcap]','[highlight]','[/highlight]','[one_half]','[/one_half]','[one_half last=last]','[/one_half]' ) ,"",$text);

        $text = strip_shortcodes( $text );

        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
        $excerpt_length = apply_filters('excerpt_length', 55);
        $excerpt_more = apply_filters('excerpt_more', ' ' . '[&hellip;]');
        $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
    }
    return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
add_filter( 'get_the_excerpt', 'bd_remove_shortcodes', 1);



/**
 * For old theme versions Video shortcode
 * ----------------------------------------------------------------------------- *
 */
function bd_video_fix_shortcodes($content){
    $v = '/(\[(video)\s?.*?\])(.+?)(\[(\/video)\])/';
    $content = preg_replace( $v , '[embed]$3[/embed]' , $content);
    return $content;
}
add_filter('the_content', 'bd_video_fix_shortcodes', 0);



/**
 * Change The Default WordPress Excerpt Length
 * ----------------------------------------------------------------------------- *
 */
function bd_excerpt_global_length() {
    return 40;
}

function bd_excerpt(){
    add_filter( 'excerpt_length', 'bd_excerpt_global_length', 999 );
    echo get_the_excerpt();
}

function bd_slider_global_length() {
    return 30;
}

function bd_slider_excerpt() {
    add_filter( 'excerpt_length', 'bd_slider_global_length', 999 );
    echo get_the_excerpt();
}

function bd_check_slso_global_length() {
    return 8;
}

function bd_check_slso() {
    add_filter( 'excerpt_length', 'bd_check_slso_global_length', 999 );
    echo get_the_excerpt();
}

function bd_classic1_global_length() {
    return 24;
}

function bd_classic1() {
    add_filter( 'excerpt_length', 'bd_classic1_global_length', 999 );
    echo get_the_excerpt();
}

function bd_grid_global_length() {
	return 21;
}

function bd_gird() {
	add_filter( 'excerpt_length', 'bd_grid_global_length', 999 );
	echo get_the_excerpt();
}


/**
 * Read More Functions
 * ----------------------------------------------------------------------------- *
 */
function bd_remove_excerpt( $more ) {
    return ' ...';
}
add_filter('excerpt_more', 'bd_remove_excerpt');



/**
 * Apply filter
 * ----------------------------------------------------------------------------- *
 */
if ( ! function_exists( 'body_classes_bd' ) ) {
    function body_classes_bd($classes)
    {

        $sticy = '';
        if ( bdayh_get_option( 'header_fix' ))
            $sticy = ' sticky-nav-on';

        $slug = strtolower(str_replace(' ', '-', trim(get_bloginfo('name'))));
        $classes[] = $slug;
        $classes[] = 'bd' . $sticy;
        return $classes;
    }

    add_filter('body_class', 'body_classes_bd');
}



/**
 * Lazy
 * ----------------------------------------------------------------------------- *
 */
if( bdayh_get_option( 'bd_lazyload' ) ) {

    function filter_lazyload($content)
    {
        return preg_replace_callback('/(<\s*img[^>]+)(src\s*=\s*"[^"]+")([^>]+>)/i', 'preg_lazyload', $content);
    }

    add_filter('the_content', 'filter_lazyload', 99);
    add_filter('post_thumbnail_html', 'filter_lazyload', 99);

    function preg_lazyload($img_match)
    {

        $img_replace = $img_match[1] . 'src="' . get_stylesheet_directory_uri() . '/images/grey.gif" data-original' . substr($img_match[2], 3) . $img_match[3];

        $img_replace = preg_replace('/class\s*=\s*"/i', 'class="lazy ', $img_replace);

        $img_replace .= '<noscript>' . $img_match[0] . '</noscript>';
        return $img_replace;
    }


	add_filter('post_thumbnail_html','add_class_to_thumbnail');
	function add_class_to_thumbnail($thumb) {
		$thumb = str_replace('attachment-', 'lazy attachment-', $thumb);
		return $thumb;
	}

}



/**
 * Avatar
 * ----------------------------------------------------------------------------- *
 */
function bdayh_get_avatar_url() {

    $user_email = get_the_author_meta( 'user_email' );
    $user_gravatar_url = 'http://www.gravatar.com/avatar/' . md5($user_email) . '?s=555';
    echo $user_gravatar_url;
}



/**
 * GET Post Thumbnail
 * ----------------------------------------------------------------------------- *
 */
function get_post_thumb(){

    global $post ;
    if ( has_post_thumbnail( $post->ID ) ){

        $image_id   = get_post_thumbnail_id( $post->ID );
        $image_url  = wp_get_attachment_image_src( $image_id,'full' );
        $image_url  = $image_url[0];
        return $ap_image_url = str_replace( get_option( 'siteurl' ),'', $image_url );
    }
}



/**
 * Bdayh Image
 * ----------------------------------------------------------------------------- *
 */
function bdayh_img( $width='' , $height='', $type=false ) {

    global $post;
    $image_id   = get_post_thumbnail_id( $post->ID );
    $image_url  = wp_get_attachment_image( $image_id, array( $width, $height ), false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title(), '' ) );

    if( $type == true ) {
        return $image_url;
    } else {
        echo $image_url;
    }
}



/**
 * Bdayh Image URL
 * ----------------------------------------------------------------------------- *
 */
function bdayh_img_url( $width='' , $height='' ){

    global $post;
    $image_id   = get_post_thumbnail_id( $post->ID );
    $image_url  = wp_get_attachment_image( $image_id, array( $width, $height ), false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title() ) );
    echo $image_url[0];
}
function bd_thumb_src( $size = 'widget-small' ){
    global $post;
    $image_id = get_post_thumbnail_id($post->ID);
    $image_url = wp_get_attachment_image_src($image_id, $size );
    return $image_url[0];
}



/**
 * Bdayh Image Custom
 * ----------------------------------------------------------------------------- *
 */
function bdayh_img_url_custom( $image_id, $width='' , $height='' ){

    global $post;
    $image_url  = wp_get_attachment_image( $image_id, array( $width, $height ), false, array( 'alt'   => get_the_title() ,'title' =>  get_the_title() ) );
    echo $image_url[0];
}



/**
 * Images full quality
 * ----------------------------------------------------------------------------- *
 */
add_filter( 'jpeg_quality', 'bdayh_image_full_quality' );
add_filter( 'wp_editor_set_quality', 'bdayh_image_full_quality' );
function bdayh_image_full_quality( $quality ) {
    return 100;
}



/**
 * Get All Categories IDs
 * ----------------------------------------------------------------------------- *
 */
function bd_get_all_category_ids(){
    $categories = array();
    $get_cats = get_terms( 'category');
    if ( ! empty( $get_cats ) && ! is_wp_error( $get_cats ) ){
        foreach ( $get_cats as $cat )
            $categories[] = $cat->term_id;
    }
    return $categories;
}



/**
 * Post views
 * ----------------------------------------------------------------------------- *
 */
function getPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0".__(' View', LANG);
    }
    return $count. __(' views', LANG);
}

function setPostViews($postID)
{
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count=='')
    {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults)
{
    $defaults['post_views'] = __('views', LANG);
    return $defaults;
}
function posts_custom_column_views($column_name, $id)
{
    if($column_name === 'post_views')
    {
        echo getPostViews(get_the_ID());
    }
}

// Thumbnail Admin Posts
add_filter('manage_posts_columns', 'posts_column_thumb');
add_action('manage_posts_custom_column', 'posts_custom_column_thumb',10,2);
function posts_column_thumb($posts_columns)
{
    $columns = array();
    foreach ($posts_columns as $column => $name){
        if ($column == 'title'){
            $columns['Thumbnail'] = '<span class="dashicons dashicons-format-image"></span>';
            $columns[$column] = $name;
        } else $columns[$column] = $name;
    }
    return $columns;
}
function posts_custom_column_thumb($column_name, $id){
    if($column_name === 'Thumbnail'){
        if ( function_exists("has_post_thumbnail") && has_post_thumbnail() ) {
            bdayh_img( '40', '40' );
        }
    }
}



/**
 * Comments
 * ----------------------------------------------------------------------------- *
 */
function bd_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    $add_below = '';

    ?>
<li <?php comment_class('comment-box'); ?> id="comment-<?php comment_ID() ?>">
    <div class="comment-header">
        <?php echo get_avatar($comment, 50); ?>
        <h3><?php echo get_comment_author_link() ?></h3>
        <p class="comment-meta">
            <?php printf('%1$s '.__('at', LANG).' %2$s', get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(' - '.__('Edit', LANG),'  ','') ?>
        </p>
    </div>
    <div class="comment-body">
        <p>
            <?php if ($comment->comment_approved == '0') : ?>
                <em><?php echo __('Your comment is awaiting moderation.', LANG) ?></em><br />
            <?php endif; ?>
            <?php comment_text() ?>
        </p>
        <p class="tm-js-reply">
            <?php
            if ( is_rtl() ) {
                comment_reply_link(array_merge( $args, array('reply_text' => '<i class="icon-share-alt"></i> '.__('Reply', LANG), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
            } else {
                comment_reply_link(array_merge( $args, array('reply_text' => '<i class="icon-mail-reply"></i> '.__('Reply', LANG), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) );
            }
            ?>
        </p>
    </div>
</li>
<?php
}


/*
function  strip_shortcode_audio( $content ) {

    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if ( ! empty( $matches ) ) {
        foreach ( $matches as $shortcode ) {
            if ( 'audio' === $shortcode[2] ) {
                $pos = strpos( $content, $shortcode[0] );
                if ($pos !== false)
                    return substr_replace( $content, '', $pos, strlen($shortcode[0]) );
            }
        }
    }
}

function remove_audio( $content ) {

    if ( get_post_format( get_the_ID() ) == 'audio' ) {
        $content = strip_shortcode_audio( get_the_content() );
    }
    return $content;
}
add_filter( 'the_content', 'remove_audio', 6);



function first_audio_id( $content = null ) {

    if ( !$content ) {
        $content = get_the_content();
    }

    preg_match_all( '/'. get_shortcode_regex() .'/s', $content, $matches, PREG_SET_ORDER );
    if (!empty($matches)) {
        foreach ( $matches as $shortcode ) {
            if ( 'audio' === $shortcode[2] ) {
                $atts = shortcode_parse_atts( $shortcode[3] );
                if ( ! empty( $atts['ids'] ) ) {
                    $ids = explode( ',', $atts['ids'] );
                    return $ids;
                }
            }
        }
    }
    return false;
}
*/
?>
