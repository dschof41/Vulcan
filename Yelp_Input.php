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
	background-image: url("http://s8.postimg.org/yrvywlrur/D9_D2_DC90_AD.jpg");
	clear: both;
	}
	section {
	height: 680px;
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
  <p>--------------------------------------------------------------- </p>
  <?php
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	if(empty($_SESSION['message'])){
  		echo "Start your search now!";
  	}
  	$_SESSION['message'] = "";
  	?>
  <p> -------------------------------------------------------------- </p>

   </div>		
 
	<form id="userInfo" action="Yelp_Output.php" method="post">
				<br><br>What are you looking for:<input type="text" name="term" value= "" id="inputSearch" placeholder="restaurants, hotels, etc." required><br>
				<br>Where:<input type="text" name="location" value="" id="inputSearch" placeholder="Boston, Waltham, etc." required ><br>
				<input class="_hidden" type="text" name="sort" value="0"><br>
				<input id="submit" type="submit" value ="Search  🔍"><br><br>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Powered by Yelp<P>
		</form>
	
	</section>
	
		<footer id="footer">	
		</footer>
</body>
</html>