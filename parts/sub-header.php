<style>
    .sub-header{
        height:50px;
        background-color: white;
        border-bottom: 2px solid lightgray;
        padding-top: 13px;
        padding-bottom: 5px;
    }
    .sub-header .marketing-links{
        display: inline-block;
        position: relative;
    }
    .link-list li{
        display: block;
        padding: 5px;
    }
    @media (min-width:768px){
        .link-list{
            display:block !important;
            padding-left: 0;
        }
        .link-list li {
            display: inline-block;
            padding: 0;
            padding-right: 20px;
        }
    }
    @media (max-width:767px){
        .link-list{
            position:absolute;
            top:30px;
            left:0;
            width:180px;
            display: none;
            background-color: white;
            border: 1px solid rgba(0,0,0,.15);
            box-shadow: 0 6px 12px rgba(0,0,0,.175);
            border-radius: 4px;
            padding:10px;
            z-index: 99;
        }
        .berg-menu{
            height: 24px;
            width: 36px;
            display: inline-block;
            transition: rotate 0.2s, translate 0.2s;
            position: relative;     
        }
        .berg-menu i{
            position: absolute;
            top: 11px;
            right: 6px;
            display: inline-block;
            height: 2px;
            width: 24px;
            background: black;
        }
        .berg-menu i:before,.berg-menu i:after{
            content:'';
            position: absolute;
            height: 2px;
            width: 24px;
            left: 0;
            background: black;
            display: inline-block;
            transition: transform 0.2s;
            transform: translateZ(0);
            transform-origin: 0% 50%;
        }
        .berg-menu i:before{
            top: -8px;
        }
        .berg-menu i:after{
            top: 8px;
        }
        .berg-menu-open i{
            background:transparent;
        }
        .berg-menu-open i:before{
            transform: translateX(4px) translateY(-1px) rotate(45deg);
        }
        .berg-menu-open i:after{
            transform: translateX(4px) translateY(0px) rotate(-45deg);
        }
    }
    .sub-header .switch-city{
        display: inline-block;
        position: relative;
        padding-right: 40px;
        float: right;
    }
    .switch-city i{
        display: inline-block;
        transition: all .5s;
        margin-left:5px;
    }
    .sub-header .city-list{
        display: inline-block;
        display: none;
        position: absolute;
        top: 30px;
        left: 0;
        width: 100px;
        z-index: 99;
        padding: 10px;
        background-color: white;
        border: 1px solid rgba(0,0,0,.15);
        box-shadow: 0 6px 12px rgba(0,0,0,.175);
        border-radius: 4px;
        z-index: 99;
        padding: 10px;
    }
    .city-list li{
        display: block;
        padding: 5px;
    }
    .sub-header .cn-conv{
        display: inline-block;
        float: right;
    }
</style>
<div class="sub-header"><div class="container">
    <div class="marketing-links">
        <span class="berg-menu hidden-lg hidden-md hidden-sm" tabindex="1" role="button"><i></i></span>
        <ul class="link-list">
            <li><a target="_blank" rel="noopener nofollow" href="https://auads.com.au/publish-business">免费发布信息</a></li>
            <li><a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist">市场推广</a></li>
            <li><a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist">Marketing Solution</a></li>
        </ul>
    </div>
    <a href=<?php echo switchCN();?> class="cn-conv">
        简体
        <img style="height:8px;margin-bottom:2px;" src="<?php echo get_template_directory_uri().'/img/'; echo isTCN()?"switch-right.svg":"switch-left.svg";?>">
        繁体
    </a>
    <?php if (!is_single()): ?>
        <div class="switch-city">
            <span tabindex="1" role="button">切换城市<i class="ion-ios-arrow-down" style="color: #ff6363;"></i></span>
            <ul class="city-list">
                <li><a href="<?php echo addGeoToUrl('-37.820038','145.126977'); ?>">墨尔本</a></li>
                <li><a href="<?php echo addGeoToUrl('-33.876145','151.207652'); ?>">悉尼</a></li>
                <li><a href="<?php echo addGeoToUrl('-31.945046','115.841828'); ?>">珀斯</a></li>
            </ul>
        </div>
    <?php endif; ?>
</div></div>
<script>
jQuery(document).ready(function($){
    $('.switch-city span').click(function(){
        if($('.sub-header .city-list').css('display')=='none'){
            $('.sub-header .city-list').css('display','block');
            $('.switch-city i').css('transform','rotate(180deg)');
        }else{
            $('.sub-header .city-list').css('display','none');
            $('.switch-city i').css('transform','none');
        }
    });
    $(".switch-city span").blur(function(){
        if(!$(".city-list").is(':focus')&&!$(".city-list").is(':hover'))
            $('.sub-header .city-list').css('display','none');
    });
    $('.berg-menu').click(function(){
        if($('.sub-header .link-list').css('display')=='none'){
            $('.sub-header .link-list').css('display','block');
            $('.sub-header .berg-menu').addClass('berg-menu-open');
        }else{
            $('.sub-header .link-list').css('display','none');
            $('.sub-header .berg-menu').removeClass('berg-menu-open');
        }
    });
    $(".berg-menu").blur(function(){
        if(!$(".link-list").is(':focus')&&!$(".link-list").is(':hover'))
            $('.sub-header .link-list').css('display','none');
            $('.sub-header .berg-menu').removeClass('berg-menu-open');
    });
});
</script>