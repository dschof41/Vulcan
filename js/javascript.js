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
	
	html += "<div id='_headerlogo'><img src='http://s10.postimg.org/zck4xlgk5/Bentley_University_Logo.jpg'/> </div>";


	html += "</div>";
	//html += "<div id='_headback'><img src='"+AVATAR+".png' class='_siz196'></div>";
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = "";
	//html += "<span id='_avatar32'><img src='"+AVATAR+".png' class='_siz32'></span>";	
	}