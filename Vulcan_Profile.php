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
	<script src="js/javascript.js" type="text/javascript"></script>
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
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>	
<section>

	<div class="headerTitle">Profile</div>

	<div class="centerText">
  <br><br>Profile for <?php echo $_SESSION['user']; ?>
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
		Profile Info:<br>
		<p>Username:</p>
		<input type="text" name="username" value= "<?php echo $userName; ?>" id="userName" readonly><br>
		<p>Email Address:</p>
		<input type="text" name="email" value="<?php echo $userEmail; ?>" id="userEmail" readonly>
		<p>Member ID:</p>
		<input type="text" name="id" value="<?php echo $userId; ?>" id="userID" readonly>
		<div id="manageGroups" onclick="manageGroups();">
			<a href="Vulcan_Manage_Groups.php">
				Manage Groups
			</a>
		</div>
	</form>
	
	
	</section>
	
		<footer id="footer">
		</footer>
</body>
</html>