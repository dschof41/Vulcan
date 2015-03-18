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
  	padding: 0;
  	width:8in;
  	display:inline-block;	
  	float:right;
  	}
  	#card-holder {
	display:inline-block;
	margin:10px;
	float:left;
	}
	
	</style>
	
	<script type="text/javascript">
	</script>
	
</head>
<body>
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
	</nav>
<section>
<div class="headerTitle">Search Results</div>

<?php
	$t = $_POST["term"];
	$l = $_POST["location"];
?>
<?php include 'yelp_query_output.php'; ?>
<div id="map-canvas"></div>		
</section>
	
	<footer>
	<font size="2" color="white"> <a href="Vulcan/url">App Name</a>|<a href="Vulcan/url">By Team Vulcan</a>| Bentley University | CS460 | Spring 2015 |</font>
	</footer>
</body>
</html>