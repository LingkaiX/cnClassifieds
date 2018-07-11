<?php
if(isset($_GET['var'])){
    $var = $_GET['var'];    
}else{
    $var = 1;
}
?>
<?php get_header(); ?>
<script>
    if (document.documentElement.clientWidth < 769) { 
    document.querySelector("meta[name=viewport]").setAttribute(
            'content', 
            'width=1080, initial-scale=1.0, user-scalable=yes');
    }
</script>
<style>
    body{
            min-width: 1080px;
        }
    .background{
        min-width:100%; 
    }
    .down {
        transform: rotate(45deg);
        -webkit-transform: rotate(45deg);
        border: solid #7c7d7f;
        border-width:0 3px 3px 0;
        display: inline-block;
        padding: 10px;
    }
    .content-sec{
        text-align: center;
    }
    table{
        margin: 0 auto; 
        text-align: center;
        margin-bottom: 50px;
    }
    .pricebox{
        width:300px;
        border: 1px solid black; 
        border-radius: 15px; 
        margin: 0 auto; 
        margin: 0 10px;
    }
    .sign-up{
        font-size:25px; 
        background:#a5a7aa; 
        margin: 30px 0 5px; 
        padding: 3px 0 1px;  
        color: white;
        width:299px;
        display: inline-block;
    }
    .sign-up:hover{
        background:#454547;
        color: white;
        transition: background-color 0.3s ease;
    }
    .view-sample:hover{
        text-decoration: underline;
    }
    .sign-up:visited { 
        color: white;
    }
    .normal{
    border: 1px solid black;
    text-align: middle;
    color: #7c7d7f;
    font-weight: 300;
    font-size: 20px;
    padding:10px 0px;
    width:200px;
    }
    .outerbox{
        margin-bottom: 50px;
        vertical-align: middle;
        position: relative;
    }
    .box{
        vertical-align: middle;
        position: absolute;
        margin: 0 auto; 
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        visibility: hidden ;
        /* opacity: 1; */
        
        transition: visibility 0s, opacity 0.5s linear;
    }
    .pricelists{
        opacity: 0;
        visibility: hidden;
        transition: visibility 0s, opacity 0.5s linear;
    }
    .pricelists td{
        vertical-align:top;
    }
    .menu td:hover{
        background:rgba(255,99,99,0.9);
        color: white;
        transition: background-color 0.3s ease;
        cursor: pointer;
    }
    .selected{
        background:rgba(255,99,99,0.9);
        color: white;
    }
    .pricelistsshow{
        opacity: 1 !important;
        visibility: visible !important;
    }
    @media (min-width:769px) {
            .headsup{
                display: none;
            }
        }
</style>
<div class="headsup alert alert-info alert-dismissible" style="width: 100vw;" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong></strong>Please use a bigger screen or zoom out for a better view.
</div>
<section  class="content-sec">
<P style="font-size: 44px; padding-top: 50px; font-family: PingFangTC-Semibold; color: grey; padding-bottom: 50px;">ADVERTISE</P>
    <table class="menu">
        <tr>
            <td  class="lists normal" onclick="Click(1)">List Options</td>
            <td  class="ranks normal" onclick="Click(2)">Rank to Top</td>
            <td  class="homepages normal" onclick="Click(3)">Homepage List</td>
        </tr>
    </table>
    <div class="outerbox">
        <div class="box" ><table id="list-options1" class="list-options pricelists">
            <tr>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">BASIC LISTING</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">Free</h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>Logo</span></br>
                            <span>Business Name</span></br>
                            <span>Address</span></br>
                            <span>Map</span></br>
                            <span>Phone Number</span></br>
                            <span>Link to your Website</span></br>
                            <span>Detailed Profile Page</span></br>
                            <span>(up to 150 wording)</span></br></br></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/publish-business-en">SIGN UP</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#<?php echo 1; ?>">View Samples</a></br></br></br>
                    </div>   
                </td>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">PREMIUM LISTING</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$340 <span style="color: #545458; font-size:16px ; font-weight:300;">yearly</span></h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>Logo</span></br>
                            <span>Business Name</span></br>
                            <span>Address</span></br>
                            <span>Map</span></br>
                            <span>Phone Number</span></br>
                            <span>Link to your Website</span></br>
                            <span>Extra Long Detail Description</span></br>
                            <span>Image Gallery</span></br>
                            <span>Business Hours</span></br>
                            <span>Email Contact Form</span></br>
                            <span>Custom Keywords</span></br>
                            <span>Social Platforms</span></br>
                            <span>Ratings and Rewiews</span></br>
                            <span>ABN Checked Sign</span></br>
                            <span>Promote Multiple Deals</span></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/premium-listing-payment">SIGN UP</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#<?php echo 2; ?>">View Samples</a></br></br></br>
                    </div>   
                </td>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 0; padding: 10px 0 6px;  color: white; ">PROFESSIONAL</P>
                        <span style="font-size:27px; color: rgba(255,99,99,0.9);">MOST POPULAR</span>
                        <p style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$640 <span style="color: #545458; font-size:16px ; font-weight:300;">yearly</span></p>
                        <div style="text-align: left; padding-left: 30px; padding-top: 0px; color: #545458;">
                            <span>Logo</span></br>
                            <span>Business Name</span></br>
                            <span>Address</span></br>
                            <span>Map</span></br>
                            <span>Phone Number</span></br>
                            <span>Link to your Website</span></br>
                            <span>Extra Long Detail Description</span></br>
                            <span>Image Gallery</span></br>
                            <span>Business Hours</span></br>
                            <span>Email Contact Form</span></br>
                            <span>Custom Keywords</span></br>
                            <span>Social Platforms</span></br>
                            <span>Ratings and Rewiews</span></br>
                            <span>ABN Checked Sign</span></br>
                            <span>Promote Multiple Deals</span></br>
                            <span>Choice of colour</span></br>
                            <span>Front Page Featured Listing</span></br>
                            <span>(3 months)</span></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/professional-package-payment">SIGN UP</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#<?php echo 3; ?>">View Samples</a></br></br></br>
                    </div>   
                </td>
            </tr>
        </table></div>
        <div class="box" ><table class="rank-to-top pricelists">
            <tr>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">Category Page</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$200<span style="color: #545458; font-size:16px ; font-weight:300;">/page</span></h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>Rank to Top for 6 months</span></br></br>
                            <span>Add multiple related page</span></br>
                            <span>for just $34/page</span></br>
                            </br></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/rank-to-top-in-category-pages-payment">SIGN UP</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#s4">View Samples</a></br></br></br>
                    </div>   
                </td>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">Multiple Impressions</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$20 <span style="color: #545458; font-size:16px ; font-weight:300;">/each</span></h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>Rank to Top for 6 months</span></br></br>
                            <span>Multiple impressions on a</span></br>
                            <span>single page</span></br></br>
                            <span>Random locations</span></br>
                            </br></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/multiple-impressions-payment">SIGN UP</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#s4">View Samples</a></br></br></br>
                    </div>   
                </td>
            </tr>
        </table></div>
        <div class="box" ><table class="homepage-list pricelists">
            <tr>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">Home page Recommendation</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$300<span style="color: #545458; font-size:16px ; font-weight:300;">3 months</span></h1>
                        
                        <a class="sign-up" href="https://auads.com.au/home-page-recommendation-payment">SIGN UP</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#s3">View Samples</a></br></br></br>
                    </div>   
                </td>
            </tr>
        </table></div>
    </div>
</section>
<section class="content-sec">
    <span style="font-size:25px; color: #7c7d7f; ">中文</span></br>
    <i class="down"></i>
</section>
<section class="content-sec">
<P style="font-size: 44px; padding-top: 40px; font-family: PingFangTC-Semibold; color: grey; padding-bottom: 50px;">市场推广</P>
    <table class="menu">
        <tr>
            <td class="lists normal" onclick="Click(1)">页面升级</td>
            <td class="ranks normal" onclick="Click(2)">置顶服务</td>
            <td class="homepages normal" onclick="Click(3)">首页推荐</td>
        </tr>
    </table>
    <div class="outerbox">
        <div class="box" ><table id="list-options2" class="list-options pricelists" >
            <tr>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">商家信息登记</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">免费</h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>Logo</span></br>
                            <span>公司名字</span></br>
                            <span>地址</span></br>
                            <span>地图</span></br>
                            <span>联系电话</span></br>
                            <span>连接到你的主页</span></br>
                            <span>生意类型描述</span></br>
                            <span>(不超过150个字)</span></br></br></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/publish-business-en">点击开始</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#<?php echo 1; ?>">查看范例</a></br></br></br>
                    </div>   
                </td>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">商家页面制作</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$340 <span style="color: #545458; font-size:16px ; font-weight:300;">全年</span></h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>Logo</span></br>
                            <span>公司名字</span></br>
                            <span>地址</span></br>
                            <span>地图</span></br>
                            <span>联系电话</span></br>
                            <span>连接到你的主页</span></br>
                            <span>生意详情描述</span></br>
                            <span>图片库</span></br>
                            <span>营业时间</span></br>
                            <span>邮件联系表格</span></br>
                            <span>关键词优化</span></br>
                            <span>社交媒体平台链接</span></br>
                            <span>客户反馈及点评</span></br>
                            <span>澳洲商业认证标识（ABN）</span></br>
                            <span>多种商品信息推广</span></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/premium-listing-payment">点击开始</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#<?php echo 2; ?>">查看范例</a></br></br></br>
                    </div>   
                </td>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 0; padding: 10px 0 6px;  color: white; ">专业级页面制作</P>
                        <span style="font-size:27px; color: rgba(255,99,99,0.9);">最受欢迎 超值享受</span>
                        <p style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$640 <span style="color: #545458; font-size:16px ; font-weight:300;">全年</span></p>
                        <div style="text-align: left; padding-left: 30px; padding-top: 0px; color: #545458;">
                        <span>Logo</span></br>
                            <span>公司名字</span></br>
                            <span>地址</span></br>
                            <span>地图</span></br>
                            <span>联系电话</span></br>
                            <span>连接到你的主页</span></br>
                            <span>生意详情描述</span></br>
                            <span>图片库</span></br>
                            <span>营业时间</span></br>
                            <span>邮件联系表格</span></br>
                            <span>关键词优化</span></br>
                            <span>社交媒体平台链接</span></br>
                            <span>客户反馈及点评</span></br>
                            <span>澳洲商业认证标识（ABN）</span></br>
                            <span>多种商品信息推广</span></br>
                            <span>自选颜色</span></br>
                            <span>首页商家推荐（3个月）</span></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/professional-package-payment">点击开始</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#<?php echo 3; ?>">查看范例</a></br></br></br>
                    </div>   
                </td>
            </tr>
        </table></div>
        <div class="box" ><table class="rank-to-top pricelists">
            <tr>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">栏目置顶</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$200<span style="color: #545458; font-size:16px ; font-weight:300;">/每页</span></h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>服务期限六个月</span></br></br>
                            <span>添加多页相关栏目置顶</span></br>
                            <span>每页仅需$34</span></br>
                            </br></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/rank-to-top-in-category-pages-payment">点击开始</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#s4">查看范例</a></br></br></br>
                    </div>   
                </td>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">多页多次显示</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$20 <span style="color: #545458; font-size:16px ; font-weight:300;">/每个</span></h1>
                        <div style="text-align: left; padding-left: 30px; padding-top: 30px; color: #545458;">
                            <span>服务期限六个月</span></br></br>
                            <span>可多页多次显示</span></br></br>
                            <span>位置随机</span></br>
                            </br></br>
                        </div>
                        <a class="sign-up" href="https://auads.com.au/multiple-impressions-payment">点击开始</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#s4">查看范例</a></br></br></br>
                    </div>   
                </td>
            </tr>
        </table></div>
        <div class="box" ><table class="homepage-list pricelists">
            <tr>
                <td>
                    <div class="pricebox">
                        <P style="font-size:25px; background:rgba(255,99,99,0.9); width:299px; margin: 30px 0 20px; padding: 10px 0 6px;  color: white; ">商家首页推荐</P>
                        <h1 style="font-size:40px ; font-family: initial; font-weight:900; color: #545458;">$300<span style="color: #545458; font-size:16px ; font-weight:300;">/季度</span></h1>
                        
                        <a class="sign-up" href="https://auads.com.au/home-page-recommendation-payment">点击开始</a>
                        <a class="view-sample" style="padding-top:5px; width:299px; display: inline-block; color: #77777a;" href=" https://auads.com.au/advertise#s3">查看范例</a></br></br></br>
                    </div>   
                </td>
            </tr>
        </table></div>
    </div>
</section>
<script>
    function Click(i){
       if(i==1){
            jQuery(".outerbox").css('height', '750px');
            jQuery(".lists").addClass("selected");
            jQuery(".ranks").removeClass("selected");
            jQuery(".homepages").removeClass("selected");
            jQuery(".list-options").addClass("pricelistsshow");
            jQuery(".rank-to-top").removeClass("pricelistsshow");
            jQuery(".homepage-list").removeClass("pricelistsshow");
            //jQuery(".list-options").parent().css('z-index', '10');
            //jQuery(".rank-to-top").parent().css('z-index', '1');
            //jQuery(".homepage-list").parent().css('z-index', '1');
        }
        if(i==2){
            jQuery(".outerbox").css('height', '520px');
            jQuery(".lists").removeClass("selected");
            jQuery(".ranks").addClass("selected");
            jQuery(".homepages").removeClass("selected");
            jQuery(".list-options").removeClass("pricelistsshow");
            jQuery(".rank-to-top").addClass("pricelistsshow");
            jQuery(".homepage-list").removeClass("pricelistsshow");
            //jQuery(".list-options").parent().css('z-index', '1');
            //jQuery(".rank-to-top").parent().css('z-index', '10');
            //jQuery(".homepage-list").parent().css('z-index', '1');
        }
       if(i==3){
            jQuery(".outerbox").css('height', '350px');
            jQuery(".lists").removeClass("selected");
            jQuery(".ranks").removeClass("selected");
            jQuery(".homepages").addClass("selected");
            jQuery(".list-options").removeClass("pricelistsshow");
            jQuery(".rank-to-top").removeClass("pricelistsshow");
            jQuery(".homepage-list").addClass("pricelistsshow");
            //jQuery(".list-options").parent().css('z-index', '1');
            //jQuery(".rank-to-top").parent().css('z-index', '1');
            //jQuery(".homepage-list").parent().css('z-index', '10');
        }
    }
</script>  
<?php if($var==1):?>
    <script>
        if(window.location.hash.substr(1)==1){
            jQuery(".outerbox").css('height', '750px');
            jQuery(".lists").addClass("selected");
            jQuery(".list-options").addClass("pricelistsshow"); 
        }
        else if(window.location.hash.substr(1)==2){
            jQuery(".outerbox").css('height', '520px');
            jQuery(".ranks").addClass("selected");
            jQuery(".rank-to-top").addClass("pricelistsshow");
        }
        else if(window.location.hash.substr(1)==2){
            jQuery(".outerbox").css('height', '520px');
            jQuery(".ranks").addClass("selected");
            jQuery(".rank-to-top").addClass("pricelistsshow");
        }
        else if(window.location.hash.substr(1)==3){
            jQuery(".outerbox").css('height', '350px');
            jQuery(".homepages").addClass("selected");
            jQuery(".homepage-list").addClass("pricelistsshow");
        }
        else{
            jQuery(".outerbox").css('height', '750px');
            jQuery(".lists").addClass("selected");
            jQuery(".list-options").addClass("pricelistsshow");
        }
    </script>
    <?php elseif($var==2):?>
        <script>
          //  jQuery(".outerbox").css('height', '520px');
          //  jQuery(".ranks").addClass("selected");
          //  jQuery(".rank-to-top").addClass("pricelistsshow");
        </script>
    <?php elseif($var==3):?>
        <script>
           // jQuery(".outerbox").css('height', '350px');
           // jQuery(".homepages").addClass("selected");
           // jQuery(".homepage-list").addClass("pricelistsshow");
        </script>
<?php endif;?> 
<?php get_footer(); ?>  