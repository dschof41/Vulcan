<?PHP
/*
	This script checks for user login status, to hide pages from guest users
*/
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	$_SESSION['message'] = 'Please login first!';
	header ("Location: Vulcan_Login.php");
}

?>
