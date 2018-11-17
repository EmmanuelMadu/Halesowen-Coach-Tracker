<?php
	session_start();
	include 'dbp.php';

	$fname = $_GET['fn'];
	$lname = $_GET['ln'];
	$username = $_GET['un'];
	$password = $_GET['pa'];
	$studentid = $_GET['sid'];
	$routeid = $_GET['rid'];
	$email = $_GET['em'];

	$fname = $conn->real_escape_string($fname);
	$lname = $conn->real_escape_string($lname);
	$username = $conn->real_escape_string($username);
	$password = $conn->real_escape_string($password);
	$studentid = $conn->real_escape_string($studentid);
	$routeid = $conn->real_escape_string($routeid);
	$email = $conn->real_escape_string($email);

	$confirmcode = rand();
	$encryptedPass = md5($password);
	$encryptedCode = md5($confirmcode);

	if($fname == null|| $fname == "" ||$lname == null|| $lname == ""||$username == null|| $username == ""||$password == null|| $password == ""||$studentid == null|| $studentid == ""||$routeid == null|| $routeid == ""||$email == null|| $email == ""){
		echo("NULLDETAILS");
		exit;
	}
	$result = mysqli_query($conn,$sql);
	$sql = "INSERT INTO ctuser (firstname,lastname,username,password,collegeid,routeid,email,tou,confirmed,confirmcode)
 VALUES ('$fname','$lname','$username','$encryptedPass','$studentid','$routeid','$email','Student','0','$encryptedCode')";

	$result = mysqli_query($conn,$sql); 

	$message ="Hi ".$fname.",\n"."
	You're almost done with the signup process \n
	Click the link below to verify your account \n
	http://www.coachtracker.pw/emailconfirm.php?us=$username&c=$encryptedCode"."\n";

	$headers = "From: DoNotReply@coachtracker.pw";

	if(mail($email,"Halesowen Coach Tracker Confirmation Email",$message,$headers)){
		header("Location: index.php");
	}else{
		echo("MAILNOTSENT");
	}
	
	exit;
	

?>