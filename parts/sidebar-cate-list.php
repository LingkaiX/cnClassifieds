<style>
/*-------- cate-tab --------*/
#accordion {
  margin-top: 20px;
  background-color: #fff;
}
#accordion .panel {
  border: none;
  border-top: 1px solid #e8e8e8;
  box-shadow: none;
  border-radius: 0;
  margin: 0;
}
#accordion .panel:last-child {
  border-bottom: 1px solid #e8e8e8;
}
#accordion .panel-heading {
    padding: 0;
    background-color: #fff;

}
#accordion .panel-title {
    width: 110px;
    height: 32px;
    margin: 0 auto;
}
#accordion .panel-title a {
  text-decoration: none;
  outline: none;
  display: inline-block;
  font-size: 16px;
  font-weight: bold;
  line-height: 24px;
  color: #635858;
  position: relative;
}
#accordion .panel-title a:last-child {
  transition: all 0.5s ease 0s;
  padding-right: 32px;
  height: 32px;
}
#accordion .panel-title a:last-child:before {
    content: "\f3d8";
    font-family: "Ionicons";
    color: #ff6363;
    display: block;
    width: 36px;
    padding-top: 2px;
    height: 30px;
    line-height: 32px;
    font-size: 14px;
    text-align: center;
    position: absolute;
    top: 0;
    bottom: 0;
    transition: all 0.3s ease 0s;
}
#accordion .panel-title a.collapsed:last-child:before {
  content: "\f3d0";
}
#accordion .panel-title a:first-child {
  padding-bottom: 5px;
  vertical-align: bottom;
  width: 70px;
  padding-left: 5px;
}
#accordion .panel-body {
  font-size: 15px;
  color: #635858;
  line-height: 25px;
  border: none;
  padding: 1px 20px 1px 5px;
  width: 110px;
  margin: 0 auto;
}
.selected-item {
  color: #ff6363;
  font-weight: 900;
}
</style>
<div class="row">
    <nav class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
                include "cates-index.php";
                $baseUrl=getBaseUrl();
                //echo $baseUrl;
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
                        <a class="needLatAndLong" href="<?php echo $baseUrl."/category/".$cate["slug"]?>"><?php echo $cate["name"]?></a>
                        <a id="a<?php echo $catecount?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" 
                            href="#collapse<?php echo $catecount?>" aria-expanded="false" aria-controls="collapse<?php echo $catecount?>"></a>
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
