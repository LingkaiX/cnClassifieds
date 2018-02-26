<?php
    $baseUrl=get_site_url();
    $reqUrl=$_SERVER['REQUEST_URI'];
    if(strpos($reqUrl, "?")) $reqUrl=substr($reqUrl, 0, strpos($reqUrl, "?"));
    $pagenum=parsePath($reqUrl,'page',0);
    if ($pagenum){
        $reqUrl=substr($reqUrl, 0, strpos($reqUrl, "/page"));
    }
    
?>
<div class="btn-group" role="group" style="float: left;margin-left: 20px;">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        切换城市<span class="caret"></span></button>
    <ul class="dropdown-menu">
    <?php 
        if(is_search()){ 
            $melUrl='?lat=-37.820038&long=145.126977&s='.$_GET['s'];
            $sdyUrl='?lat=-33.876145&long=151.207652&s='.$_GET['s'];
            $perthUrl='?lat=-31.945046&long=115.841828&s='.$_GET['s'];
        }else{
            $melUrl='?lat=-37.820038&long=145.126977';
            $sdyUrl='?lat=-33.876145&long=151.207652';
            $perthUrl='?lat=-31.945046&long=115.841828';
        }
    ?>
        <li><a href="<?php echo $baseUrl.$reqUrl.$melUrl?>">墨尔本</a></li>
        <li><a href="<?php echo $baseUrl.$reqUrl.$sdyUrl?>">悉尼</a></li>
        <li><a href="<?php echo $baseUrl.$reqUrl.$perthUrl?>">珀斯</a></li>
</ul>
</div>