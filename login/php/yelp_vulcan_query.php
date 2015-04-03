<?PHP
require 'yelp_query.php';

//populate business cards from response by adding business data to html object
$qry = populate_cards($t, $l);

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


?>