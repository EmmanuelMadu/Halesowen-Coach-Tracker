<!DOCTYPE HTML>
<?php
    session_start();
    include 'dbp.php';

    if(!(isset($_SESSION['sesh_id']))){
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
        <div id= "wrapper">
            <div class="center">
                <img id="editStop" src="/images/Mail.png">
            </div>

            <div class="title">
                <h1>Email</h1>
            </div>
            <div class="data">
                <p>Email has been resent, Please check your inbox or spam folder</p>
                <button class="button"><a href="logout.php">Logout</a></button>
                </form>
            </div>
        </div>
    </body>

</html>