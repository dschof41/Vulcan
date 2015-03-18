<?php

require 'yelp_query.php';

//Run query using input variables from user and output into html
$qry = yelp_query($t, $l);
for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	echo "Name: ". $bus->name . "(" . $bus->phone . ")<br>";
	echo "Address: " . $bus->address . "<br><br>";
} 

//Run a query using input to create javascript for map object
$map = map_query($t, $l);

echo "MAP!";

?>