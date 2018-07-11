<?php get_header(); ?>
<div class="container">
	<div class="row result-container">
		<div class="col-md-9 col-sm-9 col-xs-12 result-left"><div class="row">
			<div class="col-md-3 hidden-sm hidden-xs">
				<?php include 'parts/sidebar-cate-list.php';?>
			</div>
			<main class="col-md-9 col-sm-12 col-xs-12"> <!-- listing box-->
				<?php
					if(isset($_GET['cat'])){
						$ad_query = new WP_Query( array( 'tag' => 'ad-top-'.get_category_by_slug($cate_name)->name, 'category__in' => $_GET['cat']));
						$rand_query = new WP_Query( array( 'tag' => 'random-location', 'category__in' => $_GET['cat']));
					}
					else{				
						$cate_name=parsePath($_SERVER['REQUEST_URI'],'category',1)?parsePath($_SERVER['REQUEST_URI'],'category',1):parsePath($_SERVER['REQUEST_URI'],'category');
						if($cate_name=='page') $cate_name=parsePath($_SERVER['REQUEST_URI'],'category');
						//echo $cate_name;
						$addtop = array('AddTop-'.get_category_by_slug($cate_name)->name, 'AddTop-ALL');
						$ad_query = new WP_Query( array( 'tag' => $addtop, 'category__in' => get_category_by_slug($cate_name)->term_id));
						//$rand_query = new WP_Query( array( 'tag' => 'random-location', 'category__in' => get_category_by_slug($cate_name)->term_id));
					}
					if ( $ad_query->have_posts() ) {
						while ( $ad_query->have_posts() ) {
							$ad_query->the_post();
							include 'parts/ad-listed-item.php';
						}
					}
					$addtop_ids = wp_list_pluck($ad_query->posts, 'ID');
					
					wp_reset_postdata();
					//$post_ids_string = implode( ',', $post_ids );
					//$count=0; $rand=rand(1,9);
					if ( have_posts() ) : 
						while ( have_posts() ) : 
							//随机投放
							//$count++;
							//if($count==$rand){
								//while ( $rand_query->have_posts() ) {
									//$post = get_post();
									//include 'parts/ad-listed-item.php';
								//}
							//}
							the_post();
							$id=get_the_ID();
							if(!in_array($id , $addtop_ids)){
								include 'parts/listed-item.php';
							}
						endwhile;
					else:
						include 'parts/no-result.php';
					endif; 
				?>
			</main>
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
