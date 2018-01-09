<?php
    $baseUrl=get_site_url();
    $reqUrl=$_SERVER['REQUEST_URI'];
    if(strpos($reqUrl, "?")) $reqUrl=substr($reqUrl, 0, strpos($reqUrl, "?"));
    $pagenum=parsePath($reqUrl,'page',0);
    if ($pagenum){
        $reqUrl=substr($reqUrl, 0, strpos($reqUrl, "/page"));
    }
    
?>
<div class="btn-group" role="group" style="float: right;">
    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        切换城市<span class="caret"></span></button>
    <ul class="dropdown-menu">
    <?php 
        if(is_search()){ 
            $melUrl='?lat=-37.8152065&long=144.963937&s='.$_GET['s'];
            $sdyUrl='?lat=-33.8688197&long=151.20929550000005&s='.$_GET['s'];        
        }else{
            $melUrl='?lat=-37.8152065&long=144.963937';
            $sdyUrl='?lat=-33.8688197&long=151.20929550000005';
        }
    ?>
        <li><a href="<?php echo $baseUrl.$reqUrl.$melUrl?>">墨尔本</a></li>
        <li><a href="<?php echo $baseUrl.$reqUrl.$sdyUrl?>">悉尼</a></li>
</ul>
</div>