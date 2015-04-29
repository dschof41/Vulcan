<?php

include 'connect.php';
include 'yelp_query.php';
//Receive query info from hidden fields
$busID = $_GET['businessID'];//hidden field
$group = $_GET['groupSelect'];//value from selection box

if ($group === NULL || $group === "No groups yet!"){
	$_SESSION['message'] = "Please make a group first!!!";
	echo "id box empty";
	header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Profile.php");
	exit();
} 

//session_start();
$user = $_SESSION['user'];
$t = $_GET["term"];//taken from user search
$l = $_GET["location"];
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
	   		$name = mysqli_real_escape_string($con, $bus->name);
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
				$_SESSION['message'] = "Card saved to group!";
			}else { $_SESSION['message'] = "Error: ". mysqli_error($con); }
	   		
	   		//header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Profile.php");
			//exit();
	   		
	   	}//close if
	   	
	}//close for


mysqli_close($con);

/*
	Since this wasn't diagrammed well from the start, my scripts got pretty cluttered and messy. I ended up copy pasting this here because I was running
	into issues with redefining yelp results. This should be a simple include, but it works how it is and I'm past the point of doing any major rewrites
	
	Essentially this repopulates the business cards into the results page, after a card is saved. It provides the same results as seen before so that the
	user can continue adding the group quickly instead of having to start a new search. Its messy because there are three different forms that POST or GET
	to the Yelp Output page and I didn't understand how to handle multiple posts/gets until late in the process.
*/

//Create arrays for google maps marker info
$coords = array();
$names = array();
//Populate arrays with business info
for ($i = 0; $i < count($response); $i++) {
	$coords[] = $response[$i]->address;
	$names [] = $response[$i]->name;
}

//Determine map object from response and pull coordinates
$map = map_query($t, $l);
$latitude = $map->lat;
$longitude = $map->long;

//Array to store info pane string objects
$infoPanes = array();
for ($i = 0; $i < count($response); $i++)
{
	$bus = $response[$i]; //string for ease of use
	
	//Create string variable to store html tags for info pane
	$infoPane = "<div class='info-card'>";
	$infoPane .= "<div class='img'>";
	$infoPane .= "<a href='". $bus->url . "' target='_blank'>";
	$infoPane .= "<image src='" . $bus->image . "'>";
	$infoPane .= "</a>";
	$infoPane .= "</div>";
	$infoPane .= "<div class='info'>";
	$infoPane .= "<image src='" . $bus->rating ."'><br>";
	$infoPane .= $bus->name . "<br>";
	$infoPane .= $bus->phone . "<br>";
	$infoPane .= "<span id='address'>";
	$infoPane .= $bus->address;
	$infoPane .= "</span>";
	$infoPane .= "</div>";
	$infoPane .= "</div>";
	
	//Add individual info pane to array
	$infoPanes[] = $infoPane;	
} 


//Creatse a string of html tags for business cards
$alphas = range('A', 'Z');

$busCards = "<div id='card-holder'>";

for ($i = 0; $i < count($response); $i++)
{
	$bus = $response[$i]; //string for ease of use
	$busCards .= "<div class='card' onclick='select(this);'>";
	$busCards .= "<div class='img'>"; //open image
	$busCards .= "<a href='". $bus->url . "' target='_blank'>"; //set link
	$busCards .= "<image src='" . $bus->image . "'>"; //set image source
	$busCards .= "</a>"; //close link
	$busCards .= "</div>"; //close image div
	$busCards .= "<div class='info'>"; //open info div
	$busCards .= "<image src='" . $bus->rating ."'><br>";
	$busCards .= $bus->name . "<br>";
	$busCards .= $bus->phone . "<br>";
	$busCards .= $bus->address;
	$busCards .= "<span class='_hidden' id='cat'>" . $bus->bus_id . "</span>";
	$busCards .= "</div>";
	$busCards .= "<div class='letter'>". $alphas[$i] . "</div>";
	//$busCards .= "<div id='share' onclick='share(".$bus->url.");'>Share</div>";
	$busCards .= "</div>";
	
} 
$busCards .= "</div>";



?>