<?php
session_start();
include 'login/signup.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s9.postimg.org/gz0nx669p/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
}
	</style>
	<script type="text/javascript">
								 	
	function validatePassword() {
	    var x = userInfo.password.value;
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
	</nav>	
<section>

	<div class="headerTitle">Sign Up</div>

	<div class="centerText">
  <p>Welcome to ... Create your account to get started.</p>
  </div>		
  <p class="error">
  	<?php
  		if(isset($_SESSION['message'])){
  			echo $_SESSION['message'];
  		}
  		$_SESSION['message'] = "";
  	?>
  </p>
  <div style="padding-left: 550px; padding-right: 270px; padding-top: -10px; padding-bottom: 25px; margin-top: -40px; height: 290px; width: 250px; color: #0D4F8B; text-align: left;"/>
  
  <form id="userInfo" action="Vulcan_Signup.php" method="post">
				Fill out all fields: <p>
				Username: <input type="text" name="username" value= "" required><br>
				Email Address: <input type="text" name="email" value="" required ><br>
				Password: <input type="password" name="password" value="" required><br>
				Confirm Password: <input type="password" name="confirmpw" value="" required><br>
				<input id="submit" type="submit" value ="Create Account" onclick="return validatePassword();">
		</form>
	</section>
	
		<footer id="footer">
		</footer>
</body>
</html>