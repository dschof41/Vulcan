<?php
include 'login/check_session.php'; 
include 'login/logout.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Logged Out</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
		background-image: url("http://s27.postimg.org/nb7omvgep/EC00_B0769_E.jpg");
	}

	.error{
		font-size: medium;
		font-family: Century Gothic;
		color: #0D4F8B;
		text-align: center;
		
	}
	.centerText {
     	height: 150px;
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

	<div class="headerTitle">Logged Out</div>

	<div class="centerText">
	<br><br>
	 <p class="error"><?php echo $logout ?></p>
  </div>
  	
 
  </section>
	
		<footer id="footer">
			</footer>
</body>
</html>