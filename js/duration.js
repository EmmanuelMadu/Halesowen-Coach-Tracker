function calculate(cLat,clong,sLat,sLong,nLat,nLong) {
    var source = new google.maps.LatLng(cLat, clong); // Changes the Lat and Long of the coach location to a Google Location
    var destination = new google.maps.LatLng(sLat, sLong); // Changes the Lat and Long of the stop location to a Google Location
    var destinationCollege = new google.maps.LatLng(52.524294, -2.046595); // Changes the Lat and Long of the college location to a Google Location
    var distance,duration,durationHalesowen;
    var service = new google.maps.DistanceMatrixService(); // creates a new distance matrix
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination,destinationCollege],
        travelMode: google.maps.TravelMode.WALKING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            distance = response.rows[0].elements[0].distance.text;
            duration = response.rows[0].elements[0].duration.text;
            durationHalesowen = response.rows[0].elements[1].duration.text;
            var arrived;
            if(destination == destinationCollege|| source == destination){
                arrived = "YES";
            }else{
                if(getDistance(cLat,clong,nLat,nLong) < distance){ // if the distance to the next stop is greater than the distance to the current stop then it has arrived
                    arrived = "YES";
                    arrived = "NO";
                }
            }
            display(duration,distance,arrived,durationHalesowen);
        }
    });
 }

 function getDistance(cLat,clong,sLat,sLong) { // to calculate the distance between tow locations
    var source = new google.maps.LatLng(cLat, clong);
    var destination = new google.maps.LatLng(sLat, sLong);
    var distance,duration;
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            distance = response.rows[0].elements[0].distance.text;
            return distance;
        }
    });
 }