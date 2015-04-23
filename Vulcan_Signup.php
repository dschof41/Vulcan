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
	background-image: url("http://s2.postimg.org/iy4m2djqf/GXN82_BXGVD.jpg");
	}	
	
	section {
	height: 680px;
	}

	#submit
	{
	left: 8px;
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
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>	
<section>

	<div class="headerTitle">Sign Up</div>

	<div class="centerText">
	<p>-------------------------------------------------------------- </p>
  <p>Welcome! Create your account to get started!</p>
 	<p>-------------------------------------------------------------- </p>
 	<div class="error">
  	<?php
  		if(isset($_SESSION['message'])){
  			echo $_SESSION['message'];
  		}
  		$_SESSION['message'] = "";
  	?>
  </div>

  </div>		
     
  <form id="userInfo" action="Vulcan_Signup.php" method="post">
  <br><br>
				Username: <input type="text" name="username" value= "" id="inputSignUp" required><br>
				Email Address: <input type="text" name="email" value="" id="inputSignUp" required><br>
				Password: <input type="password" name="password" value="" id="inputSignUp" required><br>
				Confirm Password: <input type="password" name="confirmpw" value="" id="inputSignUp" required><br><br>
				<input id="submit" type="submit" value ="Create Account" onclick="return validatePassword();">
		</form>
	</section>
	
		<footer id="footer">
		</footer>
</body>
</html>