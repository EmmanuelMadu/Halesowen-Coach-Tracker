<?php
    session_start();
    include '../../dbp.php';
    //ensures user has logged in to access the page
    if(isset($_SESSION['sesh_tou'])){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }

    $route = $_GET['q'];
    $route = $conn->real_escape_string($route);

    $sql = "SELECT * FROM `route` WHERE routeid = '$route'";
    $result = mysqli_query($conn,$sql);
    if($row = mysqli_fetch_assoc($result)){
        $printu = '<ul> ';
        $stops = explode(":", $row['stops']);
        foreach ($stops as $stop) {
            $sql = "SELECT * FROM `stop` WHERE stopid = '$stop'"; //search for stop data
            $result = mysqli_query($conn,$sql);//query the sql statement to get stop data
            if($row = mysqli_fetch_assoc($result)){// if the stop exists
                $printu .= '
                    <li>
                        <div>
                            <a class="clickedStop" onclick="result('.$route.','.$stop.')'
                            .'">'.$row['Stopname'].'</a></div>
                    </li>';
            }
        }
        $printu .= "</ul>";
    }
    echo ($printu);
?>