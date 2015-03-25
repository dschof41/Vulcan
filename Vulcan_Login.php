<?php 
	
	session_start();
	include 'login/login.php';
?>	
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
	background-image: url("http://s1.postimg.org/snl9ugl5r/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
}
	</style>
	
	<script type="text/javascript">
	
	var ref = <?php json_encode($_SERVER['HTTP_REFERER']); ?>
	//alert(ref);
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
  <p><span class="error">
  <?php 
  	if($_SESSION['attempts'] < 4){
  	echo "You have: " . $_SESSION['attempts'] . " attempts remaining";
  	}
 ?>
 </span></p>
  <div style="padding-left: 520px; padding-right: 270px; padding-top: 28px; padding-bottom: 25px; height: 290px; width: 250px; color: #0D4F8B; text-align: left;"/>
  
	<form id="userInfo" action="Vulcan_Login.php" method="post">
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