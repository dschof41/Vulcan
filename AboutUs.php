<!-- This page takes uer input and returns yelp query results on the output page -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<!-- These scripts build the social sharing bar -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<!-- ------------------------------------------------------------------------------------->

	<style type="text/css">
	header{
	background-image: url("http://s22.postimg.org/qlpka5mdb/campus_v2_1.jpg");

	}
	section {
	height: 900px;
	}
	#submit{
	width: 429px;
	left:-94px;
	}
	body{
	color: #0D4F8B;
	font-size: 18px;
}

	.centerText {
	height: 700px;
	width: 700px;
	font-weight: normal;	
	padding-left: 29px;
	padding-right: 29px;
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

	<div class="headerTitle">About Us</div>
		<div class="centerText"><br>
	<center> <img src="http://i59.tinypic.com/2gx0cw3.jpg" style=""><br><br><hr><br>
	 
	<b>What is Venturify?</b><br><br>
	
Venturify is a web application that allows you to search for attractions near a certain location and save the search results (called “cards”) to groups that you have created. These groups can act as lists or itineraries as well. Create a group with your favorite sushi restaurants or even a group filled with your bucket list! The possibilities are limitless. 
	<br><br>
	<p>
	<b>Team Vulcan | Bentley University | CS 460 | Spring 2015</b><br><br>
	Trinh Mai - Project Manager<br><br>
	Dan Schofer - Lead Analyst (Web & Database)<br><br>
	Jamie Brown - Quality Assurance Manager & Web Analyst<br><br>
	Jake Barosin - Document Manager & Database Analyst<br><br>
	Huang Lu - Web Analyst (User Interface)<br><br>
	Jose Castillo - Web Analyst <br><br>
	Andres Escobar - Database Analyst
	
	</p>
	
	</center>
</div>
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