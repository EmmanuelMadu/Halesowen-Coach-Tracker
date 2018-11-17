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
    <title>Broadcast Message</title>
    <link rel="icon" type="image/gif/png" href="/images/Coach-route.png">
</head>
<body>
    <?php include 'navbar.php' ?>
    <?php include 'navbar2.php' ?>
    <div class="wrapper">
        <div class="center">
            <img id="editStop" src="/images/Coach-route.png">
        </div>

        <div class="title">
        	<h1>Success!</h1>
        </div>
        <div class="data">
        	<p id="message">Message has been successfully sent!</p>
        </div>
        <div class="wrapperButton">
        	<button type="button" class="button"><a href="broadcast.php">Back</a></button>
        </div>

        <script src="/js/open.js"></script>
   </div>
</body> 
</html>