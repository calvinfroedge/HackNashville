var map;
function show_map(latitude, longitude) {
    var myLatlng = new google.maps.LatLng(latitude, longitude);
    var myOptions = {
      zoom: 12,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    
    var marker = new google.maps.Marker({
        position: myLatlng, 
        map: map,
        title:""
    }); 
}
//google.maps.event.addDomListener(window, 'load', initialize);