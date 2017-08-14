<div class="container">
    <div class="row center-content cate-row">
        <?php
            include "cates-index.php";
            $catecount=0;
            foreach ($catesindex as $cate){
                $catecount++;
                echo '<div class="col-md-3 col-sm-3 col-xs-4 cate-col">';
                    echo '<div class="row">';
                        $href=get_site_url()."/category/".$cate["slug"];
                        echo '<a href="'.$href.'" class="col-md-12 col-xs-12">';
                            echo '<img class="home-cate-logo" src="'.get_template_directory_uri().'/img/'.$cate["imgsrc"].'"></img>';
                            echo '<h4 class="cate-h">'.$cate["name"].'</h4>';
                        echo '</a>';
                        echo '<div class="col-md-12 hidden-xs">';
                        foreach($cate["subcates"] as $subcate){
                            $href=get_site_url()."/category/".$subcate["slug"];
                            echo '<a href="'.$href.'"><p>'.$subcate["name"].'</p></a>';
                        }
                echo '</div></div></div>';
                if($catecount%4==0) echo '<div class="clearfix hidden-xs"></div>';    
            }
        ?>
    </div>
</div>