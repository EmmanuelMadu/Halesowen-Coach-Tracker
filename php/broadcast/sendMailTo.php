<?php 
	session_start();
    include '../../dbp.php';
    //ensures that sessions have been created 
    if(isset($_SESSION['sesh_tou'])){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }
    $title = $_POST['titleE'];
    $message = $_POST['messageE'];

    $title = $conn->real_escape_string($title); 
	$message = $conn->real_escape_string($message);

	//loops through all selected routes and sends an email to them
	if(isset($_POST['selected']) && is_array($_POST['selected']) && count($_POST['selected']) > 0){
		foreach($_POST['selected'] as $route){
			$route = $conn->real_escape_string($route);
			$sql = "SELECT email, tou FROM ctuser WHERE routeid= '$route'"; // selects all students on that route
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result)){ //sends email to all students on that route
				if($row['tou'] == "Student"){
					$email = $row['email'];
					$headers = "From: DoNotReply@coachtracker.pw";
			    	mail($email,$title,$message,$headers);
				}
			}
		}
	}else{
		header('Location: ../../broadcastTO.php'); // if error sends them back tot the same page
	}
	header('Location: ../../sent.php'); // if sent sends the user to sent page

?>