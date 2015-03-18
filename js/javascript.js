var BLACK = false;
var AVATAR = "images/book256";
//AVATAR = "distortedgumbyimages/gumby"+fix(fnr(0,300),3);
//AVATAR = "images/avatar";
window.onload = function () {
	var html = "";
	//html += "<div id='_avatar64'><img src='"+AVATAR+".png' class='_siz64'></div>";
	html += "<div id='_name'>";
	
	html += "</div>";
	//html += "<div id='_headback'><img src='"+AVATAR+".png' class='_siz196'></div>";
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = "";
	//html += "<span id='_avatar32'><img src='"+AVATAR+".png' class='_siz32'></span>";	
	
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