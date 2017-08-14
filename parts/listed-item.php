<?php
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
?>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="basic-listing post-<?php echo $post->ID; ?>">
            <div class="row">
                <div class="col-md-8 col-xs-8">
                    <div class="row listed-header">
                        <div class="listed-logo col-md-4 col-xs-4"><?php the_post_thumbnail( 'full', ['class' => 'in-listed-logo', 'title' => 'Feature image']); ?></div>
                        <div class="col-md-8 col-xs-8"><?php the_title('<h3>', '</h3>'); ?></div>
                        <div class="clearfix"></div>
                        <div class="listed-contact col-md-12 col-xs-12">
                            <?php
                                if($mypost!=null){
                                    if(!empty($mypost->phone)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Phone.png"></img>'.$mypost->phone.'</p>';
                                    if(!empty($mypost->email)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Email.png"></img>'.$mypost->email.'</p>';
                                    if(!empty($mypost->website)) echo '<p><img class="listed-decoration" src="'.get_template_directory_uri().'/img/Website.png"></img><a href="'.$mypost->website.'">'.$mypost->website.'</a></p>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-4 listed-address">
                    <?php
                        if($mypost!=null){
                            if(!empty($mypost->address)) echo '<p><img class="listed-address-decoration" align="middle" src="'.get_template_directory_uri().'/img/Add.png"></img>'.$mypost->address.'</p>';
                        }
                    ?>
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