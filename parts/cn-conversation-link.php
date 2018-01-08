<?php
$url='';
if (parsePath($_SERVER['REQUEST_URI'],'',-1)=='zh-tw'){
    $url=home_url().substr($_SERVER['REQUEST_URI'],6);
    echo '<a href='.$url.' class="btn cc-link">简体</a>';
}else{
    $url=home_url().'/zh-tw'.$_SERVER['REQUEST_URI'];
    echo '<a href='.$url.' class="btn cc-link">繁体</a>';
}