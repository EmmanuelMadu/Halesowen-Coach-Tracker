<?php 
	session_start();
	include '../../dbp.php';

	$collegeid = $_GET['cid'];
	$collegeid = $conn->real_escape_string($collegeid);

	$sql = "SELECT * FROM ctuser WHERE collegeid='$collegeid' ";
	$result = mysqli_query($conn,$sql); 
	
	$nrows = mysqli_num_rows($result);

	if($nrows <= 0){
		echo("NOTTAKEN");
	}else{
		echo("TAKEN");
	}
?>