<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Results</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<link href="css/social.css" rel="stylesheet" type="text/css">
	<script src="js/javaScript.js" type="text/javascript"></script>
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9Rt9jw2Sr2Rdz3Q00L-4XeG8wSJz9JxY"></script>
	
	<style type="text/css">
	header{
	background-image: url("http://s2.postimg.org/a51ch03wn/tv460banner7.png");
	}
	
	section{
	height: 1000px;
}

  	#map-canvas {
  	height: 9.15in;
  	margin: 10px;
  	margin-top: -20px;
  	padding: 0;
  	width:7.5in;
  	display:inline;	
  	float:right;
  	border:1px silver solid;
  	margin-right: 20px;
  	}
  	
  	#yelpImage{
		display:inline;
		margin-left:225px;
		margin-top:-200px;
}
	</style>
	<?php
	//Pull variables from the Yelp_Input form
	session_start();
	if (!isset($_GET['businessID'])){
		$t = $_GET["term"];
		$l = $_GET["location"];
		$s = $_GET['sort'];
		include 'login\php\yelp_vulcan_query.php';
	}else if (isset($_GET['businessID']) && !empty($_GET['businessID'])){
		include 'login/php/save_business.php';
	}else{
		$t = $_GET['term'];
		$l = $_GET['location'];
		$s = 0;
		$mesg = "Select card before saving";
		include 'login\php\yelp_vulcan_query.php';
	}
	//Load the groups for current user;
	include 'login/load_groups.php';
	?>
	
	
	<script type="text/javascript">
	var msg = <?php echo json_encode($mesg); ?>;
	if(msg){
		alert(msg);
	}
	function clearID(){
		document.getElementById(businessID).value ="";
	}
	
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
				/*google.maps.event.addListener(marker, 'mouseout', function() {
    				info.close();
				});*/
				
				k++; //increment K counter	
		});//close geocoder
		
	}// close for loop
	
}//close Initialize function

google.maps.event.addDomListener(window, 'load', initialize); //creates map on window load by running initialize

/* 
	Select function that allows user to select a business card from given list, and removes previous selections if any
	Also populates hidden fields for saving business card to database
	Created by Dan Schofer 3/25/2015
*/
	function select(e) { //function takes HTML object element
		    if(e.id == 'card-selected') { //check id of selected object, if its already selected, unselect it
	        e.id = '';
	        document.getElementById('businessID').value = "";

	    } else {
	    
	    	var cards = document.getElementById("card-holder").children; //check each business card HTML object
	    	
	    	for(var i = 0; i < cards.length; i++){  //check all cards and unselect them if they are selected
	    		if (cards[i].id == 'card-selected'){
	    			cards[i].id = '';
	    			document.getElementById('businessID').value = "";
	    			
	    		} //close if
	        	e.id = 'card-selected'; //select only the clicked card
	        	elementString = e.innerHTML;
	        	var start = elementString.indexOf("cat") + 5;
	        	var finish = elementString.indexOf("</span>");
	        	var busID = elementString.substring(start, finish);
	        	document.getElementById('businessID').value = busID.trim();

        	}//close for
    	}//close else
	}//close function	

	</script>
	
</head>
<body>
<div id="fb-root"></div>
<script>
      window.fbAsyncInit = function() { //initialize fb api
        FB.init({
          appId      : '1413731082267493',
          xfbml      : true,
          version    : 'v2.3'
        });
      };
		//code here
		
	function share(){ //a function to share a link, called on click
	FB.ui({
		  method: 'share_open_graph',
		  action_type: 'og.likes',
		  action_properties: JSON.stringify({
		  object:"http://ec2-52-0-130-98.compute-1.amazonaws.com/index.html",
		  })
		}, function(response){});
	}
		
      (function(d, s, id){ //load API asynchronously
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
    </script>
    <nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>

	<header>
	</header>
	
	<section>
<div class="headerTitle">Search Results</div>
<div id="filter">
	<form method="get" action="Yelp_Output.php">
		<label for="filter">Order:</label>
		<input class="_hidden" name="term" type="text" value="<?php echo $t ?>">
		<input class="_hidden" name="location" type="text" value="<?php echo $l ?>">
		<select name="sort" id="sort">
			<option value="0">Best Match</option>
			<option value="1">Distance</option>
			<option value="2">Rating</option>
		</select>
		<input type="submit" value="Submit" onclick="clearID();">
	</form>
</div>
<!--<div id="share" class="fb-share-button" data-href="http://ec2-52-0-130-98.compute-1.amazonaws.com/index.html" data-layout="button"></div> -->
<?php
	if(isset($_SESSION['login']) && !empty($_SESSION['login'])) {
		echo "<div id='groupSelector'>";
	}else{
		echo "<div id='groupSelector' class='_hidden'>";
	}
?>
	<form action="Yelp_Output.php" method="get">
		<input class="_hidden" name="term" type="text" value="<?php echo $t ?>">
		<input class="_hidden" name="location" type="text" value="<?php echo $l ?>">
		<input id="businessID" class="_hidden" type="text" name="businessID" value="" readonly="true">
		<label for="groupSelect">Your Groups:</label>
		<select name="groupSelect" id="groupSelect">
			<?php
				for($i=0; $i<count($userGroups); $i++){
					echo "<option value='".$userGroups[$i]."'>".$userGroups[$i]."</option>";
				}
			?>
		</select>
		<input type="submit" value="Save">
	</form>
<?php echo "</div>"; ?>
<?php echo $busCards; ?>
<div id="map-canvas"></div>		
</section>
	
	<footer id="footer">
	</footer>
</body>
<script type="text/javascript">stLight.options({publisher: "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", "logo": { "visible": true, "url": "http://ec2-52-0-130-98.compute-1.amazonaws.com/", "img": "http://dailydropcap.com/images/V-12.jpg", "height": 50}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": false, "profile": "sharethis"}, "fblike": { "visible": false, "url": ""}, "twitter": { "visible": false, "user": "sharethis"}, "twfollow": { "visible": false}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "pinterest", "googleplus"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>
</html>
