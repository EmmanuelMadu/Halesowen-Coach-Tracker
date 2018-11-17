<!DOCTYPE HTML>
<?php
    session_start();
    include 'dbp.php';

    if(isset($_SESSION['sesh_tou'])){
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

        <div id= "wrapper" >
            <div class="title">
            	<h1>Success!</h1>
            </div>
            <div class="data">
            	<?php
            		$p = '<p id="message">'.
						$_SESSION['msg'].'</p>';
					echo($p);
					unset($_SESSION['msg']);
            	?>
            </div>
            <div class="wrapperButton">
            	<button type="button" class="button"><a href="http://coachtracker.pw/stops.php">Back</a></button>
            </div>
        </div>
        <script src="/js/open.js"></script>

    </body>

</html>
