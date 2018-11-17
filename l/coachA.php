<!DOCTYPE HTML>
<?php
    session_start();
    include 'dbp.php';

    if((isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable = no">
        <title>Coach Timetables</title> 
        <link rel="stylesheet" href="/css/stylehome.css"/>
        <link rel="icon" type="image/gif/png" href="/images/Coach-Stop.png">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm7oKIr-5Znyhg5vSgOoAD4YqtJY42Mqk" async defer></script>

        <script type="text/javascript">
            var route;
            var title;
            var minTimeToCol;
          function result(coach,stopnumber) {
            document.getElementById("valss").innerHTML="";
            if (window.XMLHttpRequest) {
              xmlhttp=new XMLHttpRequest();
            }else{
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
              if (this.readyState==4 && this.status==200) {
                  calculate(JSON.parse(this.responseText)[0],JSON.parse(this.responseText)[1],JSON.parse(this.responseText)[2],JSON.parse(this.responseText)[3]);
                  route = JSON.parse(this.responseText)[4];
                  title = JSON.parse(this.responseText)[5];
                }
              }
              xmlhttp.open("GET","/php/coach/getCoachLocA.php?q="+coach+"&p="+stopnumber,true);
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
                var hArrived = "FALSE";
                var url = "/php/coach/displayCoachInformation.php?r="+route+"&t="+_title+"&a="+hArrived+"&d="+duration+"&c="+time;
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
            function serachStops(str) {
                if (str==""){
                    document.getElementById('dis').innerHTML = "Click a Stop to get travel data on that Stop!";
                  document.getElementById('oholder').style.display = 'none';
                  document.getElementById('oholder').style.visibility = 'none';
                  return;
                } 
                if (window.XMLHttpRequest) {
                  xmlhttp=new XMLHttpRequest();
                } else { // code for IE6, IE5
                  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                  if (this.readyState==4 && this.status == 200) {
                        document.getElementById('oholder').style.display = 'block';
                        document.getElementById('oholder').style.visibility = 'visible';
                        document.getElementById("timeTable").innerHTML = this.responseText;
                    }
                  }
                  xmlhttp.open("GET","/php/coach/getCoachTimeTable.php?q="+str,true);
                  xmlhttp.send();
            }
        </script>
        <script src="/js/stop.js"></script>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper" >
            <div id="busStop">
                 <img src="/images/Coach-Stop.png">
            </div>
            <div class="form">
                <input class="searchBox" type="text" name="routeid" placeholder="Enter RouteID" onkeyup="serachStops(this.value)">
            </div>
            <div id="oholder" class="oHolder">
                <div id = "timeline" >
                    <section class="time">
                        <p class="label">Timeline</p>
                        <div id="timeTable"></div>
                    </section>
                </div>
                <div id = "routeinfo" >
                    <p class="labelP">Info</p>
                    <div class="routeData">
                        <div id="dis" >Click a Stop to get travel data on that Stop!</div>
                    </div>
                </div>
            </div>
            <div id="valss"></div>
        </div>
        <script src="/js/duration.js"></script>
        <script src="/js/open.js"></script>

    </body>

</html>
