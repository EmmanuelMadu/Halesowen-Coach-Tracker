<?php
	session_start();
	include 'dbp.php';

	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['uname'];
	$password = $_POST['password'];
	$studentid = $_POST['sID'];
	$email = $_POST['email'];

	$fname = $conn->real_escape_string($fname);
	$lname = $conn->real_escape_string($lname);
	$username = $conn->real_escape_string($username);
	$password = $conn->real_escape_string($password);
	$studentid = $conn->real_escape_string($studentid);
	$email = $conn->real_escape_string($email);

	$confirmcode = rand();
	$encryptedPass = md5($password);
	$encryptedCode = md5($confirmcode);

	if($fname == null|| $fname == "" ||$lname == null|| $lname == ""||$username == null|| $username == ""||$password == null|| $password == ""||$studentid == null|| $studentid == ""||$email == null|| $email == ""){
		echo("NULLDETAILS");
		exit;
	}
	$result = mysqli_query($conn,$sql);
	$sql = "INSERT INTO ctuser (firstname,lastname,username,password,collegeid,routeid,email,tou,confirmed,confirmcode)
 		VALUES ('$fname','$lname','$username','$encryptedPass','$studentid','0','$email','Supervisor','0','$encryptedCode')";

	$result = mysqli_query($conn,$sql); 

	$message ="Hi ".$fname.",\n"."
	You're almost done with the signup process \n
	Click the link below to verify your account \n
	http://www.coachtracker.pw/emailconfirm.php?us=$username&c=$encryptedCode"."\n";

	$headers = "From: DoNotReply@coachtracker.pw";

	if(mail($email,"Halesowen Coach Tracker Confirmation Email",$message,$headers)){
		if(mysqli_query($conn,$sql)){
        	$_SESSION['msg'] = 'Successfully added a new supervisor '.$firstname .'<br> Please ask them to confirm thier email to start using the system';
        header("Location: congrats.php");
    }
	}else{
		echo("MAILNOTSENT");
	}
	
	exit;
	

?>