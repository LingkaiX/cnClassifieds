<div class="row">
    <div class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <?php
                include "cates-index.php";
                $catecount=0;
                foreach ($catesindex as $cate){
                    $catecount++;
            ?> 
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="heading<?php echo $catecount?>">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $catecount?>" aria-expanded="false" aria-controls="collapse<?php echo $catecount?>">
                            <?php echo $cate["name"]?>
                        </a>
                    </h4>
                </div>
                <div id="collapse<?php echo $catecount?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $catecount?>">
                    <div class="panel-body">
                        <?php 
                            foreach($cate["subcates"] as $subcate){
                                $href=get_site_url()."/category/".$subcate["slug"];
                                echo '<p><a href="'.$href.'">'.$subcate["name"].'</a></p>';
                            }
                        ?> 
                    </div>
                </div>
            </div>
            <?php }?> 
        </div>
    </div>
</div>