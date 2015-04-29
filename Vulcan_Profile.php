<?php
session_start();
include 'login/load_profile.php';
include 'login/load_groups.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script><!-- These scripts build the social sharing bar -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<!-- ------------------------------------------------------------------------------------->

	
	<style type="text/css">
	header{
	background-image: url("http://s14.postimg.org/cimf0i2e7/EE8_A129965.jpg");
	}	
	
	section {
	height: 680px;
	}

	</style>
	<script type="text/javascript">
	
	function manageGroups(){
	document.getElementById('manageGroups').onclick=
		location.href= "http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Profile.php";		
	}

	</script>
	
</head>
<body>
<nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>	

	<header>
	</header>
	
	<section>

	<div class="headerTitle">Profile: <?php echo $_SESSION['user']; ?> </div>

	<div class="centerText">
  <br><br><font size="5"> Hello <font color="#0198E1"> <?php echo $_SESSION['user']; ?>. </font> Welcome to your profile! </font><br><br>
<hr>
  </div>	
  <span id="message">
  	<?php 
  		if (isset($_SESSION['message'])){
  			echo $_SESSION['message'];
  			$_SESSION['message'] = ""; 
  		} 
  	?>
</span>
  	<form id="userInfo" action="Vulcan_Profile.php" method="post">
		<b><center>Your Account Information:</center> </b> <br> <p>Username:</p>
		<input type="text" name="username" value= "<?php echo $userName; ?>" id="userNameForm" readonly><br>
		<p>Email Address:</p>
		<input type="text" name="email" value="<?php echo $userEmail; ?>" id="userEmailForm" readonly>
		<br><p>Member ID:</p>
		<input type="text" name="id" value="<?php echo $userId; ?>" id="userIDForm" readonly> <br>
		<hr>
		<div id="manageGroups" onclick="manageGroups();">
			<a href="Vulcan_Manage_Groups.php"  style="text-decoration:none;">
				Manage Your Groups
			</a>
		</div>
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