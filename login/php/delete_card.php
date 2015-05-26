<?php
/*
	This script deletes a selected business card record from database based 
*/
session_start();
include 'connect.php';

$saveID = (int)$_POST['businessID'];

$sql = "DELETE FROM businesses WHERE business_save_id ='$saveID'";
//$sql = "DELETE FROM `vulcandb`.`businesses` WHERE `businesses`.`business_save_id` =$saveID";

//$result = mysqli_query($con, $sql);

if (mysqli_query($con, $sql)){
	$_SESSION['message'] = "Card deleted" . mysqli_error($con);
}else{
	$_SESSION['message'] = "Card NOT deleted ". mysqli_error($con);
}
mysqli_close($con);
header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Manage_Groups.php");
exit();	

?>
