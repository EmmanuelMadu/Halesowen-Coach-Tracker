<?php
	session_start();
    include '../../dbp.php';

    if((isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: ../../home.php");
            exit;
        }
    }else{
        header("Location: ../../home.php");
        exit;
    }
    if(isset($_POST['selected']) && is_array($_POST['selected']) && count($_POST['selected']) > 0){
    	foreach($_POST['selected'] as $del){
    		$del = $conn->real_escape_string($del);
    		$sql = 'DELETE FROM stop WHERE StopID ="'.$del.'"';
    		$result = mysqli_query($conn,$sql);
    	}
	}
	header("Location: ../../deleteStop.php");
	
?>