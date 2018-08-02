<?php get_header(); ?>
<style> 
    main {
        background: #ececec;
    }
    .main-content{
        background: #ececec;
    }
    .sidebar{
        background: #f9f7f7;
    }
    @media (min-width: 991px) {
        .main-content{
            padding-bottom: 9999px;
            margin-bottom: -9999px;
        }
        .sidebar{
            padding-bottom: 9999px;
            margin-bottom: -9999px;
            border-left: 1px solid lightgray;
        }
    }
    .section-margin{
        margin: 20px 5px 0 5px;
    }
    @media (max-width: 480px){
        .section-margin{
            margin: 10px -5px 0 -5px;
        }
    }
    .info-header {
        font-weight: 400;
        font-size: 20px;
        background-color: #fff;
    }
    .title {
        padding: 0 20px;
        font-weight: 400;
    }
    .en-title {
        padding: 0 20px;
        /* font-weight: bold; */
    }
    .title small {
        display: inline-block;
    }
    .abstract {
        font-size: 15px;
        color: #868585;
        padding: 5px 15px;
    }
    .img-abn{
        position: relative;
        top: -2px;
    }
    .logo {
        max-width: 300px;
        max-height: 80px;
        margin-top: 10px;
        margin-bottom: 20px;
        margin-right: 20px;
        float: right;
        width: auto;
        height: auto;
    }
    @media (max-width:1199px){
        .logo {
            max-width: 250px;
            max-height: 70px;
        }
    }
    @media (max-width:767px){
        .logo {
            max-width: 200px;
            max-height: 60px;
        }
    }
    @media (max-width: 480px){
        .logo {
            display: block;
            float: none;
            max-width: 80%;
            max-height: 40px;
            margin-bottom: 0;
            margin-right: 0;
            margin-left: 20px;
        }
        .title {
            margin-top: 15px;
            float: none;
            display: inline-block;
            font-size: 22px;
        }
    }
    .tag {
        font-size: 14px;
        color: #868585;
        margin-bottom: 10px;
        padding: 0 20px;
    }
    .tag a {
        padding-right: 5px;
    }
    .tag .icon {
        display: inline-block;
        text-align: center;
        font-size: 80%;
        margin-right: 5px;
        line-height: 25px;
    } 
    .ad-contact {
        padding: 10px 0;
        background-color: #fff;
        word-break: break-all;
    }
    .ad-contact label a,
    .ad-contact label span {
        vertical-align: middle;
        font-weight: 400;
    }
    .icon-small {
        display: inline-block;
        width: 30px;
        text-align: center;
        margin-right: 10px;
        line-height: 25px;
        vertical-align: middle;
    }
    .ad-information {
        padding: 15px 20px 15px 20px;
        background-color: #fff;
    }
    .disqus-container{
        background-color: #fff;
        padding:20px;
        margin-bottom: 20px;
    }
</style>
<main id="main" class="container" role="main">
    <div class="row" style="overflow:hidden; min-height:600px;">
        <div class="col-md-9 col-sm-12 col-xs-12 main-content" itemscope itemtype="http://schema.org/LocalBusiness">
        <?php while (have_posts()) : the_post(); ?>
            <section class="row info-header section-margin">
                <?php echo get_the_post_thumbnail( null, 'full', ['class' => 'logo', 'title' => 'Logo', 'itemprop' => 'logo'] );?>
                <?php
                    $abn=putAbnSignal(get_post_meta($post->ID,'abn',true));
                    the_title( '<h3 class="title"><span itemprop="name">', '</span>&nbsp;&nbsp;<small>ID: '.$post->ID.'&nbsp;'.$abn.'</small></h3>' );
                    $enTitle=get_post_meta($post->ID,'title-en',true);
                    if($enTitle) echo '<h5 class="en-title"><span itemprop="alternateName">'.$enTitle.'</span></h5>';  
                ?>
                <div class="tag">
                    <i class="ionicon ion-pricetags icon" aria-hidden="true"></i>
                    <?php 
                        foreach(get_the_category() as $cate){
                            echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                        }
                    ?>
                </div>
                <?php include 'parts/enquiry-form.php'; ?>

                <link itemprop="url" href="<?php echo get_permalink() ?>" />
                <link itemprop="image" href="<?php echo get_template_directory_uri();?>/img/auads-logo-large.png" />
            </section>
            <section class="row contact-info ad-contact section-margin">
                <?php
                    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
                    if($mypost!=null){
                        if(!empty($mypost->phone)) echo '<label class="col-xs-12 col-sm-12 col-md-6"><i class="ionicon ion-ios-telephone-outline icon-small" aria-hidden="true"></i><span itemprop="telephone">'.$mypost->phone.'</span></label>';
                        if(!empty($mypost->email)) echo '<label class="col-xs-12 col-sm-12 col-md-6"><i class="ionicon ion-ios-email-outline icon-small" aria-hidden="true"></i><a href="mailto:#"><span itemprop="email" style="position:relative;top: -2px;">'
                        .$mypost->email.'</span></a></label>';
                        if(!empty($mypost->website)) echo '<label class="col-xs-12 col-sm-12 col-md-6"><i class="ionicon ion-ios-world-outline icon-small" aria-hidden="true"></i><a itemprop="sameAs" class="signal" target="_blank" rel="noopener" href="'
                        .$mypost->website.'"><span style="position:relative;top: -2px;">'.removeScheme($mypost->website).'</span></a></label>';
                        if(!empty($mypost->address)) echo '<label class="col-xs-12 col-sm-12 col-md-6"><i class="ionicon ion-ios-navigate-outline icon-small" aria-hidden="true"></i><span itemprop="address">'.$mypost->address
                            .'</span><a class="signal" style="margin-left:10px;" target="_blank" rel="noopener" href="https://www.google.com/maps?daddr='
                            .$mypost->lat.','.$mypost->long.'"><small>地图导航</small></a></label>';
                    }
                ?>
            </section>
            <article class="row ad-information section-margin">
                <?php echo apply_filters( 'the_excerpt', $post->post_excerpt); ?>
                <?php the_content(); ?>
                <div id="map" style="height: 400px;width: 100%;margin-top: 5px;"></div>
                <script>
                    jQuery(document).ready(function($){
                        var uluru = {lat: <?php echo $mypost->lat; ?>, lng: <?php echo $mypost->long; ?>};
                        var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });
                        var marker = new google.maps.Marker({ position: uluru, map: map });
                    });
                </script>
            </article>
            <section class="row disqus-container section-margin"><?php include 'parts/disqus.php'; ?></section>
            <div class="row" style="padding-bottom:20px">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> 
                <!-- single page bottom ad -->
                <!-- <ins class="adsbygoogle"
                    style="display:block"
                    data-ad-client="ca-pub-9173929910659094"
                    data-ad-slot="3923311372"
                    data-ad-format="auto"></ins>
                <script>
                    //(adsbygoogle = window.adsbygoogle || []).push({});
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1533175072543-0'); });
                </script>
                <!-- /21666183985/single-page-bottom-ad-728x90 -->
                <div id='div-gpt-ad-1533175072543-0' style='margin:auto;height:90px; width:728px;'>
                    <script>
                        googletag.cmd.push(function() { googletag.display('div-gpt-ad-1533175072543-0'); });
                    </script>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 sidebar">
            <style>
                .goodman-list{
                    max-width:480px;
                    margin: 20px auto;
                }
                .gm-item{
                    padding-bottom: 20px;
                    border-bottom: 2px solid #ececec;
                    position: relative;
                    overflow: hidden;
                }
                .gm-img img {
                    width: 80px;
                    height: 80px;
                    border-radius: 50%;
                    float: left;
                    margin-right: 10px;
                    margin-top: 10px;
                }
                .gm-text{
                    font-size: 14px;
                    color: #868585;
                }
            </style>
            <?php 
                $gm_query = get_posts(array( 'post_type' => 'goodman', "posts_per_page" => 3, "orderby" => "rand"));
                if($gm_query!=null){
                    echo '<div class="goodman-list">';
                    foreach($gm_query as $key => $post){
                        echo '<div class="gm-item" id="gm-item-'.$key.'">';
                            echo '<div class="gm-img">';
                                echo get_the_post_thumbnail( $post->ID, 'thumbnail',  array( 'class' => 'xasa' ) );
                            echo '</div>';
                            echo '<h4>'.$post->post_title.'</h4>';
                            if(get_field('has-link')){
                                echo '<a style="position: absolute;top: 0;bottom: 0;left: 0;right: 0;" target="_blank" rel="noopener" href="'.get_field('link').'"></a>';
                            }
                            echo '<div class="gm-text">'. $post->post_content . "</div>";
                            echo '<div class="clearfix"></div>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
                wp_reset_postdata();        
            ?>
            <ins class="adsbygoogle" style="display:block; text-align:center;" data-ad-layout="in-article"
                data-ad-format="fluid" data-ad-client="ca-pub-9173929910659094" data-ad-slot="6038045267"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    </div>
</main>
<?php
//get_sidebar();
get_footer();