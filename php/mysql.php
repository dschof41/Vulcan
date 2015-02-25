<?php
	//$first=$_POST['firstname'];
	//$last=$_POST['lastname'];
	$con = mysqli_connect("localhost","root" ,"vulcan123", "vulcandb");
    if (mysqli_connect_errno($con))
    {
    echo "Failed to connect: " . mysqli_connect_error();
    }
    echo "Connection made";
	//echo "<script type='text/javascript'>\n";
	//echo "alert('you are successfully registered');\n";
	//echo "</script>";

	mysqli_close($con);
?>