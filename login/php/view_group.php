<?php
/*
	This script retrieves saved business cards for a specific group based on a dropdown selection in the users group management page
*/

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

include 'connect.php';
include 'yelp_query.php';

$user = $_SESSION['user'];
$group = $_POST['groupSelect'];

$sql = "SELECT * FROM businesses WHERE user = $user AND group_name = '$group'";

$result = mysqli_query($con, $sql);

$cardHTML = "";
$userCards = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    

	    while($row = mysqli_fetch_assoc($result)) {
	    	
	    	$save_id = $row['business_save_id'];
	    	$id = $row['bus_id'];
			$name = $row['bus_name'];
			$phone = $row['bus_phone'];
			$address = $row['bus_address'];
			$rating = $row['bus_rating'];
			$image = $row['bus_img'];
			$url = $row['bus_url'];

	
			//Create string variable to store html tags for info pane
			$cardHTML = "<div class='card' onclick='select(this);'>";
			$cardHTML .= "<div class='img'>";
			$cardHTML .= "<a href='". $url . "' target='_blank'>";
			$cardHTML .= "<image src='" . $image . "'>";
			$cardHTML .= "</a>";
			$cardHTML .= "</div>";
			$cardHTML .= "<div class='info'>";
			$cardHTML .= "<image src='" . $rating ."'><br>";
			$cardHTML .= "<span id='name'>".$name."</span>" . "<br>";
			$cardHTML .= $phone . "<br>";
			$cardHTML .= "<span id='address'>";
			$cardHTML .= $address;
			$cardHTML .= "</span>";
			$cardHTML .= "<span class='_hidden' id='cat'>".$save_id. "</span>";
			$cardHTML .= "</div>";
			$cardHTML .= "</div>";
			
			//Add individual card display strings to array
			$userCards[] = $cardHTML;		
					        
	    }//close while	 
	
	} else {
    	$noCardMessage = "No cards in this group!";
}// close if

mysqli_close($con);
}//close server if
?>