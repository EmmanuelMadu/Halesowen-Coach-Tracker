<?php
	session_start();
    include '../../dbp.php';

    if((isset($_SESSION['sesh_fname'])&& isset($_SESSION['sesh_tou']))){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }

    $stopid = $_GET['q'];
    $stopid = $conn->real_escape_string($stopid);
    $sql = "SELECT * FROM stop WHERE StopID = '$stopid' ";
    $result = mysqli_query($conn,$sql);

 	$table = '<form method="POST" action="/php/stops/changeStop.php"><div class="center">'; // creating a form
	while($row = mysqli_fetch_assoc($result)){
        // adds text boxes for every attribute of the stop table and sets it to the current value in the database
		$table .= '<div id="inputBoxes">'.
                    '<input type="text" id="sID" name="stopid" class="hide" readonly="yes" value="'.$row['StopID'].'">'.
                    'Route: <input type="text" id="route" name="route" placeholder="Route" value="'.$row['RouteID'].'"></br>'.
                    'Stopname: <input type="text" id="sName" name="sName" placeholder="Stop name" value="'.
                    $row['Stopname'].'"></br>'.
					'<input type="text" id="lat" name="lat" placeholder="Latitude" readonly="yes" value="'.$row['Latitude'].'"></br>'.
                    '<input type="text" id="long" name="long" placeholder="Longitude" readonly="yes" value="'.$row['Longitude'].'">'.
                    '<input type="submit" class="button" name="enter" value="submit">'.
                  '</div>'.
                  // adds map but hidden upon load until button is clicked
                    '<div class="mapEdit">
                        <div class="b" id="editMap"></div>
                    </div>
                    <a id="mapClick" class="buttonView" onclick="loadMap()">load Map</a>';
	}  
    $table .= '</div></form>';
	echo($table);
?>