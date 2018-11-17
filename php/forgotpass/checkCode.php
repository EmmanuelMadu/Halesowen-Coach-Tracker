<?php
	session_start();
	include '../../dbp.php';

	$email = $conn->real_escape_string($_GET['email']);
    $code = $conn->real_escape_string($_GET['code']);

    $sql = "SELECT confirmcode FROM ctuser WHERE email='$email' ";
    $result = mysqli_query($conn,$sql);

    if($row = mysqli_fetch_assoc($result)){
    	if($row['confirmcode'] == md5($code)){
    		echo("VAILDCODE");
    	}else{
    		echo("INVAILDCODE");
    	}
    }
?>