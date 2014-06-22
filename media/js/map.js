jQuery(document).ready(function()
{
    google.maps.event.addDomListener(window, 'load', initialize);
});
function addmarker(location) {
    jQuery.ajax({
        type: "POST",
        url: '/ajax/addmark/' + window.idi,
        dataType: 'json',
        data: {
            nume: jQuery("#imobil_title").text(),
            adresa: jQuery(".adresa>p:first-child").text(),
            lat: location.lat(),
            lng: location.lng(),
            tip: jQuery(".row:nth-child(3) p.first").clone()
            .children()
            .remove()
            .end()
            .text(),            
        },
        success: function(data) {
           alert("Salvat in baza de date!");
            placeMarker(location);
        },
        error: function() {
            console.log('error');
        }
    });
}

var map;
var myCenter = new google.maps.LatLng(46.7667, 23.6);

function initialize()
{
    var mapProp = {
        center: myCenter,
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

    google.maps.event.addListener(map, 'click', function(event) {
//        placeMarker(event.latLng);
 fnOpenNormalDialog(event.latLng);
    });
}

function placeMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map,
    });
    var infowindow = new google.maps.InfoWindow({
        content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
    });
    infowindow.open(map, marker);
}

function fnOpenNormalDialog(location) {
    jQuery("#dialog-confirm").html("Confirm Dialog Box");

    // Define the Dialog and its properties.
    jQuery("#dialog-confirm").dialog({
        resizable: false,
        modal: true,
        title: "Modal",
        height: 250,
        width: 400,
        buttons: {
            "Yes": function () {
                jQuery(this).dialog('close');
                callback(true,location);
            },
                "No": function () {
                jQuery(this).dialog('close');
                callback(false);
            }
        }
    });
}

function callback(value,location) {
    if (value) {
        addmarker(location);
    } else {
        alert("Rejected");
    }
}