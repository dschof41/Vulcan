var BLACK = false;
var AVATAR = "images/book256";
window.onload = function () {
	var html = "";
	
	
	html += "<div>";
	html += "<div id='_firstname'>TEAM VULCAN</div><br>";
	html += "<div id='_headersubtext'>Welcome to our site!</div>";
	html+=	"<div id='buttons'><ul><li><a href='Yelp_Input.php'>Search</a></li><li><a href='Vulcan_Login.php'>Login</a></li><li><a href='Vulcan_Signup.php'>Sign Up</a></li></ul></div>";	html += "</div>";
	
	
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = ""
	
	
	document.getElementById("primary_nav_wrap").innerHTML =
	"<ul>"+
	"<li class='current-menu-item'>"+
  	"<a href='index.html'>HOME</a></li>" +
  	"<li><a href='Yelp_Input.php'>SEARCH</a></li>"+
  	"<li><a href='weatherPage.html'>WEATHER</a></li>"+
  	"<li><a href='Vulcan_Login.php'>LOGIN</a></li>" +
  	"<li><a href='Vulcan_Signup.php'>REGISTER</a></li>"+
  	"</ul>"
	}