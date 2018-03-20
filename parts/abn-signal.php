<?php
    $abn=get_post_meta($post->ID,'abn',true);
    if($abn){
        return '<abbr title="ABN Checked"><img class="listed-decoration" src="'.get_template_directory_uri().'/img/abn-checked.svg"></abbr>';
    }else{
        return null;
    }