<?php 
	//This page lets the user login to their account
	session_start();
	include 'login/php/connect.php';
	
	$_SESSION['count'] = 0;
	switch ($_SESSION['recoveryQuestion']){ //displays the chosen security question
		
		case 0:
			$q = "What was your first pet's name?";
			break;
		case 1:
			$q = "What city were you born in?";
			break;
		case 3:
			$q = "What is youre mother's maiden name?";
			break;
		default:
			$q = 'Error';
			break;
	}
	
	if(isset($_POST['answer']) && $_SESSION['count'] < 4) { //answered form is posted here, if count is too high lockout is true
			
		$givenAnswer = $_POST['answer'];//answer entered
				
		$storedAnswer = $_SESSION['recoveryAnswer'];//answer stored in db
		
		if($givenAnswer == $storedAnswer) { //answers match!
			//Create random, secure key
			$email = $_SESSION['emailAddress'];
			$expFormat = mktime(date("H"), date("i"), date("s"), date("m")  , date("d")+3, date("Y"));
       	 	$expDate = date("Y-m-d H:i:s",$expFormat);
       	 	$key = md5($email. rand(0,10000) .$expDate);
       	 	//Add key to database
       	 	include 'login/php/connect.php';
       	 	$email = mysqli_real_escape_string($con, $_SESSION['emailAddress']);
       	 	$sql = "INSERT INTO recoveryemails_enc (userEmail, resetKey, expDate) VALUES ('$email', '$key', '$expDate')"; //insert statement
       	 	$result = mysqli_query($con, $sql);
       	
       	 	if($result) {
       	 		$_SESSION['message'] = "Email sent! Thank you!";
       	 		//send email!
				include 'login/send_password_reset.php';
				header("Locaton: 'Vulcan_Login.php'");
				exit();
       	 	}else{
       	 		$_SESSION['message'] = "Error" . mysqli_error($con);
       	 	}

		}else{ //answers don't match
			$_SESSION['message'] = 'Answer does not match our records! Try again!';
			$_SESSION['count']++;
		}
		
	}else{
		$_SESSION['lockout'] = true;
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
  		echo "<font size='5pt'> Security Question</font>";
  	}
  	$_SESSION['message'] = "";
  	?>
  	</center><br>
  	<hr>
  	<br>
  	<div class="error">
   </div>

  </div>		
  	<form id="userInfo" action="Reset_Password_Question.php" method="post"> <br>
  				<?php //Security question
  					print $q;
  				?>
				Answer: <input type="text" name="answer" value= "" id="inputLogin" required><br><br><br>
				<input id="submit" type="submit" value ="Submit"><br><br><br>
				<font size="2">Don't have an account? <a href="http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Signup.php">Sign Up Here!</a></font>
		</form>
	
	</section>
	
		<footer id="footer">
			</footer>
</body>
</html>