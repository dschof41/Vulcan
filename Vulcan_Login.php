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
</html>