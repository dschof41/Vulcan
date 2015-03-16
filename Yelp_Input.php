
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s30.postimg.org/yp7q00l75/snowmtskyheader1.png");
	padding: 8px 4px;
	clear: both;
}
	nav {
	width: 995px;
    position: fixed;
  	}

	.centerText {
    margin-left: auto;
    margin-right: auto;
    width: 100%;
    background-color: #0D4F8B;
    color: white;
    float: inherit;
    font-family: Century Gothic;
    text-align: center;
    padding-top: 1.2px;
    padding-bottom: 2px;
    border-top: 18px white solid;	
    border-bottom: 20px white solid;
    opacity:0.9;
}

#submit
{	
position: relative;
top: 19px;
left: 0px;
cursor:pointer; 
padding:5px 25px;
background: #009cde; 
border:1px solid #009cde; 
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 5px;
-webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
box-shadow: 0 0 4px rgba(0,0,0, .75);
color:#f3f3f3;
font-size:1.1em;
}

#submit:hover {
background-color :#0079ad;
-webkit-box-shadow: 0 0 1px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 1px rgba(0,0,0, .75);
box-shadow: 0 0 1px rgba(0,0,0, .75);
}

	</style>
	
	<script type="text/javascript">
		
	window.onload = function () {
	// updated by jd robertson: Fri, Jan 9, 2015
	var html = "";
	//html += "<div id='_avatar64'><img src='"+AVATAR+".png' class='_siz64'></div>";
	html += "<div id='_name'>";
	html += "<div id='_firstname'>Search</div>";
	html += "</div>";
	document.getElementsByTagName("header")[0].innerHTML = html; // set header
	html = "";
	}


	function validatePassword() {
    var x = userInfo.pw.value;
    var y = userInfo.confirmpw.value;
    if (x != y) {
        alert("Please Reconfirm Password");
        return false;
    }
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
      <li><a href="TVPage_1.html">PAGE ONE</a></li>
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
   <li><a href="weatherPage.html">WEATHER</a></li>
  <li><a href="Yelp_Input.php">SIGN UP</a></li>
  <li><a href="#">PAGE NAME</a></li>
  </ul>
</nav>	
<section>
	
	<div class="centerText">
  <p>Enter a term and location here!</p>
  </div>		
  
  <div style="padding-left: 520px; padding-right: 270px; padding-top: 28px; padding-bottom: 25px; height: 290px; width: 250px; color: #0D4F8B; text-align: left;"/>
  
	<form id="yelpIn" action="Yelp_Output.php" method="post">
	
				Fill out all fields: <p>
				Term:<br><input type="text" name="term" value= "" required><br>
				Location:<br> <input type="text" name="location" value="" required ><br>
				<input id="submit" type="submit">
		</form>
	
	</section>
	
	<footer>
	<font size="2" color="white"> <a href="url">App Name</a>|<a href="url">By Team Vulcan</a>| Bentley University | CS460| Spring 2015 |</font>
	</footer>
</body>
</html>