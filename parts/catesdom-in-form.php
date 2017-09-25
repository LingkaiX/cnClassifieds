<?php 
    $currentslug=parsePath($_SERVER['REQUEST_URI'],'category');
    $currentcate=-1;
    $catesDom='<div id="search-suggestion">';
    if($currentslug){
        foreach ($catesindex as $key=>$cate){
            if($currentslug==$cate["slug"]){
                $currentcate=$key;
                break;    
            }
        }
    }
    if($currentcate!=-1){
        //$cateObj = get_category_by_slug($catesindex[$currentcate]['slug']);
        $catesDom=$catesDom.'<p onclick="selectSuggestion(this)" class="sugg-item">'.$catesindex[$currentcate]["name"].'</p>';
        //echo '<option value="'.$cateObj->term_id.'">'.$catesindex[$currentcate]["name"].'</option>';
        foreach($catesindex[$currentcate]['subcates'] as $subcate){
            // $cateObj = get_category_by_slug($subcate["slug"]);
            // if($cateObj!=false){
            //     echo '<option value="'.$cateObj->term_id.'">'.$subcate["name"].'</option>';
            // }
            $catesDom=$catesDom.'<p onclick="selectSuggestion(this)" class="sugg-item">'.$subcate["name"].'</p>';
        } 
    }else{
        foreach ($catesindex as $cate){
            $catesDom=$catesDom.'<p onclick="selectSuggestion(this)" class="sugg-item">'.$cate["name"].'</p>';
        }
    }
    $catesDom=$catesDom.'</div>';
?>

<script>
    catesDom='<div id="search-suggestion">';
    Object.keys(catesJson).map(function(key){
        catesDom=catesDom+'<p onclick="selectSuggestion(this)" class="sugg-item">'+catesJson[key].name+'</p>';
    });
    catesDom+='</div>';
</script>