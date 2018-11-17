	// First page
	var firstn = document.getElementById("fnameInput");
    var lastn = document.getElementById("lnameInput");
    var uname= document.getElementById("unameInput");
    var pass = document.getElementById("passwordInput");
    // second Page
    var sID = document.getElementById("sIDinput");
    var routeID = document.getElementById("routeIDInput");
    var email = document.getElementById("emailInput");

    var fistnEr = document.getElementById("fnameEr");
    var lastnEr = document.getElementById("lnameEr");
    var unameEr = document.getElementById("unameEr");
    var passEr = document.getElementById("passwordEr");

	var sidEr = document.getElementById("sIDEr");
	var routeEr = document.getElementById("routeIDEr");
	var emailEr = document.getElementById("emailEr");

    firstn.addEventListener("blur", fnameVerify, true);
    lastn.addEventListener("blur", lnameVerify, true);
    uname.addEventListener("blur", unameVerify, true);
    pass.addEventListener("blur", passVerify, true);
    sID.addEventListener("blur", studentVerify, true);
    routeID.addEventListener("blur", routeVerify, true);
    email.addEventListener("blur", emailVerify, true);

    firstn.addEventListener("focus", clickFirstname, true);
    firstn.addEventListener("focusout", unClickFirstname);

    lastn.addEventListener("focus", clickLastname, true);
    lastn.addEventListener("focusout", unClickLastname);
    
    uname.addEventListener("focus", clickUsername, true);
    uname.addEventListener("focusout", unClickUsername);
    pass.addEventListener("focus", clickPassword, true);
    pass.addEventListener("focusout", unClickPassword);
    sID.addEventListener("focus", clickStudentID, true);
    sID.addEventListener("focusout", unClickStudentID);
    routeID.addEventListener("focus", clickRoute, true);
    routeID.addEventListener("focusout", unClickRoute);
    email.addEventListener("focus", clickEmail, true);
    email.addEventListener("focusout", unClickEmail);

    function fnameVerify(){
        if (firstn.value != "") { // if the firstname field is empty  make the border red
            fistnEr.innerHTML = "";
            firstn.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function lnameVerify(){// if the lastname field is empty  make the border red
        if (lastn.value != "") {
            lastnEr.innerHTML = "";
            lastn.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function unameVerify(){// if the username field is empty  make the border red
        if (uname.value != "") {
            unameEr.innerHTML = "";
            uname.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function passVerify(){// if the password field is empty  make the border red
        if (pass.value != "") {
            passEr.innerHTML = "";
            pass.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function studentVerify(){// if the studentid field is empty  make the border red
        if (sID.value != "") {
            sIDEr.innerHTML = "";
            sID.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function routeVerify(){
        if (routeID.value != "") {// if the routeid field is empty  make the border red
            routeEr.innerHTML = "";
            routeID.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function emailVerify(){
        if (email.value != "") {// if the email field is empty  make the border red
            emailEr.innerHTML = "";
            email.style.border = "1px solid #110E0F";
            return true;
        }
    }
    // Clicking the input boxes
    function clickFirstname() {
        firstn.style.background = "#81689C";
    }
    function clickLastname() {
        lastn.style.background = "#81689C";
    }
    function clickUsername() {
        uname.style.background = "#81689C";
    }
    function clickPassword() {
        pass.style.background = "#81689C";
    }
    function clickStudentID() {
        sID.style.background = "#81689C";
    }
    function clickRoute() {
        routeID.style.background = "#81689C";
    }
    function clickEmail() {
        email.style.background = "#81689C"; // 
    }
    // unClicking the input boxes
    function unClickFirstname() {
       firstn.style.background = ""; // remove error message onece text box has been clicked
    }
    function unClickLastname() {
       lastn.style.background = ""; // remove error message onece text box has been clicked
    }
    function unClickUsername() { 
       uname.style.background = "";// remove error message onece text box has been clicked 
    }
    function unClickPassword() {
       pass.style.background = ""; // remove error message onece text box has been clicked
    }
    function unClickStudentID() {
       sID.style.background = ""; // remove error message onece text box has been clicked
    }
    function unClickRoute() {
       routeID.style.background = ""; // remove error message onece text box has been clicked
    }
    function unClickEmail() {
       email.style.background = ""; // remove error message onece text box has been clicked
    }