<?php
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
?>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="basic-listing box-round-shadow post-<?php echo $post->ID; ?>">
            <div class="row">
                <div class="col-md-12 col-xs-12 listed-header">                    
                    <?php 
                        $img=get_the_post_thumbnail( null, 'full', ['class' => 'listed-logo', 'title' => 'Logo'] );
                        $enTitle=get_post_meta($post->ID,'title-en',true);
                        $abn=putAbnSignal(get_post_meta($post->ID,'abn',true));
                        if($img!=null){
                            echo $img;
                            echo '<div>';
                            the_title( '<h4 class="entry-title" ><a href="'.get_permalink().'">', '</a>'.$abn.'</h4>' );                                                                                                    
                            if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>';
                            echo '</div>';
                        }else{
                            the_title( '<h4 class="entry-title"><a href="'.get_permalink().'">', '</a>'.$abn.'</h4>' );                                               
                            if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>'; 
                        }                    
                        
                        //the_title( '<div class="col-md-12 col-xs-12"><h4 class="entry-title"><a href="'.get_permalink().'">', '</a></h4></div>' );                       
                    ?>                
                    <div class="row">
                        <div class="listed-contact col-md-12 col-xs-12">
                            <?php
                            //echo $post->distance;
                                if($mypost!=null){
                                    if(!empty($mypost->phone)) echo '<p><i class="ionicon ion-ios-telephone-outline" aria-hidden="true"></i><span>'.$mypost->phone.'</span></p>';
                                    if(!empty($mypost->email)) echo '<p><i class="ionicon ion-ios-email-outline" aria-hidden="true"></i><span>'.$mypost->email.'</span></p>';
                                    if(!empty($mypost->website)) echo '<p><i class="ionicon ion-ios-world-outline" aria-hidden="true"></i><a target="_blank" href="'.$mypost->website.'">'.removeScheme($mypost->website).'</a></p>';
                                    if(!empty($mypost->address)) echo '<p><i class="ionicon ion-ios-navigate-outline" aria-hidden="true"></i><span>'.$mypost->address.'</span></p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
                    <div>
                        <a class="btn btn btn-primary" href="<?php echo get_permalink() ?>" style="float: right; margin-bottom: 10px;">更多详情...</a>
                        <?php include 'enquiry-form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>