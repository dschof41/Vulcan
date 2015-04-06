<?php

	$uname = $_SESSION['user'];
	$con = mysqli_connect("localhost", "root", "vulcan123", "vulcandb");
	
	if(!$con)
	{
		$msg = "Error with DB: " . mysqli_connect_error();
	}else{
		$msg = "Hopefully everything is correct!";
	}
	
	//$uname = quote_smart($con, $uname);
	//$pword = quote_smart($con, $pword);

	
	$SQL = "SELECT * FROM login WHERE L1 = $uname";
	
	$result = mysqli_query($con, $SQL); //query result
	
	$userName = $uname; //username retreived from session variable
	$e = mysqli_fetch_assoc($result)['userEmail']; //pull email from DB
	$userEmail = $e;
	
	//Check if email is null for some reason
	if (!isset($e)){
		$userEmail = "No email provided!";
		mysqli_close($con);
	}

?>