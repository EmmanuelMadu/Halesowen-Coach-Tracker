<?php
	session_start();
	include '../../dbp.php';
	
    $email = $_GET['em']; // gets the email
    $email = $conn->real_escape_string($email);

    $sql = "SELECT * FROM ctuser WHERE email='$email'";
	$result = mysqli_query($conn,$sql);

	if ($row = mysqli_fetch_assoc($result)) {
	    if($row['confirmed'] == 1){
			$code = rand();
			$encryptedCode = md5($code);
			$fname = $row['firstname'];

			$sql2 = "UPDATE ctuser set confirmcode='$encryptedCode' WHERE email='$email'";
			$result2 = mysqli_query($conn,$sql2);

			$message = '<html><body>';
			$message .= '<p style="font-weight: bold;">Hey '.$fname.',</p>
			<p>You recently requested for a password change</br>
			If you did not send this request please ignore this email</br>
			if you did please use the following code to change your password </p>
			<p style="font-weight:bold; color:green;"> CODE: <span style="color:red;">'.$code.'</span></p> ';
			$message .= '</body></html>';

			$headers = "From: DoNotReply@coachtracker.pw\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	        mail($email,"Coach Tracker Password Change",$message,$headers);
	        echo "MAILSENT";
		}else{
			echo "NOTCONFIRMEDACCOUNT";
		}
	}else{
		echo("INVALID");
    }
?>