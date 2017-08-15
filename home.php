<!DOCTYPE html>
<html lang=zh-cmn-Hans>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="index-header">
    <div class="container home-hearder-container">
        <div class="row">
            <div class="col-md-offset-9 col-md-3 col-xs-offset-1 col-xs-11 index-search">
                <form role="search" method="get" class="form-inline" action=<?php echo get_site_url()?>>
                    <label>
                        <input type="search" class="input-little" placeholder="&#xF002; 全站搜索" style="font-family:Arial, FontAwesome" value="" name="s">
                    </label>
                </form>
            </div>
        </div>    
        <div class="row">
            <div class="col-md-6 col-xs-12 home-logo-container">
                <a href=<?php echo get_site_url();?>>
                    <img src="<?php echo get_template_directory_uri();?>/img/Logo_Version2.svg" class="home-logo"></img>
                </a>
            </div>
        </div>
        <?php include 'parts/geo-form.php';?>    
    </div>
</header>
<div class="cate-section">
    <?php include 'parts/cate-section.php';?>
</div>
<?php get_footer("home"); ?>


