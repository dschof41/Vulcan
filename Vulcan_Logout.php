<?php
//This page logs the user out
include 'login/check_session.php'; 
include 'login/logout.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logged Out</title>
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
		background-image: url("images/banner7.jpg");

	}

	.error{
		font-size: medium;
		font-family: Century Gothic;
		color: #0D4F8B;
		text-align: center;
		
	}
	.centerText {
     	height: 150px;
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

	<div class="headerTitle">Logged Out</div>

	<div class="centerText">
	<br><br>
	 <p class="error"><?php echo $logout ?></p>
  </div>
  	
 
  </section>
	
		<footer id="footer">
			</footer>
</body>
<script type="text/javascript">stLight.options({publisher: "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", "logo": { "visible": true, "url": "http://s2.postimg.org/ihlmt3p0l/Venturify_Transparent_New.png", "img": "", "height": 21}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": false, "profile": "sharethis"}, "fblike": { "visible": false, "url": ""}, "twitter": { "visible": false, "user": "sharethis"}, "twfollow": { "visible": false}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "pinterest", "googleplus"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>

</html>