//Pull latitude and longitude from PHP script and create javascript variables
	var latitude = <?php echo json_encode($latitude); ?>;
	var longitude = <?php echo json_encode($longitude); ?>;
	
	//Using coordinates from yelp php query, create a google map object 
	
	var geocoder;
	var map;
	
function initialize() { 
		document.hasFocus
	var mapOptions = {
		center: { 
			lat: latitude,
			lng: longitude
			},
			zoom: 12
		}

	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	var coordinates = <?php echo json_encode($coords); ?>;
	var names = <?php echo json_encode($names); ?>;
	var geocoder = new google.maps.Geocoder();
	
	for (var i = 0; i<coordinates.length; i++){
	var k = 0;
	geocoder.geocode( { 'address': coordinates[i] }, function(results, status){
		if(results[0].geometry.location){
		var marker = new google.maps.Marker({
			map: map,
			position: results[0].geometry.location,
			title: names[k]
			});
			k++;
			}
		});
	}
	
	/*if ((document.getElementById("card-selected"))){
		
			var objects = document.getElementById("card-selected").innerHTML;
		    var start = objects.indexOf('address') + 9;
		    var end = objects.indexOf('</span>');
		    var selectedAddress = objects.substring(start, end);
		
			geocoder.geocode( { 'address': selectedAddress }, function(results, status){
			
				if(results[0].geometry.location){
		    		map.setCenter(results[0].geometry.location);
		    	}
			});	 	  		
	}*/
}
google.maps.event.addDomListener(window, 'load', initialize);

	/*function mapCenter(){
			initialize();
		    var objects = document.getElementById("card-selected").innerHTML;
		    var start = objects.indexOf('address') + 9;
		    var end = objects.indexOf('</span>');
		    var selectedAddress = objects.substring(start, end);		    
		    var geo = new google.maps.Geocoder();
		    geo.geocode( { 'address': selectedAddress }, function(results, status){
		    	map.setCenter(results[0].geometry.location);
			});	 	  	
	}*/
	
/* Select function that allows user to select a business card from given list, and removes previous selections if any

Created by Dan Schofer 3/25/2015
*/
	function select(e) {
    if(e.id == 'card-selected') {
        e.id = '';
    } else {
    	var cards = document.getElementById("card-holder").children;
    	
    	for(var i = 0; i < cards.length; i++){
    		if (cards[i].id == 'card-selected'){
    			cards[i].id = '';
    		}
        	e.id = 'card-selected';
        }
    }
    //initialize();
}	

