<?php 
	//session_start();
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
	background-image: url("http://s12.postimg.org/yty0pd157/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
	}
	section {
	height: 680px;
	}
	
	hr 
	{
	margin-top: 40px;
	border-width: 1px;
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
  <p>
  <br>
  <?php 
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	if(empty($_SESSION['message'])){
  		echo "Welcome to Vulcan... Please Login.";
  	}
  	$_SESSION['message'] = "";
  	?>
  </p>
 <hr>
  </div>		
  <p class="error">
  <?php 
  	if($_SESSION['attempts'] < 4){
  	echo "You have: " . $_SESSION['attempts'] . " attempts remaining";
  	}
 ?>
 </p>
  
	<form id="userInfo" action="Vulcan_Login.php" method="post">
				Username: <input type="text" name="username" value= "" required><br>
				Password: <input type="password" name="password" value="" required><br>
				<input id="submit" type="submit" value ="Login">
		</form>
	
	</section>
	
		<footer id="footer">
			</footer>
</body>
</html>