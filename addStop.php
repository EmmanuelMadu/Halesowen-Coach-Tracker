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
        <title>Add Stop</title>
        <link rel="icon" type="image/gif/png" href="/images/addStop.png">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm7oKIr-5Znyhg5vSgOoAD4YqtJY42Mqk&callback=initMap" async defer></script>
        <script type="text/javascript" src="/js/validateAddStop.js"></script>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper" >
            <div id="add">
                <img id="editStop" src="/images/addStop.png">
            </div>
            <div class="form">
                <form method="POST" action="/php/stops/addStop.php" onsubmit="return validateAddStop()" name="addStop">
                    <div class="inputBox">
                        <label for="stopName" class="lab">Stop Name</label>
                        <input type="text" id="stopName" name="sName" placeholder="Stop Name">
                        <div id="stopNameEr"></div>
                    </div>
                    <div class="map">
                        <div class="m" id="map"></div>
                    </div>
                    <div id="inputLocation">
                        <input class="hide" type="hidden" name="lat" id="lat" readonly="yes">
                        <input class="hide" type="hidden" name="long" id="long" readonly="yes">
                        <div id="latLongEr"></div>
                    </div>
                    <div class="buttonWrapper">
                        <input type="submit" class="buttonSpecial" value="Add" >
                    </div>
                </form>
            </div>
        </div>
        <script type="text/javascript" src="/js/locPicker.js"></script>
        <script src="/js/open.js"></script>

    </body>

</html>
