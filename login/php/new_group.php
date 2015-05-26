<?php
/*
	Create script that generates a new SQL insert statement into Groups table using username as foreign key for now, since I can't pull userID from login table.
	They will then be able to select the group and create new entries of business card objects associated with ids and groups
*/
require 'connect.php';

session_start();
$groupName = $_POST['groupName'];

if(!isset($groupName)){
	$_SESSION['message'] = "Please set group name";
	header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Manage_Groups.php");
	exit();
}
	
	


$groupUser = $_SESSION['id'];
$user = $_SESSION['user'];

$sql = "INSERT INTO groups (user, group_name) VALUES ($user, '$groupName')";

$result = mysqli_query($con, $sql);

if($result){
	$_SESSION['message'] = "Group created!!";
}else { $_SESSION['message'] = "Error: ". mysqli_error($con); }

mysqli_close($con);

header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Manage_Groups.php");
exit();	




?>
