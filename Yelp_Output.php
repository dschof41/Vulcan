<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>Test</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png"/>
	<link href="css/styleCorePage1.css" rel="stylesheet" type="text/css"/>
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css"/>
	<script src="js/javaScript.js" type="text/javascript"></script>
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<style type="text/css">
	</style>
	
	<script type="text/javascript">
	
	var BLACK = false;
var AVATAR = "images/book256";
//AVATAR = "distortedgumbyimages/gumby"+fix(fnr(0,300),3);
//AVATAR = "images/avatar";
window.onload = function () {
// updated by jd robertson: Fri, Jan 9, 2015
	var html = "";
	//html += "<div id='_avatar64'><img src='"+AVATAR+".png' class='_siz64'></div>";
	html += "<div id='_name'>";
	html += "<div id='_firstname'>TITLE</div>";
	//html += "<div id='_lastname'>[CS460]</div>";
	//html += "<div id='_headersubtext'>COMING SOON</div>";
	//html += "<div id='_shortname'>JDRobertson</div>";
	html += "</div>";
	//html += "<div id='_headback'><img src='"+AVATAR+".png' class='_siz196'></div>";
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = "";
	//html += "<span id='_avatar32'><img src='"+AVATAR+".png' class='_siz32'></span>";
	}

function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(51.508742,-0.120850),
    zoom:5,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);


	</script>
	
</head>
<body>
	<header>
	</header>
	<nav>
		<ul>
		<li><a href="index.html">HOME</a></li>
		<li><a href="template.html">PAGE NAME</a></li>
		<li><a href="template.html">PAGE NAME</a></li>
		<li><a href="template.html">PAGE NAME</a></li>
		</ul>
	</nav>	
	<div class="section">
	<?php include 'yelp.php'; ?>		
	</div>
	
	<div class="footer">
	<font size="2" color="white"> <a href="url">App Name</a>|<a href="url">By Team Vulcan</a>| CS460 | Bentley University | Spring 2015 |</font>
	</div>
</body>
</html>