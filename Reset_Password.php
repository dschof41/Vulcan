<?php 
	//This page lets the user login to their account
	session_start();
	include 'login/php/connect.php';

	if(isset($_POST['email'])) {
		$email = $_POST['email'];
		$SQL = "SELECT * FROM login WHERE userEmail = '$email'"; //checks that email is associated with an account
		$result = mysqli_query($con, $SQL);
		$num_rows = mysqli_num_rows($result);
		
		if($result){
			if($num_rows > 0){ //ACCOUNT EXISTS - move on to security question
				$_SESSION['emailAddress'] = $email;
				$row = mysqli_fetch_assoc($result);
				$_SESSION['recoveryQuestion'] = $row['resetquestion'];
				$_SESSION['recoveryAnswer'] = $row['resetanswer'];
				header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Reset_Password_Question.php");
				exit();
			}else { //NO ACCOUNT - sends message
				$_SESSION['message'] = "You don't have an account yet!";
			}
		}else{
			$_SESSION['message'] = 'Error';
		}
	}
	mysqli_close($con);
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
	background-image: url("images/banner1.jpg");
	}
	section {
	height: 680px;
	}
	
	</style>
	
	<script type="text/javascript">
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

	<div class="headerTitle">Reset Password</div>

	<div class="centerText">
<center><br><br>
  <?php 
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	if(empty($_SESSION['message'])){
  		echo "<font size='5pt'> Reset password</font>";
  	}
  	$_SESSION['message'] = "";
  	?>
  	</center><br>
  	<hr>
  	<br>
  	<div class="error">
   </div>

  </div>		
  	<form id="userInfo" action="Reset_Password.php" method="post"> <br>
				Enter email: <input type="text" name="email" value= "" id="inputLogin" required><br><br><br>
				<input id="submit" type="submit" value ="Submit"><br><br><br>
	</form>
	
	</section>
	
		<footer id="footer">
			</footer>
</body>
</html>