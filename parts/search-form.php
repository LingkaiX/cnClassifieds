<?php include 'cates-index-with-id.php'; ?>
<div class="row search-form-container">
    <form role="search" method="get" id="search-form" class="search-form" action=<?php echo getBaseUrl()?>>
        <div class="col-md-6 col-sm-6 col-xs-12" style="position:relative;">
            <input type="text" id="search-item" class="form-control search-item" placeholder="请选择分类或输入关键字" autocomplete="off">
            <div id="search-suggestion"></div>
        </div>
        <div class="col-md-5 col-sm-5 col-xs-10">
            <input type="text" id="auto-map" class="form-control auto-map" placeholder="请输入地址或区域" autocomplete="off">
        </div>
        <div class="col-md-1 col-sm-1 col-xs-2">
            <button type="submit" class="btn btn-default search-submit theme-color-background theme-color-border"><i class="ionicon ion-search" aria-hidden="true"></i></button>
        </div>
        <input type="hidden" id="s-or-cat" name="sorcat" value="">
        <input type="hidden" id="geo-lat" name="lat" value="">
        <input type="hidden" id="geo-long" name="long" value="">
    </form>
</div>
<!-- generate default catesDom -->
<!-- 加入tname用于繁体搜索 -->
<?php 
    $nameOrTname=parsePath($_SERVER['REQUEST_URI'],'',-1)=='zh-tw' ? 'tname':'name';
    $currentslug=parsePath($_SERVER['REQUEST_URI'],'category');
    $currentcate=-1;
    $catesDom='<div id="search-suggestion">';
    if($currentslug){
        foreach ($catesindex as $key=>$cate){
            if($currentslug==$cate["slug"]){
                $currentcate=$key;
                break;    
            }
        }
    }
    if($currentcate!=-1){
        $catesDom=$catesDom.'<p onclick="selectSuggestion(this)" class="sugg-item">'.$catesindex[$currentcate][$nameOrTname].'</p>';
        foreach($catesindex[$currentcate]['subcates'] as $subcate){
            $catesDom=$catesDom.'<p onclick="selectSuggestion(this)" class="sugg-item">'.$subcate[$nameOrTname].'</p>';
        } 
    }else{
        foreach ($catesindex as $cate){
            $catesDom=$catesDom.'<p onclick="selectSuggestion(this)" class="sugg-item">'.$cate[$nameOrTname].'</p>';
        }
    }
    $catesDom=$catesDom.'</div>';
?>
<script>
var catesDom= '<?php echo $catesDom ?>';
var selectSuggestion;
jQuery(document).ready(function($){
    selectSuggestion=function(e){
        $("#search-item").val($(e).text());
        $("#search-suggestion").replaceWith( '<div id="search-suggestion"></div>' );
    }

    function addSuggestion(e){
        var input=$("#search-item").val();
        if(input){
            var suggDom='<div id="search-suggestion">';
            Object.keys(catesJson).map(function(key){
                if(catesJson[key].<?php echo $nameOrTname ?>.indexOf(input)!== -1)
                    suggDom=suggDom+'<p onclick="selectSuggestion(this)" class="sugg-item">'+catesJson[key].<?php echo $nameOrTname ?>+'</p>';
                Object.keys(catesJson[key].subcates).map(function(skey){
                    if(catesJson[key].subcates[skey].<?php echo $nameOrTname ?>.indexOf(input)!== -1)
                        suggDom=suggDom+'<p onclick="selectSuggestion(this)" class="sugg-item">'+catesJson[key].subcates[skey].<?php echo $nameOrTname ?>+'</p>';
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

     //提交前判断是搜索还是类别
    $("#search-form").submit(function(){
        var input=$("#search-item").val();
        var isCat=false;
        if(input){
            Object.keys(catesJson).map(function(key){
                if(isCat) return;
                if(catesJson[key].<?php echo $nameOrTname ?>.localeCompare(input) == 0){
                    $("#s-or-cat").attr("name","cat").val(catesJson[key].cid);
                    isCat=true;
                    return;
                }                   
                Object.keys(catesJson[key].subcates).map(function(skey){
                    if(catesJson[key].subcates[skey].<?php echo $nameOrTname ?>.localeCompare(input) == 0){
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
            $("#search-item").addClass('empty-input');
            return false;
        }
    });
    //address autocomplete by google map
    var input = (document.getElementById('auto-map'));
    var autocomplete = new google.maps.places.Autocomplete(input,{componentRestrictions:{country: "AU"}});
    autocomplete.addListener('place_changed', function() {
        //console.log(autocomplete.getPlace());
        document.getElementById('geo-lat').value=autocomplete.getPlace().geometry.location.lat();
        document.getElementById('geo-long').value=autocomplete.getPlace().geometry.location.lng();
        input.value= autocomplete.getPlace().formatted_address;
    });
});
</script>
