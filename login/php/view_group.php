<?php
/*
	This script retrieves saved business cards for a specific group based on a dropdown selection in the users group management page
*/
if(isset($_GET['view-cards'])){
	include 'connect.php';
	include 'yelp_query.php';
	
	$user = $_SESSION['user'];
	$group = $_GET['groupSelect'];
	
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
    		$_SESSION['message'] = "No cards in this group!";
	}// close if

	mysqli_close($con);
}//close GET if

//If group deleted
if(isset($_GET['delete-group'])) {
	include 'connect.php';

	$groupName = $_GET['groupSelect'];
	$userName = $_SESSION['user'];
	
	$sql1 = "DELETE FROM groups WHERE group_name = '$groupName' AND user = $userName";
		
	if (mysqli_query($con, $sql1)){
		$_SESSION['message'] = "Card deleted" . mysqli_error($con);
	}else{
		$_SESSION['message'] = "Card NOT deleted ". mysqli_error($con);
	}
	
	$sql2 = "DELETE FROM businesses WHERE group_name = '$groupName' AND user = $userName";
	
	if(mysqli_query($con, $sql2)){
		$_SESSION['message'] = "Group deleted" . mysqli_error($con);
	}else{
		$_SESSION['message'] = "Group NOT deleted\n". mysqli_error($con);
	}

	
	mysqli_close($con);
	header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Manage_Groups.php");
	exit();	

}
?>