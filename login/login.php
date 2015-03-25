<?PHP
if(!isset($_SESSION['attempts'])){
		$_SESSION['attempts'] = 5;
	}else if ($_SESSION['attempts'] === 0){
		header ("Location: Vulcan_Signup.php");
	}
		
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

	//====================================================
	//	CHECK TO SEE IF THE $result VARIABLE IS TRUE
	//====================================================

		if ($result) {
			if ($num_rows > 0) {
				session_start();
				$_SESSION['login'] = "1";
				header ("Location: ../Vulcan_Home.php");
			}
			else if($_SESSION['attempts'] === 0)
				{
					header ("Location: Vulcan_Signup.php");
					
			}else {
				$_SESSION['login'] = "";
				$_SESSION['attempts']--;	
				
			} 
// ===========================================================================================	
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
