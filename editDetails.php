<!DOCTYPE HTML>
<?php
    session_start();
    include 'dbp.php';

   if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        header("Location: index.php");
        exit;
    }
?>

<html>
    <head>
    	<title>Details</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable = no">  
        <link rel="stylesheet" href="/css/stylehome.css"/>
        <link rel="icon" type="image/gif/png" href="/images/addStop.png">
        <script type="text/javascript">

            function changeEmail(){
                document.getElementById('changeEmail').style.display = 'block';
                document.getElementById('changeEmail').style.visibility = 'visible';
                hideCoach();
            }
            function hideEmail(){
                document.getElementById('changeEmail').style.display = 'none';
                document.getElementById('changeEmail').style.visibility = 'none';
            }
        </script>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper" >
            <div id="add">
                <img id="editStop" src="/images/editDetials.png">
            </div>
            <div class="editDetailsHolder">
                <div id="emailH">
                	<div id="Details">
                		<p>EMAIL</p>
                		<?php echo '<input type="email" name="email" readonly="yes" value='.$_SESSION['sesh_mail'].'>'; ?>
                	</div>
                	<div id="detailsButton">
                		<button type="button" class="button" onclick="changeEmail()" >Change Email</button>
                	</div>
                </div>
                <div id="changeEmail">
                    <form method="POST" action="php/email/changeEmailAction.php" >
                        <input id="em" type="email" name="email" placeholder="Please Enter A New Email" required>
                        <button type="submit" class="button">Change</button>
                    </form> 
                </div>
            </div>
        </div>
        <script src="/js/open.js"></script>

    </body>

</html>