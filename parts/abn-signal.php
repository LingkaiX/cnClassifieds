<?php
    $abn=get_post_meta($post->ID,'abn',true);
    if($abn){
        return '<abbr title="ABN Checked"><i class="fa fa-id-card-o" aria-hidden="true"></i></abbr>';
    }else{
        return null;
    }