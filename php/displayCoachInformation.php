<?php
	session_start();

    if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        header("Location: ../../home.php");
        exit;
    }
    
    $route = $_GET['r'];
    $title = $_GET['t'];
    $arrived = $_GET['a'];
    $duration = $_GET['d'];
    $timAtCol = $_GET['c'];


    $dd = '<div class="holder">
        <p class="routeT">'.$route.'</p>
        <p class="routeTitle">'.$title.'</p>
        <div class="inner">
            <p class="rL">Has Arrived:<span class="routeR">'.$arrived.'</span></p>
            <p class="rL">Due To Arrive:<span class="routeR">'.$duration.'</span></p>
            <p class="rL">Time Due at College:<span class="routeR">'.$timAtCol.'</span></p>
        </div>
    </div>';

    echo($dd);
?>