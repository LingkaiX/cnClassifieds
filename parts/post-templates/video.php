<?php
    $videoInfo=get_field('video_info');
    if (is_array($videoInfo)&&array_key_exists('youtube_id',$videoInfo)):
        //?enablejsapi=1&origin=home_url: https://developers.google.com/youtube/iframe_api_reference#Getting_Started
?>
    <div class="video">
        <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $videoInfo['youtube_id'];?>" 
            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>
<?php
    endif;
?>
<style>
 .video{
    position: relative;
    display: block;
    width: 100%;
    padding-bottom: 56.25%;
    overflow: hidden;
    background-position: center;
    background-size: cover;
 }
 .video iframe{
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
 }
</style>