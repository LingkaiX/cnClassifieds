<div class="container">
    <div class="row center-content cate-row">
        <?php
            include "cates-index.php";
            $catecount=0;
            foreach ($catesindex as $cate){
                $catecount++;
                echo '<div class="col-md-3 col-sm-3 col-xs-4 cate-col">';
                    echo '<div class="row">';
                        // $category_id = get_category_by_slug( $cate["slug"] );
                        // print_r($category_id);
                        // $href=get_category_link( $category_id->term_id );
                        echo '<div class="row">';
                            $href=get_site_url()."/category/".$cate["slug"];
                            echo '<a href="'.$href.'" class="col-md-12 col-xs-12 needLatAndLong">';
                                echo '<img class="home-cate-logo" src="'.get_template_directory_uri().'/img/'.$cate["imgsrc"].'"></img>';
                                echo '<div class="clearfix"></div>';
                                echo '<h4 class="cate-h">'.$cate["name"].'</h4>';
                        echo '</a></div><div class="row">';
                            echo '<div class="col-md-12 hidden-xs sub-item">';
                            foreach($cate["subcates"] as $subcate){
                                $href=get_site_url()."/category/".$subcate["slug"];
                                echo '<a href="'.$href.'"><p>'.$subcate["name"].'</p></a>';
                            }
                echo '</div></div></div></div>';
                if($catecount%4==0) echo '<div class="clearfix hidden-xs"></div>';    
            }
        ?>
    </div>
</div>