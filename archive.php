<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-2 hidden-sm hidden-xs">
			<?php include 'parts/cate-list.php';?>
		</div>
		<div class="col-md-7 col-sm-9 col-xs-12"> <!-- listing box-->
			<?php 
				if ( have_posts() ) : 
					while ( have_posts() ) : 
						the_post();
						include 'parts/listed-item.php';
					endwhile;
				endif; 
			?>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12"></div>
		<div class="clearfix"></div>
		<div class="listing-pagination col-md-12 col-xs-12">
			<?php 
				the_posts_pagination( array(
					'mid_size' => 1,
					'prev_text' => __( 'Prev', 'h' ),
					'next_text' => __( 'Next', 'q' ),
					'screen_reader_text' => '这你也能找到？',
				)); 
			?> 
		</div>
	</div>
</div>

<?php get_footer(); ?>
