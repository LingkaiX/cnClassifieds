<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="show-search-query col-md-10 col-md-offset-1 col-xs-12">
			<h4 class="bg-warning">
				<?php printf( esc_html__( '搜索： %s', 'cnclassifieds' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h4>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2 hidden-sm hidden-xs">
			<?php include 'parts/cate-list.php';?>
		</div>
		<div class="col-md-7 col-sm-9 col-xs-12"> <!-- listing box-->
			<?php 
				if ( have_posts() ){
					while ( have_posts() ) : 
						the_post();
						include 'parts/listed-item.php';
					endwhile;
				} else include 'parts/no-result.php';
			?>
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12"></div>
		<div class="clearfix"></div>
		<div class="listing-pagination col-md-12 col-xs-12">
			<?php 
				the_posts_pagination( array(
					'mid_size' => 10,
					'prev_text' => __( '<<<', 'h' ),
					'next_text' => __( '>>>', 'q' ),
				)); 
			?> 
		</div>
	</div>
</div>

<?php get_footer(); ?>
