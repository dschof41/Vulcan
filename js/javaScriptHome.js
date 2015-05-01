//This script builds the home page for the site

var BLACK = false;
var AVATAR = "images/book256";
window.onload = function () {
var html = "";
	
	
	html += "<div>";
	html += "<div id='_firstname'>V E N T U R I F Y</div><br>";
	html += "<div id='_headersubtext'>For When Adventure Finds You</div>";
	
	html+=	"<div id='buttons'><ul><li><a href='Yelp_Input.php'>SEARCH &nbsp;🔍</a></li><li><a href='Vulcan_Login.php'>LOG IN &nbsp;⇨</a></li><li><a href='Vulcan_Signup.php'>SIGN UP &nbsp;⇧</a></li></ul></div>";
	html += "</div>";
	
	document.getElementById("background_cycler").innerHTML = 
	
	"<img class='active' + src='http://s17.postimg.org/8e2k68q9p/backgroundimage4.png' alt=''/>" +
	"<img src='http://s8.postimg.org/ikmbkbu5v/backgroundimage1.jpg' alt=''/>" +
	"<img src='http://s10.postimg.org/a0yqz2riv/backgroundimage3.png' alt =''/>" +
	"<img src='http://s4.postimg.org/kqfx5p0uj/backgroundimage2.jpg' alt=''/>" 

	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = ""
	document.getElementById("footer").innerHTML =
	
	"<a href='#'>App Name</a>" + " | <a href='#'> By Team Vulcan</a>" + " | Bentley University | CS460 | Spring 2015 | " + "<a href='#' class='tip' title='All images used on this site are licensed under Creative Commons Zero (CC0) license. '>Image Disclaimer</a>";
	}
	
	function cycleImages(){
      var $active = $('#background_cycler .active');
      var $next = ($('#background_cycler .active').next().length > 0) ? $('#background_cycler .active').next() : $('#background_cycler img:first');
      $next.css('z-index',2);
	  $active.fadeOut(1500,function(){
	  $active.css('z-index',1).show().removeClass('active');
      $next.css('z-index',3).addClass('active');
      });
    }

    $(window).load(function(){
		$('#background_cycler').fadeIn(1500);
		  setInterval('cycleImages()', 5000);
    })
    
    $('#background_cycler').hide();