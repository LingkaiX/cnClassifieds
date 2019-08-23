<?php 
/*
Template Name: Template 3
Template Post Type: post 
*/
get_header();?>
<!-- <link href='<?php echo get_template_directory_uri();?>/css/simplelightbox.css' rel='stylesheet'/> -->
<link href='<?php echo get_template_directory_uri();?>/css/jquery.fancybox.min.css' rel="stylesheet"/>
<link href='<?php echo get_template_directory_uri();?>/css/animate.css' rel='stylesheet' />
<link href="<?php echo get_template_directory_uri();?>/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/owl.theme.default.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<style>
    html, body{
        background-color: #fff;
    }
    .VYMape {
        display: none;
    }
    .qr-code img,.box-left img{
        max-width: 100%;
        max-height: 100%;
    }
    section{
        margin-bottom: 60px;
    }
    .solid-border{
        border-style : Solid;
        border-color : #f96f12;
        border-width : 1px;
    }
    .sometext{
        color:#f96f12;
        font-weight:bold;
        text-align: center;
        font-size: 24px;
    }
</style>
<?php
    while (have_posts()) : the_post();
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
    $hasAbn=get_post_meta($post->ID,'abn',true);
    $slider = get_field('t3-slider');
    $social = get_field('t3-social');
    $xitems=get_field('items-in-row');
    $items = get_field('t3-item');
    $gallery = get_field('t3-gallery');
    $characters =  get_field('t3-characters');
    $custom_headline =  get_field('custom_headline');
    $custom_section = get_field('custom_section');
    $sectitle = get_field('sectitle');
    $reviews = get_field('t3-reviews');
    $links = get_field('t3-links');
    $foot = get_field('t3-special-image');
    $content = get_the_content();   
    //print_r($gallery);
    $loadingUrl=get_template_directory_uri().'/img/loader.svg';
    $tags = get_the_tags();
    $tags_to_delete = array( 't5', 't4' );
    $tags_to_keep = array();
    foreach ( $tags as $t ) {
        if ( !in_array( $t->name, $tags_to_delete ) ) {
            $tags_to_keep[] = $t->name;
        }
    }
    array_push($tags_to_keep,'t3');
    wp_set_post_tags($post->ID,$tags_to_keep,false);
?>
<main id="t3" class="container" itemscope itemtype="http://schema.org/LocalBusiness">
    <style>
        .sect-top{
            margin-bottom: 10px;
        }
        .logo-t4{
            height:78px;
            margin-top: 20px;
            position: relative;
        }
        .logo-t4 img{
            max-height: 100%;
            max-width: 100%;
            width: auto;
            bottom: 0;
            position: absolute;
        }
        .tag-t4 a{
            margin-right: 5px;
        }
        .en-title-t4{
            margin-top: 15px;
        }
    </style>
    <section class="row sect-top"><div class="col-md-12" >
        <div id="topsec">
            <?php          
                $logo=get_the_post_thumbnail( null, 'full', ['class' => 'logo-img', 'title' => 'Logo', 'itemprop' => 'logo'] );
                if($logo) echo '<div class="logo-t4">'.$logo.'</div>';
            ?>
            <?php
                $abn=null;
                //if($hasAbn) $abn='<abbr title="ABN Checked"><img class="img-abn" src="'.get_template_directory_uri().'/img/abn-checked.svg"></abbr>';
                the_title( '<h2 class="title-t4"><span itemprop="name">', '</span>&nbsp;&nbsp;<small>ID: '.$post->ID.'&nbsp;&nbsp;'.$abn.'</small></h2>' );
                $enTitle=get_post_meta($post->ID,'title-en',true);
                if($enTitle) echo '<h3 class="en-title-t4" itemprop="alternateName">'.$enTitle.'</h3>'; 
            ?>
            <div class="tag-t4">
                <i class="ionicon ion-pricetags icon" aria-hidden="true"></i>
                <?php 
                    foreach(get_the_category() as $cate){
                        echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                    }
                    if($hasAbn) echo '<p id="ABN" class="p-abn"><span>ABN CHECKED</span><img alt="abn" style="margin-top: 2px;" class="img-abn" src="'
                    .get_template_directory_uri().'/img/abn-checked.svg"></p>';
                ?>
            </div>
            <link itemprop="url" href="<?php echo get_permalink() ?>" />
            <link itemprop="image" href="<?php echo get_template_directory_uri();?>/img/auads-logo-large.png" />  
        </div>  
        <?php if($content!=null):?>
            <script>
                jQuery("#ABN").addClass("hidden-md hidden-lg");
                jQuery("#topsec").removeClass("col-md-9");
            </script>
            <?php else: 
                if ($social['wechat-qr']['url']){ 
                    echo '<div class="qr-code col-md-3 hidden-sm hidden-xs" style="margin-top:80px;"><img alt="qr code" itemprop="image" src="'.$social['wechat-qr']['url'].'" title="" class=""></div>';
                }
            ?>
                <script>
                    jQuery("#topsec").addClass("col-md-9");
                </script> 
        <?php endif;?> 
    </div></section>
    <style>
        @media (min-width:992px) {
            .slider, .info{
                min-height: 500px;
            }
        }
        .slider{
            display: flex;
            justify-content: center;
            align-items: center; 
        }
        @media (max-width:767px) {
            .slider{
                margin-bottom: 30px;
            }
            .va-helper{
                display: none !important;
            }
            .title-t4{
                font-size:28px;
            }
            .en-title-t4{
                font-size:20px;
            }
            .p-abn {
                font-weight: 200;
            }
        }
    </style>
    <section class="row sect-contact">
        <div class="col-md-8 slider">
        <?php 
            if(get_field('has_video')==1): include dirname(__DIR__).'/parts/post-templates/video.php'?>
        <?php else:?>
            <div class="va-helper"></div>
            <?php include dirname(__DIR__).'/parts/post-templates/slider.php'?>
        <?php endif; ?>
        </div>
        <div class="col-md-4 hidden-sm">
            <?php include dirname(__DIR__).'/parts/post-templates/info-3.php'; ?>
        </div>
        <div id="nocontent" style="margin-top:30px; display:none">
            <?php include dirname(__DIR__).'/parts/post-templates/info-3.php'; ?>
        </div>
        <?php if($content==null):?>
            <script>
                jQuery("#nocontent").addClass("col-sm-12 visible-sm-inline-block");
            </script> 
        <?php endif;?>
        <script>
            if(!window.matchMedia('(max-width: 992px)').matches) jQuery(".slider").height(jQuery(".info").height()-25)
            jQuery(window).resize(function() {
                var w = window.innerWidth;
                if(w>991) jQuery(".slider").height(jQuery(".info").height()-25)
            });
        </script>
    </section>
    <style>
        .article{
            border-left: 3px solid #f96f12;
            box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
            background-color: #efefef;
            padding: 15px 0;
        }
        .article h1,.article h2,.article h3,.article h4,.article h5{
            padding-left: 50px;
            padding-right: 50px;
            color: #f96f12;
        }
        .article h1:first-child,.article h2:first-child,.article h3:first-child,
        .article h4:first-child,.article h5:first-child{
            margin-top: 10px;
        }
        .article p{
            padding-left: 50px;
            padding-right: 50px;
        }
        .article hr {
            border-color: #f96f12;
        }
        img.little-man{
            height: 60px;
            margin: 10px 0;
            padding-right: 15px;
            vertical-align: middle;
        }
    </style> 
    <?php if ($content!=null): ?>
    <section class="row sect-content">
        <div class="col-md-8 col-sm-6 col-xs-12" ><div class="article" itemprop="description">
        <?php the_content(); ?>
        </div></div>
        <div class="col-md-4 hidden-sm hidden-xs"><div style="text-align:center;" >           
        <?php 
            if($hasAbn) echo '<div class="solid-border abn-box"><p class="p-abn">
                <img itemprop="image" alt="little-man" class="little-man" src="'.get_template_directory_uri().'/img/little-man.svg">
                <span>ABN CHECKED</span>
                <img itemprop="image" alt="abn" style="margin-top: 30px;" class="img-abn" src="'.get_template_directory_uri().'/img/abn-checked.svg">
                </p></div>';
            if ($social['wechat-qr']['url']){ 
                echo '<div class="qr-code" style="margin-top:30px;"><img itemprop="image" alt="qr-code" src="'.$social['wechat-qr']['url'].'" title="" class=""></div>';
            }
        ?>
        </div></div>
        <div class="col-sm-6 visible-sm-inline-block">
            <?php include dirname(__DIR__).'/parts/post-templates/info-3.php'; ?>
        </div>
    </section>
    <?php endif; ?>
    <?php if(get_field('t3-has-item')==1):?>
        <style>
            .product-card{
                transition: opacity 1s;

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
                object-fit: cover;
            }
            .btn-last{
                left: 5px;
            }
            .btn-next{
                right: 5px;
            }
            .btn-last, .btn-next{
                position: absolute;
                top: 40%;
                z-index: 12;
                background-color: rgba(255,255,255,1);
                font-size: 40px;
                color: #f96f12;
                opacity: 0.7;
                border-radius: 0;
            }
            .card-box{
                background-color:#efefef;
                padding:15px;
            }
            .card-box h4{
                margin-top:0;
                /* padding-top:10px; */
                color:#f96f12;
            }
        </style>
        <section class="row sect-item" style="position:relative;">
            <div>
                <?php foreach( $items as $key => $item ): ?>
                <div class="col-md-3 col-sm-6 col-xs-12 product-card" data-item="<?php echo $key; ?>" 
                    id="item-<?php echo $key; ?>" <?php if($key>3) echo 'style="display: none;"'; ?>>
                    <div class="card-img">
                        <?php foreach( $item['img'] as $skey => $image ): ?>
                            <a href="<?php echo $image['url']; ?>" itemprop="image" data-fancybox="group-<?php echo $key; ?>">
                                <img itemprop="image" data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"
                                    style="<?php if($skey==0) echo 'z-index:10;'; ?>"
                                    class="lazyload" src="<?php echo $loadingUrl; ?>">
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <div class="card-box">
                        <h4 itemprop="name" class=""><?php echo $item['title']; ?></h4>
                        <p itemprop="description" class=""><?php echo $item['content']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <button class="btn btn-last product-card-btn" onclick="showLast()">
                <i class="ion-android-arrow-back"></i>
            </button>
            <button class="btn btn-next product-card-btn" onclick="showNext(1)">
                <i class="ion-android-arrow-forward"></i>
            </button>
            <script>
                var itemCount=<?php echo sizeof($items); ?>;
                var showCount=4;
                var startId=0;
                var w = window.innerWidth;
                if(w<768) showCount=1
                else if(w<992) showCount=2
                else showCount=4
                if(itemCount>showCount) jQuery(".product-card-btn").show()
                else jQuery(".product-card-btn").hide()
                console.log(showCount)
                jQuery(document).ready(function($){
                    for (var i=showCount; i < 4; i++){
                        jQuery("#item-"+i).hide()
                    }
                });
                jQuery(window).resize(function() {
                    var w = window.innerWidth;
                    if(w<768) showCount=1
                    else if(w<992) showCount=2
                    else showCount=4
                    if(itemCount>showCount) jQuery(".product-card-btn").show()
                    else jQuery(".product-card-btn").hide()
                    for(var i=0; i<showCount; i++){
                        jQuery("#item-"+i).show()
                    }
                    for (var i=showCount; i < <?php echo sizeOf($items); ?>; i++){
                        jQuery("#item-"+i).hide()
                    }
                    startId=0
                });
                function showLast(){
                    startId-=1
                    if(startId<0) {
                        startId=0
                        return
                    }
                    // jQuery("#item-"+(startId+showCount)).hide( "fast", function() {
                    // });
                    // jQuery("#item-"+startId).show( "slow", function() { })
                    jQuery("#item-"+(startId+showCount)).hide()
                    jQuery("#item-"+startId).show().addClass('animated fadeIn')
                }
                function showNext(){
                    startId+=1
                    if((startId+showCount)>itemCount) {
                        startId-=1
                        return
                    }
                    // jQuery("#item-"+(startId-1)).hide( "fast", function() {
                    // });
                    // jQuery("#item-"+(startId+showCount-1)).show( "slow", function() { })
                    jQuery("#item-"+(startId-1)).hide()
                    jQuery("#item-"+(startId+showCount-1)).show().addClass('animated fadeIn')
                }
            </script>
        </section>
    <?php endif; ?>
    <?php if($gallery!=null): $images=$gallery?>
        <section class="row sect-gallery">
            <div class="col-md-12">
                <?php include dirname(__DIR__).'/parts/post-templates/gallery.php'; ?>
            </div>
        </section>
    <?php endif; ?>  
    <?php if(get_field('t3-has-characters')==1): ?>
        <style>
            .characters, .links, .reviews{
                margin-bottom:30px;
            }
            .characters .c-img{
                padding-bottom: 20px;
                text-align: center;
            }
            .characters .c-img img{
                border-radius: 50%;
                height: 150px;
                width: 150px;
                margin: 0 auto;
            }
            .characters .c-img img{
                border-radius: 50%;
                height: 150px;
                width: 150px;
                margin: 0 auto;
            }
            .characters .active, .c-item{
                background-color: white !important;
            }
        </style>
        <?php if($custom_headline!=null):?>
            <div style="margin: 0 15px; margin-bottom:15px;">
                <div class="line solid-border col-sm-4 hidden-xs"></div>
                <span  class="sometext col-sm-4"><?php echo $custom_headline; ?></span>
                <div class="line solid-border col-sm-4 hidden-xs"></div>
            </div>
        <?php endif; ?>
        <section id="chara" class="row  sect-content">
            <div id="characters" class="col-md-8 col-sm-12 col-xs-12 characters owl-carousel owl-theme">
                <?php foreach($characters as $key => $c): ?>
                    <div class="c-item" itemprop="member" id="character-<?php echo $key; ?>">
                        <?php if($c["img"]!=null): ?>
                            <div class="c-img"><img itemprop="image" src="<?php echo $loadingUrl; ?>" data-src="<?php echo $c["img"]["url"]; ?>" 
                                alt="<?php echo $c["img"]["alt"]; ?>" class="lazyload"></div>
                        <?php endif; ?>
                        <div itemprop="description" class="c-introduction"><?php echo $c["introduction"]; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <script>
                var owlChara
                jQuery(document).ready(function($){
                    owlChara=jQuery('#characters');
                    owlChara.owlCarousel({
                        loop:false,
                        margin:40,
                        center:false,
                        responsive:{
                            0:{
                                items:1
                            },
                            768:{
                                items:3
                            },
                            1200:{
                                items:4
                            }
                        }
                    })
                    setInterval(function(){ 
                        owlChara.trigger('next.owl.carousel');
                    }, 5000);
                });
            </script>
        </section>
    <?php endif; ?>
    <?php if($custom_section):?>  
        <section id="review" class="row sect-content">
            <style>
                #chara{
                    margin-bottom:0;
                }
                .line{
                    margin-top: 15px;
                }
            </style>
            <div style="margin: 0 15px; margin-bottom:15px;">
                <div class="line solid-border col-sm-4 hidden-xs"></div>
                <span  class="sometext col-sm-4"><?php echo $sectitle; ?></span>
                <div class="line solid-border col-sm-4 hidden-xs"></div>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 30px;">
                <?php include dirname(__DIR__).'/parts/post-templates/review-box.php'; ?>
            </div>
        </section>
    <?php endif; ?>   
    <?php if($links!=null):?>
        <style>
            .links h4{
            color: #f96f12;
            }
            .links .l-img{
                position: relative;
                padding-top: 75%;
                margin-bottom: 20px;
            }
            .links .l-img img{
                position: absolute;
                top: 0;
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        </style> 
        <section class="row sect-content">
            <span class="sometext" style="margin: 0 15px;">相关文章</span>
            <div class="col-md-12 col-sm-12 col-xs-12 links owl-carousel owl-theme" id="links" style="margin-top: 15px;">
                <!-- <h4>相关文章</h4> -->
                <?php foreach($links as $key => $l): ?>
                    <div class="l-item" itemprop="subjectOf" id="link-<?php echo $key; ?>">
                        <div class="l-img"><img itemprop="image" src="<?php echo $loadingUrl; ?>" data-src="<?php echo $l["img"]["url"]; ?>" 
                            alt="<?php echo $l["img"]["alt"]; ?>" class="lazyload"></div>
                        <a href="<?php echo $l["url"]; ?>" target="_blank" rel="noopener" itemprop="sameAs"><h4><?php echo $l["title"]; ?></h4></a>
                        <p itemprop="description"><?php echo $l["excerpt"]; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <script>
            jQuery(document).ready(function($){
            var owlLink
            var Linkcount = 4
                if (<?php echo sizeOf($links); ?><4) {
                                Linkcount=<?php echo sizeOf($links); ?>
                            }
                owlLink=jQuery('#links');
                owlLink.owlCarousel({
                    loop:false,
                    margin:10,
                    //dots:false,
                    center:false,
                    //nav:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        768:{
                            items:3
                        },
                        1200:{
                            items:4
                        }
                    }
                })
            });
        </script>
    <?php endif; ?>
    <style>
        .sect-bottom .box-left{
            padding:30px;
            background : #EFEFEF;
            text-align: center;
            position:relative;
        }
        .special-img{
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            object-fit: cover;
            margin:  auto;
            vertical-align: middle;
        }
        @media (max-width:991px) {
            .box-left{
                margin-bottom: 30px;
                min-height: 500px;
            }
        }
        @media (max-width:767px) {
            .sect-bottom .box-left{
                padding:15px;
            }
            .box-left{
                min-height: 500px;  
            }
        }
    </style>
    <section class="row sect-bottom">
        <div class="col-md-8"><div class="slider box-left">
            <?php if($foot!=null): ?>
                <img data-src="<?php echo $foot['url']; ?>" itemprop="image" alt="special-img" class="lazyload special-img" src="<?php echo $loadingUrl; ?>">
            <?php else: ?>
                <div id="map" itemprop="hasMap" class="special-img" style="height: 90%; width: 90%;"></div>
                <script>
                    jQuery(document).ready(function($){
                        var uluru = {lat: <?php echo $mypost->lat; ?>, lng: <?php echo $mypost->long; ?>};
                        var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });
                        var marker = new google.maps.Marker({ position: uluru, map: map });
                    });
                </script>
            <?php endif; ?>
        </div></div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <?php include dirname(__DIR__).'/parts/post-templates/info-3.php'; ?>
        </div>
    </section>
    <script>
        var w = window.innerWidth;
        if(w>991) jQuery(".box-left").height(jQuery(".info").height()+22)
        jQuery(window).resize(function() {
            var w = window.innerWidth;
            if(w>991) jQuery(".box-left").height(jQuery(".info").height()+22)
        });
    </script>
</main>
<?php endwhile; ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/owl.carousel.min.js"></script>
<?php get_footer(); ?>
