<style>
    .top-bar {
        height: 48px;
        background-color: black;
        padding-top: 13px;
        padding-bottom: 13px;
    }
    .top-bar a{
        color: white !important;
    }
    .top-bar .links{
        margin-right:16px;
    }
    .top-bar .cn-conv{
        margin-right:48px;
        margin-left: 32px;
    }
</style>
<div class="top-bar hidden-xs">
    <div style="float:right">
        <a class="links" target="_blank" rel="nofollow" href="https://auads.com.au/publish-busines"><span>免费发布信息</span></a>
        <a class="links" target="_blank" rel="nofollow" href="https://auads.com.au/about-us"><span>市场解决的方案</span></a>
        <a class="links" target="_blank" rel="nofollow" href="https://auads.com.au/about-us"><span>Marketing Solution</span></a>
        <a href=<?php echo isTCN()?home_url():home_url().'/zh-tw'.'/';?> class="cn-conv">
            简体
            <img style="height:8px;margin-bottom:2px;" src="<?php echo get_template_directory_uri().'/img/'; echo isTCN()?"switch-right-light.svg":"switch-left-light.svg";?>">
            繁体
        </a>
    </div>
</div>
