<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="theme-color" content="#F26522" />
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#F26522">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<?php wp_head(); ?>

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9173929910659094",
    enable_page_level_ads: true
  });
</script>

</head>
<body <?php body_class(); ?>>
<div class="site-content" style="background-color: white;">
<header class="index-header">
    <div class="container home-hearder-container"> 
        <div class="row">
            <div class="col-md-6 col-xs-12 home-logo-container">
                <img src="<?php echo get_template_directory_uri();?>/img/Logo_Version2.svg" class="home-logo"></img>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-1 hidden-xs"></div>
            <div class="col-md-8 col-sm-10 col-xs-12 search-form-box"> 
                <?php include 'parts/search-form.php';?>     
            </div>
        </div>
    </div>
</header>
<div class="cate-section container">
    <?php include 'parts/cate-section.php';?>
</div>
</div>
<?php get_footer(); ?>

<?php include 'parts/subscribe-message.php';?>
