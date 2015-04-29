<?PHP
//session_start();
//if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	//header ("Location: login.php");
//}

//set the session variable to 1, if the user signs up. That way, they can use the site straight away
//do you want to send the user a confirmation email?
//does the user need to validate an email address, before they can use the site?
//do you want to display a message for the user that a particular username is already taken?
//test to see if the u and p are long enough
//you might also want to test if the users is already logged in. That way, they can't sign up repeatedly without closing down the browser
//other login methods - set a cookie, and read that back for every page
//collect other information: date and time of login, ip address, etc
//don't store passwords without encrypting them

//$USERNAME_ERROR = "";

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

	//====================================================================
	//	GET THE CHOSEN U AND P, AND CHECK IT FOR DANGEROUS CHARCTERS
	//====================================================================
	//Grab posted variables from form
	$uname = $_POST['username'];
	$pword = $_POST['password'];
	$email = $_POST['email'];
	
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
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Username must be between 10 and 20 characters" . "<BR>";
	}

	if ($pLength >= 8 && $pLength <= 16) {
		$errorMessage = "";
	}
	else {
		$errorMessage = $errorMessage . "Password must be between 8 and 16 characters" . "<BR>";
	}


//test to see if $errorMessage is blank
//if it is, then we can go ahead with the rest of the code
//if it's not, we can display the error

	//====================================================================
	//	Write to the database
	//====================================================================
	if ($errorMessage == "") {

	$user_name = "root";
	$pass_word = "vulcan123";
	$database = "vulcandb";
	$server = "127.0.0.1";

	/*
	$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);
	*/
	
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

			$SQL = "INSERT INTO login (L1, L2, userEmail) VALUES ($uname, md5($pword), $email)";

			$result = mysqli_query($db_handle, $SQL);

			mysqli_close($db_handle);

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
