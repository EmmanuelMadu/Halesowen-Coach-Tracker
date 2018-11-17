<?php
    session_start();
    include '../../dbp.php';
    //ensures that th euser has logged in to access s the page
    if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        header("Location: ../../home.php");
        exit;
    }

    $route = $_GET['q'];
    $stopnumber = $_GET['p'];

    $route = $conn->real_escape_string($route);
    $stopnumber = $conn->real_escape_string($stopnumber);

    // this selects the coach location of the requested route and also the stop location as well
    $sql = "SELECT stop.StopID, stop.Stopname, stop.Latitude, stop.Longitude, coachlocation.latitude, coachlocation.longitude FROM stop JOIN coachlocation ON coachlocation.routeid = '$route' WHERE stop.StopID = '$stopnumber'";
    $result = mysqli_query($conn,$sql);


    if($row = mysqli_fetch_assoc($result)){// if the statment has been queryed than it is returned else it is assumed that hte coach is not running
        $array = array($row['latitude'], $row['longitude'], $row['Latitude'], $row['Longitude'],$route, $row['Stopname']);
        echo(json_encode($array));
    }else{
        echo "NOTRUNNING";
    }
    
    
?>