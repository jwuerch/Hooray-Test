<?php
/**
 * Post.
 * ----------------------------------------------------------------------------- *
 */
global $post, $wp_query, $bd_data;

$get_meta       = get_post_custom( get_the_ID() );
$bdCurrentID    = get_the_ID();
$post_type      = get_post_meta( $bdCurrentID, 'bd_post_type', true );

// Rating
$bd_criteria_display = get_post_meta( $bdCurrentID, 'bd_criteria_display', true );

// Title Position.
$title_position = '';
$bdayh_post_title = bdayh_get_option('bdayh_post_title');

if( $bdayh_post_title == 'above' ) { $title_position = " title-position-above"; }
elseif ($bdayh_post_title == 'below') { $title_position = " title-position-below"; } ?>

<article class="isotope-item post-item post-id">

	<?php
	// Post Top Des
	get_template_part( 'framework/loop/post-topdes' ); ?>

	<?php
	// Post Media.
	$is_home            = bdayh_get_option('home_featured_image');
	$is_post            = bdayh_get_option('post_featured_image');
	$size               = "bd-related";
	$bd_video_id        = '';
	$bd_video_embed     = '';
	$bd_audio_url       = '';
	$bd_post_format     = '';
	if( isset($get_meta["bd_video_url"][0]) ){
		$bd_video_id    = $get_meta["bd_video_url"][0];
	}

	if( isset($get_meta["bd_embed_code"][0]) ){
		$bd_video_embed = $get_meta["bd_embed_code"][0];
	}

	if( isset($get_meta["bd_soundcloud_url"][0]) ){
		$bd_audio_url   = $get_meta["bd_soundcloud_url"][0];
	}

	if( isset($get_meta["bd_post_type"][0]) ){
		$bd_post_format = $get_meta["bd_post_type"][0];
	}

	if ( 'video' == get_post_format() ) {
		if( $bd_video_id || $bd_video_embed ) {
			bd_wp_video('800', '350');
		}
		elseif( is_single() ) {

			if( $is_post == 1 || $bd_post_format == 'post_image' ) {
				bdaia_img( $size );
			}
		}
		else {

			if( $is_home == 1 || $bd_post_format == 'post_image' ) {
				bdaia_img( $size );
			}
		}
	}
	elseif ( 'audio' == get_post_format() ) {
		if( $bd_post_format == 'post_soundcloud' ) {
			if ($bd_audio_url) bd_wp_sc();
		}
		elseif( is_single() ) {

			if( $is_post == 1 || $bd_post_format == 'post_image' ) {
				bdaia_img( $size );
			}
		}
		else {

			if( $is_home == 1 || $bd_post_format == 'post_image' ) {
				bdaia_img( $size );
			}
		}
	}
	elseif ( 'gallery' == get_post_format() ) {
		if( $bd_post_format == 'post_slider' ) bd_wp_gallery();
		elseif( $bd_post_format == 'post_grid_gallery' ) bd_wp_gallery_grid();
	}
	elseif( is_single() ) {

		if( $is_post == 1 || $bd_post_format == 'post_image' ) {
			bdaia_img( $size );
		}
	}
	else {

		if( $is_home == 1 || $bd_post_format == 'post_image' ) {
			bdaia_img( $size );
		}
	}
	?>
	<div class="bdayh-clearfix"></div>

	<div class="bdaia-blog-masonry-post-content">
		<div class="bdayh-post-header">
			<?php the_title( '<h2  class="entry-title"><a href="' . esc_url( get_permalink() ) . '" >', '</a></h2>' ); ?>
		</div><!-- .bdayh-post-header /-->

		<?php
		// No Contnet
		if($post->post_content=="")
			$no_content = " no-content";
		else
			$no_content = "";
		?>

		<?php
		if( !$post->post_content=="" ){
			?>
			<div class="post-formats-exc<?php echo $no_content; ?>"><?php bd_excerpt(); ?></div>
			<div><a class="masonry-more-link" href="<?php the_permalink(); ?>"><?php _e('Continue Reading...', LANG); ?></a></div>
			<?php
		}
		?>

		<?php
		// Post Sharing.
		if(  bdayh_get_option( 'social_sharing_boox' ) ) {
			?>
			<div class="home-post-share">
				<?php get_template_part( 'framework/global/social-sharing' ); ?>
			</div>
		<?php } ?>

		<div class="bbd-post-cat">
			<div class="bbd-post-cat-content">

				<?php
				// Author.
				if( bdayh_get_option( 'post_meta_author' ) == 1 ) : ?>
					<div class="bdayh-post-meta-author">
						<i class='fa fa-user'></i> <?php the_author_posts_link(); ?></span>
					</div><!-- .bdayh-post-meta-author /-->
				<?php endif; ?>

				<?php
				// Date.
				if( bdayh_get_option( 'post_meta_date' ) == 1 ) : ?>
					<div class="bdayh-post-meta-date">
						<i class='fa fa-clock-o'></i>
						<?php bd_get_time(); ?>
					</div><!-- .bdayh-post-meta-date /-->
				<?php endif; ?>

			</div>
		</div>
	</div>
</article><!-- .post /-->