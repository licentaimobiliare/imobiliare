var myCenter=new google.maps.LatLng(46.7667,26.6);
var marker;

function initialize()
{
var mapProp = {
  center:myCenter,
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
 // animation:google.maps.Animation.BOUNCE,
  title:'Click to zoom',
  zoom:18,
  mapTypeId:google.maps.MapTypeId.HYBRID
  });

marker.setMap(map);
// Zoom to 9 when clicking on marker
google.maps.event.addListener(marker,'click',function() {
  map.setZoom(12);
  map.setCenter(marker.getPosition());
  });
  var infowindow = new google.maps.InfoWindow({
  content:"Hello World!"
  });

google.maps.event.addListener(marker, 'click', function() {
  infowindow.open(map,marker);
  });

}
google.maps.event.addDomListener(window, 'load', initialize);