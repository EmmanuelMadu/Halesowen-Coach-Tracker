
    function validateAddStop(){
        var name = document.getElementById("stopName");
        var lat = document.getElementById("lat");
        var long = document.getElementById("lng");

        var nameEr = document.getElementById("stopNameEr");
        var latLongEr = document.getElementById("latLongEr");
        
        if(name.value == ""||name.value == null ){
            nameEr.textContent = "Name of Stop is required";
            nameEr.style = "color: red;";
            name.style.border = "1px solid red";
            name.focus();
            return false;
        }
        if(lat.value == 0||long.value == 0){
            latLongEr.textContent = "Stop location is required";
            latLongEr.style = "color: red";
            return false;
        }

    }