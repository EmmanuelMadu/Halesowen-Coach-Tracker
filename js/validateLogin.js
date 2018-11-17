
    var un = document.getElementById("usernameInput");
    var pa = document.getElementById("passInput");

    var nameEr = document.getElementById("nameEr");
    var passEr = document.getElementById("passEr");

    un.addEventListener("blur", nameVerify, true);
    pa.addEventListener("blur", passVerify, true);

	un.addEventListener("focus", clickUsername, true);
    un.addEventListener("focusout", unClickUsername);
    pa.addEventListener("focus", clickPassword, true);
    pa.addEventListener("focusout", unClickPassword);

    function validateLogin(){
        var un = document.getElementById("usernameInput");
        var pa = document.getElementById("passInput");

        var nameEr = document.getElementById("nameEr");
        var passEr = document.getElementById("passEr");

        if(un.value == ""||un.value == null ){ // if the username value is empty or null display an error message
            nameEr.textContent = "Username is required";
            nameEr.style = "color: red;";
            un.style.border = "1px solid red";
            un.focus();
            return false;
        }else if(pa.value == ""||pa.value == null){ // if the password value is empty or null display an error message
            passEr.textContent = "Password is required";
            passEr.style = "color: red";
            pa.style.border = "1px solid red";
            pa.focus();
            return false;
        }else{
            login();
            return true;
        }
    }
    function nameVerify(){
        if (un.value != ""){
            nameEr.innerHTML = "";
            un.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function passVerify(){
        if (pa.value != "") {
            passEr.innerHTML = "";
            pa.style.border = "1px solid #110E0F";
            return true;
        }
    }
    function clickUsername() {
       un.style.background = "#81689C";
    }
    function clickPassword() {
       pa.style.background = "#81689C";
    }
    function unClickUsername() {
       un.style.background = "";
    }
    function unClickPassword() {
       pa.style.background = "";
    }