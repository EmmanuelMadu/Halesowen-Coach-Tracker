<?php
    session_start();
    include '../../dbp.php';

    if(isset($_SESSION['sesh_tou'])){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: ../../home.php");
            exit;
        }
    }else{
        header("Location: ../../home.php");
        exit;
    }

    $stopid = $_POST['stopid'];
    $sName = $_POST['sName'];
    $latitude = $_POST['lat'];
    $longitude = $_POST['long'];

    $stopid = $conn->real_escape_string($stopid);
    $sName = $conn->real_escape_string($sName);
    $latitude = $conn->real_escape_string($latitude);
    $longitude = $conn->real_escape_string($longitude);
    
    $sql = "UPDATE `stop` SET `Stopname`='$sName',`Latitude`='$latitude',`Longitude`='$longitude' WHERE `StopID`='$stopid'";
    // updates stops
    $result = mysqli_query($conn,$sql); 
    header("Location: ../../editStops.php");
    exit;
?>