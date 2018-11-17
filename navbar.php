<!-- Nav Bar -->

<div id ="sBar" class="sidebar">
    <?php

        if(isset($_SESSION['sesh_tou'])){
            if($_SESSION['sesh_tou'] == 'Supervisor'){
               echo 
               '<ul>'.'<center><h2>'.$_SESSION['sesh_fname'].' '.$_SESSION['sesh_lname'].'</h2></center>'
                    .'<li><a href="home.php">HOME</a></li>
                    <li><a href="broadcast.php">Brodcast Message</a></li>
                    <li><a href="coachA.php">COACH LOCATIONS</a></li>
                    <li><a href="help.php">HELP</a></li>
                </ul>';
            }else if($_SESSION['sesh_tou'] == 'Student'){
                echo '<ul>
                        '.'<center> <h2>'.$_SESSION['sesh_fname'].' '.$_SESSION['sesh_lname'].'</h2> </center>'.
                        '<h2 id="t1">['.$_SESSION['sesh_tou'].'Coach: '.$_SESSION['sesh_coachid'].']</h2>'.
                        '<li><a href="home.php">HOME</a></li>
                        <li><a href="coach.php"> COACH LOCATION </a></li>
                        '.'
                        <li><a href="help.php">HELP</a></li>
                     </ul>';
                $_SESSION['sesh_fname'] = $_SESSION['sesh_fname'];
                $_SESSION['sesh_tou'] = $_SESSION['sesh_tou'];
            }else{
                exit;
            }
        }else{
            header("Location: index.php");
            exit;
        }
    ?>
</div>