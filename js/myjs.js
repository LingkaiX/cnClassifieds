//layui form 
// jQuery(document).ready(function($){
//     layui.use('form', function(){
//     var form = layui.form; //只有执行了这一步，部分表单元素才会自动修饰成功
//   }); 
// }); 

//get geolocation automatically and then append to geoform and category links
var lat, long;
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(function(position) {
    lat=position.coords.latitude;
    long=position.coords.longitude;
    document.getElementById('geo-lat').value=lat;
    document.getElementById('geo-long').value=long;
    var items=document.getElementsByClassName("needLatAndLong");
    for(var i=0;i<items.length;i++){
      //console.log(items[i]);
      items[i].href+="?lat="+lat+"&long="+long;
    }
    console.log("got geolocation");
  },function(error){
    console.log('error:',error);
  });
}