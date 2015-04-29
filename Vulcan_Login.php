<?php 
	//session_start();
	include 'login/login.php';
?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log In</title>
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
	background-image: url("http://s14.postimg.org/4emkkhwv3/JZ76_N0_N5_ZH.jpg");
	}
	section {
	height: 680px;
	}
	
	</style>
	
	<script type="text/javascript">
	
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
<nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>
	<header>
	</header>
		
<section>

	<div class="headerTitle">Log In</div>

	<div class="centerText">
<center><br><br>
  <?php 
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	if(empty($_SESSION['message'])){
  		echo "<font size='5pt'> Log In To Your Account</font>";
  	}
  	$_SESSION['message'] = "";
  	?>
  	</center><br>
  	<hr>
  	<br>
  	<div class="error">
  <?php 
  	if($_SESSION['attempts'] < 4){
  	echo "You have: " . $_SESSION['attempts'] . " attempts remaining";
  	}
 ?>
 </div>

  </div>		
  	<form id="userInfo" action="Vulcan_Login.php" method="post"> <br>
				Username: <input type="text" name="username" value= "" id="inputLogin" required><br><br><br>
				Password: <input type="password" name="password" value="" id="inputLogin" required><br><br>
				<input id="submit" type="submit" value ="Log In"><br><br><br>
				<font size="2">Don't have an account? <a href="http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Signup.php">Sign Up Here!</a></font>
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