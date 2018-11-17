<?php
	session_start();
	include '../../dbp.php';

    if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_id']))){
        header("Location: ../../home.php");
        exit;
    }

    $userID = $_SESSION['sesh_id'];
    $newEmail = $_POST['email'];

 	$newEmail = $conn->real_escape_string($newEmail);


    
 	$sql = "UPDATE ctuser set email='$newEmail', confirmed = '0' WHERE id='$userID' "; //adds new email to the users row in the database
	$query = mysqli_query($conn,$sql);

    $sqluser = "SELECT * FROM ctuser WHERE id='$userID' ";
    $queryUser = mysqli_query($conn,$sqluser);
    
    if($row = mysqli_fetch_assoc($queryUser)){ // if the query occured then confirmation email is sent
        $code = rand();
        $encryptedCode = md5($code);
        $username = $row['username'];

        $sql = "UPDATE ctuser set confirmcode='$encryptedCode' WHERE id='$userID' ";
        $query = mysqli_query($conn,$sql);

        $message ="Hi ".$row['firstname']." ".$row['lastname'].",\n"."
         Click the link below to verify your account \n
        http://www.coachtracker.pw/emailconfirm.php?us=$username&c=$encryptedCode"."\n";

        $headers = "From: DoNotReply@coachtracker.pw";
        mail($newEmail,"Coach Tracker Email Change",$message,$headers); //sends email to the email that has been entered
        header("Location: ../../changedEmail.php"); // sends them back to the change email page
    }else{
        echo "Could not change EMAIL"; // tells the user what error has occoured
    }


	
?>
