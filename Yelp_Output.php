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
	background-image: url("http://s9.postimg.org/s4gq9ivct/cityskylinenycheader.png");
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
	//Pull variables from the Yelp_Input form
	$t = $_POST["term"];
	$l = $_POST["location"];
	
	//Run query from pulled variables
	include 'login\php\yelp_vulcan_query.php';
	?>
	
	
	<script type="text/javascript">

	
	//Pull latitude and longitude from the query script we just ran and create javascript variables
	var latitude = <?php echo json_encode($latitude); ?>;
	var longitude = <?php echo json_encode($longitude); ?>;
	
	//Using coordinates from yelp php query, create a google map object 
	var geocoder;
	var map;

//Build out the map and populate it	
function initialize() { 
		document.hasFocus
	var mapOptions = { //set map properties
		center: { 
			lat: latitude,
			lng: longitude
			},
			zoom: 12
		}
	
	//Instantiate map object based on attributes set in MapOptions
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	
	//Arrays for creating and naming markers, taken from yelp return in php
	var coordinates = <?php echo json_encode($coords); ?>;
	var names = <?php echo json_encode($names); ?>;
	
	//Geogcoder used to translate addresses into LatLng objects
	var geocoder = new google.maps.Geocoder();
	
	//Array of info windows, calling it info panes for some reason
	var infoPanes =<?php echo json_encode($infoPanes); ?>;
	
	//Loop through each business result from our query and add a labeled marker with a info window 
	for (var i = 0; i<coordinates.length; i++){
		var k = 0;//counter for markers and window
		var letters = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
		geocoder.geocode( { 'address': coordinates[i] }, function(results, status){
				var marker = new google.maps.Marker({ //new marker wtih attributes
					map: map,
					position: results[0].geometry.location,
					title: names[k],
					icon: "http://maps.google.com/mapfiles/marker" + letters[k] + ".png"
				});	
				var info = new google.maps.InfoWindow({ //new window still within loop
					content: infoPanes[k]
				});
				google.maps.event.addListener(marker, 'click', function() {//adds listener to each marker
					info.open(map,marker);
				});
				k++; //increment K counter	
		});//close geocoder
		
	}// close for loop
	
}//close Initialize function

google.maps.event.addDomListener(window, 'load', initialize); //creates map on window load by running initialize

/* 
Select function that allows user to select a business card from given list, and removes previous selections if any

Created by Dan Schofer 3/25/2015
*/
	function select(e) { //function takes HTML object element
    if(e.id == 'card-selected') { //check id of selected object, if its already selected, unselect it
        e.id = '';
    } else {
    
    	var cards = document.getElementById("card-holder").children; //check each business card HTML object
    	
    	for(var i = 0; i < cards.length; i++){ 
    		if (cards[i].id == 'card-selected'){
    			cards[i].id = '';
    		}
        	e.id = 'card-selected';
        }
    }
}	

	</script>
	
</head>
<body>
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
	</nav>
<section>
<div class="headerTitle">Search Results</div>
<?php include 'login\php\yelp_query_output.php'; ?>
<div id="map-canvas"></div>		
</section>
	
	<footer id="footer">
	</footer>
</body>
</html>