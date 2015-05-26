<?php 
/*
	This script builds the navigation menu, which is different if the user is logged in vs not logged in
*/
echo "<ul>";

echo "<li class='current-menu-item'><a href='index.html'>HOME</a></li>";

echo "<li><a href='Yelp_Input.php'>SEARCH</a></li>";

// Display menu items based on logged in status
if (isset($_SESSION['login']) && !empty($_SESSION['login']) && !isset($out)){
	if($_SESSION['login'] > 0){
	
		echo "<li><a href='weatherApp.php'>WEATHER</a></li>";
		
		
		if (isset($_SESSION['user']) && !empty($_SESSION['user'])){
		
		echo "<li id='userName'><a href='Vulcan_Profile.php'>MY ACCOUNT</a></li>";
		
		echo "<li><a href='Vulcan_Logout.php'>LOG OUT</a></li>";
				
		}	
	}
}else{
	echo "<li><a href='Vulcan_Login.php'>LOG IN</a></li>";
	
	echo "<li><a href='Vulcan_Signup.php'>SIGN UP</a></li>";
	
}

echo "</ul>";

