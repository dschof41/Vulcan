<?php
	/*
		This script builds an array of business group names for a dropdown menu for an individual user from the groups table 
	*/
	
	include 'php/connect.php'; //connection script
	
	if (isset($_SESSION['user'])){
	$uname = $_SESSION['user'];	
	
	//Create and run select statement to populate groups dropdown with user specific business groups
	$SQL = "SELECT * FROM groups WHERE user = $uname";
	$result = mysqli_query($con, $SQL);
	$userGroups = array(); //array to hold users custom group names
	
	if (mysqli_num_rows($result) > 0) {
    // output data of each row
	    while($row = mysqli_fetch_assoc($result)) {
			$userGroups[] = $row['group_name'];	        
	    }
	} else {
    	$userGroups[0] = "No groups yet!";
    }
    
  	mysqli_close($con);
  	
}//close test for user set
?>