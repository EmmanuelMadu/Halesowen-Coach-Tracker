var route;
var title;
var minTimeToCol;
function routeDisplay(routeR,stopnumber) {
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    }else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status==200) {
          if(this.responseText == "NOTRUNNING"){ // returns if the coach is currently being tracked or not 
              document.getElementById("dis").innerHTML="THIS COACH IS NOT RUNNING";
          }else{
            //if the coach is being tracked sends the data off to calulated method
            calculate(JSON.parse(this.responseText)[0],JSON.parse(this.responseText)[1],JSON.parse(this.responseText)[2],JSON.parse(this.responseText)[3]);
             route = routeR;
             title = JSON.parse(this.responseText)[5];
          }
       }
    }
    xmlhttp.open("GET","../../php/coach/getCoachLocA.php?q="+routeR+"&p="+stopnumber,true); //sends data to php page to get response
    xmlhttp.send();
}
function display(dur,durCollege,dis){
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    }else{
      xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (this.readyState==4 && this.status==200) {
          document.getElementById("dis").innerHTML=this.responseText;
        }
    }
    var _title = replaceStr(title);
    var duration = replaceStr(dur);
    var durCo = durCollege.replace(" min","");
    var timeAtCol = new Date();
    var h = timeAtCol.getHours();
    var m = timeAtCol.getMinutes() + parseInt(durCo);
    m = checkTime(m);
    var time = h+":"+m;
    var hArrived = "NO";

    var url = "../../php/coach/displayCoachInformation.php?r="+route+"&t="+_title+"&a="+hArrived+"&d="+duration+"&c="+time;
    //sends data of to php page to get it formatted
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
function replaceStr(str){
    return str.replace(" ", "%20"); //replaces all spaces with %20
}
function addToTime(min){
    var currentTime = new Date();
    currentTime.setMinutes(currentTime.getMinutes() + min);
    return currentTime; // adds to the time
}
//checkTime(i) adds a 0 infront of times! eg 01:00
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}