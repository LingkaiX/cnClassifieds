<?php
/**
 * @author Sophia???
 */
get_header(); ?>
<style>
    /* ------------ third page ------------------*/
    .main-company-information {
    width: 75%;
    margin: 10px auto;
    }
    @media (max-width: 767px) {
    .main-company-information {
        width: 90%;
    }
    }
    @media (max-width: 480px) {
    .main-company-information {
        width: 100%;
    }
    }
    /* ------------ LOGO ------------------*/
    .logo {
    max-width: 175px;
    max-height: 75px;
    margin-top: 10px;
    margin-bottom: 20px;
    margin-right: 20px;
    float: right;
    width: auto;
    height: auto;
    }
    /*-------- COMPANY NAME --------*/
    .company-name {
    font-weight: 400;
    margin: 0 -5px 10px -5px;
    font-size: 20px;
    background-color: #fff;
    /*text-transform: uppercase;*/
    }
    .en-title {
    padding-left: 5px;
    font-weight: bold;
    }
    .title {
    padding-left: 15px;
    font-weight: 400;
    }
    .title small {
    display: inline-block;
    }
    .abstract {
    font-size: 15px;
    color: #868585;
    padding: 5px 15px;
    }
    .tag {
    font-size: 14px;
    color: #868585;
    margin-top: -5px;
    margin-bottom: 10px;
    }
    .tag a {
    padding-right: 5px;
    }
    .tag .icon {
    display: inline-block;
    padding-left: 25px;
    text-align: center;
    font-size: 80%;
    margin-right: 10px;
    line-height: 25px;
    }
    /*-------- CONTACT --------*/
    .ad-contact {
    padding-top: 10px;
    background-color: #fff;
    margin: 0 -5px 10px -5px;
    color: #0582d0;
    word-break: break-all;
    }
    .ad-contact label a,
    .ad-contact label span {
    vertical-align: middle;
    }
    .icon-small {
    display: inline-block;
    width: 30px;
    text-align: center;
    color: #0582d0;
    margin-right: 10px;
    line-height: 25px;
    vertical-align: middle;
    }

    /*-------- INFORMATION --------*/
    .ad-information {
    padding: 10px 20px 15px 20px;
    }
    .information {
    background-color: #fff;
    color: #000;
    word-spacing: 5px;
    margin: 0 -5px 10px -5px;
    }
    /* Small phones: from 0 t0 480px */
    @media only screen and (max-width: 480px) {
    .logo {
        margin: 0 auto;
        display: block;
        margin-top: 10px;
        margin-bottom: 0px;
        margin-right: auto;
        margin-left: auto;
        float: none;
    }
    .title {
        margin-top: 15px;
        float: none;
        display: inline-block;
        font-weight: 500;
        font-size: 25px;
    }
    }
</style>
<main id="main" class="site-main container" role="main">
    <div class="main-company-information">
    <?php while (have_posts()) : the_post(); ?>
        <section class="row company-name box-round-shadow">
            <?php echo get_the_post_thumbnail( null, 'full', ['class' => 'logo', 'title' => 'Logo'] );?>
            <?php
                $abn=putAbnSignal(get_post_meta($post->ID,'abn',true));
                the_title( '<h3 class="title">', '&nbsp;&nbsp;<small>ID: '.$post->ID.'&nbsp;&nbsp;'.$abn.'</small></h3>' );
                $enTitle=get_post_meta($post->ID,'title-en',true);
                if($enTitle) echo '<h5 class="en-title">'.$enTitle.'</h5>';  
            ?>
            <div class="tag">
                <i class="ionicon ion-pricetags icon" aria-hidden="true"></i>
                <?php 
                    foreach(get_the_category() as $cate){
                        echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                    }
                ?>
            </div>
            <div class="abstract">
                <?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
            </div>
            <?php include 'parts/enquiry-form.php'; ?>
        </section>
        <section class="row contact-info ad-contact box-round-shadow">
            <?php
                $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
                if($mypost!=null){
                    if(!empty($mypost->phone)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="ionicon ion-ios-telephone-outline icon-small" aria-hidden="true"></i><span>'.$mypost->phone.'</span></label>';
                    if(!empty($mypost->email)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="ionicon ion-ios-email-outline icon-small" aria-hidden="true"></i><a href="mailto:#"><span>'
                        .$mypost->email.'</span></a></label>';
                    if(!empty($mypost->website)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="ionicon ion-ios-world-outline icon-small" aria-hidden="true"></i><a target="_blank" href="'
                        .$mypost->website.'"><span>'.removeScheme($mypost->website).'</span></a></label>';
                    if(!empty($mypost->address)) echo '<label class="col-xs-12 col-sm-6 col-md-6"><i class="ionicon ion-ios-navigate-outline icon-small" aria-hidden="true"></i><span>'.$mypost->address
                        .'</span><a style="margin-left:10px;" target="_blank" href="https://www.google.com/maps?daddr='
                        .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></label>';
                }
            ?>
        </section>
        <article class="row information ad-information box-round-shadow">
            <?php the_content(); ?>
            <div id="map" style="height: 400px;  width: 100%;"></div>
            <script>
                jQuery(document).ready(function($){
                    var uluru = {lat: <?php echo $mypost->lat; ?>, lng: <?php echo $mypost->long; ?>};
                    var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });
                    var marker = new google.maps.Marker({ position: uluru, map: map });
                });
            </script>
 

        </article>
        <?php include 'parts/disqus.php'; ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 single-page-ad-container">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- single page bottom ad -->
                <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-9173929910659094"
                    data-ad-slot="3923311372"
                    data-ad-format="auto"></ins>
                <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</main>
<?php
//get_sidebar();
get_footer();