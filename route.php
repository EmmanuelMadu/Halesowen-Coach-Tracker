<!DOCTYPE HTML>
<?php
    session_start();
    include 'dbp.php';

    if((isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: home.php");
            exit;
        }
    }else{
        header("Location: home.php");
        exit;
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable = no">  
        <link rel="stylesheet" href="/css/stylehome.css"/>
        <link rel="icon" type="image/gif/png" href="/images/Coach-route.png">
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper">
            
            <div id="add">
                <img id="editStop" src="/images/Coach-route.png">
            </div>

            <div class="center">
                <div class="buttonHolder">
                    <button type="button" class="selectButton"><a href="addRoute.php">add Route</a></button>
                </div>
            </div>
        </div>
            
        <script src="/js/open.js"></script>

    </body>

</html>
