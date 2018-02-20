<?php 
/*
Template Name: Template 4
Template Post Type: post 
*/
get_header();?>
<link href='<?php echo get_template_directory_uri();?>/css/simplelightbox.css' rel='stylesheet'/>
<link href='<?php echo get_template_directory_uri();?>/css/jquery.fancybox.min.css' rel="stylesheet"/>
<link href='<?php echo get_template_directory_uri();?>/css/animate.css' rel='stylesheet' />
<link href="<?php echo get_template_directory_uri();?>/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/owl.theme.default.min.css" rel="stylesheet">
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
    .solid-boder{
        border-style : Solid;
        border-color : #F16522;
        border-width : 1px;
    }
</style>
<?php
    while (have_posts()) : the_post();
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
    $hasAbn=get_post_meta($post->ID,'abn',true);
    $slider = get_field('t4-slider');
    $social = get_field('t4-social');
    $xitems=get_field('items-in-row');
    $items = get_field('t4-item');
    $gallery = get_field('t4-gallery');
    $foot = get_field('t4-foot');
    //print_r($gallery);
    $loadingUrl=get_template_directory_uri().'/img/Loader.svg';
?>
<main id="t4" class="container">
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
    <section class="row sect-top"><div class="col-md-12">
        <div class="logo-t4"><?php echo get_the_post_thumbnail( null, 'full', ['class' => 'logo-img', 'title' => 'Logo'] );?></div>
        <?php
            $abn=null;
            //if($hasAbn) $abn='<abbr title="ABN Checked"><img class="img-abn" src="'.get_template_directory_uri().'/img/ABN-CHECKED.svg"></img></abbr>';
            the_title( '<h2 class="title-t4">', '&nbsp;&nbsp;<small>ID: '.$post->ID.'&nbsp;&nbsp;'.$abn.'</small></h2>' );
            $enTitle=get_post_meta($post->ID,'title-en',true);
            if($enTitle) echo '<h3 class="en-title-t4">'.$enTitle.'</h3>'; 
        ?>
        <div class="tag-t4">
            <i class="ionicon ion-pricetags icon" aria-hidden="true"></i>
            <?php 
                foreach(get_the_category() as $cate){
                    echo '<a class="needLatAndLong" href="'.get_category_link($cate->term_id).'">'.$cate->name.'</a>';
                }
                if($hasAbn) echo '<p class="hidden-md hidden-lg p-abn"><span>ABN CHECKED</span><img class="img-abn" src="'
                .get_template_directory_uri().'/img/ABN-CHECKED.svg"></img></p>';
            ?>
        </div>
        
    </div></section>
    <style>
    @media (min-width:992px) {
        .slider, .info{
            height:500px;
        }
    }
    .slider{
        padding: 45px 30px 60px 30px
    }
    @media (max-width:767px) {
        .slider{
            padding: 0;
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
    .info {
        padding: 30px 30px;
        position: relative;
    }
    @media (max-width:991px) {
        .info{
            margin-top: 30px;
            padding-bottom: 80px;
        }
    }
    .info a{
        color:rgb(51, 51, 51);
    }
    .info a:hover{
        text-decoration: none;
    }
    .img {
        width: 100%;
        padding-top: 60%;
        position: relative;
    }

    .img img {
        transition: all 1s;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        opacity: 0;
    }
    .img-show{
        /* z-index:10!important; */
        opacity: 1!important;
    }
    .dots{
        bottom: 10px;
        position: absolute;
        left: 15px;
        right: 15px;
        text-align: center;
    }
    .dot{
        height: 13px;
        width: 13px;
        padding: 0;
        margin: 0 5px;
        cursor: pointer;
        color: #000!important;
        border: 1px solid #ccc!important;
        border-radius: 50%;
        text-align: center;
        background-color: lightgray;
        display: inline-block;
    }
    .dot-show, .dot:hover{
        background-color: #f26522!important;
    }
    .with-ion span:last-child{
        vertical-align: middle;
        font-weight: 400;
    }
    .with-ion span:before {
        font-family: "Ionicons";
        color: #f05a24;
        font-size: 30px;
        vertical-align: middle;
        font-weight: bolder;
    }
    .with-ion .phone:before{
        content: "\f4b8";
        padding-right: 20px;
    }
    .with-ion .phone:hover::before{
        content: "\f4b9";
    }
    .with-ion .email:before{
        content: "\f422";
        padding-right: 20px;
    }
    .with-ion .email:hover::before{
        content: "\f423";
    }
    .with-ion .website:before{
        content: "\f4d2";
        padding-right: 19px;
    }
    .with-ion .website:hover::before{
        content: "\f4d3";
    }
    .with-ion .address:before{
        content: "\f46d";
        padding-right: 19px;
    }
    .with-ion .address:hover::before{
        content: "\f46e";
    }
    .enquiry-btn{
        width: 100%;
        font-size: 20px;
        float: none;
        margin-right: auto;
        border-radius: 6px;
        margin-top: 30px;
    }
    .goto-google{
        width: 100%;
        background-color: #858484;
        color: white !important;
        margin-bottom: 10px;
        font-size: 20px;
        border-radius: 6px;
    }
    .qr-code{
        max-width: 200px;
        max-height: 250px;
        text-align: center;
        display: inline-block;
    }
    .social-box{
        text-align: center;
        font-size: 30px;
        position: absolute;
        bottom: 20px;
        left: 0;
        right: 0;
    }
    img.img-social{
        height:30px;
        padding: 0 15px;
    }
    </style>
    <section class="row sect-contact">
        <div class="col-md-8"><div class="slider solid-boder">
            <div class="img">
            <?php foreach($slider as $key => $img){
                echo '<img data-src="'.$img['url'].'" alt="'.$img['alt'].'" id="slider-img-'.$key.'" class="lazyload" src="'.$loadingUrl.'">';
            }?>
            </div>
            <div class="dots">
            <?php foreach($slider as $key => $img){
                echo '<span class="dot" onclick="showImg('.$key.')" id="slider-dot-'.$key.'"></span>';
            }?>
            </div>
        </div></div>
        <div class="col-md-4 hidden-sm">
            <?php include dirname(__DIR__).'/parts/t4/info.php'; ?>
        </div>
        <script>
            var showingId=0;
            jQuery(document).ready(function($){
                jQuery("#slider-img-0").addClass("img-show")
                jQuery("#slider-dot-0").addClass("dot-show")
            });
            function showImg(id){
                jQuery("#slider-img-"+id).addClass("img-show")
                jQuery("#slider-dot-"+id).addClass("dot-show")
                jQuery("#slider-img-"+showingId).removeClass("img-show")
                jQuery("#slider-dot-"+showingId).removeClass("dot-show")
                showingId=id
            }
            var sliderCount=<?php echo sizeof($slider); ?>;
            var nextToShow=1
            setInterval(function(){ 
                showImg(nextToShow)
                nextToShow++;
                if(nextToShow >= sliderCount) nextToShow=0
             }, 5000);
        </script>
    </section>
    <style>
        .article{
            border-left: 3px solid #F05A24;
            box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
            background-color: #efefef;
            padding: 15px 0;
        }
        .article h1,.article h2,.article h3,.article h4,.article h5{
            padding-left: 50px;
            padding-right: 50px;
            color: #F05A24;
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
            border-color: #f05a24;
        }
        .p-abn-2{

        }
        img.little-man{
            height: 60px;
            margin: 10px 0;
            padding-right: 15px;
            vertical-align: middle;
        }
    </style>
    <section class="row sect-content">
        <div class="col-md-8 col-sm-6 col-xs-12"><div class="article">
        <?php the_content(); ?>
        </div></div>
        <div class="col-md-4 hidden-sm hidden-xs"><div style="text-align:center;">           
        <?php 
            if($hasAbn) echo '<div class="solid-boder abn-box"><p class="p-abn">
                <img class="little-man" src="'.get_template_directory_uri().'/img/little-man.svg"></img>
                <span>ABN CHECKED</span>
                <img class="img-abn" src="'.get_template_directory_uri().'/img/ABN-CHECKED.svg"></img>
                </p></div>';
            echo '<div class="qr-code" style="margin-top:30px;"><img src="'.$social['wechat-qr']['url'].'" title="" class=""></div>';
        ?>
        </div></div>
        <div class="col-sm-6 visible-sm-inline-block" style="margin-top: -30px;">
            <?php include dirname(__DIR__).'/parts/t4/info.php'; ?>
        </div>
    </section>
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
        color: #f26522;
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
        color:#f26522;
    }
    </style>
    <section class="row sect-item" style="position:relative;">
        <div>
            <?php foreach( $items as $key => $item ): ?>
            <div class="col-md-3 col-sm-6 col-xs-12 product-card" data="<?php echo $key; ?>" 
                id="item-<?php echo $key; ?>" <?php if($key>3) echo 'style="display: none;"'; ?>>

                <div class="card-img">
                    <?php foreach( $item['img'] as $skey => $image ): ?>
                        <a href="<?php echo $image['url']; ?>" data-fancybox="group-<?php echo $key; ?>">
                            <img data-src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"
                                style="<?php if($skey==0) echo 'z-index:10;'; ?>"
                                class="lazyload" src="<?php echo $loadingUrl; ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="card-box">
                    <h4 class=""><?php echo $item['title']; ?></h4>
                    <p class=""><?php echo $item['content']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="btn btn-last" onclick="showLast()">
            <i class="ion-android-arrow-back"></i>
        </div>
        <button class="btn btn-next" onclick="showNext(1)">
            <i class="ion-android-arrow-forward"></i>
        </botton>
        <script>
            var itemCount=<?php echo sizeof($items); ?>;
            var showCount=4;
            var startId=0;
            var w = window.innerWidth;
            if(w<768) showCount=1
            else if(w<992) showCount=2
            else showCount=4

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
    <?php if($gallery['show-gallery']==1): $images=$gallery['imgs']  ?>
    <style>
    .g-wrap {
        overflow: hidden;
        width: 100%;
        position: relative;
        padding: 0;
    }

    .gallery {
        width: 100%;
    }

    .gallery a {
        width: 200px;
        height: 200px;
        display: table-cell;
        text-align: center;
        vertical-align: middle;
        padding: 0;
    }

    .gallery a img {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }

    .nav-last, .nav-next{
        position: absolute;
        top: 40%;
        background-color: rgba(255, 255, 255, 1);
        z-index: 99;
        border: none;
        font-size: 30px;
        opacity: 0.7;
    }
    .nav-last{
        left: 15px;
        padding-right: 10px;
        padding-top: 4px;
        padding-left: 7px;
    }
    .nav-next {
        right: 15px;
        padding-left: 10px;
        padding-top: 4px;
        padding-right: 7px;
    }
    .ion-chevron-left, .ion-chevron-right{
        padding-top: 5px;
    }
    </style>
    <section class="row sect-gallery">
        <div class="col-md-12">
            <div class="g-wrap">
                <button class="nav-last" onclick="gLast()"><i class="ionicon ion-chevron-left" aria-hidden="true"></i></button>
                <div class="gallery owl-carousel owl-theme" id='gallery'>
                <?php foreach( $images as $image ): ?>          
                    <a href="<?php echo $image['url']; ?>" data-fancybox class="item">
                        <img data-src="<?php echo $image['sizes']['large']; ?>"
                            alt="<?php echo $image['alt'];?>" title="<?php echo $image['caption']; ?>" 
                            class="lazyload" src="<?php echo $loadingUrl; ?>"/>
                    </a>                
                <?php endforeach; ?>
                </div>
                <button class="nav-next" onclick="gNext()"><i class="ionicon ion-chevron-right" aria-hidden="true"></i></button>
            </div>
        </div>
        <script>
            var owl;
            function gLast(){
                owl.trigger('prev.owl.carousel');
            }
            function gNext(){
                owl.trigger('next.owl.carousel');
            }
            jQuery(document).ready(function($){

                owl=jQuery('#gallery');
                owl.owlCarousel({
                    loop:true,
                    margin:10,
                    dots:false,
                    responsive:{
                        0:{
                            items:2
                        },
                        600:{
                            items:3
                        },
                        1000:{
                            items:5
                        }
                    }
                })
            });
        </script>
    </section>
    <?php endif; ?>
    <?php if($foot["has-reviews"]==1): ?>
    <style>
        @media (max-width:991px) {
        .sect-review{
            margin-bottom: 30px;
        }
        }
        .review-head{
            font-family : Source Han Sans CN;
            font-weight : bold;
            font-size : 25px;
            color : #F26522;
            text-align: center; 
            width:100%;
            margin-bottom: 30px;
        }
        .review-head .line{
            display: inline-block;
            border-style : Solid;
            border-color : #F05A24;
            border-width : 1px;
            width: 25%;
        }
        .review-head .txt{  
            /* vertical-align: middle;   */
            vertical-align: -8px;
        }
        .review-box {
            background : rgba(242, 101, 34, 0.9);;
            border-radius : 10px;
            padding: 35px;
            box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
            color: white;
            width:85%;
            margin:0 auto;
            margin-bottom: 20px;
        }
        .review-box .review-title{
            text-align: right;
            font-size: 20px;
        }
    </style>
    <section class="row sect-review">
        <div class="review-head">
            <span style="white-space:pre;">  </span><span class="line"></span>
            <span style="white-space:pre;">  </span><span class="txt">顾客反馈</span>  
            <span style="white-space:pre;">  </span><span class="line"></span>
        </div>
        <?php foreach( $foot["reviews"] as $key => $review ): ?>
            <div class="col-md-6 col-xs-12"><div class="review-box">
                <p class="review-content">
                    <?php echo $review['content'] ?>
                </p>
                <p class="review-title"><strong><?php echo $review['title'] ?></strong></p>
            </div></div>
        <?php endforeach; ?>
    </section>
    <?php endif; ?>
    <style>
        .sect-bottom .box-left{
            padding:30px;
            background : #EFEFEF;
            text-align: center;
        }
        @media (max-width:767px) {
            .sect-bottom .box-left{
                padding:15px;
            }
        }
    </style>
    <section class="row sect-bottom">
        <div class="col-md-8"><div class="slider box-left">
            <?php if($foot["has-img"]==1): ?>
                <img data-src="<?php echo $foot['img']['url']; ?>" alt="" class="lazyload" src="<?php echo $loadingUrl; ?>">
            <?php else: ?>
                <div id="map" style="height: 400px;  width: 100%;"></div>
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
            <?php include dirname(__DIR__).'/parts/t4/info.php'; ?>
        </div>
    </section>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/owl.carousel.min.js"></script>