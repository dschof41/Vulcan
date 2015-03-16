<?php

require 'yelp.php';

$query = query_api($t, $l);

echo "Name: " . $query[0] . "<br>" . 
		"Phone: " . $query[1] . "<br>" .
		"Address: " . $query[2] . " " . $query[3];


?>