<?php
session_start();
include 'login/load_profile.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<style type="text/css">
	header{
	width: 1267px;
	background-image: url("http://s9.postimg.org/gz0nx669p/cityskylinenycheader.png");
	padding: 8px 4px;
	clear: both;
	}	
	
	section {
	height: 680px;
	}

		hr {
	margin-top: 40px;
	border-width: 1px;
	}

	</style>
	<script type="text/javascript">
	
	function newGroup(){
		if(document.getElementById('newGroupDiv').style.visibility === 'hidden'){
			document.getElementById('newGroupDiv').style.visibility ='visible'
		}else{
			document.getElementById('newGroupDiv').style.visibility = 'hidden'
		}
	}
	
	function viewGroups(){
		if(document.getElementById('viewGroupsDiv').style.visibility === 'hidden'){
			document.getElementById('viewGroupsDiv').style.visibility ='visible'
		}else{
			document.getElementById('viewGroupsDiv').style.visibility = 'hidden'
		}
	}


	</script>
	
</head>
<body>
	<header>
	</header>
	
	<nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>	
<section>

	<div class="headerTitle">Sign Up</div>

	<div class="centerText">
  <br><br>Profile for <?php echo $_SESSION['user']; ?>
  <hr>

  </div>	
  <span id="message">
  	<?php 
  		if (isset($_SESSION['message'])){
  			echo $_SESSION['message'];
  			$_SESSION['message'] = ""; 
  		} 
  	?>
</span>
  	<form id="userInfo" action="Vulcan_Profile.php" method="post">
		Profile Info:<br>
		<p>Username:</p>
		<input type="text" name="username" value= "<?php echo $userName; ?>" id="userName" readonly><br>
		<p>Email Address:</p>
		<input type="text" name="email" value="<?php echo $userEmail; ?>" id="userEmail" readonly>
		<p>Member ID:</p>
		<input type="text" name="id" value="<?php echo $userId; ?>" id="userID" readonly>
		<input type="button" class="button" value="Add a Business Group" onclick="newGroup();">
		<input type="button" class="button" value="View Your Groups" onclick="viewGroups();">
	</form>

	<div id="newGroupDiv">		
		<form id="userInfo" action="login/php/NewGroup.php" method="post">
				Group Name:
				<input type="text" name="groupName" value="" id="groupNameInput">
				<input type="submit" class="button" value="Create Group">
		</form>
	</div>
	<div id="viewGroupsDiv">
		<form id="userInfo" action="login/php/ViewGroups.php" method="post">
			<p>Your Groups: </p>
			<select name="group" id="groupSelect">
				<?php
					for($i=0; $i<count($userGroups); $i++){
						echo "<option>".$userGroups[$i]."</option>";
					}
				?>
			</select>
		
		</form>
	</div>			
	</section>
	
		<footer id="footer">
		</footer>
</body>
</html>