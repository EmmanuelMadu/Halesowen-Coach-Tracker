<!DOCTYPE HTML>
<?php
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable = no">  
    <link rel="stylesheet" href="/css/stylehome.css"/>
    <title>Email not verified</title>
    <link rel="icon" type="image/gif/png" href="/images/Coach-Logo.png">
</head>
<body>
    <div class="wrapper">
        <div class="center">
            <img id="editStop" src="/images/Coach-Logo.png">
        </div>

        <div class="title">
            <h1>verify Email!</h1>
        </div>

           
        <div class="data">
        <?php echo '<p id="message">Your Email "'.$_SESSION['sesh_mail'].'" has not been verified please check your inbox or spam folder for a verification Email</p>
        </div>'; ?>
        <div class="wrapperButton">
            <button type="button" class="button"><a href="php/resend.php">Resend Email</a></button>
            <button type="button" class="button"><a href="changeEmail.php">Change Email</a></button>
        </div>';

    </div>
</body> 
</html>