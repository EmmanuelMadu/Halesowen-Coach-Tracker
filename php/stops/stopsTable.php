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

    $route = $_GET['q']; // gets route from ajax call 
    $route = $conn->real_escape_string($route);
    $sql = "SELECT * FROM `route` WHERE routeid = '$route'";
    $result = mysqli_query($conn,$sql); 
    // creates a table
    $table = '<table>
                <tr id="tableTitle">
                    <th>Select</th>
                    <th>StopName</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                <tr>';
    if($row = mysqli_fetch_assoc($result)){ // if the route exists
        $stops = explode(":", $row['stops']); // splits stops up fom one string to indvidual elements
        foreach ($stops as $stop) { // loops through the array and for every indvidual stop add details of the stop to the table
            $result2 = mysqli_query($conn,"SELECT * FROM `stop` WHERE stopid = '$stop'");//query the sql statement to get stop data
            if($row2 = mysqli_fetch_assoc($result2)){// if the stop exists
                $table .= '<tr>'.
                    '<td>'."<input type='checkbox' name='selected[]' value='".$row['StopID']."'> </td>".
                    '<td>'.$row2['Stopname'].'</td>'.
                    '<td>'.$row2['Latitude'].'</td>'.
                    '<td>'.$row2['Longitude'].'</td>'.
                  '</tr>';
            }
        }
        
    }
	$table .= '</table>';
	echo($table); //sends back table to ajax call
?>
