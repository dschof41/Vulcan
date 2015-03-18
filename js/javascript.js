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
	"<ul><li class='current-menu-item'>"+
  "<a href='index.html'>HOME</a></li>" +
  "<li><a href='#'>MENU ONE</a>" +
    "<ul> <li><a href='TVPage_1.html'>PAGE ONE</a></li>" +
     "<li><a href='templatePage.html'>PAGE TWO</a></li>" +
      "<li><a href='#'>Sub Menu 3</a></li>" +	
      "<li><a href='#'>Sub Menu 4</a></li>" +
     "</ul>" +
  "</li>" +
   "<li><a href='weatherPage.html'>WEATHER</a></li>" +
  "<li><a href='signup.html'>SIGN UP</a></li>" +
  "<li><a href='Yelp_Input.php'>Yelp</a></li>"

	}