
<?php 
    include 'cates-index.php';
    $currentslug=parsePath($_SERVER['REQUEST_URI'],'category');
    echo 'url:'.$_SERVER['REQUEST_URI'];
    echo 'slug:'.$currentslug;
    $currentcate=-1;
    if($currentslug){
        foreach ($catesindex as $key=>$cate){
            if($currentslug==$cate["slug"]){
                $currentcate=$key;
                break;    
            }
        }
    }
    if($currentcate!=-1){
        $cateObj = get_category_by_slug($catesindex[$currentcate]['slug']); 
        echo '<option value="'.$cateObj->term_id.'">'.$catesindex[$currentcate]["name"].'</option>';
        foreach($catesindex[$currentcate]['subcates'] as $subcate){
            $cateObj = get_category_by_slug($subcate["slug"]);
            if($cateObj!=false){
                echo '<option value="'.$cateObj->term_id.'">'.$subcate["name"].'</option>';
            }
        } 
    }else{
        echo '<option value>请选择分类</option>';
        foreach ($catesindex as $cate){
            $cateObj = get_category_by_slug($cate["slug"]); 
            if($cateObj!=false){
                echo '<optgroup label="'.$cate["name"].'">';
                foreach($cate["subcates"] as $subcate){
                    $cateObj = get_category_by_slug($subcate["slug"]);
                    if($cateObj!=false){
                        echo '<option value="'.$cateObj->term_id.'">'.$subcate["name"].'</option>';
                    }
                }
                echo '</optgroup>';
            }
        }
    }
    
?>