<option value=0>所有分类</option>
<?php 
    include 'cates-index.php';
    foreach ($catesindex as $cate){
        $cateObj = get_category_by_slug($cate["slug"]); 
        if($cateObj!=false){
            echo '<option value="'.$cateObj->term_id.'"><strong>'.$cate["name"].'</strong></option>';
            foreach($cate["subcates"] as $subcate){
                $cateObj = get_category_by_slug($subcate["slug"]);
                if($cateObj!=false){
                    echo '<option value="'.$cateObj->term_id.'">&nbsp;&nbsp;&nbsp;'.$subcate["name"].'</option>';
                }
            }
        }
    }
?>