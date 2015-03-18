<?php

require 'yelp_query.php';

//Run query using input variables from user and output into html
$qry = yelp_query($t, $l);
echo "<div id='card-holder'>";
for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	echo $bus->name . "<br>(" . $bus->phone . ")<br>";
	echo $bus->address . "<br><br>";
} 
echo "</div>";
//Run a query using input to create javascript for map object
$map = map_query($t, $l);

echo "<script type=text/javascript>";
echo "function initialize() { var mapOptions = { center: { lat: " . $map->lat . ", lng: ". $map->long . "}, zoom: 15 };";
echo  "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); }";
echo "google.maps.event.addDomListener(window, 'load', initialize);";
echo "</script>";


?>