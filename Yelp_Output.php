<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javaScript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s18.postimg.org/cjg6chn2x/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
}
	nav {
	width: 995px;
    position: fixed;
  	}
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

	</script>
	
</head>
<body>
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
<ul>
  <li class="current-menu-item"><a href="index.html">Home</a></li>
  <li><a href="#">MENU ONE</a>
    <ul>
      <li><a href="Yelp_Output.php">PAGE ONE</a></li>
      <li><a href="#">Sub Menu 2</a></li>
      <li><a href="#">Sub Menu 3</a></li>
      <li><a href="#">Sub Menu 4</a></li>
      <li><a href="#">Sub Menu 5</a></li>
    </ul>
  </li>
  <li><a href="#">Menu 2</a>
    <ul>
      <li><a href="#">Sub Menu 1</a></li>
      <li><a href="#">Sub Menu 2</a></li>
      <li><a href="#">Sub Menu 3</a></li>
    </ul>
  </li>
   <li><a href="Vulcan/weatherPage.html">WEATHER</a></li>
  <li><a href="Vulcan/signup.html">SIGN UP</a></li>
  <li><a href="#">PAGE NAME</a></li>
  </ul>
</nav>
<section>
<?php
	$t = $_POST["term"];
	$l = $_POST["location"];
?>
<?php include 'yelp_query'; ?>
<?php include 'yelp_query_out.php'; ?>		
</section>
	
	<footer>
	<font size="2" color="white"> <a href="Vulcan/url">App Name</a>|<a href="Vulcan/url">By Team Vulcan</a>| Bentley University | CS460 | Spring 2015 |</font>
	</footer>
</body>
</html>