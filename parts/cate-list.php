<div class="row">
    <nav class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
                include "cates-index.php";
                $baseUrl=getBaseUrl();
                echo $baseUrl;
                $cateSlug=parsePath($_SERVER['REQUEST_URI'],'category');
                $subcateSlug=parsePath($_SERVER['REQUEST_URI'],'category',1);
                $clickId=0;
                $catecount=0;
                foreach ($catesindex as $cate){
                    $catecount++;
                    $clickId=($cateSlug==$cate["slug"])?$catecount:$clickId;
            ?> 
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $catecount?>">
                    <h4 class="panel-title">
                        <a id="a<?php echo $catecount?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" 
                            href="#collapse<?php echo $catecount?>" aria-expanded="false" aria-controls="collapse<?php echo $catecount?>"></a>
                        <a class="needLatAndLong" href="<?php echo $baseUrl."/category/".$cate["slug"]?>"><?php echo $cate["name"]?></a>
                    </h4>
                </div>
                <div id="collapse<?php echo $catecount?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $catecount?>">
                    <div class="panel-body">
                        <?php 
                            foreach($cate["subcates"] as $subcate){
                                $href=$baseUrl."/category/".$cate["slug"]."/".$subcate["slug"];
                                $str= ($subcateSlug==$subcate["slug"])?'class="selected-item needLatAndLong"':'class="needLatAndLong"';
                                echo '<p><a href="'.$href.'"'.$str.'>'.$subcate["name"].'</a></p>';
                            }
                        ?> 
                    </div>
                </div>
            </div>
            <?php }?> 
        </div>
    </nav>
</div>
<script>
    var clickId=<?php echo $clickId ?>;
    //console.log('#a'+clickId);
    jQuery(document).ready(function($){
        if(clickId) $('#a'+clickId).click();
    });
</script>
