<?php
//This page lets a user sign up for an account
session_start();
//session_destroy();
//include 'login/signup.php';
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
	<!----------------------------JQUERY Library--------------------------------->
	<link href="js/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"> 
	<script src="js/jquery-1.11.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui/jquery-ui.js" type="text/javascript"></script>
	<!--------------------------------------------------------------------------->

	<style type="text/css">
	header{
	background-image: url("images/banner3.jpg");
	}	
	
	section {
	height: 500px;
	}

	#submit
	{
	left: 14px;
	}	
	
	.centerText{
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
	$(function() {//add jquery tooltips
  	 	 $( document ).tooltip();
  	});

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
     
  <form id="userInfo" action="login/signup.php" method="post">
				Username: <input type="text" name="username" value= "" id="inputSignUp" title="Must be between 10 and 20 characters!" required><br><br><br>
				Email Address: <input type="text" name="email" value="" id="inputSignUp" title="Must be a valid email" required><br><br><br>
				Password: <input type="password" name="password" value="" id="inputSignUp" title="Must be between 8 and 16 characters" required><br><br><br>
				Confirm Password: <input type="password" name="confirmpw" value="" id="inputSignUp" required><br><br><br>
				Security Question: <select name="question" id="inputSignUp" style="width:inherit">
					<option value="0">What was your first pet's name?</option>
					<option value="1">What city were you born in?</option>
					<option value="2">What is youre mother's maiden name?</option>
				</select><br><br><br>
				Answer: <input type="text" name="answer" value="" id="inputSignUp" required><br><br><br>
				<input id="submit" type="submit" value ="Create Account" onclick="return validatePassword();"><br><br><br>
				<font size="2">Already have an account? <a href="http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Login.php">Sign In!</a></font>
		</form>
	</section>
	
		<footer id="footer">
		</footer>
</body>

</html>