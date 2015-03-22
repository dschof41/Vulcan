<?PHP
/*
This script creates the map object and populates the markers for the search results
*/
include 'yelp_vulcan_query.php';


$latitude = $map->lat;
$longitude = $map->long;

/*
//Geocode each businesses address into a latlng and to add to google map
echo "var geocoder = new google.maps.Geocoder();";

echo "geocoder.geocode( { 'address': " . $qry[$i]->address . ", function(results, status) {";
echo 	"var marker = new google.maps.Marker({position: results[0].geometry.location, map: map, });";
echo "}";

*/


/*
//Add addresses to array for markers
$markers = array();
for ($i = 0; $i < count($qry); $i++){
	$marker = $qry[$i]->address;	//add addresses to markers array
	echo "var marker = new google.maps.Marker({position: " . $marker . ", map: map, });";
    echo "</script>";
}

*/

?>