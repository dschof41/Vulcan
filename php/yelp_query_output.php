<?php

/*
This script populates the card-holder div with business cards from the query of yelp's server based on user input
*/

echo "<div id='card-holder'>";
for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	echo "<div class='card'>";
	echo "<div class='img'>";
	echo "<image src='" . $bus->image . "'>";
	echo "</div>";
	echo "<div class='info'>";
	echo "<image src='" . $bus->rating ."'><br>";
	echo $bus->name . "<br>";
	echo $bus->phone . "<br>";
	echo $bus->address;
	echo "</div>";
	echo "</div>";	
} 
echo "</div>";







?>