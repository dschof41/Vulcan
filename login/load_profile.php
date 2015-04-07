<?php
	
	include 'php/connect.php'; //connection script
	
	//Create and run select statement to populate user info in profile page
	$uname = $_SESSION['user'];	
	$SQL = "SELECT * FROM login WHERE L1 = $uname";
	$result = mysqli_query($con, $SQL); //query result
	$userName = $uname; //username retreived from session variable
	$e = mysqli_fetch_assoc($result)['userEmail']; //pull email from DB
	$no = mysqli_fetch_assoc($result)['user_id'];//pull ID
	$userEmail = $e;
	$userId = $no;
	
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
?>