<div class="hoverButton">
    <div class="navBar2" id="navBar2">
        <ul>
            <li><img id="main" class="hamburger" src="http://coachtracker.pw/images/menu.png" alt="" onClick="toggleOpen()"></li>
            <li>
            <a href="logout.php" ><img id="imagesd" src="http://coachtracker.pw/images/logout.png" alt="Logout" ></a>
            </li>


            <li id="set">
            	<div class="dropdown">
	            	<button type="button" name="button" value="Settings" class="settings"></button>
	                <div class="dropdown-con">
	                	<?php
				     		if(isset($_SESSION['sesh_tou'])){
			     				if($_SESSION['sesh_tou'] == 'Supervisor'){
		     						echo '<a href="addSupervisor.php">Add Supervisor</a>'
		     						.'<a href="stops.php">Stops</a>';
			     				}else if($_SESSION['sesh_tou'] == 'Student'){
			     					echo '<a href="editDetails.php">Edit Details</a>';
			     				}else{
			     					exit;
			     				}
				     		}
				     	?>
			  		</div>	
            	</div>
            </li>
        </ul> 
    </div>
</div>