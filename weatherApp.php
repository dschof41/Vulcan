<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Weather</title>
	<link href="../images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/javaScript.js" type="text/javascript"></script>
	<script src="js/weather.js" type="text/javascript"></script>
	<script src="js/snowflakes.js" type="text/javascript"></script>
	
	<style type="text/css">
	body {
	font-family: Century Gothic;
	font-size: large;
	color: #0D4F8B;
	}

	header{
	width: 1267px;
	background-image: url("http://s24.postimg.org/pf281yp05/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
}
	section 
	{
	background-color: #FFEBCD;
	margin-bottom: 0%;
	overflow: hidden;
	}
	
	#submit 
	{
	top: 1px;
	margin-left: 8px;
	padding: 2px 4px;
	position: relative;
	font-family: "Century Gothic";
	font-size: 15px;
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
		<div class="headerTitle">Weather</div>
		<div class="weather"></div>
	<form id="weatherSearch">
	<label>Enter a City <br></label>
	<input type="text" id="weatherLocation" name="weatherLocation" size="50" />
	<input type="submit" name="submit" value="Search" />
</form>
<div id="weatherList"></div>
<div id="weatherReport"></div>


	</section>
		<footer id="footer">
	</footer>
</body>
</html>