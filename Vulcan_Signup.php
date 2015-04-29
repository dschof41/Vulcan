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
	left: 14px;
	}	
	
	.centerText{
	height: 550px;
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

<nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>	

	<header>
	</header>
	
<section>

	<div class="headerTitle">Sign Up</div>

	<div class="centerText"><br><br>
	<center> <font size="5">Create Your Account to Get Started</font> </center>
	<br>
	<hr>
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
				Username: <input type="text" name="username" value= "" id="inputSignUp" required><br><br><br>
				Email Address: <input type="text" name="email" value="" id="inputSignUp" required><br><br><br>
				Password: <input type="password" name="password" value="" id="inputSignUp" required><br><br><br>
				Confirm Password: <input type="password" name="confirmpw" value="" id="inputSignUp" required><br><br><br>
				<input id="submit" type="submit" value ="Create Account" onclick="return validatePassword();"><br><br><br>
				<font size="2">Already have an account? <a href="http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Login.php">Sign In!</a></font>
		</form>
	</section>
	
		<footer id="footer">
		</footer>
</body>
<script type="text/javascript">stLight.options({publisher: "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
</script>

</html>