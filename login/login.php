<?PHP

$uname = "";
$pword = "";
$errorMessage = "";
//==========================================
//	ESCAPE DANGEROUS SQL CHARACTERS
//==========================================
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
	$uname = $_POST['username'];
	$pword = $_POST['password'];

	$uname = htmlspecialchars($uname);
	$pword = htmlspecialchars($pword);

	//==========================================
	//	CONNECT TO THE LOCAL DATABASE
	//==========================================
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

	
	$SQL = "SELECT * FROM login WHERE L1 = $uname AND L2 = md5($pword)";
	
	
	$result = mysqli_query($db_handle,$SQL);
	$num_rows = mysqli_num_rows($result);

	/*$db_handle = mysql_connect($server, $user_name, $pass_word);
	$db_found = mysql_select_db($database, $db_handle);

	if ($db_found) {

		$uname = quote_smart($uname, $db_handle);
		$pword = quote_smart($pword, $db_handle);

		$SQL = "SELECT * FROM login WHERE L1 = $uname AND L2 = md5($pword)";
		$result = mysql_query($SQL);
		$num_rows = mysql_num_rows($result);*/

	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($num_rows > 0) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: ../Vulcan_Home.php");
			}
			else {
				session_start();
				$_SESSION['login'] = "";
				header ("Location: ../Vulcan_Signup.php");
			}	
		}
		else {
			$errorMessage = "Error logging on";
		}

	mysqli_close($db_handle);

	}

	else {
		$errorMessage = "Error logging on";
	}

//}


?>


<html>
<head>
<title>Basic Login Script</title>
</head>
<body>

<FORM NAME ="form1" METHOD ="POST" ACTION ="login.php">

Username: <INPUT TYPE = 'TEXT' Name ='username'  value="<?PHP print $uname;?>" maxlength="20">
Password: <INPUT TYPE = 'TEXT' Name ='password'  value="<?PHP print $pword;?>" maxlength="16">

<P align = center>
<INPUT TYPE = "Submit" Name = "Submit1"  VALUE = "Login">
</P>

</FORM>

<P>
<?PHP print $errorMessage;?>




</body>
</html>