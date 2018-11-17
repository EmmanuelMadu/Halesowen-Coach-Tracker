<?php
    session_start();
    include '../../dbp.php';

    if(isset($_SESSION['sesh_tou'])){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }

	$stopname = $_POST['sName'];
	$latitude = $_POST['lat'];
	$longitude = $_POST['long'];

	$stopname = $conn->real_escape_string($stopname);
	$latitude = $conn->real_escape_string($latitude);
	$longitude = $conn->real_escape_string($longitude);

	$sql = "INSERT INTO `stop`( `Stopname`, `Latitude`, `Longitude`) VALUES ('$stopname','$latitude','$longitude')";
    // sql statement will add stop to database
    if(mysqli_query($conn,$sql)){
        $_SESSION['msg'] = 'Successfully added A new stop for the route '.$route. ' called '.$stopname;
        header("Location: ../../congrats.php");
    }else{
        echo("Could not input data into the database !");
    }
    
?>