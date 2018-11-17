<!DOCTYPE HTML>
<?php
	session_start();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">
        <title>Verified Email</title>
        <link rel="stylesheet" href="/css/style.css"/>
        <link rel="icon" type="image/gif/png" href="/images/Coach-Logo.png">
        
    </head>
    
    <body>
        <div class="container">
            <img id="logo" src="images/Mail.png" title="Halesowen Coach Tracker">
             <h2>Email Verified!</h2>
            <div class="confirm">
                <?php
                echo '<h1>'."Thanks ".$_SESSION['sesh_fname']." for verifying your account!".'</h1>';
            ?>
            </div>
            <button class="button"><a href="http://www.coachtracker.pw">Login</a></button>
        </div>
    </body>
    <footer>
    
    </footer>
</html>
