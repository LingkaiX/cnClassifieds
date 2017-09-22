<?php include 'cates-index-with-id.php'; ?>
<div class="row search-form-container">
    <form role="search" method="get" id="search-form" class="search-form" action=<?php echo get_site_url()?>>
        <div class="col-md-6 col-sm-6 col-xs-12" style="position:relative;">
            <input type="text" id="search-item" class="form-control search-item" placeholder="请输入关键字" autocomplete="off">
            <div id="search-suggestion"></div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-10">
            <input type="text" id="auto-map" class="form-control auto-map" placeholder="请输入地址或区域" autocomplete="off">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
            <button type="submit" class="btn btn-default search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </div>
        <input type="hidden" id="s-or-cat" name="sorcat" value="">
        <input type="hidden" id="geo-lat" name="lat" value="">
        <input type="hidden" id="geo-long" name="long" value="">
    </form>
</div>
<script>
var selectSuggestion,catesDom;
jQuery(document).ready(function($){
    selectSuggestion=function(e){
        $("#search-item").val($(e).text());
        $("#search-suggestion").replaceWith( '<div id="search-suggestion"></div>' );
    }
    catesDom='<div id="search-suggestion">';
    Object.keys(catesJson).map(function(key){
        catesDom=catesDom+'<p onclick="selectSuggestion(this)" class="sugg-item">'+catesJson[key].name+'</p>';
    });
    catesDom+='</div>';

    function addSuggestion(e){
        var input=$("#search-item").val();
        if(input){
            var suggDom='<div id="search-suggestion">';
            Object.keys(catesJson).map(function(key){
                if(catesJson[key].name.indexOf(input)!== -1)
                    suggDom=suggDom+'<p onclick="selectSuggestion(this)" class="sugg-item">'+catesJson[key].name+'</p>';
                Object.keys(catesJson[key].subcates).map(function(skey){
                    if(catesJson[key].subcates[skey].name.indexOf(input)!== -1)
                        suggDom=suggDom+'<p onclick="selectSuggestion(this)" class="sugg-item">'+catesJson[key].subcates[skey].name+'</p>';
                });
            });
            suggDom+='</div>'
            $("#search-suggestion").replaceWith(suggDom);
        }else $("#search-suggestion").replaceWith(catesDom);
    }

    $("#search-item").focus(addSuggestion);
    $("#search-item").keyup(addSuggestion);
     $("#search-item").blur(function(){
         if(!$("#search-suggestion").is(':focus')&&!$("#search-suggestion").is(':hover'))
             $("#search-suggestion").replaceWith( '<div id="search-suggestion"></div>' );
     });

    $("#search-form").submit(function(){
        var input=$("#search-item").val();
        var isCat=false;
        if(input){
            Object.keys(catesJson).map(function(key){
                if(isCat) return;
                if(catesJson[key].name.localeCompare(input) == 0){
                    $("#s-or-cat").attr("name","cat").val(catesJson[key].cid);
                    isCat=true;
                    return;
                }                   
                Object.keys(catesJson[key].subcates).map(function(skey){
                    if(catesJson[key].subcates[skey].name.localeCompare(input) == 0){
                        $("#s-or-cat").attr("name","cat").val(catesJson[key].subcates[skey].cid);
                        isCat=true;
                        return;
                    }                       
                });
            });
            if(isCat) return true;;
            $("#s-or-cat").attr("name","s").val(input);
            return true;
        }else{
            //提示空行
            $("#search-item").css("border-color","red");
            return false;
        }
    });
    //address autocomplete by google map
    var input = (document.getElementById('auto-map'));
    var autocomplete = new google.maps.places.Autocomplete(input,{componentRestrictions:{country: "AU"}});
    autocomplete.addListener('place_changed', function() {
        document.getElementById('auto-map').value=autocomplete.getPlace().name;
        document.getElementById('geo-lat').value=autocomplete.getPlace().geometry.location.lat();
        document.getElementById('geo-long').value=autocomplete.getPlace().geometry.location.lng();
        input.value= autocomplete.getPlace().formatted_address;
    });
});
</script>
