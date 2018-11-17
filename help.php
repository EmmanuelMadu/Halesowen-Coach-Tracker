<!DOCTYPE HTML>

<?php
    session_start();

    if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        header("Location: index.php");
        exit;
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">

        <?php echo '<title>'. $_SESSION['sesh_fname'] . ' ' . $_SESSION['sesh_lname'] . '</title>';?> 
           
        <link rel="stylesheet" href="/css/stylehome.css"/>
        <link rel="icon" type="image/gif/png" href="/images/Coach-Logo.png">

    </head>
    
    <body>
        <div class="mainWrapper">
            <?php include 'navbar.php' ?>
            <?php include 'navbar2.php' ?>
            <div class="wrapper">
				<p>Please Contact the admin for help with the system at admin@coachtracker.pw </p>
            </div>           
            <script src="/js/open.js"></script>
        </div>
        <div class="footer">
            <p>Halesowen College &#169; </p>
        </div>
    </body>


</html>
