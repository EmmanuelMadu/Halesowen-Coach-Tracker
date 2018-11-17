
var open = true;

function toggleOpen(){ // opens navigational bar
    if(open == true){
        openNav();
        open=false;
    }else{
        closeNav();
        open=true;
    }
}
function openNav() { // this opens the navbar by moving a bit from the left
	document.getElementById("sBar").style.left = "0px";
    document.getElementById("sBar").style.width = "35%";
    document.getElementById("main").style.marginLeft = "35%";
}

function closeNav() { // this closes the navbar by moving back to 0
    document.getElementById("sBar").style.left = "-" + (document.getElementById("sBar").style.width);
	document.getElementById("sBar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}