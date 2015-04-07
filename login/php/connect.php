<?php
	//Connection string to establish connection
	$con = mysqli_connect("localhost","root" ,"vulcan123", "vulcandb");
    if (mysqli_connect_errno($con))
    {
    $msg =  "Failed to connect: " . mysqli_connect_error();
    }
	$msg = "Connected";
	
?>