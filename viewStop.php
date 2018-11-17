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
        <link rel="stylesheet" href="/css/stylehome.css"/>
        <link rel="icon" type="image/gif/png" href="/images/addStop.png">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
           function serachStops(str) {
              if (str=="") {
                document.getElementById("tableInput").innerHTML="";
                return;
              } 
              if (window.XMLHttpRequest) {
                xmlhttp=new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function() {
                if (this.readyState==4 && this.status==200) {
                  document.getElementById("tableInput").innerHTML=this.responseText;
                }
              }
              xmlhttp.open("GET","/php/stops/viewStopTable.php?q="+str,true);
              xmlhttp.send();
            } 
        </script>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper">
            <div id="add">
                <img id="editStop" src="/images/addStop.png">
            </div>
            <div class="form">
                <form> 
                    <input class="searchBox" type="text" name="routeid" placeholder="RouteID" onkeyup="serachStops(this.value)">
                </form>
            </div>
            <div class="table">
                <div id="tableInput"><p>Please Enter A Route-ID into the textbox above!</p></div>
            </div>
            <div class="center">
            <button type="buttonView" class="button"><a href="stops.php">Back</a></button>
            </div>
        </div>
        <script src="/js/open.js"></script>

    </body>

</html>