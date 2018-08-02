<!DOCTYPE html>
<html lang=cmn-hans>
<head>
<link rel="manifest" href="<?php echo get_template_directory_uri();?>/manifest.json">
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<meta name="theme-color" content="#f96f12" />
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#f96f12">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="format-detection" content="telephone=no">
<?php include_once("parts/analyticstracking.php") ?>
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
        padding: 15px 0;
        position: fixed;
        left: 0;
        right: 0;
        top: 0;
        z-index: 100;
        background-color: rgba(0,0,0,0.8);
    }
    #for-header{
        width:100%;
        height:70px;
    }
    .first-header {
        height: 40px;
    }
    @media (max-width:991px){
        .site-header {
            padding: 8px 0 7px 0;
        }
        #for-header{
            height:55px;
        }
        .first-header {
            text-align: center;
        }
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
        background-color: transparent;
    }
    .search-button-box {
        float: right;
    }
    #search-row{
    }
    @media (min-width:992px){
        #search-row{
            padding: 2px 15px;
        }
        #search-row .search-item,
        #search-row .auto-map{
            height: 34px;
        }
        #search-row .search-submit{
            width: 36px;
            height: 36px;
        }
        #search-row #search-suggestion{
            top: 34px;
        }
        #search-row .search-row-bg{
            display: none !important;
        }
    }
    @media (max-width:991px){
        #search-row{
            position: fixed;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(51, 51, 51, 0.6);
            padding: 36px 48px;
            border-radius: 10px;
            display: none;
            text-align: left;
        }
        #search-row .search-row-bg{
            position: fixed;
            top:50px;
            left:0;
            right:0;
            bottom:0;
            background-color: transparent;
        }
    }
    @media (max-width:767px){
        #search-row{
            left: 8px;
            right: 8px;
            width: auto;
            transform: none;
            padding: 32px 24px;
        }
    }
</style>
<script async='async' src='https://www.googletagservices.com/tag/js/gpt.js'></script>
<script>
  var googletag = googletag || {};
  googletag.cmd = googletag.cmd || [];
</script>

<script>
  googletag.cmd.push(function() {
    //googletag.defineSlot('/21666183985/below-sidebar-article-300x600', [300, 600], 'div-gpt-ad-1533174357200-0').addService(googletag.pubads());
    googletag.defineSlot('/21666183985/single-page-bottom-ad-728x90', [728, 90], 'div-gpt-ad-1533175072543-0').addService(googletag.pubads());
    googletag.pubads().enableSingleRequest();
    googletag.enableServices();
  });
</script>
</head>
<body <?php body_class(); ?>>
<!-- The end is in th footer.php --><div class="site-content">
<!-- <div class="VYMape" aria-hidden="true">
        <svg jsname="BUfzDd" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 810" preserveAspectRatio="xMinYMin slice" aria-hidden="true">
            <path fill="#efefee" d="M592.66 0c-15 64.092-30.7 125.285-46.598 183.777C634.056 325.56 748.348 550.932 819.642 809.5h419.672C1184.518 593.727 1083.124 290.064 902.637 0H592.66z"></path>
            <path fill="#f6f6f6" d="M545.962 183.777c-53.796 196.576-111.592 361.156-163.49 490.74 11.7 44.494 22.8 89.49 33.1 134.883h404.07c-71.294-258.468-185.586-483.84-273.68-625.623z"></path>
            <path fill="#f7f7f7" d="M153.89 0c74.094 180.678 161.088 417.448 228.483 674.517C449.67 506.337 527.063 279.465 592.56 0H153.89z"></path>
            <path fill="#fbfbfc" d="M153.89 0H0v809.5h415.57C345.477 500.938 240.884 211.874 153.89 0z"></path>
            <path fill="#ebebec" d="M1144.22 501.538c52.596-134.583 101.492-290.964 134.09-463.343 1.2-6.1 2.3-12.298 3.4-18.497 0-.2.1-.4.1-.6 1.1-6.3 2.3-12.7 3.4-19.098H902.536c105.293 169.28 183.688 343.158 241.684 501.638v-.1z"></path>
            <path fill="#e1e1e1" d="M1285.31 0c-2.2 12.798-4.5 25.597-6.9 38.195C1321.507 86.39 1379.603 158.98 1440 257.168V0h-154.69z"></path>
            <path fill="#e7e7e7" d="M1278.31,38.196C1245.81,209.874 1197.22,365.556 1144.82,499.838L1144.82,503.638C1185.82,615.924 1216.41,720.211 1239.11,809.6L1439.7,810L1439.7,256.768C1379.4,158.78 1321.41,86.288 1278.31,38.195L1278.31,38.196z"></path>
        </svg>
</div> -->
<header id="site-header" class="site-header theme-color-background" role="banner">
    <div class="container header-container">
        <div class="first-header row">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <button onclick=goBack() class="back-button hidden-md hidden-lg"><i class="ionicon ion-chevron-left" aria-hidden="true"></i></button>
                <a href=<?php echo getBaseUrl().'/';?> class="header-logo"><img src="<?php echo get_template_directory_uri();?>/img/logo-text-light.svg"></a>
                <div class="search-button-box hidden-md hidden-lg">
                    <img class="search-button" alt="search" src="<?php echo get_template_directory_uri();?>/img/search-button.svg">    
                </div>
            </div>
            <div id="search-row" class="col-md-8 col-sm-10 col-xs-12">
                <div class="search-row-bg"></div>
                <?php include 'parts/search-form.php'; ?>
            </div>
        </div>
    </div>
</header>
<div id="for-header"></div>
<?php include 'parts/sub-header.php'; ?>
<script>
jQuery(document).ready(function($){
    $('.search-button').click(function(){
        if($('#search-row').css('display')=='none'){
            $('#search-row').css('display','block');
        }else{
            $('#search-row').css('display','none');
        }
    });
    $('#search-row .search-row-bg').click(function(){
        $('#search-row').css('display','none');
    });
});
function goBack(){
    if(window.history.length>1){
        window.history.go(-1);
    }else{
        close();
    }
}
</script>
