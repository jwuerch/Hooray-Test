<?php
/**
 * Post Quote.
 * ----------------------------------------------------------------------------- *
 */
global $post, $wp_query, $bd_data;

$bdCurrentID = get_the_ID();
$post_type = get_post_meta($bdCurrentID, 'bd_post_type', true);

// Rating
$bd_criteria_display = get_post_meta($bdCurrentID, 'bd_criteria_display', true);

// Title Position.
$title_position = "";
$bdayh_post_title = bdayh_get_option('bdayh_post_title');

if( $bdayh_post_title == 'above' ) { $title_position = " title-position-above"; }
elseif ($bdayh_post_title == 'below') { $title_position = " title-position-below"; }

$post_reviews = get_post_meta(get_the_ID(), 'bd_review_enable', true);
$baia_itemscope = "";
if( $post_reviews ) {
	$baia_itemscope = ' itemscope itemtype="http://schema.org/Review"';
}
else {
	$baia_itemscope = ' itemscope itemtype="http://schema.org/Article"';
}
?>
<?php if( is_single() ){ ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('isotope-item post-item post-id'.$title_position); ?> <?php echo $baia_itemscope; ?>>
	<?php
	// Itemscope.
	global $post_author, $post;
	$author_id = '';
	if( isset( $post_author->id ) ) $author_id = $post_author->id;
	$image_id                       = get_post_thumbnail_id( $post->ID );
	$image_url                      = wp_get_attachment_image_src( $image_id, 'full' );
	$image_url                      = $image_url[0];
	$bd_date_unix                   = get_the_time('U', $post->ID);

	$logo = '';
	if( bdayh_get_option( 'logo_upload' ) ) {
		$logo = bdayh_get_option( 'logo_upload' );
	} else {
		$logo = get_template_directory_uri() .'/images/logo.png';
	}
	?>
	<span style="display: none;" itemprop="author" itemscope="" itemtype="https://schema.org/Person">
							<meta itemprop="name" content="<?php echo get_the_author_meta( 'display_name', $author_id ); ?>">
						</span>
	<meta itemprop="interactionCount" content="UserComments:<?php echo get_comments_number( $post->ID ); ?>">
	<meta itemprop="datePublished" content="<?php echo date(DATE_W3C, $bd_date_unix);?>">
	<meta itemprop="dateModified" content="<?php echo date(DATE_W3C, $bd_date_unix);?>">
	<meta itemscope="" itemprop="mainEntityOfPage" itemtype="https://schema.org/WebPage" itemid="<?php echo esc_url( get_permalink( $post->ID ) );?>">
	                <span style="display: none;" itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
							<span style="display: none;" itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
								<meta itemprop="url" content="<?php echo esc_url( $logo );?>">
							</span>
							<meta itemprop="name" content="<?php echo bloginfo('name'); ?>">
						</span>
	<meta itemprop="headline " content="<?php echo get_the_title(); ?>">
	                <span style="display: none;" itemprop="image" itemscope="" itemtype="https://schema.org/ImageObject">
							<meta itemprop="url" content="<?php echo esc_url ( $image_url );?>">
							<meta itemprop="width" content="1240">
							<meta itemprop="height" content="540">
						</span>
	<?php } else { ?>
	<article class="isotope-item post-item post-id<?php echo $title_position; ?>">
		<?php } ?>

    <?php
    // Post Top Des
    get_template_part( 'framework/loop/post-topdes' ); ?>

    <?php
    // No Contnet
    if($post->post_content=="")
        $no_content = " no-content";
    else
        $no_content = "";
    ?>

    <div class="entry entry-content<?php echo $no_content; ?>">

        <div class="bdayh-post-Featured">
            <?php get_template_part( 'framework/global/post-title' ); ?>
            <?php get_template_part( 'framework/global/post-meta' ); ?>
        </div><!-- .bdayh-post-Featured /-->

        <?php
        // The Content
        the_content(); ?>

        <?php
        // Post Sharing.
        if( is_single() && bdayh_get_option( 'social_sharing_box' ) ) {
            ?>
            <div class="home-post-share">
                <?php get_template_part( 'framework/global/social-sharing' ); ?>
            </div>
        <?php } ?>

    </div><!-- .entry-content /-->

</article><!-- .post /-->