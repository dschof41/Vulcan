<?php include 'login/check_session.php'; ?>
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
	background-image: url("http://s11.postimg.org/zcogdwd7n/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
}
	</style>
	<script type="text/javascript">
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
  <p>Logged out</p>
  </div>
  
	<p class="error"><?php include 'login/logout.php'; ?></p>		
  
  <div style="padding-left: 520px; padding-right: 270px; padding-top: 28px; padding-bottom: 25px; height: 290px; width: 250px; color: #0D4F8B; text-align: left;"/>
  </section>
	
		<footer id="footer">
			</footer>
</body>
</html>