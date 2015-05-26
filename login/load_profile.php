<?php
	/*
		This script populates user data into a readonly form, in the future this form will allow users to edit their email/username/password
	*/
	include 'php/connect.php'; //connection script
	
	//Create and run select statement to populate user info in profile page
	$uname = $_SESSION['user'];
	$SQL = "SELECT * FROM login WHERE L1 = $uname";
	$result = mysqli_query($con, $SQL); //query result
	$userName = $uname; //username retreived from session variable
	$e = mysqli_fetch_assoc($result)['userEmail']; //pull email from DB
	$no = (int)mysqli_fetch_assoc($result)['user_id'];//pull ID
	$userEmail = $e;
	$userId = $no;
	
	
	mysqli_close($con);
		
?>