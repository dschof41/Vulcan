<?php
session_start();
include 'login/load_profile.php';
include 'login/load_groups.php';
include 'login/php/view_group.php';
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
	background-image: url("http://s9.postimg.org/gz0nx669p/cityskylinenycheader.png");
	}	
	
	section {
	height: 1500px;
	}

		hr {
	margin-top: 40px;
	border-width: 1px;
	}

	</style>
	<script type="text/javascript">
	/* 
Select function that allows user to select a business card from given list, and removes previous selections if any

Created by Dan Schofer 3/25/2015
*/
	function select(e) { //function takes HTML object element
		    if(e.id == 'card-selected') { //check id of selected object, if its already selected, unselect it
	        e.id = '';
	        document.getElementById('businessID').value = "";

	    } else {
	    
	    	var cards = document.getElementById("card-holder").children; //check each business card HTML object
	    	
	    	for(var i = 0; i < cards.length; i++){  //check all cards and unselect them if they are selected
	    		if (cards[i].id == 'card-selected'){
	    			cards[i].id = '';
	    			document.getElementById('businessID').value = "";
	    			
	    		} //close if
	        	e.id = 'card-selected'; //select only the clicked card
	        	elementString = e.innerHTML;
	        	var start = elementString.indexOf("cat") + 5;
	        	var finish = elementString.indexOf("</span>", start);
	        	var busID = elementString.substring(start, finish);
	        	document.getElementById('businessID').value = busID.trim();
	        	document.getElementById('group').value = document.getElementById('groupSelect').value;

        	}//close for
    	}//close else
	}//close function	

	
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
  <br><br>Groups for <?php echo $_SESSION['user']; ?>
  <hr>

  </div>	
  <span id="message">
  	<?php 
  		if (isset($_SESSION['message'])){
  			echo $_SESSION['message'];
  		}
  			$_SESSION['message'] = ""; 
  		
  	?>
	</span>
	<div id="groupActions">
  	<div id="newGroupDiv">		
		<form id="userInfo" action="login/php/new_group.php" method="post">
				Group Name:
				<input type="text" name="groupName" value="" id="groupNameInput" required>
				<input type="submit" class="button" value="Create Group">
		</form>
	</div>
	<div id="viewGroupsDiv">
		<form id="userInfo" action="Vulcan_Manage_Groups.php" method="post">
			<p>Your Groups: </p>
			<select name="groupSelect" id="groupSelect" style="width:1.25in">
				<?php
					for($i=0; $i<count($userGroups); $i++){
						echo "<option value='".$userGroups[$i]."'>".$userGroups[$i]."</option>";
					}
				?>
			</select>
		<input type="submit" value="View Cards">
		</form>
		<form action="login/php/delete_card.php" method="post">
			<input type="text" id="businessID" readonly="true">
			<input type="text" id="group" readonly="true">
			<input type="submit" value="Delete Card">
		</form>
	</div>
	<div id="card-holder">
	<?php
	if (isset($userCards)){
		for ($i=0; $i < count($userCards); $i++){
				echo $userCards[$i];
		}	
	}else{
		echo "No cards yet!";
	}
	?>
	
	</div>	
	</div>		
	</section>
	
		<footer id="footer">
		</footer>
</body>
</html>