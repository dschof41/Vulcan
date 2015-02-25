var BLACK = true;
var AVATAR = "images/avatar";
var SUFFIX = "";
window.onload = function () {
// updated by jd robertson: Sun, Dec 28, 2014
	var html = "";
	html += "<div id='_avatar64'><img src='"+AVATAR+".png' class='_siz64'></div>";
	html += "<div id='_name'>";
	html += "<div id='_firstname'>Team</div>";      // change to student's first name
	html += "<div id='_lastname'>Vulcan</div>";     // change to student's last name
	html += "<div id='_shortname'>CS-460</div>"; // change to student's Bentley shortname
	html += "</div>";
	html += "<div id='_headback'><img src='"+AVATAR+".png' class='_siz256'></div>";
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = "";
	html += "<span id='_avatar32'><img src='"+AVATAR+".png' class='_siz32'></span>";
	html += "<span id='_course'>CS-460</span>";
	html += "<span id='_semester'>Bentley University Spring 2015</span>";
	html += "<span id='_date'></span>";
	html += "<span id='_file'></span>";
	document.getElementsByTagName("footer")[0].innerHTML = html; // set footer
	var date = dateStandard() + " " + julianDate() + " " + browserType().toUpperCase();
	document.getElementById("_date").innerHTML = date;
	var path = location.pathname;
	path = path.substring(path.lastIndexOf("/") + 1);
	document.getElementById("_file").innerHTML = path;
	document.getElementById("_file").style.color = browserColor();
	if(!BLACK) {
		document.getElementById("_firstname").style.color = browserColor();
	}
	else {
		document.getElementById("_firstname").style.color = "black";
		SUFFIX = "_gs";
	}
	var head = document.getElementsByTagName("header")[0];
	head.onclick = function () {
		history.go(-1);
	}
	if(document.title.toLowerCase().indexOf("template") > -1) { // flash section for careless student not changing document title
		var obj = document.getElementsByTagName("section")[0];
		setInterval("document.getElementsByTagName('section')[0].style.backgroundColor = ['black',browserColor()][fnr(0,1)];",100);
	};	
	var aside = document.getElementsByTagName("aside")[0]; 
	if(aside.innerHTML.length < 3) { // if aside empty, section fills page
		document.getElementsByTagName("section")[0].style.width = "960px";
	}
	var foot = document.getElementsByTagName("footer")[0];
	foot.onmouseover =
		function () {
			var obj = document.getElementById("_avatar32");
			var obj2 = document.getElementById("_avatar64");
			var obj3 = document.getElementById("_headback");
			obj.innerHTML = "<img src='images/" + browserType() + SUFFIX + ".png' class='_siz32'>";
			obj2.innerHTML = "<img src='images/" + browserType() + SUFFIX + ".png' class='_siz64'>";
			obj3.innerHTML = "<img src='images/" + browserType() + SUFFIX + ".png' class='_siz256'>";
			obj = document.getElementById("_date");
			html = dateStandard();
			if(browserType()!= "chrome" && browserType()!= "safari") html = dateLastModifiedStandard() + " last modified"; 
			obj.innerHTML = html;
		} // end mouseover avatar32	
	foot.onmouseout =
		function () {
			var obj = document.getElementById("_avatar32");
			var obj2 = document.getElementById("_avatar64");
			var obj3 = document.getElementById("_headback");
			obj.innerHTML = "<img src='"+AVATAR+".png' class='_siz32'>";
			obj2.innerHTML = "<img src='"+AVATAR+".png' class='_siz64'>";
			obj3.innerHTML = "<img src='"+AVATAR+".png' class='_siz256'>";
			obj = document.getElementById("_date");
			var date = dateStandard() + " " + julianDate() + " " + browserType().toUpperCase();
			obj.innerHTML = date;
		} // end mouseout avatar32
	setup();
}

function setup() {
		
}

function dateStandard() {
// standardized display format for date object
// created by jd robertson: Sun, Jan 6, 2013
// updated by jd robertson: Wed, Jan 8, 2014
// Mon, Jul 15, 2013
 	var date = new Date();
	var x = date.toString();
	var stan = "";
	stan += x.substring(0,3) + ", ";
	stan += x.substring(4,7) + " ";
	var dd = parseInt(x.substring(8,10),10);
	stan += dd + ", ";
	stan += x.substring(11,24);
	return stan;
}

function dateLastModifiedStandard() {
// standardized display format for document.lastModified
// rewritten by jd robertson Wed, Jan 8, 2014
// modified Tue, August 5, 2014
// Mon, Jul 15, 2013 12:00:00
 	var x = document.lastModified;
	var mm = parseInt(x.substring(0,2),10) - 1;
	var dd = parseInt(x.substring(3,5),10);
	var yyyy = parseInt(x.substring(6,10));
	var a = Math.floor((14 - (mm + 1)) / 12);
	var y = yyyy - a;
	var m = (mm + 1) + 12 * a - 2;
	var d = (dd + y + Math.floor(y / 4) - Math.floor(y / 100) + Math.floor(y / 400) + Math.floor((31 * m) / 12)) % 7;
	var dow = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
	var mon = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
	stan = dow[d] + ", " + mon[mm] + " " + dd + ", " + yyyy + " " + x.substring(10);
	var bt = browserType();
	if(bt == "chrome" || bt == "safari") stan = ""; 
	return stan;
}

function browserType() {
// browser sniffing; updated 12/28/2013
	var x = navigator.userAgent; 
	x = x.toUpperCase();
	if(x.indexOf("CHROME") > -1) return "chrome";
	if(x.indexOf("FIREFOX") > -1) return "firefox";
	if(x.indexOf("SAFARI") > -1) return "safari";
	if(x.indexOf("OPERA") > -1) return "opera";
	if(x.indexOf("LIKE GECKO") > -1) return "ie";
	return "other";
}

function browserColor() {
// updated by jd robertson: Fri, Dec 26, 2014
	var c = "black";
	var b = browserType();
	if(b == "chrome") c = "#34a969";
	if(b == "safari") c = "#2e75ed";
	if(b == "ie") c = "#39bbea";
	if(b == "firefox") c = "#ec7723";
	if(b == "opera") c = "#e81616";
	if(b == "other") c = "#215a8e";
	return c;
} 

var COLOR = ['AliceBlue','AntiqueWhite','Aqua','Aquamarine','Azure','Beige','Bisque','Black','BlanchedAlmond','Blue','BlueViolet','Brown','BurlyWood','CadetBlue','Chartreuse','Chocolate','Coral','CornflowerBlue','Cornsilk','Crimson','Cyan','DarkBlue','DarkCyan','DarkGoldenRod','DarkGray','DarkGreen','DarkKhaki','DarkMagenta','DarkOliveGreen','DarkOrange','DarkOrchid','DarkRed','DarkSalmon','DarkSeaGreen','DarkSlateBlue','DarkSlateGray','DarkTurquoise','DarkViolet','DeepPink','DeepSkyBlue','DimGray','DodgerBlue','FireBrick','FloralWhite','ForestGreen','Fuchsia','Gainsboro','GhostWhite','Gold','GoldenRod','Gray','Green','GreenYellow','HoneyDew','HotPink','IndianRed','Indigo','Ivory','Khaki','Lavender','LavenderBlush','LawnGreen','LemonChiffon','LightBlue','LightCoral','LightCyan','LightGoldenRodYellow','LightGray','LightGreen','LightPink','LightSalmon','LightSeaGreen','LightSkyBlue','LightSlateGray','LightSteelBlue','LightYellow','Lime','LimeGreen','Linen','Magenta','Maroon','MediumAquaMarine','MediumBlue','MediumOrchid','MediumPurple','MediumSeaGreen','MediumSlateBlue','MediumSpringGreen','MediumTurquoise','MediumVioletRed','MidnightBlue','MintCream','MistyRose','Moccasin','NavajoWhite','Navy','OldLace','Olive','OliveDrab','Orange','OrangeRed','Orchid','PaleGoldenRod','PaleGreen','PaleTurquoise','PaleVioletRed','PapayaWhip','PeachPuff','Peru','Pink','Plum','PowderBlue','Purple','Red','RosyBrown','RoyalBlue','SaddleBrown','Salmon','SandyBrown','SeaGreen','SeaShell','Sienna','Silver','SkyBlue','SlateBlue','SlateGray','Snow','SpringGreen','SteelBlue','Tan','Teal','Thistle','Tomato','Turquoise','Violet','Wheat','White','WhiteSmoke','Yellow','YellowGreen'];

function randomColor() {
	return COLOR[fnr(0,COLOR.length-1)];
}  

function fnr(a,b) {
// random integer on closed interval [a,b]
	var r = a + Math.floor((b - a + 1) * Math.random());
	return r;
}

function fix(i,j) {
// returns integer as string with length j; leading zeros added if necessary
	var x = "000000" + i;
	return x.substring(x.length - j, x.length);
}

function julianDate(j,k,i) {
// JulianDate Algorithm 
// modified by jd robertson: Mon, Aug 25, 2014 
// added by jd robertson: Mon, Aug 25, 2014 
	if(!j) { // no args, use today's date
		var today = new Date();
		j = today.getMonth() + 1;
		k = today.getDate();
		i = today.getFullYear();
	}
	var m = 0;
	var y = 0;
	if (j > 2) {
		m = j - 3;
		y = i;
	}
	else {
		m = j + 9;
		y = i - 1;
	}
	var c = Math.floor(y / 100);
	var d = y % 100;
	var p = Math.floor((146097 * c)/4);
	var q = Math.floor((1461 * d)/4);
	var r = Math.floor((153 * m + 2)/5);
	var n = p + k + q + 1721119 + r;
	return n;
}