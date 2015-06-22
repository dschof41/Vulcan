<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Weather</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/javaScript.js" type="text/javascript"></script>
	<script src="js/weather.js" type="text/javascript"></script>
	<!-- These scripts build the social sharing bar -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<!-- ------------------------------------------------------------------------------------->

	<style type="text/css">
	body {
	font-family: Century Gothic;
	font-size: large;
	color: #0D4F8B;
	}

	header{
	background-image: url("images/banner5.jpg");

	}
	
	section 
	{
	height: 880px;
	}

	#submit 
	{
	top: 4px;
	margin-left: -40px;
	padding: 4px 8px;
	position: relative;
	font-family: "Century Gothic";
	font-size: 17px;
	}

	</style>
		
	<script type="text/javascript">
	</script>
	
</head>
<body>
	<nav id="primary_nav_wrap">
		<?php 
		session_start();
		include 'login/php/navigation.php';
		?>
	</nav>

	<header>
	</header>
			
	<section>
		<div class="headerTitle">Weather</div>
		<div class="weather"></div>
	<form id="weatherSearch">
	<br>
	<label>Five-Day Forecast <br></label>
	<input type="text" id="weatherLocation" name="weatherLocation" size="50" placeholder ="Enter a City or a Zip Code"/>
	<input type="submit" id="submit" name="submit" value="Search" /><br>
	<font size="2">Powered by Yahoo Weather</font>
	
</form>
<div id="weatherList"></div>
<div id="weatherReport"></div>


	</section>
		<footer id="footer">
	</footer>
</body>
<script type="text/javascript">stLight.options({publisher: "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", "logo": { "visible": true, "url": "http://ec2-52-0-130-98.compute-1.amazonaws.com/", "img": "http://s2.postimg.org/ihlmt3p0l/Venturify_Transparent_New.png", "height": 21}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": false, "profile": "sharethis"}, "fblike": { "visible": false, "url": ""}, "twitter": { "visible": false, "user": "sharethis"}, "twfollow": { "visible": false}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "pinterest", "googleplus"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>

</html>