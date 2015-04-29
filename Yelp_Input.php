<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<!-- These scripts build the social sharing bar -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<!-- ------------------------------------------------------------------------------------->

	<style type="text/css">
	header{
	background-image: url("http://s8.postimg.org/yrvywlrur/D9_D2_DC90_AD.jpg");
	}
	section {
	height: 680px;
	}
	#submit{
	width: 429px;
	left:-94px;
	}
	.centerText{
	height: 500px;
}
	</style>
	<script type="text/javascript">
		
	</script>
	
</head>
<body>

	<nav id="primary_nav_wrap">
		<?php 
		session_start();
		include 'login/php/navigation.php';
		?>
	</nav>
	
	<header>
	</header>
	<section>

	<div class="headerTitle">Search</div>
	<div class="centerText">
  <br><br>
 <center> <?php
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	//"Start your search here" should be visible no matter what! The message should be below it and conditional
  	if(empty($_SESSION['message'])){
  		echo "<font size='5pt'> Start Your Search </font>";  
  	}
  	$_SESSION['message'] = "";
  	?> 
  	</center><br>
 <hr>
 <font size=""></font>
   </div>		
 
	<form id="userInfo" action="Yelp_Output.php" method="get">
			<br><br><center><b>What are you looking for:</b></center><input type="text" name="term" value= "" id="inputSearch" placeholder="restaurants, hotels, sushi bars, coffee & tea, etc." required><br><br>
				<center><b>Where:</b></center><input type="text" name="location" value="" id="inputSearch" placeholder="city or zip code (e.g., Boston, 02112)" required ><br>
				<input class="_hidden" type="text" name="sort" value="0"><br><br>
				<input id="submit" type="submit" value ="Search  🔍"><br><br><br>
				<p><center>Powered by <img src="https://s3-media3.fl.yelpassets.com/assets/2/www/img/2d7ab232224f/developers/yelp_logo_100x50.png"></center><P>
		</form>
	
	</section>
	
		<footer id="footer">	
		</footer>
</body>
<script type="text/javascript">stLight.options({publisher: "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", "logo": { "visible": true, "url": "http://ec2-52-0-130-98.compute-1.amazonaws.com/", "img": "http://dailydropcap.com/images/V-12.jpg", "height": 50}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": false, "profile": "sharethis"}, "fblike": { "visible": false, "url": ""}, "twitter": { "visible": false, "user": "sharethis"}, "twfollow": { "visible": false}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "pinterest", "googleplus"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>

</html>