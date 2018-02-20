<?php
/**
 * Custom - Results Page.
 * @version 1.0
 * @author Eyal Fitoussi
 */
?>
<?php $themedict=getcwd().'/wp-content/themes/cnclassifieds/'; ?>

<div class="col-md-2 hidden-sm hidden-xs">
	<?php include $themedict.'parts/cate-list.php';?>
</div>
<div class="col-md-7 col-sm-9 col-xs-12"> <!-- listing box-->
<!--  this is where wp_query loop begins -->
	<?php while ( $gmw_query->have_posts() ) : $gmw_query->the_post(); ?>
		<!--  single results wrapper  -->
			<!--  自制列表内容  -->
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<div class="basic-listing post-<?php echo $post->ID; ?>">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<div class="row listed-header">
									<div class="col-md-8 col-xs-8"><?php the_title('<h3>', '</h3>'); ?></div>
									<div class="listed-logo col-md-4 col-xs-4"><?php the_post_thumbnail( 'full', ['class' => 'in-listed-logo', 'title' => 'Feature image']); ?></div>
									<div class="clearfix"></div>
									<div class="listed-contact col-md-12 col-xs-12">
										<?php
											//gmw_directions_link( $post, $gmw, $gmw['labels']['search_results']['directions'] );
											if(!empty($mypost->phone)) echo '<p><i class="ionicon ion-ios-telephone-outline" aria-hidden="true"></i><span>'.$mypost->phone.'</span></p>';
											if(!empty($mypost->email)) echo '<p><i class="ionicon ion-ios-email-outline" aria-hidden="true"></i><span>'.$mypost->email.'</span></p>';
											if(!empty($mypost->website)) echo '<p><i class="ionicon ion-ios-world-outline" aria-hidden="true"></i><a target="_blank" href="'.$mypost->website.'">'.removeScheme($mypost->website).'</a></p>';
											if(!empty($mypost->address)) echo '<p><i class="ionicon ion-ios-navigate-outline" aria-hidden="true"></i><span>'.$mypost->address.'</span></p>';
										?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>			
		<!--  single- wrapper ends -->		
	<?php endwhile; ?>
</div>
<div class="col-md-3 col-sm-3 col-xs-12"></div>
<div class="clearfix"></div>
<div class="listing-pagination col-md-12 col-xs-12">
	<!--  paginations -->
	<div class="gmw-pt-pagination-wrapper gmw-pt-bottom-pagination-wrapper">
		<?php gmw_per_page( $gmw, $gmw['total_results'], 'paged' ); ?><?php gmw_pagination( $gmw, 'paged', $gmw['max_pages'] ); ?>
	</div> 
</div>

<?php wp_reset_postdata();?>
