<?php

require 'yelp.php';

$t = "chinese";
$l = "Waltham, MA";

$query = api_query($t, $l);

echo "Business: " . $query[0];


?>