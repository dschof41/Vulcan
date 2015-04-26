<?php
/*
	This script emails the user the address of the selected business.
*/
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){


$address = $_POST['address'];
$to = $_POST['userMail'];

$subject = "Venturify Address";
$txt = "Hi!\nHere's the address you wanted!\n$address";
$headers = "From: teamvulcan123@gmail.com" . "\r";

if(mail($to,$subject,$txt,$headers)){
	echo "Mail sent!";
}else{
	echo "FAILED";
}

$_SESSION['message'] = "Email sent!";
//header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Yelp_Input.php");
//exit();

}
?>
