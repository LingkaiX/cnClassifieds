<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="theme-color" content="#ff6363" />
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#ff6363">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<?php wp_head(); ?>
<link href="<?php echo get_template_directory_uri();?>/css/owl.carousel.min.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri();?>/css/owl.theme.default.min.css" rel="stylesheet">
<style>
.home {
  padding: 0;
  margin: 0;
}
.home-hearder-container {
  min-height: 400px;
  padding-top: 120px;
  padding-bottom: 120px;
}
@media (max-width: 991px) {
  .home-hearder-container {
    min-height: 480px;
    background-position: center top;
  }
  .social-links {
    max-width: 240px;
    margin: 0 auto;
    float: none !important;
  }
}
@media (max-width: 767px) {
  .home-hearder-container {
    background-position: center;
    background-size: 100%;
  }
}
.search-form-box {
  background-color: rgba(51, 51, 51, 0.6);
  border-radius: 24px;
  padding: 36px 48px;
}
@media (max-width: 991px) {
    .search-form-box {
        border-radius: 10px;
    }
}
@media (max-width: 767px) {
  .search-form-box {
    box-shadow: none;
    width: 90%;
    margin-left: 5%;
    padding: 32px 24px;
  }
}
.logo-and-info{
    height:100px;
    padding-top:20px;
    padding-bottom:20px;
}
.home-logo{
    height:60px;
}
@media (max-width: 991px) {
    .home-logo{
        height:40px;
    }
}
.top-info{
    height:60px;
    float:right;
}
.mobile-bar{
    background: #f7f7f7;
    border: 1px solid #dadada;
    border-width: 1px 0;
    padding:24px 24px;
}
.mobile-bar .links{

}
.mobile-bar .links:after{
    content:"\f220";
    margin-left:4px;
}
.goodman-section{
    margin: 40px auto;
}
.slogan-section{
    padding-bottom: 60px;
    background-image: linear-gradient(45deg, rgba(255,168,99,0.74) 0%, #FF6363 100%);
}
.slogan-section img{
    height: 64px;
    margin: 60px 0 40px 0;
}
.slogan-section hr{
    border-top: 3px solid white;
    width: 120px;
    margin-bottom: 40px;
}
.btn-slogan{
    display: inline-block;
    width: 300px;
    height: 50px;
    background: #FFFFFF;
    border-radius: 30px;
    padding: 12px;
    font-size: 20px;
    color: #FF6363;
    letter-spacing: 0.93px;
}
.slogan-section .text-1{
    font-size: 48px;
    color: white;
    letter-spacing: 2.24px;
    line-height: 75px;
    font-weight: 600;
}
.slogan-section .text-2{
    font-size: 32px;
    color: white;
    letter-spacing: 4px;
    line-height: 75px;
}
@media (max-width: 767px) {
    .slogan-section img{
        height:48px;
    }
    .slogan-section hr{
        border-top: 2px solid white;
    }
    .slogan-section .text-1{
        font-size: 18px;
        letter-spacing: 0.84px;
        line-height: 28px;
    }
    .slogan-section .text-2{
        font-size: 18px;
        letter-spacing: 0.31px;
        line-height: 28px;
    }
    .btn-slogan{
        width: 200px;
        font-size: 18px;
        padding: 8px;
        height: 40px;
    }
}
.cate-section {
    margin: 40px auto;
}
.mobile-logo-row{
    position: absolute;
    top: 32px;
    left: 48px;
}
.cn-conv-row .cn-conv{
    float:right;
    margin-top:32px;
    margin-right:48px;
    padding: 16px;
}
.cn-conv-row .cn-conv:hover{
    background-color: rgba(51, 51, 51, 0.2);
    border-radius: 10px;
}
@media only screen and (max-width: 480px) {
  .cn-conv {
    margin-left: 15px;
  }
}
</style>
</head>
<body <?php body_class(); ?>>
<div class="site-content" style="background-color: #fefefe;">
<?php include 'parts/homepage-banner.php';?>
<div class="container logo-and-info hidden-xs">
    <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" class="home-logo">
    <img src="<?php echo get_template_directory_uri();?>/img/top-info.png" class="top-info">
</div>
<header class="index-header" id="index-header">
    <div class="container home-hearder-container">
        <div class="row hidden-sm hidden-md hidden-lg mobile-logo-row">
            <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" class="home-logo">
        </div>
        <div class="row">
            <div class="col-md-1 col-sm-1 hidden-xs va-helper"></div>
            <div class="col-md-10 col-sm-10 col-xs-12 search-form-box"> 
                <?php include 'parts/search-form.php';?>     
            </div>
        </div>
        <div class="row hidden-sm hidden-md hidden-lg cn-conv-row">
            <a href=<?php echo isTCN()?home_url():home_url().'/zh-tw'.'/';?> class="cn-conv">
                简体
                <img style="height:8px;margin-bottom:2px;" src="<?php echo get_template_directory_uri().'/img/'; echo isTCN()?"switch-right.svg":"switch-left.svg";?>">
                繁体
            </a>
        </div>
    </div>
</header>
<div class="hidden-sm hidden-md hidden-lg mobile-bar">
    <a class="links" target="_blank" rel="nofollow" href="https://auads.com.au/publish-busines"><span>免费发布信息</span></a>
</div>
<div class="goodman-section container">
    <?php include 'parts/goodman-list.php';?>
</div>
<div class="slogan-section center-content">
    <img src="<?php echo get_template_directory_uri();?>/img/home-laptop-icon.svg">
    <p class="text-1">GETTING START YOUR</p>
    <p class="text-2">ONLINE BUSINESS IN <br class="hidden-sm hidden-md hidden-lg">CHINESE MARKET !</p>
    <hr>
    <a class="btn-slogan" target="_blank" rel="nofollow" href="http://eepurl.com/c7FyKj">Find Out More</a>
</div>
<div class="cate-section container">
    <?php include 'parts/cate-section.php';?>
</div>
</div>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/owl.carousel.min.js"></script>