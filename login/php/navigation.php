<?php 
echo "<ul>";

echo "<li class='current-menu-item'><a href='index.html'>HOME</a></li>";

echo "<li><a href='Yelp_Input.php'>SEARCH</a></li>";

// zDisplay menu items based on logged in status
if (isset($_SESSION['login']) && !empty($_SESSION['login'])){
	if($_SESSION['login'] > 0){
	
		echo "<li><a href='weatherApp.php'>WEATHER</a></li>";
		
		echo "<li><a href='Vulcan_Logout.php'>LOGOUT</a></li>";
		
		echo "<li id='userName'><a href='Vulcan_Profile.php'>" . $_SESSION['user'] ."</a></li>";
		
	}
}else{
	echo "<li><a href='Vulcan_Login.php'>LOGIN</a></li>";
	
	echo "<li><a href='Vulcan_Signup.php'>REGISTER</a></li>";
	
}

echo "</ul>";

