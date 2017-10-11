<style type="text/css">

</style>
<div style="position:fixed; bottom:0; left:0; right:0; min-height:50px; z-index:666; vertical-align:middle; background-color:#F26522;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>
</div>
<script>
    function func(e){
        jQuery(e).ajaxForm({
            url : 'https://auliving.us16.list-manage.com/subscribe/post?u=1665e4aa7ceb3a6e717fe90ab&amp;id=17894e2c7d', // or whatever
        dataType : 'json',
        success : function (response) {
            alert("The server says: " + response);
        }
    })

    return false;
    }
</script>