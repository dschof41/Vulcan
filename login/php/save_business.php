<?php

include 'connect.php';
include 'yelp_query.php';
//Receive query info from hidden fields
$busID = $_POST['businessID'];//hidden field
$group = $_POST['groupSelect'];//value from selection box

if ($group === NULL){
	$_SESSION['message'] = "Please select a group before saving!";
	echo "id box empty";
	header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Yelp_Input.php");
	exit();
} 

session_start();
$user = $_SESSION['user'];
$t = $_POST["term"];//taken from user search
$l = $_POST["location"];
$s = 0;//not important for this, so set to 0

$response =  populate_cards($t, $l, $s);

//recreate user query, probably unnecessary, could just use session variable?
 for ($i = 0; $i < count($response); $i++) 
	{
	   	$currentID = $response[$i]->bus_id; //store id of current card
	   		   	
	   	if($currentID === $busID) { //check if ID of selected card is equal to ID of test card
	   		
	   		//set variables with card specific data
	   		$bus = $response[$i];
	   		$id = $bus->bus_id;
	   		$name = mysql_real_escape_string($bus->name);
	   		$phone = $bus->phone;
	   		$address = $bus->address;
	   		$rating = $bus->rating;
	   		$img = $bus->image;
	   		$url = $bus->url;
			
			//Create insert statement to add variables to database
	   		$sql = "INSERT INTO businesses (user, group_name, bus_id, bus_name, bus_phone, bus_address, bus_rating, bus_img, bus_url)";
	   		$sql .=" VALUES ($user, '$group', '$id', '$name', '$phone', '$address', '$rating', '$img', '$url')";
	   		//Run sql update statement
	   		$result = mysqli_query($con, $sql);
	   		
	   		if($result){
				$_SESSION['message'] = $result;
			}else { $_SESSION['message'] = "Error: ". mysqli_error($con); }
	   		
	   		header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Profile.php");
			exit();
	   		
	   	}//close if
	   	
	}//close for


mysqli_close($con);




?>