var route;
var title;
var minTimeToCol;
function result(routeR,stopnumber) {
    if (window.XMLHttpRequest) {
      xmlhttp=new XMLHttpRequest();
    }else{
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
      if (this.readyState==4 && this.status==200) {
          if(this.responseText == "NOTRUNNING"){
              document.getElementById("dis").innerHTML= "THIS COACH IS NOT RUNNING";
           }else{
             calculate(JSON.parse(this.responseText)[0],JSON.parse(this.responseText)[1],JSON.parse(this.responseText)[2],JSON.parse(this.responseText)[3]);
             route = routeR;
             title = JSON.parse(this.responseText)[5];
          }
       }
    }
    xmlhttp.open("GET","../../php/coach/getCoachLocA.php?q="+routeR+"&p="+stopnumber,true);
    xmlhttp.send();
}
function display(dur,dis,harr,durCollege){
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

    var url = "../../php/coach/displayCoachInformation.php?r="+route+"&t="+_title+"&a="+harr+"&d="+duration+"&c="+time;
    xmlhttp.open("GET",url,true);
    xmlhttp.send();
}
function replaceStr(str){
    return str.replace(" ", "%20");
}
function addToTime(min){
    var currentTime = new Date();
    currentTime.setMinutes(currentTime.getMinutes() + min);
    return currentTime;
}
//checkTime(i) adds a 0 infront of times!
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}