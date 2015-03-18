<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s29.postimg.org/8qn5kky13/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
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
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
	</nav>	
<section>

	<div class="headerTitle">Login</div>

	<div class="centerText">
  <p>Welcome to Vulcan... Please Login.</p>
  </div>		
  
  <div style="padding-left: 520px; padding-right: 270px; padding-top: 28px; padding-bottom: 25px; height: 290px; width: 250px; color: #0D4F8B; text-align: left;"/>
  
	<form id="userInfo" action="login/login.php" method="post">
				Username: <input type="text" name="username" value= "" required><br>
				Password: <input type="password" name="password" value="" required><br>
				<input id="submit" type="submit" value ="Login">
		</form>
	
	</section>
	
	<footer>
	<font size="2" color="white"> <a href="url">App Name</a>|<a href="url">By Team Vulcan</a>| Bentley University | CS460| Spring 2015 |</font>
	</footer>
</body>
</html>