<?php get_header(); ?>
	<div id="primary" class="content-area container">
		<main id="main" class="site-main row" role="main">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>
