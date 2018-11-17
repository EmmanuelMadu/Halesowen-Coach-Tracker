var map;
var marker = false;

function initMap() {

    var cOfMap = new google.maps.LatLng(52.456356, -2.053135); // center of map is halesowen college

    var options = {center:cOfMap,zoom:16}; // sets center of map to halesowen college
 
    map = new google.maps.Map(document.getElementById('map'), options); // sets map to divider with the id 'map'

    google.maps.event.addListener(map, 'click', function(event) { // new listener               
        var clickedLoc = event.latLng;
        if(marker === false){ // creates a new marker if it hasnt already been created
            marker = new google.maps.Marker({position: clickedLoc,map: map,draggable: true});
            google.maps.event.addListener(marker, 'dragend', function(event){
                setLoc(); // sets the location
            });
        } else{
            marker.setPosition(clickedLoc); // sets the marker poition to the new clicked position 
        }
        // if a marker has already been created then setlocation to where the mouse had just clicked
        setLoc();
    });
}
function setLoc(){
    var currentLocation = marker.getPosition();
    document.getElementById('lat').value = currentLocation.lat(); // sets location to hidden input boxes
    document.getElementById('long').value = currentLocation.lng();
}
google.maps.event.addDomListener(window, 'load', initMap); // adds DOM listener to page