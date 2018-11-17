<?php 
	session_start();
    include '../../dbp.php';
    // ensures sessions have been created
    if(isset($_SESSION['sesh_tou'])){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }
    $route = $_GET['r']; // stands for route
    $route = $conn->real_escape_string($route);


    $sql = "INSERT INTO `stop`( `Routeid`) VALUES ('$route')"; // enters route into database
    // sql statement will add stop to database
    if(mysqli_query($conn,$sql)){
        $_SESSION['msg'] = 'Successfully added A new Route called'.$route.'';
        header("Location: ../../congrats.php"); //sends user to congrats page
    }else{
        echo("Could not input data into the database !");
    }
?>