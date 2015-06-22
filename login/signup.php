<?PHP
/*
	This script handles checking sign up info against existing accounts, and creating new users in the database
*/
$uname = "";
$pword = "";
$errorMessage = "";
$num_rows = 0;
$email = "";

function quote_smart($value, $handle) {

   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }

   if (!is_numeric($value)) {
       $value = "'" . mysqli_real_escape_string($value, $handle) . "'";
   }
   return $value;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	session_start();
	//====================================================================
	//	GET THE CHOSEN U AND P, AND CHECK IT FOR DANGEROUS CHARCTERS
	//====================================================================
	//Grab posted variables from form
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$email = $_POST['email'];
	$question = $_POST['question'];
	$answer = $_POST['answer'];
	//Validate email using php
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['message'] = "Please enter valid email!";
		header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Signup.php");
		exit();
	}

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);
	$email = htmlspecialchars($email);

	//====================================================================
	//	CHECK TO SEE IF U AND P ARE OF THE CORRECT LENGTH
	//	A MALICIOUS USER MIGHT TRY TO PASS A STRING THAT IS TOO LONG
	//	if no errors occur, then $errorMessage will be blank
	//====================================================================

	$uLength = strlen($uname);
	$pLength = strlen($pword);

	if ($uLength >= 10 && $uLength <= 20) {
		$_SESSION['message'] = "";
	}
	else {
		$_SESSION['message'] = "Username must be between 10 and 20 characters";
		header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Signup.php");
		exit();

	}

	if ($pLength >= 8 && $pLength <= 16) {
		$_SESSION['message'] = "";
	}
	else {
		$_SESSION['message'] = "Password must be between 8 and 16 characters";
		header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Signup.php");
		exit();
	}
	if (isset($_POST['answer']) && !empty($_POST['answer'])) {
		$_SESSION['message'] = "";
	}
	else {
		$_SESSION['message'] = "Choose and answer a security question!";
		header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Signup.php");
		exit();

	}



//test to see if $errorMessage is blank
//if it is, then we can go ahead with the rest of the code
//if it's not, we can display the error

	//====================================================================
	//	Write to the database
	//====================================================================
	if (empty($_SESSION['message'])) {

	$user_name = "root";
	$pass_word = "vulcan123";
	$database = "vulcandb";
	$server = "127.0.0.1";

	$db_handle = mysqli_connect("localhost", "root", "vulcan123", "vulcandb");
	
	if(mysqli_connect_errno())
	{
		echo "Error with DB";
	}
	
	$uname = quote_smart($db_handle, $uname);
	$pword = quote_smart($db_handle, $pword);
	$email = quote_smart($db_handle, $email);


	//====================================================================
	//	CHECK THAT THE USERNAME IS NOT TAKEN
	//====================================================================

		$SQL = "SELECT * FROM login WHERE L1 = $uname";
		$result = mysqli_query($db_handle, $SQL);
		$num_rows = mysqli_num_rows($result);

		if ($num_rows > 0) {
			$_SESSION['message'] = "That username is taken! Try again!";
		}
		
		else {

			$SQL = "INSERT INTO login (L1, L2, userEmail, resetquestion, resetanswer) VALUES ($uname, md5($pword), $email, '$question', '$answer')";

			$result = mysqli_query($db_handle, $SQL);

			mysqli_close($db_handle);
			
			echo "HERE";

		//=================================================================================
		//	START THE SESSION AND PUT SOMETHING INTO THE SESSION VARIABLE CALLED login
		//	SEND USER TO A DIFFERENT PAGE AFTER SIGN UP
		//=================================================================================

			$_SESSION['login'] = "1";
			$_SESSION['message'] = "Thanks for registering! Please login now!";
			header ("Location: http://ec2-52-0-130-98.compute-1.amazonaws.com/Vulcan_Login.php");
			exit();
		} //Close the INSERT script
	}//Close DB succesful connect
}//Close if POST


?>
