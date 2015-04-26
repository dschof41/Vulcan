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
	<!-- These scripts build the social sharing bar -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript" src="http://s.sharethis.com/loader.js"></script>
	<!-- ------------------------------------------------------------------------------------->

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
	        document.getElementById('address').value="";
	        

	    } else {
	    
	    	var cards = document.getElementById("card-holder").children; //check each business card HTML object
	    	
	    	for(var i = 0; i < cards.length; i++){  //check all cards and unselect them if they are selected
	    		if (cards[i].id == 'card-selected'){
	    			cards[i].id = '';
	    			document.getElementById('businessID').value = "";
	    			document.getElementById('address').value="";
	    			
	    		} //close if
	        	e.id = 'card-selected'; //select only the clicked card
	        	elementString = e.innerHTML;
	        	//pull the business id from html element
	        	var start = elementString.indexOf("cat")+5;
	        	var finish = elementString.indexOf("</span>", start);
	        	var busID = elementString.substring(start, finish);
	        	//----------------------------------------------------
	        	//Place business id into hidden form
	        	document.getElementById('businessID').value = busID.trim();
	        	document.getElementById('group').value = document.getElementById('groupSelect').value;
	        	
	        	//Pull the address from html element and put into hidden form field
	        	var addressStart = elementString.indexOf("address") + 9;
	        	var addressEnd = elementString.indexOf('<', addressStart);
	        	var businessAddress = elementString.substring(addressStart, addressEnd);
	        	document.getElementById('address').value = businessAddress.trim();

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
	<div id="email">
		<form action="login/php/send_address.php" method="post">
			<input type="text" readonly="true" id="userMail" name="userMail" value="<?php echo $userEmail; ?>" required>
			<input id="address" name="address" type="text" readonly="true" value="" required>
			<input type="submit" value="Get Address">
		</form>
	</div>

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
<script type="text/javascript">stLight.options({publisher: "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<script>
var options={ "publisher": "d34a1c0e-427a-4c53-8fd4-5b7dcee0768b", "logo": { "visible": true, "url": "http://ec2-52-0-130-98.compute-1.amazonaws.com/", "img": "http://dailydropcap.com/images/V-12.jpg", "height": 50}, "ad": { "visible": false, "openDelay": "5", "closeDelay": "0"}, "livestream": { "domain": "", "type": "sharethis"}, "ticker": { "visible": false, "domain": "", "title": "", "type": "sharethis"}, "facebook": { "visible": false, "profile": "sharethis"}, "fblike": { "visible": false, "url": ""}, "twitter": { "visible": false, "user": "sharethis"}, "twfollow": { "visible": false}, "custom": [{ "visible": false, "title": "Custom 1", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 2", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}, { "visible": false, "title": "Custom 3", "url": "", "img": "", "popup": false, "popupCustom": { "width": 300, "height": 250}}], "chicklets": { "items": ["facebook", "twitter", "pinterest", "googleplus"]}};
var st_bar_widget = new sharethis.widgets.sharebar(options);
</script>

</html>