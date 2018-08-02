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
						$cate_name = &get_category($_GET['cat'])->name;
					}
					else{				
						$cate_name=parsePath($_SERVER['REQUEST_URI'],'category',1)?parsePath($_SERVER['REQUEST_URI'],'category',1):parsePath($_SERVER['REQUEST_URI'],'category');
						if($cate_name=='page') $cate_name=parsePath($_SERVER['REQUEST_URI'],'category');
						$cate_name=get_category_by_slug($cate_name)->name;
						//echo $cate_name;
					}
					if(isset($_GET['lat'])&&isset($_GET['long'])){
						$lat=$_GET['lat'];
						$long=$_GET['long'];
						if($lat&&$long){
							if(geodistance(-37.820038, 145.126977, $lat, $long)<200){
								$addtop = array('AddTop-'.$cate_name.'-melbourne','AddTop-'.$cate_name,'AddTop-Allcat-melbourne', 'AddTop-all');
							}
							else if(geodistance(-33.876145, 151.207652, $lat, $long)<200){
								$addtop = array('AddTop-'.$cate_name.'-sydney','AddTop-'.$cate_name,'AddTop-Allcat-sydney', 'AddTop-all');
							}
							else if(geodistance(-31.945046,115.841828, $lat, $long)<200){
								$addtop = array('AddTop-'.$cate_name.'-perth','AddTop-'.$cate_name,'AddTop-Allcat-perth', 'AddTop-all');
							}
							else{
								$addtop = array('AddTop-'.$cate_name.'-melbourne','AddTop-'.$cate_name.'-sydney','AddTop-'.$cate_name.'-perth','AddTop-'.$cate_name,'AddTop-Allcat-sydney','AddTop-Allcat-perth','AddTop-Allcat-melbourne','AddTop-all');
							};
						}
					}
					else{
						$addtop = array('AddTop-'.$cate_name.'-melbourne','AddTop-'.$cate_name.'-sydney','AddTop-'.$cate_name.'-perth','AddTop-'.$cate_name,'AddTop-Allcat-sydney','AddTop-Allcat-perth','AddTop-Allcat-melbourne','AddTop-all');
					}
					$ad_query = new WP_Query( array('tag' => $addtop));
					if ( $ad_query->have_posts() ) {
						while ( $ad_query->have_posts() ) {
							$ad_query->the_post();
							//$cate = get_the_category();
							//$catename = wp_list_pluck($cate,'slug');
							//$mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".get_the_ID());
							//echo $mypost->lat.  $mypost->long;
							include 'parts/ad-listed-item.php';
						}
					}
					$topad_ids = wp_list_pluck($ad_query->posts, 'ID');
					wp_reset_postdata();
					//$count=0; $rand=rand(1,9);
					if ( have_posts() ) : 
						while ( have_posts() ) : 
							the_post();
							$id=get_the_ID();
							if(!in_array($id , $topad_ids)){
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
			<!--<ins class="adsbygoogle"
				style="display:block"
				data-ad-client="ca-pub-9173929910659094"
				data-ad-slot="8848782100"
				data-ad-format="auto"></ins>
			<script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
			<!-- /21666183985/below-sidebar-article-300x600 -->
			<div id='div-gpt-ad-1533174357200-0' style='margin:auto; height:600px; width:300px;'>
				<script>
					googletag.cmd.push(function() { googletag.display('div-gpt-ad-1533174357200-0'); });
				</script>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
