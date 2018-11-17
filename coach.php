<!DOCTYPE HTML>
<?php
    session_start();
    include 'dbp.php';

    if(!(isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        header("Location: index.php");
        exit;
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, user-scalable = no">
        <?php echo '<title>'. $_SESSION['sesh_coachid']."'s Timetable" . '</title>';?> 
        <link rel="stylesheet" href="/css/stylehome.css"/>
        <link rel="icon" type="image/gif/png" href="/images/Coach-Stop.png">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAm7oKIr-5Znyhg5vSgOoAD4YqtJY42Mqk" async defer></script>
        <script src="/js/duration.js"></script>
        <script src="/js/track/CalculateTime.js"></script>
    </head>
    
    <body>
        <?php include 'navbar.php' ?>
        <?php include 'navbar2.php' ?>

        <div id= "wrapper" >
            <div id="busStop">
                 <img src="/images/Coach-Stop.png">
            </div>
            <div class="oHolder">
                <div id = "timeline" >
                    <section class="time">
                        <p class="label">Timeline</p>
                        
                        <?php
                            $route = $_SESSION['sesh_coachid'];
                            $sql = "SELECT * FROM `route` WHERE routeid = '$route'";
                            $result = mysqli_query($conn,$sql);

                            if($row = mysqli_fetch_assoc($result)){
                                $printu = '<ul> ';
                                $stops = explode(":", $row['stops']);
                                $stopnumber = 0;
                                foreach ($stops as $stop) {
                                    $stopnumber++; // increases the stopnumber at the start of everyloop
                                    $sql2 = "SELECT * FROM `stop` WHERE stopid = '$stop'"; //search for stop data
                                    $result2 = mysqli_query($conn,$sql2);//query the sql statement to get stop data
                                    if($row2 = mysqli_fetch_assoc($result2)){// if the stop exists
                                        $printu .= '
                                            <li>
                                                <div>
                                                    <a class="clickedStop" onclick="routeDisplay('.$route.','.$stop.')'
                                                    .'">'.$row2['Stopname']
                                                .'</a>
                                                </div>
                                            </li>';
                                    }
                                }
                                $printu .= "</ul>";
                            }
                            echo ($printu);
                        ?>
                    </section>
                </div>
                <div id = "routeinfo" >
                    <p class="labelP">Info</p>
                    <div class="routeData">
                        <div id="dis" >Click a Stop to get travel data on that Stop!</div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/js/open.js"></script>

    </body>

</html>
