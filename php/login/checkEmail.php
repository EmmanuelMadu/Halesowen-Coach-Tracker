<?php 
	session_start();
	include '../../dbp.php';

	$email = $_GET['em'];
	$email = $conn->real_escape_string($email);

	$sql = "SELECT * FROM ctuser WHERE email='$email' ";
	$result = mysqli_query($conn,$sql); 
	
	$nrows = mysqli_num_rows($result);

	if($nrows <= 0){
		echo("NOTTAKEN");
	}else{
		echo("TAKEN");
	}
?>