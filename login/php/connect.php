<?php
	//Connection string to establish connection to database
	$con = mysqli_connect("localhost","root" ,"vulcan123", "vulcandb"); //for now we use root, will make a user later so root isn't used
    if (mysqli_connect_errno($con))
    {
    $msg =  "Failed to connect: " . mysqli_connect_error();
    }
	$msg = "Connected";
	
?>