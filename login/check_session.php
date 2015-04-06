<?PHP
session_start();
if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
	$_SESSION['message'] = 'Please login first!';
	header ("Location: Vulcan_Login.php");
}

?>
