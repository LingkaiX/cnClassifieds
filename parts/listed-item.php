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
                            the_title( '<h4 class="entry-title">'.$abn.'<a href="'.get_permalink().'">', '</a></h4>' );                                               
                            if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>'; 
                        }                    
                        
                        //the_title( '<div class="col-md-12 col-xs-12"><h4 class="entry-title"><a href="'.get_permalink().'">', '</a></h4></div>' );                       
                    ?>                
                    <div class="row">
                        <div class="listed-contact col-md-12 col-xs-12">
                            <?php
                            //echo $post->distance;
                                if($mypost!=null){
                                    if(!empty($mypost->phone)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Phone.svg"></img>'.$mypost->phone.'</p>';
                                    if(!empty($mypost->email)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Email.svg"></img>'.$mypost->email.'</p>';
                                    if(!empty($mypost->website)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Website.svg"></img><a target="_blank" href="'.$mypost->website.'">'.removeScheme($mypost->website).'</a></p>';
                                    if(!empty($mypost->address)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Add.svg"></img>'.$mypost->address.'</p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
                    <?php include 'enquiry-form.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>