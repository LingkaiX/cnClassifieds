<style>
    .info {
        padding: 30px 30px;
        position: relative;
        padding-bottom: 50px;
    }
    @media (max-width:991px) {
        .info{
            /* margin-top: 30px; */
            padding-bottom: 80px;
        }
    }
    .info a{
        color:rgb(51, 51, 51);
    }
    .info a:hover{
        text-decoration: none;
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
    @media (min-width:992px) {
        .btns{
            position: absolute;
            left: 0;
            right: 0;
            bottom: 80px;
        }
    }
    .enquiry-btn{
        width: 100%;
        font-size: 20px;
        float: none;
        border-radius: 6px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .goto-google{
        width: 100%;
        background-color: #858484;
        color: white !important;
        font-size: 20px;
        border-radius: 6px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    .qr-code{
        max-width: 200px;
        max-height: 250px;
        text-align: center;
        display: inline-block;
    }
    .qr-code img{
        max-width:100%;
        max-height: 100%;
    }
    .social-box{
        text-align: center;
        font-size: 30px;
        position: absolute;
        bottom: 10px;
        left: 0;
        right: 0;
    }
    img.img-social{
        height:30px;
        padding: 0 15px;
    }
</style>
<div class="row info solid-border">
    <div class="col-md-7 col-sm-12">
    <?php
        if($mypost!=null){
            if(!empty($mypost->phone)) echo '<p class="with-ion"><span class="phone"></span><span>'.$mypost->phone.'</span></p>';
            if(!empty($mypost->email)) echo '<p class="with-ion"><a href="mailto:#"><span class="email"></span><span>'
                .$mypost->email.'</span></a></p>';
            if(!empty($mypost->website)) echo '<p class="with-ion"><a target="_blank" href="'
                .$mypost->website.'"><span class="website"></span><span>'.removeScheme($mypost->website).'</span></a></p>';
            if(!empty($mypost->address)) echo '<p class="with-ion"><span class="address"></span><span>'.$mypost->address.'</span></p>';
        }
    ?>
    </div>
    <div class="col-md-5" style="text-align:center;">
        <div class="hidden-sm hidden-xs qr-code"><img src="<?php echo $social['wechat-qr']['url']; ?>" title=""></div>
    </div>
    <div class="col-md-12" style="text-align:center;">
        <div class="hidden-md hidden-lg qr-code"><img src="<?php echo $social['wechat-qr']['url']; ?>" title=""></div>
    </div>
    <div style="margin-top: 20px;" class="btns">
        <div class="col-md-6 col-sm-12" style="text-align:center;">
            <?php include dirname(__DIR__).'/enquiry-form.php'; ?>
        </div>
        <div class="col-md-6 col-sm-12" style="text-align:center;">
            <a class="btn goto-google" target="_blank" href="<?php echo 'https://www.google.com/maps?daddr='.$mypost->lat.','.$mypost->long; ?>">地图导航</a>   
        </div>
    </div>
    <div class="social-box">
        <?php if($social['has-facebook']): ?>
            <a target="_blank" href="<?php echo $social["facebook"]; ?>">
            <img class="img-social" src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg"></img></a>
        <?php endif; ?>
        <?php if($social['has-instagram']): ?>
            <a target="_blank" href="<?php echo $social["instagram"]; ?>">
            <img class="img-social" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg"></img></a>
        <?php endif; ?>
    </div>
</div>