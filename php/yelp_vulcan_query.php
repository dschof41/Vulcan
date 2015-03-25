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




?>