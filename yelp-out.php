<?php

require 'yelp.php';

// pieces of relevant business data for our search results display
class business_card {
	public $name;
	public $phone;
	public $address;
	public $rating;
	public $image;
	public $url;
	//public $distance;
}

// info for the google map
class map_object {
	public $lat;
	public $long;
}

/*queries yelp's server with the term and location provided

Created by Dan Schofer 3/17/2015
*/
function user_query($term, $location) {

    $response = json_decode(search($term, $location)); //decodes the business data from yelp server
    
    $map_parameters = new map_object();//sets map params
    $map_parameters->lat = $response->region->center->latitude;
    $map_parameters->long = $response->region->center->longitude;
    
    
    $display_businesses = array();
    //loops each business, making a new object and setting variables
    for ($i = 0; $i < $GLOBALS['SEARCH_LIMIT']; $i++) 
	{
		$card = new business_card();
	   	$busInfo = $response->businesses[$i]; //shortcut to current business
	   	$card->name = $busInfo->name;
	    $card->phone = $busInfo->display_phone;
	    $card->address = $busInfo->location->display_address[0] . " " . $busInfo->location->display_address[1];
	    $card->rating = $busInfo->rating_img_url_small;
	    $card->image = $busInfo->image_url;
	    $card->url = $busInfo->url;
	    //$card->distance = $busInfo->distance;
	    
	    $display_businesses[] = $card; //adds object to array.
	}
	
	return $display_businesses;//returns an array of business_card objects
}

//Run query using input variables and output
$qry = user_query($t, $l);
for ($i = 0; $i < count($qry); $i++)
{
	$bus = $qry[$i]; //string for ease of use
	echo "Name: ". $bus->name . "(" . $bus->phone . ")<br>";
	echo "Address: " . $bus->address . "<br><br>";
} 


?>