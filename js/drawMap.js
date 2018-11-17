var map;
var marker = false;

function initMap(lati,lng) { // draws map and setting the marker to the location that has been inputted through the parameters

    var cOfMap = new google.maps.LatLng(lati, lng); // sets teh center of the map tp the location

    var options = {center:cOfMap,zoom:16};
 
    map = new google.maps.Map(document.getElementById('editMap'), options);

    marker = new google.maps.Marker({position: cOfMap,map: map,draggable: true});
    google.maps.event.addListener(marker, 'dragend', function(event){
        setLoc();
    });
        
    google.maps.event.addListener(map, 'click', function(event) {                
        var clickedLoc = event.latLng;
        marker.setPosition(clickedLoc);
        setLoc();
    });
}
function setLoc(){
    var currentLocation = marker.getPosition();
    document.getElementById('lat').value = currentLocation.lat();
    document.getElementById('long').value = currentLocation.lng();
}