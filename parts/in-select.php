<option value>请选择分类</option>
<?php 
    include 'cates-index.php';
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
?>