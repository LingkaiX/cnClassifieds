<?php 
/*
Template Name: Template 1
Template Post Type: post 
*/
get_header();?>
<link href='<?php echo get_template_directory_uri();?>/css/simplelightbox.css' rel='stylesheet'/>
<style>
    .main-company-information{
        width:100%
    }
    .responsive-tabs li, .tabcontent {
        border-radius: 10px !important;
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2) !important;
    }
    html, body {
        background-color: transparent;
    }
    article p{
        margin: 5px 0 5px 10px;
    }
    /* .x-tab-wrap p{
        display:none;
    }
    .x-tab-item-wrap p{
        display: block !important;
    }
    .x-tab-wrap{
        border-radius: 4px;
        border: 1px solid #ddd;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
        margin: 10px;
    }
    .x-tab-item-wrap{
        pa
    }
    .x-tab-item-head{
        display:inline-block;
        width:100%;
        background-color: #f5f5f5;
        border-color: #ddd;
        padding: 10px;
        color: #333;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        border-bottom: 1px solid #ddd;
    } */

    #main-t1 .t1-wrap{
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        /* border-radius: 2px; */
        color: rgba(0, 0, 0, 0.87);
        margin-bottom: 16px;
    }
    .ad-contact-small{
        padding-left:15px;
    }
    .ad-contact-small span{
        padding: 0 10px;
    }
    /* .main-post{
        margin-right: 320px;
    }
    .myads{
        width:300px;
        height: 600px;
        margin: 0 auto;
        background-color: black;
    }
    @media (min-width: 992px) {
        .main-post{
            width: 100%;
            display: inline-block;
            margin-left: -5px;
            padding-right: 320px;
        }
        .myads{
            width:300px;
            height: 250px;
            margin: 0 -5px 0 -320px;
            background-color: black;
            float:right;
        }
    } */

</style>
<main id="main-t1" class=" site-main" role="main">
    <div class="container main-company-information">
        <?php while (have_posts()) : the_post(); ?>
            <section class="row t1-wrap">
                <?php echo get_the_post_thumbnail( null, 'full', ['class' => 'logo', 'title' => 'Logo'] );?>
                <?php
                    $abn=putAbnSignal(get_post_meta($post->ID,'abn',true));
                    the_title( '<h3 class="title">', '&nbsp;&nbsp;<small>ID: '.$post->ID.'&nbsp;&nbsp;'.$abn.'</small></h3>' );
                    $enTitle=get_post_meta($post->ID,'title-en',true);
                    if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>';  
                ?>
                <div class="tag">
                    <i class="fa fa-tags icon" aria-hidden="true"></i>
                    <?php 
                        foreach(get_the_category() as $cate){
                            echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                        }
                    ?>
                </div>

                <div class="ad-contact-small">
                    <?php
                        $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
                        if($mypost!=null){
                            if(!empty($mypost->phone)) echo '<p ><i class="fa fa-phone" aria-hidden="true"></i><span>'.$mypost->phone.'</span></p>';
                            if(!empty($mypost->email)) echo '<p ><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:#"><span>'
                                .$mypost->email.'</span></a></p>';
                            if(!empty($mypost->website)) echo '<p ><i class="fa fa-globe" aria-hidden="true"></i><a target="_blank" href="'
                                .$mypost->website.'"><span>'.removeScheme($mypost->website).'</span></a></p>';
                            if(!empty($mypost->address)) echo '<p ><i class="fa fa-map-marker" aria-hidden="true"></i><span>'.$mypost->address
                                .'</span><a target="_blank" href="https://www.google.com/maps?daddr='
                                .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></p>';
                        }
                    ?>
                </div>
                <?php include dirname(__DIR__).'/parts/enquiry-form.php'; ?>
                <div style="clear:both"></div>
            </section>
            <div class="container">

                <article class="row t1-wrap">
                <h4>公司介绍</h4>
                    <?php the_content(); ?>
                </article>

                <section class="row product-section">
                    <?php 
                        $reviews = get_field('t1-products');
                        foreach( $reviews as $key => $review ): 
                    ?>
                    <div class="col-md-4 col-xs-12 comment-card">
                        <strong class="comment-card-title"><?php echo $review['title'] ?></strong>
                        <p class="comment-card-content"><?php echo $review['content'] ?></p>
                    </div>
                    <?php endforeach; ?>

                </section>
                <script>
                    jQuery(document).ready(function ($) {
                        jQuery('.product-section').masonry({
                            itemSelector: '.comment-card',
                        });
                    }); 
                </script>
                <?php include dirname(__DIR__).'/parts/t1/gallery.php'; ?>

            </div>

            <?php endwhile; ?>
        <?php //include dirname(__DIR__).'/parts/disqus.php'; ?>
</main>
<script src="<?php echo get_template_directory_uri();?>/js/masonry.min.js"></script>

<?php
    //get_sidebar();
    get_footer();
?>
<script src="<?php echo get_template_directory_uri();?>/js/simple-lightbox.js"></script>
<script type="text/javascript" src="https://hammerjs.github.io/dist/hammer.min.js"></script>