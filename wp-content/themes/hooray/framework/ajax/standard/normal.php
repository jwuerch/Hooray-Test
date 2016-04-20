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

		<div class="blog-v1 blog-v">
			<div id="containn">

				<div id="content">
					<main id="site-main" class="site-main" role="main">

						<?php if ( have_posts() ) : ?>

							<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								get_template_part( 'content', get_post_format() );

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
				</div><!-- #content /-->

			</div>
		</div><!-- .blog-v1 /-->

		<div class="clear"></div>
	</div><!-- .bd-main /-->

	<?php get_sidebar(); ?>
</div><!-- .bd-container /-->