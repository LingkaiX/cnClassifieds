<!-- muast be used in loop -->
<?php if(get_post_meta($post->ID,'email-to-business',true)){ ?>
<div class="enquiry-form-container" id="<?php echo 'enquiry-form-container-'.$post->ID ?>">
    <div class="enquiry-form-header">
        <button class="btn-close" onClick="closeEnquiry('<?php echo $post->ID ?>')"><i class="fa fa-times" aria-hidden="true"></i></button>
    </div>
    <div class="enquiry-form-body">
        <form action=<?php echo get_site_url().'/wp-json/cnx/v1/mailtobusiness/'.$post->ID?> id="<?php echo 'enquiry-form-'.$post->ID ?>" onSubmit="return submitEnquiry(this,'<?php echo $post->ID ?>')" method="post">
            <input type="text" id="search-item" name="name" class="" placeholder="姓名" autocomplete="off">
            <input type="email" id="search-item" name="mail" class="" placeholder="邮箱" autocomplete="off">
            <input type="tel" id="search-item" name="phone" class="" placeholder="电话" autocomplete="off">
            <textarea name="enquiry" cols="40" rows="10" class="" aria-invalid="false" placeholder="内容"></textarea>
            <button type="submit" class="btn btn-default btn-send">发送</button>
        </form>
    </div>
</div>
<button class="btn enquiry-btn" id="<?php echo 'enquiry-btn-'.$post->ID ?>" onClick="openEnquiry('<?php echo $post->ID ?>')">联系商家</button>

<script>
        function submitEnquiry(e, id){
            jQuery('#enquiry-form-container-'+id).removeClass('enquiry-form-container-open').addClass('enquiry-form-container');
            jQuery.post(jQuery(e).attr('action'), jQuery(e).serialize(), function(response){
                 console.log(response);
            });
            //console.log(e);
            jQuery('#enquiry-btn-'+id).html('已发送');
            return false;
        }
        function openEnquiry(id){
            jQuery('#enquiry-form-container-'+id).removeClass('enquiry-form-container').addClass('enquiry-form-container-open');
        }
        function closeEnquiry(id){
            jQuery('#enquiry-form-container-'+id).removeClass('enquiry-form-container-open').addClass('enquiry-form-container');
        }
</script>

<?php } ?>