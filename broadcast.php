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
            <h1>Broadcast Message</h1>
        </div>
        <div class="broadcastHolder">
            <form method="POST" action="/php/broadcast/sendMailTo.php">
                <div id="chooseRoute">
                    <div id="selectRoute">
                        <?php include 'php/broadcast/broadcastTo.php' ?>
                    </div>
                </div> 
                <div id="emailHolder">
                    <div class="emailTitle">
                        <input class="emailMe" type="text" name="titleE" placeholder="Title" required>
                    </div>
                    <div class="emailBody">
                        <textarea class="mess" type="text" name="messageE" placeholder="Message" required></textarea>
                    </div>
                    <div id="message"></div>
                </div>
                <div class="center">
                    <button type="submit" class="button">Send</button>
                </div>
            </form>
        </div>
    </div>
    <script src="/js/open.js"></script>
</body>
</html>