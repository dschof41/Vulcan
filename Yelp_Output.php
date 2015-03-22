<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Results</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javaScript.js" type="text/javascript"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9Rt9jw2Sr2Rdz3Q00L-4XeG8wSJz9JxY"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s18.postimg.org/cjg6chn2x/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
	}

  	#map-canvas {
  	height: 6in;
  	margin: 10px;
  	margin-top:-70px;
  	padding: 0;
  	width:7in;
  	display:inline;	
  	float:right;
  	border:2px silver solid;
  	}
	</style>
	<?php
	$t = $_POST["term"];
	$l = $_POST["location"];
	
	include 'php/yelp_vulcan_query.php';
	?>
	
	
	<script type="text/javascript">
	
	//Pull latitude and longitude from PHP script and create javascript variables
	var latitude = <?php echo json_encode($latitude); ?>;
	var longitude = <?php echo json_encode($longitude); ?>;
	
	//Using coordinates from yelp php query, create a google map object 
	
	var geocoder;
	var map;
	
	function initialize() { 
		
	var mapOptions = {
		center: { 
			lat: latitude,
			lng: longitude
			},
			zoom: 12
		}

	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	var coordinates = <?php echo json_encode($coords); ?>;
	var names = <?php echo json_encode($names); ?>;
	var geocoder = new google.maps.Geocoder();
	
	for (var i = 0; i<coordinates.length; i++){
	var k = 0;
	geocoder.geocode( { 'address': coordinates[i] }, function(results, status){
		var marker = new google.maps.Marker({
			map: map,
			position: results[0].geometry.location,
			title: names[k]
			});
			k++;
		});
	}
}
google.maps.event.addDomListener(window, 'load', initialize);
	
	</script>
	
</head>
<body>
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
	</nav>
<section>
<div class="headerTitle">Search Results</div>
<?php include 'php/yelp_query_output.php'; ?>
<div id="map-canvas"></div>		
</section>
	
	<footer>
	<font size="2" color="white"> <a href="Vulcan/url">App Name</a>|<a href="Vulcan/url">By Team Vulcan</a>| Bentley University | CS460 | Spring 2015 |</font>
	</footer>
</body>
</html>