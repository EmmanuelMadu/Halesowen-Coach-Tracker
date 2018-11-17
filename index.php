<?php   
    session_start();
?>
<!DOCTYPE html> 
<html>
<head>
	<title>Halesowen Coach Tracker</title>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="icon" type="image/gif/png" href="/images/Coach-Logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">
	<script src="/js/validateSignUp.js"/></script>
	<script src="/js/validateLogin.js"/></script>
	<script src="/js/signupvalidation.js"/></script>
	<script type="text/javascript">
		function checkFirstUserInfoBox(){
			var firstn = document.getElementById("fnameInput");
    		var lastn = document.getElementById("lnameInput");
    		var uname= document.getElementById("unameInput");
    		var pass = document.getElementById("passwordInput");

    		var fistnEr = document.getElementById("fnameEr");
   		 	var lastnEr = document.getElementById("lnameEr");
			var unameEr = document.getElementById("unameEr");
			var passEr = document.getElementById("passwordEr");
		 	if(firstn.value == ""||firstn.value == null ){
            	fistnEr.textContent = "Firstname is required";
            	fistnEr.style = "color: red;";
            	firstn.style.border = "1px solid red";
	            firstn.focus();
        	    return false;
    		}
	        if(lastn.value == ""||lastn.value == null){
	            lastnEr.textContent = "Lastname is required";
	            lastnEr.style = "color: red";
	            lastn.style.border = "1px solid red";
	            lastn.focus();
	            return false;
	        }
	        if(uname.value == ""||uname.value == null){
	            unameEr.textContent = "Username is required";
	            unameEr.style = "color: red";
	            uname.style.border = "1px solid red";
	            uname.focus();
	            return false;
	        }
	        if(pass.value == ""||pass.value == null){
	            passEr.textContent = "Password is required";
	            passEr.style = "color: red";
	            pass.style.border = "1px solid red";
	            pass.focus();
	            return false;
	        }
		}
		function checkLastUserInfoBox(){
			var sID = document.getElementById("sIDinput");
		    var routeID = document.getElementById("routeIDInput");
		    var email = document.getElementById("emailInput");
		    var sidEr = document.getElementById("sIDEr");
			var routeEr = document.getElementById("routeIDEr");
			var emailEr = document.getElementById("emailEr");

			if(sID.value == ""||sID.value == null){
	            sidEr.textContent = "StudentID is required";
	            sidEr.style = "color: red";
	            sID.style.border = "1px solid red";
	            sID.focus();
	            return false;
	        }

	        if(routeID.value == ""||routeID.value == null){
	            routeEr.textContent = "RouteID is required";
	            routeEr.style = "color: red";
	            routeID.style.border = "1px solid red";
	            routeID.focus();
	            return false;
	        }

	        if(email.value == ""||email.value == null){
	            emailEr.textContent = "Email is required";
	            emailEr.style = "color: red";
	            email.style.border = "1px solid red";
	            email.focus();
	            return false;
	        }
	        signup();
		}
		function signup(){
			var firstn = document.getElementById("fnameInput").value;
    		var lastn = document.getElementById("lnameInput").value;
    		var uname= document.getElementById("unameInput").value;
    		var pass = document.getElementById("passwordInput").value;
    		var sID = document.getElementById("sIDinput").value;
		    var routeID = document.getElementById("routeIDInput").value;
		    var email = document.getElementById("emailInput").value;

		    if (window.XMLHttpRequest) {
              	xmlhttp=new XMLHttpRequest();
            }else{
              	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
              	if (this.readyState==4 && this.status==200) {
              		if(this.responseText == "MAILNOTSENT"){
              			document.getElementById("slide-7-trigger").checked = true;
              		}
            	}
          	}
            xmlhttp.open("GET","signup.php?fn="+firstn+"&ln="+lastn+"&un="+uname+"&pa="+pass+"&sid="+sID+"&rid="+routeID+"&em="+email,true);
            xmlhttp.send();
		}
		function login(){
			var user = document.getElementById("usernameInput").value;
    		var pass = document.getElementById("passInput").value;
 
		    if (window.XMLHttpRequest) {
              	xmlhttp=new XMLHttpRequest();
            }else{
              	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
              	if (this.readyState==4 && this.status==200) {
              		if(this.responseText == "CORRECT"){
              			window.location = "home.php";
              		}else if(this.responseText == "UNVERIFIED"){
              			window.location = "notverified.php";
              		}else if(this.responseText == "INCOREECTLOGIN"){
              			document.getElementById("slide-5-trigger").checked = true;
              		}else{
              			document.getElementById("slide-5-trigger").checked = true;
              		}
            	}
          	}
            xmlhttp.open("GET","login.php?user="+user+"&pass="+pass,true);
            xmlhttp.send();
		}
		var forgotPassEmail;
		function forgotpass(){
			var fgpass = document.getElementById("fgemail");
			var fgpasser = document.getElementById("fgPassEr");
			if(fgpass.value == ""||fgpass.value == null){
				fgpasser.textContent = 'Email is required';
	            fgpasser.style = "color: red;";
	            fgpass.style.border = "1px solid red";
	            fgpass.focus();
	            return false;
			}else{
				if (window.XMLHttpRequest) {
              		xmlhttp=new XMLHttpRequest();
            	}else{
              		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function() {
	              	if (this.readyState==4 && this.status==200) {
	              		if(this.responseText == "MAILSENT"){
	              			forgotPassEmail = fgpass.value;
              				document.getElementById("slide-8-trigger").checked = true;
	              		}else if(this.responseText == "NOTCONFIRMEDACCOUNT"){
	              			fgpasser.textContent = 'Please Confirm Your account first!';
				            fgpasser.style = "color: red;";
				            fgpass.style.border = "1px solid red";
				            fgpass.focus();
	              		}else{
	              			fgpasser.textContent = 'Email is incorrect';
				            fgpasser.style = "color: red;";
				            fgpass.style.border = "1px solid red";
				            fgpass.focus();
	              		}
	              	}
	          	}
	            xmlhttp.open("GET","/php/forgotpass/forgotpass.php?em="+fgpass.value,true);
	            xmlhttp.send();
				
			}
		}	
		function changePass(){
			var passone = document.getElementById("passone");
			var passtwo = document.getElementById("passtwo");
			var passEr = document.getElementById("fgpassER");

			if(passone.value == "" || passone.value == null || passtwo.value == "" || passtwo.value == null){
				passEr.textContent = 'Please fill in both fields!';
	            passEr.style = "color: red;";
	            return false;
			}else{
				if(passone.value == passtwo.value){
					if (window.XMLHttpRequest){
	              		xmlhttp=new XMLHttpRequest();
	            	}else{
	              		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		            }
		            xmlhttp.onreadystatechange = function() {
		              	if (this.readyState==4 && this.status==200) {
		              		if(this.responseText == "PASSWORDCHANGED"){
	              				document.getElementById("slide-10-trigger").checked = true;
	              				forgotPassEmail = "";
		              		}else{
		              			document.getElementById("slide-7-trigger").checked = true;
		              			forgotPassEmail ="";
		              		}
		              	}
		          	}
		            xmlhttp.open("GET","/php/forgotpass/changePass.php?email="+forgotPassEmail+"&pass="+passone.value,true);
		            xmlhttp.send();
				}else{
					if(passone.value !== passtwo.value){
						passEr.textContent = 'Passwords are not the same!';
			            passEr.style = "color: red;";
			        }
				}
			}
		}
		function fgCode(){
			var code = document.getElementById("confirmCode");
			var codeEr = document.getElementById("fgcodeER");

			if(code.value == ""||code.value == null){
				codeEr.textContent = 'Code is required';
	            codeEr.style = "color: red;";
	            code.style.border = "1px solid red";
	            code.focus();
	            return false;
			}else{

				if(window.XMLHttpRequest)
				{
	              	xmlhttp=new XMLHttpRequest();
	            }else
	            {
	              	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	            }
	            xmlhttp.onreadystatechange = function(){
	              	if (this.readyState==4 && this.status==200){

              			if(this.responseText == "VAILDCODE"){
              				document.getElementById("slide-9-trigger").checked = true;
              			}else{
							codeEr.textContent = 'Code is Invalid, Please try again!';
				            codeEr.style = "color: red;";
				            code.style.border = "1px solid red";
				            code.focus();
              			}
              		}
	          	}
	            xmlhttp.open("GET","/php/forgotpass/checkCode.php?email="+forgotPassEmail+"&code="+code.value,true);
	            xmlhttp.send();
			}
		}
	</script>
</head>
<body>
	<input id="slide-1-trigger" type="radio" name="slides" checked>
	<section class="slide slide-one">
	<div class="container">
		<form>
			<img id="logo" src="images/Coach-Logo.png" title="Halesowen Coach Tracker">
			<div class="inputBox">
				<input type="text" id="usernameInput" name="username" placeholder="Username">
				<div id="nameEr"></div>
			</div>
			<div class="inputBox">
				<input type="password" id="passInput" name="pass" placeholder="Password">
				<div id="passEr"></div>
			</div>
			<div>
				<label for="slide-6-trigger" class="forgotPass">Forgot Password</label>
			</div>
			<div class="buttonWrapper">
				<label for="slide-2-trigger" class="button">Sign Up</label>
				<input type="submit" onclick="validateLogin()" class="button" value="Login" >
			</div>
		</form>
	</div>
	</section>
	<input id="slide-2-trigger" type="radio" name="slides">
		<section class="slide slide-two">

		<div class="container">
			<img id="logo" src="images/signup_logo.png" title="Halesowen Coach Tracker">
			<div class="inputBox">
				<input type="text" id="fnameInput" name="fname" placeholder="Firstname">
				<div id="fnameEr"></div>
			</div>
			<div class="inputBox">
				<input type="text" id="lnameInput" name="lname" placeholder="Lastname">
				<div id="lnameEr"></div>
			</div>
			<div class="inputBox">
				<input type="text" id="unameInput" onkeyup="checkUsername(this.value)" name="uname" placeholder="Username">
				<div id="unameEr"></div>
			</div>
			<div class="inputBox">
				<input type="password" id="passwordInput" name="password" placeholder="Password">
				<div id="passwordEr"></div>
			</div>
			</br></br>
			<label for="slide-1-trigger" class="button">Back</label>
			<label onclick="return checkFirstUserInfoBox()" for="slide-3-trigger" class="button">Next</label>
		</div>
	</section>

	<input id="slide-3-trigger" type="radio" name="slides">
	<section class="slide slide-three">
		<div class="container">
	 			<img id="logo" src="images/signup_logo.png" title="Halesowen Coach Tracker">

				<div class="inputBox">
					<input type="text" onkeyup="checkCollegeid(this.value)" id="sIDinput" name="sID" placeholder="StudentId" maxlength="8">
					<div id="sIDEr"></div>
				</div>
				<div class="inputBox">
					<input type="text" id="routeIDInput" name="routeid" placeholder="RouteID" required>
					<div id="routeIDEr"></div>
				</div>
				<div class="inputBox">
					<input type="text" onkeyup="checkEmail(this.value)" id="emailInput" name="email" placeholder="Email" required>
					<div id="emailEr"></div>
				</div>
				</br></br>
				<label for="slide-2-trigger" class="button">Back</label>
				<label onclick="return checkLastUserInfoBox()" for="slide-4-trigger" class="button">Finish</label>
	 	</div>
	</section>

	<input id="slide-4-trigger" type="radio" name="slides">
	<section class="slide slide-four">
		<div class="container">
 			<img id="logo" src="images/Mail.png" title="Halesowen Coach Tracker">
			<div class="confirm">
				<h1>Please Chcek your email for a confirmation link!</h1>
			</div>
			<label for="slide-1-trigger" class="button">Login</label>
	 	</div>
	</section>

	<input id="slide-5-trigger" type="radio" name="slides">
	<section class="slide slide-five">
		<div class="container">
 			<img id="logo" src="images/Coach-Logo.png" title="Halesowen Coach Tracker">
			<div class="incorrect">
				<h1>The Detials your entered are incorrect!</h1>
			</div>
			<label for="slide-1-trigger" class="button">Try Again</label>
	 	</div>
	</section>
	
	<input id="slide-6-trigger" type="radio" name="slides">
	<section class="slide slide-six">
		<div class="container">
 			<img id="logo" src="images/Coach-Logo.png" title="Halesowen Coach Tracker">
			<h1>Forgot Password</h1>
			<input type="email" id="fgemail" name="emailInput" placeholder="Enter Email">
			<div id="fgPassEr"></div>
			<input type="button" class="button" onclick="forgotpass()" name="fgpassbtn" value="Submit">
			<label for="slide-1-trigger" class="button">Back</label>
	 	</div>
	</section>

	<input id="slide-7-trigger" type="radio" name="slides">
	<section class="slide slide-seven">
		<div class="container">
 			<img id="logo" src="images/Coach-Logo.png" title="Halesowen Coach Tracker">
			<div class="incorrect">
				<h1>An error occoured please try again</h1>
			</div>
			<label for="slide-1-trigger" class="button">Try Again</label>
	 	</div>
	</section>

	<input id="slide-8-trigger" type="radio" name="slides">
	<section class="slide slide-eight">
		<div class="container">
 			<img id="logo" src="images/Mail.png" title="Halesowen Coach Tracker">
			<h1>A Code has been sent to your email please enter the code found in the email</h1>
			<input type="number" id="confirmCode" name="confirmCode" placeholder="Enter Code">
			<div id="fgcodeER"></div>
			<label for="slide-1-trigger" class="button">back</label>
			<input type="button" class="button" onclick="fgCode()" name="fgpasscode" value="enter">
	 	</div>
	</section>

	<input id="slide-9-trigger" type="radio" name="slides">
	<section class="slide slide-nine">
		<div class="container">
 			<img id="logo" src="images/Coach-Logo.png" title="Halesowen Coach Tracker">
				<h1>Please Enter your new password!</h1>
				<input type="password" id="passone" name="passones" placeholder="Enter Password">
				<input type="password" id="passtwo" name="passtwos" placeholder="Re Enter Password">
				<div id="fgpassER"></div>
			<label for="slide-1-trigger" class="button">back</label>
			<input type="button" class="button" onclick="changePass()" name="fgpasscode" value="enter">
			
	 	</div>
	</section>

	<input id="slide-10-trigger" type="radio" name="slides">
	<section class="slide slide-ten">
		<div class="container">
 			<img id="logo" src="images/Coach-Logo.png" title="Halesowen Coach Tracker">
				<h1>Password Has Been Changed</h1>
				<p>Your Password has been changed, please click login to login</p>
			<label for="slide-1-trigger" class="button">Login</label>
	 	</div>
	</section>

<script src="/js/validateLogin.js"/></script>
<script src="/js/validateSignUp.js"/></script>
</body>
</html>