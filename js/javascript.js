var BLACK = false;
var AVATAR = "images/book256";
window.onload = function () {
	var html = "";

document.getElementById("footer").innerHTML =
	
	"<a href='#'>App Name</a>" + " | <a href='#'> By Team Vulcan</a>" + " | Bentley University | CS460 | Spring 2015 | "
	+ "<a href='#' class='tip' title='All images used on this site are from Pexels.com and are licensed under Creative Commons Zero (CC0) license. '>Image Disclaimer</a>"

	
	document.getElementById("primary_nav_wrap").innerHTML =
	"<ul>"+
	"<li class='current-menu-item'>"+
  	"<a href='index.html'>HOME</a></li>" +
  	"<li><a href='Yelp_Input.php'>SEARCH</a></li>"+
  	"<li><a href='weatherPage.php'>WEATHER</a></li>"+
  	"<li><a href='Vulcan_Login.php'>LOGIN</a></li>" +
  	"<li><a href='Vulcan_Signup.php'>REGISTER</a></li>"+
  	"<li><a href='weatherApp.php'>NEW WEATHER</a></li>"+
  	"<li><a href='Vulcan_Logout.php'>LOGOUT</a></li>"+
  	"</ul>"
	}
