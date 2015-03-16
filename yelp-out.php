<?php

require 'yelp.php';

$t = "chinese";
$l = "Waltham, MA";

$query = query_api($t, $l);

echo "Business: " . $query[0];


?>