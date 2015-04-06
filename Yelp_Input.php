<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s22.postimg.org/dyladtyv3/cityskylinenycheader.png");
		padding: 8px 4px;
	clear: both;
	}
	section {
	height: 680px;
	}

		hr {
	margin-top: 40px;
	border-width: 1px;
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
		session_start();
		include 'login/php/navigation.php';
		?>
	</nav>	
<section>

	<div class="headerTitle">Search</div>
	<div class="centerText">
  <p>
  <br>
  <?php
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	if(empty($_SESSION['message'])){
  		echo "Enter a term and location here!";
  	}
  	$_SESSION['message'] = "";
  	?>
  </p>
  <hr>
  </div>		
 
	<form id="userInfo" action="Yelp_Output.php" method="post">
	
				Fill out all fields: <p>
				What are you looking for?<br><input type="text" name="term" value= "" required><br>
				Where?<br> <input type="text" name="location" value="" required ><br>
				<input class="_hidden" type="text" name="sort" value="0">
				<input id="submit" type="submit" value ="Search">
		</form>
	
	</section>
	
		<footer id="footer">	
		</footer>
</body>
</html>