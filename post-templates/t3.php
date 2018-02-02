<?php 
/*
Template Name: Template 3
Template Post Type: post 
*/
get_header();?>
<link href='<?php echo get_template_directory_uri();?>/css/simplelightbox.css' rel='stylesheet'/>
<link href='<?php echo get_template_directory_uri();?>/css/animate.css' rel='stylesheet' />
<link href='<?php echo get_template_directory_uri();?>/css/jquery.fancybox.min.css' rel="stylesheet"/>

<?php while (have_posts()) : 
    the_post();
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
    $themeColor=get_field('t3-color')?get_field('t3-color') : "#F26522";
?>
<style>
    .animated {
        animation-duration: 2s;
        opacity: 1;
    }
    section{
        opacity: 0;
    }
    .top-section{
        opacity: 1;
    }
    .theme-color-font {
        color: <?php echo $themeColor ?>;
    }

    .theme-color-background {
        background-color: <?php echo $themeColor ?>;
    }

    .theme-color-border {
        border-color: <?php echo $themeColor ?>;
    }

    .fa {
        color: <?php echo $themeColor ?>;
    }

    /* .back-button:hover, .search-button:hover, .enquiry-btn:hover, .search-submit:hover{
        background-color: <?php echo $themeColor ?>;
        border-color:<?php echo $themeColor ?>;
    } */

    * {
        font-family: 'Rubik', sans-serif;
    }

    main img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    blockquote {
        font-style: italic;
        padding: 10px 0 20px 20px;
        font-size: 1.09rem;
        position: relative;
        border-width: 3px;
        margin: 0 2rem;
        margin-bottom: 2.3125rem;
        color: #767676;
    }

    .top-section {
        background-color: #686565;
        background: linear-gradient(45deg, #686565, #c1c1c1);
        padding-top: 40px;
        padding-bottom: 50px;
        color:white;
    }

    .embed-container { 
        width: 100%;
        height: 70%;
        padding-top: 70%;
        position: relative;
    } 
    .embed-container iframe, .embed-container object, .embed-container embed,.embed-container img { 
        position: absolute;
        top: 0;
        width: 100%;
        height: 100%;
    }
    .top-section a{
        color:white;
    }
    .company-title {
        text-align: center;
        font-size: 2.6rem;
        font-style: normal;
        line-height: 1.2;
        word-break: break-word;
        word-wrap: break-word;
        margin-top: 0;
        margin-bottom: .5rem;
        font-weight: 500;
    }

    .company-subtilte {
        text-align: center;
        font-size: 1.6rem;
        line-height: 1.3;
        font-weight: 300;
        padding-bottom: 1rem!important;
        word-break: break-word;
        word-wrap: break-word;
        margin-top: 0;
        margin-bottom: .5rem;
    }

    .excerpt-section {
        padding: 2rem 0;
    }

    .product-section {
        background-color: #f0f0f0;
        padding: 25px 15px;
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .card-img {
        width: 100%;
        padding-top: 100%;
        position: relative;
    }

    .card-img img {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

    .gallery-section,
    .review-section {
        padding-top: 15px;
        padding-bottom: 30px;
        background-color: #f9f9f9;
    }
    .review-section{
        margin-bottom:20px;
    }
    .gallery .row {
        padding: 0 1.5rem;
    }

    .gallery .row:last-child {
        padding-bottom: 2.5rem;
    }

    .a-wrap {
        padding-top: 100%;
    }

    @media (min-width:400px) and (max-width:991px) {
        .gallery .col-xs-12 {
            width: 50%;
        }
        .a-wrap {
            padding-top: 50%;
        }
    }

    @media (min-width:992px) {
        .a-wrap {
            padding-top: 25%;
        }
    }

    .a-wrap img {
        position: absolute;
        top: 10%;
        bottom: 0;
        left: 5%;
        right: 5%;
        height: 90%;
        width: 90%;
        margin: auto;
        object-fit: cover;
    }

    .content-section {
        padding: 30px;
    }

    .content-section ul {
        color: #232323;
        margin-bottom: 0;
    }

    .content-section li {
        margin-bottom: 1rem;
        list-style: none;
    }

    .content-section li:before {
        position: absolute;
        left: 0px;
        margin-top: -10px;
        padding-top: 3px;
        display: inline-block;
        text-align: center;
        margin: 5px 10px;
        line-height: 20px;
        transition: all .2s;
        color: #ffffff;
        background: <?php echo $themeColor ?>;
        width: 25px;
        height: 25px;
        border-radius: 50%;
        content: '✓';
    }

    .comment-card-decoration {
        font-size: 57px;
        vertical-align: middle;
    }

    .comment-card-title {
        vertical-align: middle;
    }

    @media (min-width:768px) {
        .comment-card-content {
            padding-left: 57px;
        }
    }
    #t3 .contact-info{

    }
</style>
<?php
    $headmeta=get_field("t3-head");
    $g1 = get_field('t3-g1');
    $g2 = get_field('t3-g2');
    $foot = get_field('t3-foot');
?>

<main id="t3">
    <section class="top-section">
        <div class="container animated fadeIn">
            <div class="row">
                <div class="col-md-7 col-md-push-5 col-sm-12">
                    <div class="embed-container">
                        <?php 
                            if($headmeta['has-video']==0){
                                echo '<img src="'.$headmeta['img']['url'].'" title="" class="">';
                            }else{
                                echo '<a data-fancybox href="'.$headmeta["youtube-url"].'">';
                                    echo '<img src="'.$headmeta['img']['url'].'" title="" class="">';
                                echo '</a>';
                            }
                        ?>                 
                    </div>
                </div>
                <div class="col-md-5 col-md-pull-7 col-sm-12">
                    <div class="main-info">
                        <?php 
                            the_title( '<h1 class="company-title">', '</h1>' );                      
                            $enTitle=get_post_meta($post->ID,'title-en',true);
                            if($enTitle) echo '<h3 class="company-subtilte">'.$enTitle.'</h3>'; 
                        ?>
                    </div>
                    <div class="sub-info">                   
                        <?php
                            $abn=putAbnSignal(get_post_meta($post->ID,'abn',true));
                            echo '<small>ID: '.$post->ID.'&nbsp;&nbsp;'.$abn.'</small>';
                        ?>
                    </div>
                    <div class="contact-info">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                    <?php 
                        foreach(get_the_category() as $cate){
                            echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                        }
                        if(!empty($mypost->phone)) echo '<p><i class="fa fa-phone" aria-hidden="true"></i><span>'.$mypost->phone.'</span></p>';
                        if(!empty($mypost->email)) echo '<p><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:#"><span>'
                            .$mypost->email.'</span></a></p>';
                        if(!empty($mypost->website)) echo '<p><i class="fa fa-globe" aria-hidden="true"></i><a target="_blank" href="'
                            .$mypost->website.'"><span>'.removeScheme($mypost->website).'</span></a></p>';
                        if(!empty($mypost->address)) echo '<p><i class="fa fa-map-marker" aria-hidden="true"></i><span>'.$mypost->address
                            .'</span><a style="margin-left:10px;" target="_blank" href="https://www.google.com/maps?daddr='
                            .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></p>';
                    ?>
                    <?php include dirname(__DIR__).'/parts/enquiry-form.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <section class="row excerpt-section animated fadeIn">
            <div class="col-md-8 col-md-offset-2">      
                <blockquote class="theme-color-border">
                    <?php the_content(); ?>
                </blockquote>
            </div>
        </section>
        <section class="row product-section">
        <?php foreach( $g1["gallery"] as $key => $image ): ?>
            <div class="col-md-<?php echo 12/$g1["col"]; ?> col-sm-6 col-xs-12 product-card" data="<?php echo $key; ?>">
                <div class="card-img">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>">
                </div>
                <div class="card-box">
                    <h4 class=""><?php echo $image['alt']; ?></h4>
                    <p class=""><?php echo $image['caption']; ?></p>
                </div>
            </div>
        <?php 
            if (((12/$g1["col"])*($key+1))%12==0) echo '<div style="clear:both"></div>';
            endforeach;
        ?>
        </section>
        <!-- <section class="row content-section">
            <div class="col-md-8 col-md-offset-2">
                <?php the_content(); ?>
            </div>
        </section> -->
        <?php if ($g2["has-image"]==1): ?>
        <section class="row gallery-section">
            <div class="col-md-12 gallery" id='gallery'>
                <div class="row">
                <?php
                    $images =$g2["gallery"];
                    foreach( $images as $key => $image ):
                ?>
                    <a href="<?php echo $image['url']; ?>" class="col-md-3 col-sm-6 col-xs-12 a-wrap" id="g2-item-<?php echo $key ?>">
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['alt']; ?>" />
                    </a>                   
                <?php endforeach; ?>
                </div>
            </div>
            <script>
                jQuery(document).ready(function ($) {
                    var gallery = jQuery('.gallery a').simpleLightbox({
                        'widthRatio': 1
                    });
                });
            </script>
        </section>
        <?php endif; ?>
        <?php if ($foot["has-map"]==1): ?>
        <section class="row map-section">
            <div id="map" style="height:400px;" class="col-md-12"></div>
            <script>
                jQuery(document).ready(function ($) {
                    var uluru = {lat: <?php echo $mypost->lat; ?>, lng: <?php echo $mypost->long; ?>};
                    var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });
                    var marker = new google.maps.Marker({ position: uluru, map: map });
                }); 
            </script>
        </section>
        <?php endif; ?>
        <?php if ($foot["has-review"]==1): ?>
        <section class="row review-section">
            <?php foreach( $foot["review"] as $key => $review ): ?>
            <div class="col-md-6 col-xs-12 comment-card">
                <p class="comment-card-head">
                    <span class="comment-card-decoration">
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </span>
                    <strong class="comment-card-title"><?php echo $review['title'] ?></strong>
                </p>
                <p class="comment-card-content"><?php echo $review['content'] ?></p>
            </div>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>
        <?php if ($foot["has-image"]==1): ?>
        <section class="row foot-img">
            <img src="<?php echo $foot["image"]['url']; ?>" alt="<?php echo $foot["image"]['alt']; ?>" style="width:100%">
        </section>
        <?php endif; ?>
        <section class="row foot-info">
            <div class="col-md-6 col-xs-12 info-box">
                <p><?php echo $mypost->address; ?></p>
                <p><?php echo $mypost->email.' | '. $mypost->phone; ?></p>
            </div>
            <div class="col-md-push-3 col-md-3 col-xs-12 social-box">
                <div style="float:right">
                    <a target="_blank" href="<?php echo $foot["facebook"]; ?>"<i class="fa fa-facebook-square"></i></a>
                    <a target="_blank" href="<?php echo $foot["facebook"]; ?>"<i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </section>
    </div>
<div class="container"><?php //include dirname(__DIR__).'/parts/disqus.php'; ?></div>

</main>
<script>
    jQuery(document).ready(function ($) {
        $('.product-section').waypoint(function (direction) {
            $('.product-section').addClass('animated fadeIn');
            }, {
                offset: '90%'
            });
        // $('.content-section').waypoint(function (direction) {
        //     $('.content-section').addClass('animated fadeIn');
        //     }, {
        //         offset: '90%'
        //     });
        $('.gallery-section').waypoint(function (direction) {
            $('.gallery-section').addClass('animated fadeIn');
            }, {
                offset: '90%'
        });
        $('.map-section').waypoint(function (direction) {
            $('.map-section').addClass('animated fadeIn');
            }, {
                offset: '90%'
        });
        $('.review-section').waypoint(function (direction) {
            $('.review-section').addClass('animated fadeIn');
            }, {
                offset: '90%'
        });
        $('.foot-img').waypoint(function (direction) {
            $('.foot-img').addClass('animated fadeIn');
            }, {
                offset: '90%'
        });
        $('.foot-info').waypoint(function (direction) {
            $('.foot-info').addClass('animated fadeIn');
            }, {
                offset: '90%'
        });
    });

</script>
<?php endwhile; ?>
<?php get_footer(); ?>
<script src="<?php echo get_template_directory_uri();?>/js/simple-lightbox.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.min.js"></script>
