<?php 
	session_start();
	include '../../dbp.php';

	$username = $_GET['us'];
	$username = $conn->real_escape_string($username);

	$sql = "SELECT * FROM ctuser WHERE username='$username' ";
	$result = mysqli_query($conn,$sql); 

	$nrows = mysqli_num_rows($result);

	if($nrows <= 0){
		echo("NOTTAKEN");
	}else{
		echo("TAKEN");
	}
?>