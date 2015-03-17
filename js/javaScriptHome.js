var BLACK = false;
var AVATAR = "images/book256";
window.onload = function () {
	var html = "";
	html += "<div id='_name'>";
	html += "<div id='_firstname'>TEAM VULCAN</div>";
	//html += "<div id='_lastname'>[CS460]</div>";
	html += "<div id='_headersubtext'>Description Description Description <br> ABCabc ABCabc ABCabc ABC</div>";
	
	html += "<div id='_headerlogo'><a href='http://philip.bentley.edu/LU_HUAN/TVHome.html'><img src='http://s15.postimg.org/4bnr3thon/Bentley_University_Logo.jpg'/> </div>";

	html += "</div>";
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = ""
	
	
	document.getElementById("primary_nav_wrap").innerHTML =
	"<ul><li class='current-menu-item'>"+
  "<a href='index.html'>HOME</a></li>" +
  "<li><a href='#'>MENU ONE</a>" +
    "<ul> <li><a href='Yelp_Input.php'>PAGE ONE</a></li>" +
     "<li><a href='templatePage.html'>PAGE TWO</a></li>" +
      "<li><a href='#'>Sub Menu 3</a></li>" +	
      "<li><a href='#'>Sub Menu 4</a></li>" +
     "</ul>" +
  "</li>" +
   "<li><a href='weatherPage.html'>WEATHER</a></li>" +
  "<li><a href='signup.html'>SIGN UP</a></li>" +
  "<li><a href='Yelp_Input.php'>YELP TEST</a></li>"
	}