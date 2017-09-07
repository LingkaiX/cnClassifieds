<?php
/**
 * @author Sophia???
 */
get_header(); ?>
<main id="main" class="site-main container" role="main">
    <div class="row">
    <div class="col-md-2 col-sm-2 hidden-xs"></div>
    <div class="col-md-8 col-xs-12">
        <?php
        while (have_posts()) : the_post();
            the_title( '<div class="col-md-12 col-xs-12"><h4 class="entry-title">', '</h4></div>' );
            echo '<div class="col-md-12 col-xs-12 listed-cate">';
                echo '<i class="fa fa-tags" aria-hidden="true"></i>';
                foreach(get_the_category() as $cate){
                    echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                }
            get_the_category();
            echo '</div>';
            echo '<div class="col-md-12 col-xs-12">';
                $img=get_the_post_thumbnail( null, 'full', ['class' => 'img-responsive', 'title' => 'Logo', 'style' => 'float:left;max-height:60px;	width: auto;
                    height: auto; margin-right:20px'] );
                echo $img;
                the_excerpt();
                the_content();
        ?>
            </div>
            <div class="listed-contact col-md-12 col-xs-12">
                <?php
                    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
                    if($mypost!=null){
                        if(!empty($mypost->phone)) echo '<p><i class="fa fa-phone" aria-hidden="true"></i>'.$mypost->phone.'</p>';
                        if(!empty($mypost->email)) echo '<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:#">'.$mypost->email.'</a></p>';
                        if(!empty($mypost->website)) echo '<p><i class="fa fa-link" aria-hidden="true"></i><a target="_blank" href="'.$mypost->website.'">'.$mypost->website.'</a></p>';
                        if(!empty($mypost->address)) echo '<p><i class="fa fa-location-arrow" aria-hidden="true"></i>'.$mypost->address
                            .'<a style="margin-left:10px;" target="_blank" href="https://www.google.com/maps?daddr='
                            .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></p>';
                    }
                ?>
            </div>
            <?php
                endwhile;
            ?>
        </div>
        <div class="col-md-2 col-sm-2 hidden-xs"></div>
    </div>

</main>
<?php
//get_sidebar();
get_footer();