<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-2 hidden-sm hidden-xs">
			<?php include 'parts/cate-list.php';?>
		</div>
		<main class="col-md-7 col-sm-9 col-xs-12"> <!-- listing box-->
			<?php
				//print_r($wp_query);
				include 'parts/switch-city.php';
				if(isset($_GET['cat']){
					$ad_query = new WP_Query( array( 'tag' => 'ad-top', 'category__in' => $_GET['cat']));
				}
				else{				
					$cate_name=parsePath($_SERVER['REQUEST_URI'],'category',1)?parsePath($_SERVER['REQUEST_URI'],'category',1):parsePath($_SERVER['REQUEST_URI'],'category');
					if($cate_name=='page') $cate_name=parsePath($_SERVER['REQUEST_URI'],'category');
					//echo $cate_name;
					$ad_query = new WP_Query( array( 'tag' => 'ad-top', 'category__in' => get_category_by_slug($cate_name)->term_id));
				}
				if ( $ad_query->have_posts() ) {
					while ( $ad_query->have_posts() ) {
						$ad_query->the_post();
						include 'parts/ad-listed-item.php';
					}
				}
				wp_reset_postdata();
				if ( have_posts() ) : 
					while ( have_posts() ) : 
						the_post();
						include 'parts/listed-item.php';
					endwhile;
				else:
					include 'parts/no-result.php';
				endif; 
			?>
		</main>
		<div class="col-md-3 col-sm-3 col-xs-12 cate-ad-container">
			<?php include 'parts/article-list.php'; ?>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- cate page ad -->
			<ins class="adsbygoogle"
				style="display:block"
				data-ad-client="ca-pub-9173929910659094"
				data-ad-slot="8848782100"
				data-ad-format="auto"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		<div class="clearfix"></div>
		<div class="listing-pagination col-md-12 col-xs-12">
			<?php 
				the_posts_pagination( array(
					'mid_size' => 1,
					'prev_text' => __( '<', 'Prev' ),
					'next_text' => __( '>', 'Next' ),
					'screen_reader_text' => '这你也能找到？',
				)); 
			?> 
		</div>
	</div>
</div>
<?php get_footer(); ?>
