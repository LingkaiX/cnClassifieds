<?php 
/*
Template Name: Template 5
Template Post Type: post 
*/
get_header();?>
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
    section{
        margin-bottom: 30px;
    }
    .solid-border{
        border-style : Solid;
        border-color : #ff6363;
        border-width : 1px;
    }
    .shadow-border{
        box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.2);
    }
    .animated {
        animation-duration: 2s;
    }
</style>
<?php
    while (have_posts()) : the_post();
    $mypost = $wpdb->get_row( "SELECT * FROM wp_places_locator where post_id=".$post->ID );
    $hasAbn=get_post_meta($post->ID,'abn',true);
    $faceimg = get_field('t5-faceimg');
    $social = get_field('t5-social');
    $questions = get_field('t5-questions');
    $gallery = get_field('t5-gallery');
    $characters = get_field('t5-characters');
    $links = get_field('t5-links');
    $reviews = get_field('t5-reviews');
    $loadingUrl=get_template_directory_uri().'/img/loader.svg';
?>
<main id="t5" class="container">
    <style>
        .sect-top{
            margin-bottom: 10px;
        }
        .logo-t4{
            margin-top: 20px;
        }
        .logo-t4 img{
            max-height: 78px;
            max-width: 100%;
            width: auto;
        }
        .tag-t4 a{
            margin-right: 5px;
        }
        .en-title-t4{
            margin-top: 15px;
        }
    </style>
    <section class="row sect-top"><div class="col-md-12">
        <?php          
            $logo=get_the_post_thumbnail( null, 'full', ['class' => 'logo-img', 'title' => 'Logo'] );
            if($logo) echo '<div class="logo-t4">'.$logo.'</div>';
        ?>
        <?php
            $abn=null;
            //if($hasAbn) $abn='<abbr title="ABN Checked"><img class="img-abn" src="'.get_template_directory_uri().'/img/abn-checked.svg"></abbr>';
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
                if($hasAbn) echo '<p class="p-abn"><span>ABN CHECKED</span><img style="margin-top: 2px;" class="img-abn" src="'
                .get_template_directory_uri().'/img/abn-checked.svg"></p>';
            ?>
        </div>   
    </div></section>
    <style>
    .faceimg img{
        width: 100%;
        height: 420px;
        object-fit: cover;
    }
    </style>
    <section class="row sect-contact">
        <div class="col-md-8">
            <?php include dirname(__DIR__).'/parts/post-templates/info-2.php'; ?>
        </div>
        <div class="col-md-4 hidden-sm hidden-xs faceimg">
            <img src="<?php echo $loadingUrl; ?>" data-src="<?php echo $faceimg['url']; ?>" 
                            alt="<?php echo faceimg["alt"]; ?>" class="lazyload">
        </div>
    </section>
    <?php if(get_field('t5-has-gallery')==1): $images=$gallery  ?>
    <style>
    </style>
    <section class="row sect-gallery">
        <div class="col-md-12">
            <?php include dirname(__DIR__).'/parts/post-templates/gallery.php'; ?>
        </div>
    </section>
    <?php endif; ?>
    <style>
        .article, .questions-mobile, .characters, .links, .reviews{
            margin-bottom:30px;
        }
        .sect-content img{
            max-height: 100%;
            max-width: 100%;
        }
        .article{
            border-left: 3px solid #ff6363;
            padding: 15px 0;
        }
        .article h1,.article h2,.article h3,.article h4,.article h5{
            padding-left: 50px;
            padding-right: 50px;
            color: #ff6363;
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
            border-color: #ff6363;
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
        .links h4{
            color: #ff6363;
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
        .questions{
        }
        .questions h4, .questions-mobile h4{
            font-weight: 600;
            color: #ff6363;
            margin-left: 30px;
            padding-top: 30px;
            margin-top: 0;
        }
        .q-item{
            padding: 15px 30px;
            border-bottom: 2px solid #ff6363;
        }
        .q-item strong{
            color: gray;
            padding-bottom: 10px;
            display: inline-block;
        }
        .q-item:last-child{
            border-bottom: none;
            padding-bottom: 40px;
        }
        .q-answer p:last-child{
            margin-bottom:0;
        }
        .questions-mobile{
            position: relative;
            height: 300px;
            overflow: hidden;
        }
        .questions-mobile-open{
            height: auto !important;
        }
        .sleepy{
            position: absolute;
            bottom: 0;
            height: 40px;
            left: 0;
            right: 0;
            background: linear-gradient(rgba(255,255,255,0.7), white);
        }
        #read-more{
            touch-action: manipulation;
            cursor: pointer;
            text-align:right;
            margin-top: 10px;
            margin-right: 10px;
        }
        #read-more *{
            vertical-align: middle;
        }
        #read-more span{
            vertical-align: middle;
            margin-top: 10px;
            margin-right: 10px;
            color: #ff6363;
            font-weight: 600;
        }
        #read-more i{
            vertical-align: middle;
        }
        @media (min-width: 992px){
            .info {
                height: 450px !important;
            }
        }
        @media (min-width:768px) and (max-width:991px){
            .justina-container{
                margin-bottom: 30px;
            }
        }
    </style>
    <section class="row sect-content">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <!-- 正文 -->
            <div class="article shadow-border">
                <?php the_content(); ?>
            </div>
            <!-- 人物介绍 -->
            <?php if(get_field('t5-has-characters')==1): ?>
            <div class="characters owl-carousel owl-theme" id="characters">
                <?php foreach($characters as $key => $c): ?>
                    <div class="c-item" id="character-<?php echo $key; ?>">
                        <div class="c-img"><img src="<?php echo $loadingUrl; ?>" data-src="<?php echo $c["img"]["url"]; ?>" 
                            alt="<?php echo $c["img"]["alt"]; ?>" class="lazyload"></div>
                        <div class="c-introduction"><?php echo $c["introduction"]; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <!-- 手机显示的侧边栏内容 -->
            <?php if(get_field('t5-has-questions')==1): ?>
            <div class="questions-mobile hidden-md hidden-lg shadow-border" onclick="readMore()">
                <h4><?php echo get_field('t5-question-title'); ?></h4>
                <div>
                <?php foreach($questions as $key => $q): ?>
                    <div class="q-item" id="question-<?php echo $key; ?>">
                        <strong class="q-ask"><?php echo $q["ask"]; ?></strong>
                        <div class="q-answer"><?php echo $q["answer"]; ?></div>
                    </div>
                <?php endforeach; ?>
                </div>
                <div class="sleepy">
                    <div class="" id="read-more"><span onclick="readMore()">阅读更多</span><i class="ionicon ion-android-add-circle"></i></div>
                </div>
            </div>
            <script>
                var readingMore=false
                function readMore(){
                    if(readingMore){
                        jQuery('#read-more').html('<span>阅读更多</span><i class="ionicon ion-android-add-circle"></i>')
                        jQuery('.questions-mobile').removeClass('questions-mobile-open')
                    }else{
                        jQuery('#read-more').html('<span>收起</span><i class="ionicon ion-minus-circled"></i>')
                        jQuery('.questions-mobile').addClass('questions-mobile-open')
                    }
                    readingMore = !readingMore
                }
            </script>
            <?php endif; ?>
            <!-- 文章列表 -->
            <?php if(get_field('t5-has-links')==1): ?>
            <div class="links owl-carousel owl-theme" id="links">
                <!-- <h4>相关文章</h4> -->
                <?php foreach($links as $key => $l): ?>
                    <div class="l-item" id="link-<?php echo $key; ?>">
                        <div class="l-img"><img src="<?php echo $loadingUrl; ?>" data-src="<?php echo $l["img"]["url"]; ?>" 
                            alt="<?php echo $l["img"]["alt"]; ?>" class="lazyload"></div>
                        <a href="<?php echo $l["url"]; ?>" target="_blank" rel="noopener"><h4><?php echo $l["title"]; ?></h4></a>
                        <p><?php echo $l["excerpt"]; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <div class="row justina-container">
                <!-- 客户评价 -->
                <?php if(get_field('t5-has-reviews')==1): ?>
                <div class="col-md-12 col-sm-6">
                    <?php include dirname(__DIR__).'/parts/post-templates/review-box.php'; ?>
                </div>
                <?php endif; ?>
                <div class="hidden-lg hidden-md col-sm-6 hidden-xs">
                    <?php include dirname(__DIR__).'/parts/post-templates/info.php'; ?>
                </div>
            </div>
            <!-- 最下面一版 -->
            <div class="bottom row">
                <div class="col-lg-6 col-lg-push-6 col-md-5 col-md-push-7 col-sm-12" style="margin-bottom: 30px;">
                    <div id="map" style="height: 450px;" ></div>
                </div>
                <script>
                    jQuery(document).ready(function($){
                        var uluru = {lat: <?php echo $mypost->lat; ?>, lng: <?php echo $mypost->long; ?>};
                        var map = new google.maps.Map(document.getElementById('map'), { zoom: 15, center: uluru });
                        var marker = new google.maps.Marker({ position: uluru, map: map });
                    });
                </script>
                <div class="col-lg-6 col-lg-pull-6 col-md-7 col-md-pull-5 hidden-sm col-xs-12">
                    <?php include dirname(__DIR__).'/parts/post-templates/info.php'; ?>
                </div>
            </div>
        </div>
        <!-- 桌面显示侧边栏 -->
        <div class="col-md-4">
            <?php if(get_field('t5-has-questions')==1): ?>
            <div class="questions hidden-sm hidden-xs shadow-border">
                <h4><?php echo get_field('t5-question-title'); ?></h4>
                <?php foreach($questions as $key => $q): ?>
                    <div class="q-item" id="question-<?php echo $key; ?>">
                        <strong class="q-ask"><?php echo $q["ask"]; ?></strong>
                        <div class="q-answer"><?php echo $q["answer"]; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <script>
            var owlChara,owlLink
            jQuery(document).ready(function($){
                owlChara=jQuery('#characters');
                owlChara.owlCarousel({
                    loop:true,
                    margin:40,
                    //dots:false,
                    center:false,
                    responsive:{
                        0:{
                            items:1
                        },
                        768:{
                            items:3
                        }
                    }
                })
                owlLink=jQuery('#links');
                owlLink.owlCarousel({
                    loop:true,
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
                        }
                    }
                })
                setInterval(function(){ 
                    owlChara.trigger('next.owl.carousel');
                }, 5000);
            });
        </script>
    </section>
</main>
<?php endwhile; ?>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/owl.carousel.min.js"></script>