/****** Lazy Load ******/
jQuery(document).ready(function($) {
  jQuery("img.lazyload").each(function(index) {
    jQuery(this).attr("src", jQuery(this).attr("data-src"));
  });
});
//登陆的时候header下移
jQuery(document).ready(function($) {
  jQuery("img").on("dragstart", function(event) {
    event.preventDefault();
  });

  var h = parseInt(jQuery("#wpadminbar").css("height"));
  if (h) {
    var header = jQuery(".first-header");
    if (header) {
      header.css("margin-top", h);
    }
  }
});

//get geolocation automatically and then append to geoform and category links
var lat, long;
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(
    function(position) {
      lat = position.coords.latitude;
      long = position.coords.longitude;
      document.getElementById("geo-lat").value = lat;
      document.getElementById("geo-long").value = long;
      var items = document.getElementsByClassName("needLatAndLong");
      for (var i = 0; i < items.length; i++) {
        //console.log(items[i]);
        items[i].href += "?lat=" + lat + "&long=" + long;
      }
      //console.log("got geolocation");
    },
    function(error) {
      //console.log("error:", error);
    }
  );
}
