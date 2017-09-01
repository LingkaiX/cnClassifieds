
<form class="form-inline row layui-form" action= <?php echo get_site_url() ?> name="geoform" method="get" id="geo-form-inside">
    <div class="form-group col-md-5 col-sm-5 col-xs-5 geoform-select">
        <div class="layui-input-block">
            <select id="cateselect" name="cat" style="width:100%;">
                <?php include 'in-select.php'?>
            </select>
        </div>
    </div>
    <div class="form-group col-md-5 col-sm-5 col-xs-5">
        <input id="ggmap-auto" class="form-control ggmap-auto" type="text" placeholder="请输入地址或区域" autocomplete="off" style="width:100%;">
        <input type="hidden" id="geo-lat" name="lat" value="">
        <input type="hidden" id="geo-long" name="long" value="">
    </div>

    <div class="form-group col-md-2 col-sm-2 col-xs-2">
        <button type="submit" class="search-btn btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
</form>

<script>
    //address autocomplete by google map
    jQuery(document).ready(function($){
        var input = (document.getElementById('ggmap-auto'));
        var autocomplete = new google.maps.places.Autocomplete(input,{componentRestrictions:{country: "AU"}});
        autocomplete.addListener('place_changed', function() {
            //console.log(autocomplete.getPlace());
            document.getElementById('ggmap-auto').value=autocomplete.getPlace().name;
            document.getElementById('geo-lat').value=autocomplete.getPlace().geometry.location.lat();
            document.getElementById('geo-long').value=autocomplete.getPlace().geometry.location.lng();
            input.value= autocomplete.getPlace().formatted_address;
        });
    });
</script>