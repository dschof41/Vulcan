<?php
//This page lets the user manage their custome groups
session_start();
include 'login/load_profile.php';
include 'login/load_groups.php';
include 'login/php/view_group.php';
//include 'login/send_address.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Groups</title>
	<link href="images/avatar.png" rel="shortcut icon" type="image/png">
	<link href="css/styleCore.css" rel="stylesheet" type="text/css">
	<link href="css/styleDesign.css" rel="stylesheet" type="text/css">
	<script src="js/javascript.js" type="text/javascript"></script>
	<!----------------------------JQUERY Library--------------------------------->
	<link href="js/jquery-ui/jquery-ui.css" rel="stylesheet" type="text/css"> 
	<script src="js/jquery-1.11.2.js" type="text/javascript"></script>
	<script src="js/jquery-ui/jquery-ui.js" type="text/javascript"></script>
	<!--------------------------------------------------------------------------->

	<style type="text/css">
	header{
	background-image: url("images/banner6.jpg");
	}	
	
	section {
	height: 1500px;
	}
	
	#yourCardHeading {
	padding-left: 180px;
	font-size:  x-large;
	font-weight: bold;
}

	
	</style>
	<script type="text/javascript">
	/* 
Select function that allows user to select a business card from given list, and removes previous selections if any

Created by Dan Schofer 3/25/2015
*/
	function select(e) { //function takes HTML object element
		    if(e.id === 'card-selected') { //check id of selected object, if its already selected, unselect it
	        e.id = '';
	        document.getElementById('businessID').value = "";
	        document.getElementById('address').value="";
	    } else {
	    	//create array of HTML objects inside the card-holderGroup div
	    	var cards = document.getElementById("card-holderGroups").children; //check each business card HTML object
	    	//check all cards and unselect them if they are selected
	    	for(var i = 0; i < cards.length; i++){  
	    		if (cards[i].id === 'card-selected'){
	    			cards[i].id = '';
	    			//document.getElementById('businessID').value = "";
	    			//document.getElementById('address').value="";	
	    		}
	    	
	    		//Once every card is checked for 'card-selected' and reset if it doesnt match...select only the clicked card
	        	e.id = 'card-selected'; 
	        	//-----------------------------------------------------------------------------------
	        	//pull the business id from the string of html text inseide the element (there's gotta be a better way....)
	        	elementString = e.innerHTML;
	        	var start = elementString.indexOf("cat")+5;
	        	var finish = elementString.indexOf("</span>", start);
	        	var busID = elementString.substring(start, finish);
	        	//-----------------------------------------------------------------------------------
	        	//Place business id into hidden form
	        	document.getElementById('businessID').value = busID.trim();
	        	document.getElementById('group').value = document.getElementById('groupSelect').value;
	        	//------------------------------------------------------------------------------------
	        	//Pull the address from html element and put into hidden form field
	        	var addressStart = elementString.indexOf("address") + 9;
	        	var addressEnd = elementString.indexOf('<', addressStart);
	        	var businessAddress = elementString.substring(addressStart, addressEnd);
	        	document.getElementById('address').value = businessAddress.trim();
	        	//Pull name of business and put into hidden form
	        	var nameStart = elementString.indexOf("name") + 6;
	        	var nameEnd = elementString.indexOf("<", nameStart);
	        	var businessName = elementString.substring(nameStart, nameEnd);
	        	document.getElementById("name").value = businessName.trim();
				}
        	//}//close for
    	}//close else
	}//close select(e) function	

	$(function() {//add jquery tooltips
    $( document ).tooltip();
  });

	</script>
	
</head>
<body>
<nav id="primary_nav_wrap">
	<?php 
		include 'login/php/navigation.php';
	?>
	</nav>
	<header>
	</header>
		
<section>

	<div class="headerTitle">Groups For <?php echo $_SESSION['user']; ?> </div>

	<div class="centerTextGroups">
  <br><br> <center> <font size="5"> Manage Your Groups And Cards </font> </center>
<br>
  <hr>

  </div>	
  <center><span id="message">
  	<?php 
  		if (isset($_SESSION['message'])){
  			echo $_SESSION['message'];
  		}
  			$_SESSION['message'] = ""; 
  		
  	?>
  	<br><br>
	</span></center>
	<div id="groupActions">
  	<div id="newGroupDiv">		
		<form id="userInfoGroups" action="login/php/new_group.php" method="post"><br>
				<b>Create a Group to Save Searches (Cards)</b><br>
				<input type="text" name="groupName" value="" id="groupNameInput" style ="width: 350px; height: 25px;" placeholder="ie: 'Boston Places' or ' Favorite Coffee'" required>
				<input id="submitSmall" type="submit" class="button" value="Create Group" title="Creates a new custom group for you! Use the search function to add businesses to it.">
		</form>
	</div>
	<div id="viewGroupsDiv">
		<form id="userInfoGroups2" action="Vulcan_Manage_Groups.php" method="get">
			<p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Your Existing Groups </b></p>
			<select name="groupSelect" id="groupSelect" style ="width: 352px; height: 30px;">
				<?php
					for($i=0; $i<count($userGroups); $i++){
						echo "<option value='".$userGroups[$i]."'>".$userGroups[$i]."</option>";
					}
				?>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;
		<input id="submitSmall" type="submit" value="View Group" name="view-cards" title="Shows you the cards saved to this group!"><br>
		<input id="submitSmallGroup" type="submit" value="Delete Group" name="delete-group">

		</form>
	
	<div id="emailGroup">
		<form action="login/send_address.php" method="post">
		<p><b>Send Selected Card's Address to Your Email</b></p>
			<input type="text" class="_hidden" readonly="true" id="userEmail" name="userMail" value="<?php echo $userEmail; ?>" style ="width:170px; height: 20px;" required>
			<input type="text" id="name" name="name" class="_hidden" value="" required>
			<input type="text" id="address" name="address" class="_hidden" value="" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="submitSmallAddress" type="submit" value="Receive Address" title="Emails you the address of the selected card for navigation!">
		</form>
	</div>
	<div id="DeleteGroups">
		<form action="login/php/delete_card.php" method="post">
		<p><b>Delete Selected Saved Result</b></p>
			<input type="text" class="_hidden" id="businessID" name="businessID" style ="width:170px; height: 20px;" required="required">
			<input type="text" class="_hidden" id="group" readonly="true" style ="width:170px; height: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;
			<input id="submitSmall" type="submit" value="Delete Card" name="delete-card">
		</form>
	</div>
	</div>
	<br>
	<div id="card-holderGroups">
	<?php
	if (isset($userCards)){
		for ($i=0; $i < count($userCards); $i++){
				echo $userCards[$i];
		}	
	}else{
		echo "<font size='2pt'><br> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Select a group to view your cards or create a group to store your cards. </font>";
	}
	?>
	
	</div>	
	</div>	
		<div id="SavedCardsGroups"><br><br><br>
		<div id="yourCardHeading"> Your Cards</div><br>
		<center>select a card below then click on an option to the left</center>
		<hr>
		</div>	
	</section>
	
		<footer id="footer">
		</footer>
</body>
</html>