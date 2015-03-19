<?php

require 'yelp_query.php';

//populate business cards from response
$qry = populate_cards($t, $l);

echo "<div id='card-holder'>";
for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	echo "<div class='card'>";
	echo "<div class='img'>";
	echo "<image src='" . $bus->image . "'>";
	echo "</div>";
	//echo "<div class='rating'>";
	//echo "<image src='" . $bus->rating ."'>";
	//echo "</div>";
	echo "<div class='info'>";
	echo $bus->name . "<br>";
	echo $bus->phone . "<br>";
	echo $bus->address;
	echo "</div>";
	echo "</div>";	
} 
echo "</div>";

//Determine map object from response
$map = map_query($t, $l);

echo "<script type=text/javascript>";
echo "function initialize() { var mapOptions = { center: { lat: " . $map->lat . ", lng: ". $map->long . "}, zoom: 15 };";
echo  "var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions); }";
echo "google.maps.event.addDomListener(window, 'load', initialize);";
echo "</script>";

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