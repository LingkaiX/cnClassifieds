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
<!-- Google AdSense -->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-9173929910659094",
    enable_page_level_ads: true
  });
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- The end is in th footer.php --><div class="site-content">
<header id="site-header"class="site-header" role="banner">
    <div class="container header-container">
        <div class="first-header row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <button onclick=history.go(-1) class="back-button"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <a href=<?php echo get_site_url();?> class="header-logo"><img src="<?php echo get_template_directory_uri();?>/img/Logo_White.svg"></img></a>
                <div class="search-button-box">
                    <?php include 'parts/cn-conversation-link.php'; ?>
                    <button class="search-button" x-stat="closed"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div id="search-row" style="display:none;"><?php include 'parts/search-form.php'; ?></div>
    </div>
</header>
<div id="for-header" style="width:100%;height:50px"></div>

<script>
jQuery(document).ready(function($){
    var iclose= '<i class="fa fa-times" aria-hidden="true"></i>';
    var isearch='<i class="fa fa-search" aria-hidden="true"></i>';
    $('.search-button').click(function(){
        if($(this).attr('x-stat')=='closed'){
            $(this).html(iclose).attr('x-stat','open');
            $('#search-row').css('display','block');
        }else{
            $(this).html(isearch).attr('x-stat','closed');
            $('#search-row').css('display','none');
        }
    });
    
});
</script>
