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
<!DOCTYPE html> 
<html>
<head>
	<title>Add Supervisor</title>
	<link rel="stylesheet" href="/css/stylehome.css"/>
	<link rel="icon" type="image/gif/png" href="/images/Coach-Logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable=no">
</head>
<body>
	<?php include 'navbar.php' ?>
    <?php include 'navbar2.php' ?>
	<div class="wrapper">
		<div class="container">
			<form method="POST" action="signupSupervisor.php" name="signupForm">

				<img id="logo" src="images/signup_logo.png" title="Halesowen Coach Tracker" required>

				<div class="inputBox">
					<input type="text" id="fnameInput" name="fname" placeholder="Firstname" required>
					<div id="fnameEr"></div>
				</div>
				<div class="inputBox">
					<input type="text" id="lnameInput" name="lname" placeholder="Lastname" required>
					<div id="lnameEr"></div>
				</div>
				<div class="inputBox">
					<input type="text" id="unameInput" name="uname" placeholder="Username" required>
					<div id="unameEr"></div>
				</div>
				<div class="inputBox">
					<input type="password" id="passwordInput" name="password" placeholder="Password" required>
					<div id="passwordEr"></div>
				</div>
				<div class="inputBox">
					<input type="text" id="sIDinput" name="sID" placeholder="Staff ID" required>
					<div id="sIDEr"></div>
				</div>
				<div class="inputBox">
					<input type="text" id="emailInput" name="email" placeholder="Email" required>
					<div id="emailEr"></div>
				</div>
				<input type="submit" class="button" value="Add" >
			</form>
		</div>
	</div>
	<script src="/js/open.js"></script>
</body>
</html>