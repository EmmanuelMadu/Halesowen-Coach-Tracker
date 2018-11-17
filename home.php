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
            <div class="slider">
                <figure>
                    <div class="slide">
                        <img src="/images/homeBackground/freeColBusService.png">
                    </div>
                    <div class="slide">
                         <img src="/images/homeBackground/welcome.png">
                    </div>
                    <div class="slide">
                        <img src="/images/homeBackground/openDays.png">
                    </div>
                    <div class="slide">
                        <img src="/images/homeBackground/50Years.png">
                    </div>
                </figure>
            </div>
            <div class="bodyText">
                <h2>Our free express coaches bring students to College from a wide range of areas.</h2>

                <p>
                    The buses are free and come directly to College. 

                    Our bus routes are constantly under review so that we can offer the best possible service to our students. With more routes than ever before there's a good chance that you'll be able to take advantage of the free service.

                    The free College bus service operates at the beginning and end of each College day and at lunchtime.
                </p>
                <p>
                    The issuing of an Express Bus Card is subject to availability of places and conditions relating to your attendance and conduct. Priority is given to students who live more than 3 miles away from College. 
                </p>
            </div>
            <script src="/js/open.js"></script>
        </div>
        <div class="footer">
            <p>Halesowen College &#169; </p>

        </div>
    </body>


</html>
