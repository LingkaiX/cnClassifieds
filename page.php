<?php get_header(); ?>
	<div id="primary" class="content-area container">
		<main id="main" class="site-main row" role="main">
			<div class="col-md-12">
			<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile; // End of the loop.
			?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
