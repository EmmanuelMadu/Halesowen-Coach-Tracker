<?php
	session_start();
	include '../../dbp.php';

	$email = $conn->real_escape_string($_GET['email']);
	$pass = $conn->real_escape_string($_GET['pass']);
	$encryptedPass = md5($pass);
	
	$sql = "UPDATE ctuser SET password='$encryptedPass' WHERE email='$email'";

	if(mysqli_query($conn,$sql)){
		echo("PASSWORDCHANGED");
	}else{
		echo("PASSWORDNOTCHANGED");
	}
?>