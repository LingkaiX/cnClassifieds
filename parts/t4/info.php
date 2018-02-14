<div class="info solid-boder">
<?php
    if($mypost!=null){
        if(!empty($mypost->phone)) echo '<p class="with-ion"><span class="phone"></span><span>'.$mypost->phone.'</span></p>';
        if(!empty($mypost->email)) echo '<p class="with-ion"><a href="mailto:#"><span class="email"></span><span>'
            .$mypost->email.'</span></a></p>';
        if(!empty($mypost->website)) echo '<p class="with-ion"><a target="_blank" href="'
            .$mypost->website.'"><span class="website"></span><span>'.removeScheme($mypost->website).'</span></a></p>';
        if(!empty($mypost->address)) echo '<p class="with-ion"><span class="address"></span><span>'.$mypost->address.'</span></p>';
    }
?>
    <div style="text-align:center;">
        <div class="hidden-md hidden-lg qr-code"><img src="<?php echo $social['wechat-qr']['url']; ?>" title=""></div>
        <?php include dirname(__DIR__).'/enquiry-form.php'; ?>
        <a class="btn goto-google" target="_blank" href="<?php echo 'https://www.google.com/maps?daddr='.$mypost->lat.','.$mypost->long; ?>">地图导航</a>
    
    </div>
    <div class="social-box">
        <?php if($social['has-facebook']): ?>
            <a target="_blank" href="<?php echo $social["facebook"]; ?>">
            <img class="img-social" src="<?php echo get_template_directory_uri(); ?>/img/facebook.svg"></img></a>
        <?php endif; ?>
        <?php if($social['has-instagram']): ?>
            <a target="_blank" href="<?php echo $social["instagram"]; ?>">
            <img class="img-social" src="<?php echo get_template_directory_uri(); ?>/img/instagram.svg"></img></a>
        <?php endif; ?>
    </div>
</div>