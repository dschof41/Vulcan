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
function yelp_query($term, $location) {

    $response = json_decode(search($term, $location)); //decodes the business data from yelp server
     
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


/* Runs a query to retrieve map data for map object*/
function map_query($term, $location) {
	
	$response = json_decode(search($term, $location)); //decodes the business data from yelp server
	
	$map_parameters = new map_object();//sets map params
    $map_parameters->lat = $response->region->center->latitude;
    $map_parameters->long = $response->region->center->longitude;
    
  	return $map_parameters;
}

?>