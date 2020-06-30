<!-- The end of the '<div class="site-content">' --></div>
<style>
    .site-footer .above-line{
        margin:10px 0;
    }
    .site-footer .above-line a,
    .site-footer .above-line span{
        width:100%;
        display:inline-block;
    }
    .site-footer span,
    .site-footer p {
        color: white;
        line-height: 27px;
    }

    .btn-lovely {
        background: #f96f12;
        border-radius: 5px;
        display: inline-block;
        width: 150px !important;
        padding: 3px;
        margin-bottom: 30px;
        text-align: center;
    }
    @media (min-width:768px){
        .site-footer .company-links,
        .site-footer .service-links{
            width: 200px;
            text-align: left;
            margin: 0 auto;
        }
    }
    @media (min-width:992px){
        .site-footer .footer-contacts{
            width: 200px;
            text-align: left;
            margin: 0 auto;
        }
    }
    @media (max-width:991px){
        .sophia-told-me{
            width: 200px;
            text-align: left;
            margin: 0 auto;
        }
    }
    @media (max-width: 991px) {
        .social-links {
            max-width: 240px;
            margin: 0 auto;
            float: none !important;
        }
    }
    .company-links span, .service-links span, .footer-contacts span{
        font-size:15px;
    }
    .site-footer span.bigger{
        font-size: 17px;
    }
</style>
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container">
		<div class="row center-content">
			<div class="col-md-3 col-xs-12" style="margin:10px 0;">
				<a href=<?php echo get_site_url();?>>
					<img src="<?php echo get_template_directory_uri();?>/img/logo-light.svg" alt="logo" style="height:50px;">
				</a>
			</div>
            <div class="col-md-6 col-xs-12 above-line">
                <div class="row">
                    <div class="hidden-lg hidden-md col-sm-3 hidden-xs"></div>
                    <div class="col-md-6 col-sm-3 col-xs-12"><div class="company-links">
                        <span class="bigger">公司集团</span>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/about-us"><span>关于我们</span></a>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/contact-us"><span>联系我们</span></a>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/disclaimers"><span>免责声明</span></a>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/about-us"><span>About Us</span></a>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/contact-us-en"><span>Contact Us</span></a>    
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/disclaimers" style="margin-bottom: 30px;"><span>Terms & Conditions</span></a>    
                        <a class="hidden-sm hidden-xs btn-lovely" target="_blank" rel="noopener nofollow" href="http://eepurl.com/c7FyKj">订阅邮件</a>
                    </div></div>
                    <div class="col-md-6 col-sm-3 col-xs-12"><div class="service-links">
                        <span class="bigger">服务项目</span>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/publish-business"><span>免费信息发布</span></a>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist#1"><span>页面升级</span></a>
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist#2"><span>置顶服务</span></a>  
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist#3"><span>首页推荐</span></a>  
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist"><span>市场推广</span></a>  
                        <a target="_blank" rel="noopener nofollow" href="https://auads.com.au/pricelist" style="margin-bottom: 30px;"><span>Marketing Solutions</span></a>      
                    </div></div>
                    <div class="hidden-lg hidden-md col-sm-3 hidden-xs"></div>
                </div>
            </div>
            <div class="col-md-3 col-xs-12 above-line"><div class="footer-contacts">
                <span class="bigger">联系方式</span>
                <div class="sophia-told-me">
                    <a href="tel:0398904950"><i class="ion-ios-telephone-outline" style="font-size:24px;vertical-align:middle;margin-right: 5px;"></i>03 9890 4950</a>
                    <span style="width:100%;display:inline-block;margin-bottom:20px"><i class="ion-ios-email-outline" style="font-size:24px;vertical-align:middle;margin-right: 5px;"></i>service@auads.com.au</span>
                </div>
                <a class="hidden-lg hidden-md btn-lovely" target="_blank" rel="noopener nofollow" href="http://eepurl.com/c7FyKj">订阅邮件</a><br>
                <div style="text-align: center;"><img alt="qrcode" style="width:100px; height:auto" src="<?php echo get_template_directory_uri();?>/img/footer-wechat-qrcode.jpg"></div>
            </div></div>
        </div>
        <div style="border-top: 1px solid rgba(246, 246, 246, 0.7); margin-top: 10px;"></div>
        <div class="row center-content under-line">
            <div class="col-md-3 col-xs-12 col-md-push-5 social-links" style="padding-top: 10px;">
                <a style="width:25%;display: inline-block;float: left;" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Facebook_White.svg" alt="facebook" style="max-height:30px;margin: auto 10px"></a>
                <a style="width:25%;display: inline-block;float: left;" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Google_White.svg" alt="google" style="max-height:30px;"></a>
                <a style="width:25%;display: inline-block;float: left;" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Youtube_White.svg" alt="youtube" style="max-height:30px;"></a>
                <a style="width:25%;display: inline-block;float: left;" href="#"><img src="<?php echo get_template_directory_uri();?>/img/Twitter_White.svg" alt="twitter" style="max-height:30px;"></a>
            </div>
            <div class="col-md-5 col-xs-12 col-md-pull-3 copy-right" style="padding-top: 12px; padding-bottom:12px;padding-right:10px;">
                <span class="text-center" style="">&copy; <?php echo date('Y'); ?> auads.com.au</span>
                <br class="hidden-sm hidden-md hidden-lg">
                <span> Made with <i class="ion-ios-heart" style="color:#f96f12;"></i> from Auads.</span>
            </div>
        </div>
	</div>
</footer><!-- #colophon -->
<!-- no async loading -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQWClP6rOf55if8uN7jXIs_K2gheMECSw&libraries=places&region=AU&language=en-us" defer></script>
<?php wp_footer(); ?>

<script src="<?php echo get_template_directory_uri();?>/js/axios.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/vue.min.js"></script>
<script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
<script type="text/javascript">require(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us16.list-manage.com","uuid":"1665e4aa7ceb3a6e717fe90ab","lid":"0ebc78af25"}) })</script>

</body>
</html>
