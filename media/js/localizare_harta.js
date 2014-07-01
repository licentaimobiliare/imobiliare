var x=document.getElementById("geo");
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(initialize,showError);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }

function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML="The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="An unknown error occurred."
      break;
    }
  }



var map;
var myCenter = new google.maps.LatLng(46.7667, 23.6);
var marker;

function initialize(position)
{
    console.log(position);
    myCenter = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    var mapProp = {
        center: myCenter,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapholder"), mapProp);
    jQuery("#mapholder").removeClass("hidden");
    
    if(window.imobils_location != undefined){
        for(var i=0;i<imobils_location.length;i++){
            var latlng=new google.maps.LatLng(window.imobils_location[i].lat, window.imobils_location[i].lng);
            placeMarker(latlng,window.imobils_location[i].name);
        }
    }
}

function placeMarker(location,info) {
    marker = new google.maps.Marker({
        position: location,
        map: map,
    });
    var infowindow = new google.maps.InfoWindow({
        content: (info == undefined ? 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng() : info)
    });
    infowindow.open(map, marker);
}