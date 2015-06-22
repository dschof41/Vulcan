<?php 
	//This page lets users choose a new password
	session_start();
	include 'login/php/connect.php';

	if(isset($_GET['email'])){//this will be set if the page is accessed from the reset email
		//Get variables from unique link
		$userEmail = urldecode(base64_decode($_GET['email']));
		$_SESSION['emailAddress'] = $userEmail;
		$userKey = $_GET['key'];
		$curDate = date("Y-m-d H:i:s");
				
		//Grab associated db records
		$sql = "SELECT * FROM recoveryemails_enc WHERE userEmail = '$userEmail' AND resetKey = '$userKey' AND expDate >= '$curDate'"; //look for reset record that matches email link
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_assoc($result);
		$numRows = mysqli_num_rows($result);
		
		//Check if matching reset record is found
		if($result && $numRows > 0){
			$sql = "DELETE FROM recoveryemails_enc WHERE resetKey = '$userKey'"; //delete the reset record since password is being reset currently and this key won't be needed
			$result = mysqli_query($con, $sql);
			if($result){
				$_SESSION['message'] = "Reset record found and deleted! Continue with process!";
			}else{
				$_SESSION['message'] = "Record found but not deleted" . mysqli_error($con);
			}
		}else{
			
			$_SESSION['message'] = "Error! Reset link most likely expired!" . mysqli_error($con);
			mysqli_close($con);
			header("Locaton: Vulcan_Login.php");
			exit();
		}
	}
	
	//Once a new password is submitted this script runs
	if(isset($_POST['newpass'])){
		$password = md5($_POST['newpass']);
		$pLength = strlen($_POST['newpass']);
		$email = $_SESSION['emailAddress'];
	
		
		if ($pLength >= 8 && $pLength <= 16) {
			$sql = "UPDATE login SET L2 = '$password' WHERE userEmail = '$email'";
			$result = mysqli_query($con, $sql);
			
			if($result){
				mysqli_close($con);
				$_SESSION['message'] = "Password changed! Now you can log in!";
				header("Location: Vulcan_Login.php");
				exit();
			}else{
				$_SESSION['message'] = "Database error: " . mysqli_error($con);;
			}

		}else{
			$_SESSION['message'] = "Password must be between 8 and 16 characters";
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

	<div class="headerTitle">Password Reset</div>

	<div class="centerText">
<center><br><br>
  <?php 
  	if(isset($_SESSION['message'])){
  		echo $_SESSION['message'];
  	}
  	if(empty($_SESSION['message'])){
  		echo "<font size='5pt'> Choose a new password</font>";
  	}
  	$_SESSION['message'] = "";
  	?>
  	</center><br>
  	<hr>
  	<br>
  	<div class="error">
   </div>

  </div>		
  	<form id="userInfo" action="New_Password.php" method="post"> <br>
				New Password: <input type="password" name="newpass" value= "" id="inputLogin" required><br><br><br>
				Confirm Password: <input type="password" name="confirmpass" value="" id="inputLogin" required><br><br>
				<input id="submit" type="submit" value ="Submit" onclick="validatePassword();"><br><br><br>
	</form>
	
	</section>
	
		<footer id="footer">
			</footer>
</body>
</html>