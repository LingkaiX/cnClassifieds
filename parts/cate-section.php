    <div class="row cate-row">
        <?php
            include "cates-index.php";
            $catecount=0;
            foreach ($catesindex as $cate){
                $catecount++;
                echo '<div class="col-md-3 col-sm-3 col-xs-4 cate-col">';
                        echo '<div class="cate-container">';
                            $href=getBaseUrl()."/category/".$cate["slug"];
                            echo '<a href="'.$href.'" class="needLatAndLong">';
                                echo '<img class="home-cate-logo" src="'.get_template_directory_uri().'/img/cate-icons/'.$cate["imgsrc"].'">';
                                echo '<div class="clearfix"></div>';
                                echo '<h4 class="cate-h">'.$cate["name"].'</h4>';
                        echo '</a>';
                            echo '<div class="hidden-sm hidden-xs sub-item">';
                            foreach($cate["subcates"] as $subcate){
                                $href=getBaseUrl()."/category/".$cate["slug"]."/".$subcate["slug"];
                                echo '<a class="needLatAndLong" href="'.$href.'"><p>'.$subcate["name"].'</p></a>';
                            }
                echo '</div></div></div>';
                if($catecount%3==0) echo '<div class="clearfix hidden-sm hidden-md hidden-lg"></div>'; 
                if($catecount%4==0) echo '<div class="clearfix hidden-xs hidden-lg"></div>'; 
                if($catecount%5==0) echo '<div class="clearfix hidden-xs hidden-sm hidden-md"></div>';  
            }
        ?>
    </div>
