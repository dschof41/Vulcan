<?php

/*
This script populates the card-holder div with business cards from the query of yelp's server based on user input

*/

$alphas = range('A', 'Z');
echo "<div id='card-holder'>";

for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	echo "<div class='card' onclick='select(this);'>";
	echo "<div class='img'>"; //open image
	echo "<a href='". $bus->url . "' target='_blank'>"; //set link
	echo "<image src='" . $bus->image . "'>"; //set image source
	echo "</a>"; //close link
	echo "</div>"; //close image div
	echo "<div class='info'>"; //open info div
	echo "<image src='" . $bus->rating ."'><br>";
	echo $bus->name . "<br>";
	echo $bus->phone . "<br>";
	echo $bus->address;
	echo "<span class='_hidden' id='cat'>" . $bus->bus_id . "</span>";
	echo "</div>";
	echo "<div class='letter'>". $alphas[$i] . "</div>";

	echo "</div>";
	
} 
echo "</div>";




?>