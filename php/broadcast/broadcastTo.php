<?php
	session_start();
    include '../../dbp.php';
    //ensures sessions are vaild and the right user can access the page
    if(isset($_SESSION['sesh_tou'])){
        if(!($_SESSION['sesh_tou'] == 'Supervisor')){
            header("Location: index.php");
            exit;
        }
    }else{
        header("Location: index.php");
        exit;
    }
    // selecting all routes and putting them into a table along side a check box that has the routeid value
    $sql = "SELECT * FROM route";
	$result = mysqli_query($conn,$sql);
 	$table = '<div class="tableBroadcast" ><table>
    			<tr id="tableTitle">
                    <th>Select</th>
    				<th>Route</th>
				<tr>';
	while($row = mysqli_fetch_assoc($result)){
		$table .= '<tr>'.
                    '<td>'."<input id='select' type='checkbox' name='selected[]' value='".$row['routeid']."'> </td>".
					'<td>'.$row['routeid'].'</td>'.
				  '</tr>';
	}
	$table .= '</table></div>';
    
	echo($table); // sends table back

?>