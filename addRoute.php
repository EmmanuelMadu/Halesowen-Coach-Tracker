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
        <title>Route</title>
        <link rel="icon" type="image/gif/png" href="/images/Coach-route.png">
        <script src="/js/addRoute.js"></script>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper">
            <div id="add">
                <img id="editStop" src="/images/Coach-route.png">
            </div>
            <div class="purple">
                <div id="input">
                    <input id="routeid" type="text" name="routeID" placeholder="Enter New RouteID"  onkeyup="check(this.value)">
                </div>
                <button class="button">Add</button>
                <div id="error"></div>
            </div>
            <div id="message">
                
            </div>
    
        </div>
        <script src="/js/open.js"></script>

    </body>

</html>