<?php
/*
	This script defines business cards and google map classes.
	It also builds a custom Yelp query method, that returns an array of business cards
	Also, a function that returns map parameters
	
*/
require 'yelp.php';

// pieces of relevant business data for our search results display
class business_card {
	public $bus_id;
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
Updated by Dan Schofer 3/25/2015
*/
function populate_cards($term, $location, $sort) {

    $response =  json_decode(search($term, $location, $sort));
    $display_businesses = array(); //array to hold card objects
    
    //loops each business, making a new object and setting variables
    for ($i = 0; $i < $GLOBALS['SEARCH_LIMIT']; $i++) 
	{
		$card = new business_card();
	   	$busInfo = $response->businesses[$i]; //shortcut to current business
	   	$card->bus_id = $busInfo->id;
	   	$card->name = $busInfo->name;
	   	
	   	if (isset($busInfo->display_phone)){
	    	$card->phone = $busInfo->display_phone;
	    }else{
	    	$card->phone = 'no phone provided';
	    }
	    
	    if (isset($busInfo->location->display_address[0]) && isset($busInfo->location->display_address[1])) { 
	    	$card->address = $busInfo->location->display_address[0] . " " . $busInfo->location->display_address[1];
	    }else{
	    	$card->address = "no address provided";
	    }
	    
	    $card->rating = $busInfo->rating_img_url_large;
	    
	    if (isset($busInfo->image_url)){
	    	$card->image = $busInfo->image_url;
	    }else{
	    	$card->image = 'images/default.jpg';
	    }
	    $card->url = $busInfo->url;
	    //$card->distance = $busInfo->distance;
	    
	    $display_businesses[] = $card; //adds object to array.
	}
	
	return $display_businesses;//returns an array of business_card objects
}


/* Runs a query to retrieve map data for map object

Created by Dan Schofer 3/18/2015
*/
function map_query($term, $location) {
	
	$sort = 0;
	$response =  json_decode(search($term, $location, $sort));
	
	$map_parameters = new map_object();//sets map params
    $map_parameters->lat = $response->region->center->latitude;
    $map_parameters->long = $response->region->center->longitude;
    
  	return $map_parameters;
}

?>