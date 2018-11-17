function checkUsername(username){
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
    }else{
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
    	if (this.readyState==4 && this.status==200) {
    		if(this.responseText == "TAKEN"){ // response for ajax request
    			document.getElementById("unameEr").innerHTML = '<p class="error">Username Is not Available</p>'; 
    		}else if(this.responseText == "NOTTAKEN"){
    			document.getElementById("unameEr").innerHTML = '<p class="ava" >Username is Available</p>';
    		}
        }
    }
    xmlhttp.open("GET","../php/login/checkUsername.php?us="+username,true); //sends data off to be cheked if the username is available
    xmlhttp.send();
}
function checkEmail(email){
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
    }else{
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
    	if (this.readyState==4 && this.status==200) {
    		if(this.responseText == "TAKEN"){// response for ajax request
    			document.getElementById("emailEr").innerHTML = '<p class="error">Email has already been used!</p>';  //sends data off to be cheked if the email is available
    		}
        }
    }
    xmlhttp.open("GET","../php/login/checkEmail.php?em="+email,true);
    xmlhttp.send();
}
function checkCollegeid(collgegid){
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
    }else{
    	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
    	if (this.readyState==4 && this.status==200) {
    		if(this.responseText == "TAKEN"){// response for ajax request
    			document.getElementById("sIDEr").innerHTML = '<p class="error">This CollegeID has already been used!</p>';
    		}
        }
    }
    xmlhttp.open("GET","../php/login/checkCollegeid.php?cid="+collgegid,true);  //sends data off to be cheked if the college is available
    xmlhttp.send();
}