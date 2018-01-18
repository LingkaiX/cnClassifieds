<!-- must be used in loop -->
<!-- 联系商家按钮 -->
<?php if(get_post_meta($post->ID,'email-to-business',true)){?>
<div class="enquiry-form-container" id="<?php echo 'enquiry-form-container-'.$post->ID ?>">
    <div class="enquiry-form-content theme-color-border">
        <div class="enquiry-form-header theme-color-background">
            <span><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;联系商家</span>
            <button class="btn-close theme-color-background" onClick="closeEnquiry('<?php echo $post->ID ?>')"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
        <div class="enquiry-form-body">
            <form action=<?php echo get_site_url().'/wp-json/cnx/v1/mailtobusiness/'.$post->ID?> id="<?php echo 'enquiry-form-'.$post->ID ?>" onSubmit="return submitEnquiry(this,'<?php echo $post->ID ?>')" method="post">
                <label for="">姓名（必填）:</label>
                <input type="text" name="name" class="form-control input-text" autocomplete="off">
                <label for="">邮箱（必填）:</label>
                <input type="email" name="mail" class="form-control input-text" autocomplete="off">
                <label for="">电话：</label>
                <input type="tel" name="phone" class="form-control input-text" autocomplete="off">
                <label for="">咨询内容（必填）:</label>
                <textarea name="enquiry" cols="40" rows="10" class="form-control input-text" aria-invalid="false"></textarea>
                <div><button type="submit" class="btn btn-default btn-send">发送</button></div>
            </form>
        </div>
    </div>
</div>
<button class="btn enquiry-btn theme-color-background" id="<?php echo 'enquiry-btn-'.$post->ID ?>" onClick="openEnquiry('<?php echo $post->ID ?>')">联系商家</button>

<script>
        function submitEnquiry(e, id){
            if(!jQuery('#enquiry-form-container-'+id+' [name="name"]').val()){
                jQuery('#enquiry-form-container-'+id+' [name="name"]').addClass('empty-input');
                return false;
            }
            if(!jQuery('#enquiry-form-container-'+id+' [name="mail"]').val()){
                jQuery('#enquiry-form-container-'+id+' [name="mail"]').addClass('empty-input');
                return false;
            }
            if(!jQuery('#enquiry-form-container-'+id+' [name="enquiry"]').val()){
                jQuery('#enquiry-form-container-'+id+' [name="enquiry"]').addClass('empty-input');
                return false;
            }
            jQuery('#enquiry-form-container-'+id).removeClass('enquiry-form-container-open').addClass('enquiry-form-container');
            jQuery.post(jQuery(e).attr('action'), jQuery(e).serialize(), function(response){
                 //console.log(response);
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