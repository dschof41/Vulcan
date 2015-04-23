<?php
/*
	This script deletes a business card recrod based on hidden from fields containing group and user info
*/
session_start();
include 'connect.php';

$group = $_POST['group'];
$card_id = $_POST['businessID'];
$user = $_SESSION['user'];

$sql = "DELETE FROM businesses WHERE user = $user AND group_name = '$group' AND bus_id = '$card_id'";
$result = mysqli_query($con, $sql);

if ($result){
	$_SESSION['message'] = "Successful deletion";
}else{
	$_SESSION['message'] = mysqli_error($con);
}
mysqli_close($con);
header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/VUlcan_Manage_Groups.php");
exit();	

?>
