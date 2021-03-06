<?php
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
?>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="basic-listing ad-post-<?php echo $post->ID; ?>">
            <div class="row">
                <div class="col-md-12 col-xs-12 listed-header">                    
                    <?php 
                        $img=get_the_post_thumbnail( null, 'full', ['class' => 'listed-logo', 'title' => 'Logo'] );
                        $enTitle=get_post_meta($post->ID,'title-en',true); 
                        if($img!=null){
                            echo $img;
                            echo '<div>';
                            the_title( '<h4 class="entry-title" ><a href="'.get_permalink().'">', '</a><span class="_mB">AD</span></h4>' );
                            if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>';
                            echo '</div>';
                        }else{
                            the_title( '<h4 class="entry-title"><a href="'.get_permalink().'">', '</a><span class="_mB">AD</span></h4>' );
                            if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>'; 
                        }                    
                        echo '<a style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;" href="'.get_permalink().'"></a>';
                        //the_title( '<div class="col-md-12 col-xs-12"><h4 class="entry-title"><a href="'.get_permalink().'">', '</a></h4></div>' );                       
                    ?>                
                </div>
                <div class="col-md-12 col-xs-12 listed-contact">
                    <?php
                        if($mypost!=null){
                            if(!empty($mypost->phone)) echo '<p><i class="ionicon ion-ios-telephone-outline" aria-hidden="true"></i><a href="tel:'.$mypost->phone.'">'.$mypost->phone.'</a></p>';
                            if(!empty($mypost->email)) echo '<p><i class="ionicon ion-ios-email-outline" aria-hidden="true"></i><span>'.$mypost->email.'</span></p>';
                            if(!empty($mypost->website)) echo '<p><i class="ionicon ion-ios-world-outline" aria-hidden="true"></i><a target="_blank" rel="noopener" href="'.$mypost->website.'">'.removeScheme($mypost->website).'</a></p>';
                            if(!empty($mypost->address)) echo '<p><i class="ionicon ion-ios-navigate-outline" aria-hidden="true"></i><span>'.$mypost->address.'</span></p>';
                        }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 listed-excerpt">
                    <?php
                        //echo cutExcerpt($post->post_excerpt);
                        echo cutExcerpt(has_excerpt()?$post->post_excerpt:strip_tags($post->post_content));
                        if(!isDefaultTemplete($post->ID)){
                            echo '<a class="listed-more" href="'.get_the_permalink().'" title="'.get_the_title().'">more</a>';
                        }
                    ?>
                </div>
                <div class="col-md-12 col-xs-12 listed-btns"><div style="display: inline-block;">
                    <?php 
                        if(isDefaultTemplete($post->ID)):
                    ?>
                        <a class="btn btn-more" href="<?php echo get_permalink() ?>">更多详情...</a>
                    <?php endif; ?>
                    <?php include 'enquiry-form.php'; ?>
                </div></div>
            </div>
        </div>
    </div>
</div>