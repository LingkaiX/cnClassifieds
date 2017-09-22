<?php 
    include 'cates-index.php';
    foreach ($catesindex as $ck=>$cate){
        $cateObj = get_category_by_slug($cate["slug"]);
        if($cateObj) {
            $catesindex[$ck]['cid']=(string)$cateObj->term_id;
            foreach($cate["subcates"] as $sck=>$subcate){
                $cateObj = get_category_by_slug($subcate["slug"]);
                if($cateObj) $catesindex[$ck]["subcates"][$sck]['cid']=(string)$cateObj->term_id;
                else unset($catesindex[$ck]["subcates"][$sck]);
            }
        }
        else unset($catesindex[$ck]);
    }
?>
<script type="text/javascript">
    var catesJson = <?php echo json_encode($catesindex) ?>;
    console.log(catesJson);
</script>