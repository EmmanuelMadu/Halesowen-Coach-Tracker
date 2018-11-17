<?php
    session_start();
    include '../../dbp.php';

    if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        header("Location: ../../home.php");
        exit;
    }

    $route = $_GET['q'];
    $stopnumber = $_GET['p'];

    $route = $conn->real_escape_string($route);
    $stopnumber = $conn->real_escape_string($stopnumber);

    $sql = "SELECT stop.StopID, stop.Stopname, stop.Latitude, stop.Longitude, coachlocation.latitude, coachlocation.longitude FROM stop JOIN coachlocation ON coachlocation.routeid = '$route' WHERE stop.StopID = '$stopnumber'";
    $result = mysqli_query($conn,$sql);


    if($row = mysqli_fetch_assoc($result)){
        $array = array($row['latitude'], $row['longitude'], $row['Latitude'], $row['Longitude'],$route, $row['Stopname']);
        echo(json_encode($array));
    }else{
        echo "NOTRUNNING";
    }
    
    
?>