<?PHP
/*
	This query builds the HTML strings for displaying business cards from the custom query
	It also builds the HTML strings for infowindows for the google map
*/
require 'yelp_query.php';

//populate business cards from response by adding business data to html object
$qry = populate_cards($t, $l, $s);

//Create arrays for google maps marker info
$coords = array();
$names = array();
//Populate arrays with business info
for ($i = 0; $i < count($qry); $i++) {
	$coords[] = $qry[$i]->address;
	$names [] = $qry[$i]->name;
}

//Determine map object from response and pull coordinates
$map = map_query($t, $l);
$latitude = $map->lat;
$longitude = $map->long;

//Array to store info pane string objects
$infoPanes = array();
for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	
	//Create string variable to store html tags for info pane
	$infoPane = "<div class='info-card'>";
	$infoPane .= "<div class='img'>";
	$infoPane .= "<a href='". $bus->url . "' target='_blank'>";
	$infoPane .= "<image class='window-img' src='" . $bus->image . "'>";
	$infoPane .= "</a>";
	$infoPane .= "</div>";
	$infoPane .= "<div class='info'>";
	$infoPane .= "<image class='window-rating' src='" . $bus->rating ."'><br>";
	$infoPane .= "<span class='window-text'>".$bus->name ."</span><br>";
	$infoPane .= "<span class='window-text'>".$bus->phone . "</span><br>";
	$infoPane .= "<span class='window-text' id='address'>";
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

for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
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