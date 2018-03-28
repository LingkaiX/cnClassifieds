<?php get_header(); ?>
<div class="container">
	<!-- <div class="row">
		<div class="show-search-query col-md-10 col-md-offset-1 col-xs-12">
			<h4 class="bg-warning">
				<?php 
				//print_r($wp_query); 
				printf( esc_html__( '搜索： %s', 'cnclassifieds' ), '<span>' . get_search_query() . '</span>' ); ?>
			</h4>
		</div>
	</div> -->
	<div class="row result-container">
		<div class="col-md-9 col-sm-9 col-xs-12 result-left"><div class="row">
			<div class="col-md-3 hidden-sm hidden-xs">
				<?php include 'parts/sidebar-cate-list.php';?>
			</div>
			<main class="col-md-9 col-sm-12 col-xs-12"> <!-- listing box-->
			<?php
				if ( have_posts() ){
					while ( have_posts() ) : 
						the_post();
						include 'parts/listed-item.php';
					endwhile;
				} else include 'parts/no-result.php';
			?>
			</main>
			<div class="clearfix"></div>
			<div class="listing-pagination col-md-12 col-xs-12">
				<?php 
					the_posts_pagination( array(
						'mid_size' => 1,
						'prev_text' => __( '<', 'h' ),
						'next_text' => __( '>', 'q' ),
					)); 
				?> 
			</div>
		</div></div>
		<div class="col-md-3 col-sm-3 col-xs-12 result-right">
			<?php include 'parts/sidebar-article-list.php'; ?>
			<ins class="adsbygoogle"
				style="display:block"
				data-ad-client="ca-pub-9173929910659094"
				data-ad-slot="8848782100"
				data-ad-format="auto"></ins>
			<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
		</div>
	</div>
</div>
<?php get_footer(); ?>
