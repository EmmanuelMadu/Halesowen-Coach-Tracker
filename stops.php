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
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper">
            <div id="add">
                <img id="editStop" src="/images/addStop.png">
            </div>
            <div class="center">
                <div class="buttonHolder">
                    <button type="button" class="selectButton"><a href="addStop.php">add stop</a></button>
                    <button type="button" class="selectButton"><a href="editStops.php">edit stop</a></button>
                    <button type="button" class="selectButton"><a href="deleteStop.php">delete stop</a></button>
                </div>
                <button type="button" class="buttonView"><a href="viewStop.php">View All</a></button>
            </div>
        </div>
        
            
        <script src="/js/open.js"></script>

    </body>

</html>
