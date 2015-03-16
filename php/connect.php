<?php
	//Connection string to establish connection
	$user = $_POST["username"];
	echo $user;
	
	$con = mysqli_connect("localhost","root" ,"vulcan123", "vulcandb");
    if (mysqli_connect_errno($con))
    {
    echo "Failed to connect: " . mysqli_connect_error();
    }
	echo "<script type='text/javascript'>\n";
	echo "alert('thanks you are successfully registered');\n";
	echo "</script>";


	//Close connection
	mysqli_close($con);
?>