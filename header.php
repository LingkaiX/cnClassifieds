<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="site-content">
<header id="site-header"class="site-header" role="banner">
    <nav class="container">
        <div class="first-header row">
            <div class="col-md-1 col-sm-1 col-xs-1"><button onclick=history.go(-1) class="back-button">&#8249;</button></div>
            <a href=<?php echo get_site_url();?> class="col-md-2 col-sm-2 col-xs-2 header-logo"><img src="<?php echo get_template_directory_uri();?>/img/Logo_White.svg" style="height:30px;"></img></a>
            <div id="geoform-md" class="col-md-7 hidden-sm hidden-xs"></div>
            <div class="col-md-2 col-sm-9 col-xs-8 header-form">
                <form role="search" method="get" class="form-inline" action=<?php echo get_site_url()?>>
                    <label>
                        <input type="search" class="input-little" placeholder="&#xF002; 全站搜索" style="font-family:Arial, FontAwesome" value="" name="s">
                    </label>
                </form>
            </div>
        </div>
        <div class="second-header row">
        <div id="geoform-sm" class="col-sm-12 col-xs-12 hidden-md hidden-lg"><?php include 'parts/geo-form-inside.php';?></div>
        </div>
    </nav>
</header>
<script>
var initialww, currentww, initialwh, currentwh;
var formposition;

jQuery(document).ready(function() {
    initialww = window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;
    currentww=initialww;
    //initialwh = window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight;
    formposition=1; //geo form in geoform-sm

    if(initialww>=992){
        jQuery('#geoform-md').append( jQuery('#geo-form-inside') );
        formposition=0; //geo form in geoform-md
    }

    jQuery(window).resize(function() {
        currentww=window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth;
        if(currentww>=992&&formposition==1){
            jQuery('#geoform-md').append( jQuery('#geo-form-inside') );
            formposition=0;
        }
        if(currentww<992&&formposition==0){
            jQuery('#geoform-sm').append( jQuery('#geo-form-inside') );
            formposition=1;            
        }
        jQuery('.second-header').removeClass('sticky-second-header');
    });

});
window.onload = function(){
    window.onscroll=function() {
        //console.log(formposition);
        var osTop = document.documentElement.scrollTop||document.body.scrollTop;
        if(formposition==0){
        }else if (osTop>45) {
            jQuery('#geoform-sm').addClass('sticky-header');
            jQuery('.second-header').addClass('sticky-second-header');
        }else{
            jQuery('#geoform-sm').removeClass('sticky-header');
            jQuery('.second-header').removeClass('sticky-second-header');
        }
        isTop=false;
    };
};
</script>