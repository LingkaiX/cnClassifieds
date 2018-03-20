<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<link rel="manifest" href="<?php echo get_template_directory_uri();?>/manifest.json">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="theme-color" content="#ff6363" />
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#ff6363">
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
<style>
    .header-logo {
        display: inline-block;
        padding-top: 3px;
    }
    .header-logo img {
        /*margin-top: 5px;*/
        height: 35px;
        margin: 0 auto;
    }
    .site-header {
        padding: 5px 0;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 100;
    }
    .first-header {
        min-height: 40px;
        text-align: center;
    }
    .first-header .ionicon {
        color: white;
        padding-top: 5px;
    }
    .first-header .ionicon:hover {
        color: black;
    }
    .back-button,
    .search-button {
        text-decoration: none;
        width: 40px;
        height: 40px;
        font-size: 24px;
        border-width: 0;
        padding: 0;
    }
    .back-button {
        float: left;
    }
    .back-button:hover,
    .search-button:hover {
        background-color: #f26000;
    }
    .search-button-box {
        float: right;
    }
    #search-row{

    }
</style>
</head>
<body <?php body_class(); ?>>
<!-- The end is in th footer.php --><div class="site-content">
<div class="VYMape" aria-hidden="true"><svg jsname="BUfzDd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 810" preserveAspectRatio="xMinYMin slice" aria-hidden="true"><path fill="#efefee" d="M592.66 0c-15 64.092-30.7 125.285-46.598 183.777C634.056 325.56 748.348 550.932 819.642 809.5h419.672C1184.518 593.727 1083.124 290.064 902.637 0H592.66z"></path><path fill="#f6f6f6" d="M545.962 183.777c-53.796 196.576-111.592 361.156-163.49 490.74 11.7 44.494 22.8 89.49 33.1 134.883h404.07c-71.294-258.468-185.586-483.84-273.68-625.623z"></path><path fill="#f7f7f7" d="M153.89 0c74.094 180.678 161.088 417.448 228.483 674.517C449.67 506.337 527.063 279.465 592.56 0H153.89z"></path><path fill="#fbfbfc" d="M153.89 0H0v809.5h415.57C345.477 500.938 240.884 211.874 153.89 0z"></path><path fill="#ebebec" d="M1144.22 501.538c52.596-134.583 101.492-290.964 134.09-463.343 1.2-6.1 2.3-12.298 3.4-18.497 0-.2.1-.4.1-.6 1.1-6.3 2.3-12.7 3.4-19.098H902.536c105.293 169.28 183.688 343.158 241.684 501.638v-.1z"></path><path fill="#e1e1e1" d="M1285.31 0c-2.2 12.798-4.5 25.597-6.9 38.195C1321.507 86.39 1379.603 158.98 1440 257.168V0h-154.69z"></path><path fill="#e7e7e7" d="M1278.31,38.196C1245.81,209.874 1197.22,365.556 1144.82,499.838L1144.82,503.638C1185.82,615.924 1216.41,720.211 1239.11,809.6L1439.7,810L1439.7,256.768C1379.4,158.78 1321.41,86.288 1278.31,38.195L1278.31,38.196z"></path></svg></div>

<header id="site-header" class="site-header theme-color-background" role="banner">
    <div class="container header-container">
        <div class="first-header row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <button onclick=history.go(-1) class="back-button theme-color-background"><i class="ionicon ion-chevron-left" aria-hidden="true"></i></button>
                <a href=<?php echo getBaseUrl().'/';?> class="header-logo"><img src="<?php echo get_template_directory_uri();?>/img/logo-light.svg"></a>
                <div class="search-button-box">
                    <?php include 'parts/cn-conversation-link.php'; ?>
                    <button class="search-button theme-color-background" x-stat="closed"><i class="ionicon ion-search" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
        <div id="search-row" style="display:none;margin-top: 27px;margin-bottom: 5px;" class="hidden-sm hidden-xs"><?php include 'parts/search-form.php'; ?></div>
    </div>
</header>
<div id="for-header" style="width:100%;height:50px"></div>

<script>
jQuery(document).ready(function($){
    var iclose= '<i class="ionicon ion-close-round" aria-hidden="true"></i>';
    var isearch='<i class="ionicon ion-search" aria-hidden="true"></i>';
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
