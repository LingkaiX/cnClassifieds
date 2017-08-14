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
		<div id="post-<?php the_ID(); ?>" <?php post_class( 'wppl-single-result basic-listing'); ?>>
			
			<!--  自制列表内容  -->
			<?php print_r($post); the_title( '<h3 class="entry-title"> <a href="'.get_permalink() . '">', '</a></h3>' ); ?>

			
		</div> <!--  single- wrapper ends -->
		
		<div class="clear"></div>     

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
