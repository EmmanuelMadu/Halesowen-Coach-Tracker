function addRoute(routeid){ // adds route to database
	document.getElementById('message').innerHTML = "";
	var routeInput = document.getElementById('routeid'); 
	var error = document.getElementById('error');
	if(check() == true){
		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
        }else{
        	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        	if (this.readyState==4 && this.status==200) {
        		stopHolder.innerHTML += this.responseText; // displays the responsse
            }
        }
        xmlhttp.open("GET","../php/addRoute/addRoute.php?r="+routeid,true); // sends a request off to php page
        xmlhttp.send();
	}
}
function check(){ // checks if the textbox has been clicked yet
	var routeInput = document.getElementById('routeid');
	var error = document.getElementById('error');
	if(routeInput.value == "" || routeInput.value == null){
		document.getElementById("error").innerHTML= "<p>Please Enter A Route ID</p>";
		colour = "Purple";
		return false;
	}else{
		removeErrorMessage();
		return true;
	}
}
function removeErrorMessage(){
	document.getElementById('error').innerHTML = "";
}
