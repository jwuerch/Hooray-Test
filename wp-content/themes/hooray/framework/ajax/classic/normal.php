<div class="bd-container">
	<div class="bd-main">

		<?php
		// Slider
		get_template_part( 'framework/global/slider' );

		// Global.
		global $post;
		$paged = ( get_query_var("paged") != ""?(int)get_query_var("paged"):(get_query_var("page") != ""?(int)get_query_var("page"):1) );

		// Query Post.
		$wpcats = bd_get_all_category_ids();
		query_posts( 'ignore_sticky_posts=0&paged='.$paged.'', array( 'category__in' => $wpcats ) );

		?>

		<div id="bdayh-classic-v1" class="bdayh-classic-v1">
			<main id="site-main" class="site-main" role="main">
				<?php
				if ( have_posts() ) :

					// Start the loop.
					while ( have_posts() ) : the_post();

						get_template_part( 'framework/loop/classic1', get_post_format() );

						// End the loop.
					endwhile;

					// Page Navi
					bd_pagenavi();

				// If no content, include the "No posts found" template.
				else :

					get_template_part( 'framework/loop/not-found' );

				endif;
				?>
			</main>
		</div><!-- .bdayh-classic-v1 /-->
	</div><!-- .bd-main /-->

	<?php get_sidebar(); ?>
</div><!-- .bd-container /-->