<!--NOOOOO use !-->
<div class="row geo-form ">
    <div class="col-md-2 col-sm-1 hidden-xs"></div>
    <div class="col-md-8 col-sm-10 col-xs-12">
        <form class="form-inline row layui-form" action= <?php echo get_site_url() .'/filter' ?> name="gmw_form" method="get">
            <div class="form-group col-md-5 col-sm-5 col-xs-12">
                <input type="hidden" id="gmw-single-post-type-1" class="gmw-single-post-type gmw-single-post-type-1 " name="gmw_post" value="post">
                <div class="layui-input-block">
                    <select name="tax_category" style="width:95%;">
                        <?php include 'in-select.php'?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-5 col-sm-5 col-xs-9">
                <input id="pac-input" class="form-control" type="text" placeholder="请输入地址或区域" name="gmw_address[]" autocomplete="off" style="width:100%;">
                <input type="hidden" name="gmw_distance" value="60">
                <input type="hidden" name="gmw_units" value="metric">
                <input type="hidden" id="gmw-form-id-1" class="gmw-form-id gmw-form-id-1" name="gmw_form" value="1"> 
                <input type="hidden" id="gmw-page-1" class="gmw-page gmw-page-1" name="paged" value="1"> 
                <input type="hidden" id="gmw-per-page-1" class="gmw-per-page gmw-per-page-1" name="gmw_per_page" value="10">
                <input type="hidden" id="prev-address-1" class="prev-address prev-address-1" value="">
                <input type="hidden" id="gmw-lat-1" class="gmw-lat gmw-lat-1" name="gmw_lat" value="">
                <input type="hidden" id="gmw-long-1" class="gmw-lng gmw-long-1" name="gmw_lng" value="">
                <input type="hidden" id="gmw-prefix-1" class="gmw-prefix gmw-prefix-1" name="gmw_px" value="pt">
                <input type="hidden" id="gmw-action-1" class="gmw-action gmw-action-1" name="action" value="gmw_post">
            </div>

            <div class="form-group col-md-2 col-sm-2 col-xs-3">
                <button type="submit" class="search-btn btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
    <div class="col-md-2 col-sm-1 hidden-xs"></div>                    
</div>
<script>
//address autocomplete by google map
jQuery(document).ready(function($){
    var input = (document.getElementById('pac-input'));
    var autocomplete = new google.maps.places.Autocomplete(input,{componentRestrictions:{country: "AU"}});
    autocomplete.addListener('place_changed', function() {
        //console.log(autocomplete.getPlace());
        document.getElementById('pac-input').value=autocomplete.getPlace().name;
        document.getElementById('gmw-lat-1').value=autocomplete.getPlace().geometry.location.lat();
        document.getElementById('gmw-long-1').value=autocomplete.getPlace().geometry.location.lng();
        input.value= autocomplete.getPlace().formatted_address;
    });
});
</script>
