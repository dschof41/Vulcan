﻿(function(h){h.fn.weatherfeed=function(q,f,w){f=h.extend({unit:"c",image:!0,country:!1,highlow:!0,wind:!0,humidity:!1,visibility:!1,sunrise:!1,sunset:!1,forecast:!1,link:!0,showerror:!0,linktarget:"_self",woeid:!1,refresh:0},f);var m="odd";return this.each(function(p,s){function x(f,c,e){m="odd";k.html("");h.ajax({type:"GET",url:c,dataType:"json",success:function(a){if(a.query){if(0<a.query.results.channel.length)for(var c=a.query.results.channel.length,b=0;b<c;b++)y(s,a.query.results.channel[b],
e);else y(s,a.query.results.channel,e);h.isFunction(w)&&w.call(this,k)}else e.showerror&&k.html("<p>Weather information unavailable</p>")},error:function(a){e.showerror&&k.html("<p>Weather request failed</p>")}})}var k=h(s);k.hasClass("weatherFeed")||k.addClass("weatherFeed");if(!h.isArray(q))return!1;var t=q.length;10<t&&(t=10);var l="";for(p=0;p<t;p++)""!=l&&(l+=","),l+="'"+q[p]+"'";now=new Date;var u="select * from weather.forecast where "+(f.woeid?"woeid":"location")+" in ("+l+") and u='"+f.unit+
"'",z="http://query.yahooapis.com/v1/public/yql?q="+encodeURIComponent(u)+"&rnd="+now.getFullYear()+now.getMonth()+now.getDay()+now.getHours()+"&format=json&callback=?";x(u,z,f);0<f.refresh&&setInterval(function(){x(u,z,f)},6E4*f.refresh);var y=function(f,c,e){f=h(f);if("Yahoo! Weather Error"!=c.description){var a=c.wind.direction;348.75<=a&&360>=a&&(a="N");0<=a&&11.25>a&&(a="N");11.25<=a&&33.75>a&&(a="NNE");33.75<=a&&56.25>a&&(a="NE");56.25<=a&&78.75>a&&(a="ENE");78.75<=a&&101.25>a&&(a="E");101.25<=
a&&123.75>a&&(a="ESE");123.75<=a&&146.25>a&&(a="SE");146.25<=a&&168.75>a&&(a="SSE");168.75<=a&&191.25>a&&(a="S");191.25<=a&&213.75>a&&(a="SSW");213.75<=a&&236.25>a&&(a="SW");236.25<=a&&258.75>a&&(a="WSW");258.75<=a&&281.25>a&&(a="W");281.25<=a&&303.75>a&&(a="WNW");303.75<=a&&326.25>a&&(a="NW");326.25<=a&&348.75>a&&(a="NNW");var g=c.item.forecast[0];wpd=c.item.pubDate;n=wpd.indexOf(":");tpb=v(wpd.substr(n-2,8));tsr=v(c.astronomy.sunrise);tss=v(c.astronomy.sunset);daynight=tpb>tsr&&tpb<tss?"day":"night";
var b='<div class="weatherItem '+m+" "+daynight+'"';e.image&&(b+=' style="background-image: url(http://l.yimg.com/a/i/us/nws/weather/gr/'+c.item.condition.code+daynight.substring(0,1)+'.png); background-repeat: no-repeat;"');b=b+">"+('<div class="weatherCity">'+c.location.city+"</div>");e.country&&(b+='<div class="weatherCountry">'+c.location.country+"</div>");b+='<div class="weatherTemp">'+c.item.condition.temp+"&deg;</div>";b+='<div class="weatherDesc">'+c.item.condition.text+"</div>";e.highlow&&
(b+='<div class="weatherRange">High: '+g.high+"&deg; Low: "+g.low+"&deg;</div>");e.wind&&(b+='<div class="weatherWind">Wind: '+a+" "+c.wind.speed+c.units.speed+"</div>");e.humidity&&(b+='<div class="weatherHumidity">Humidity: '+c.atmosphere.humidity+"</div>");e.visibility&&(b+='<div class="weatherVisibility">Visibility: '+c.atmosphere.visibility+"</div>");e.sunrise&&(b+='<div class="weatherSunrise">Sunrise: '+c.astronomy.sunrise+"</div>");e.sunset&&(b+='<div class="weatherSunset">Sunset: '+c.astronomy.sunset+
"</div>");if(e.forecast){b+='<div class="weatherForecast">';a=c.item.forecast;for(g=0;g<a.length;g++)b+='<div class="weatherForecastItem" style="background-image: url(http://l.yimg.com/a/i/us/nws/weather/gr/'+a[g].code+'s.png); background-repeat: no-repeat;">',b+='<div class="weatherForecastDay">'+a[g].day+"</div>",b+='<div class="weatherForecastDate">'+a[g].date+"</div>",b+='<div class="weatherForecastText">'+a[g].text+"</div>",b+='<div class="weatherForecastRange">High: '+a[g].high+" Low: "+a[g].low+
"</div>",b+="</div>";b+="</div>"}e.link&&(b+='<div class="weatherLink"><a href="'+c.link+'" target="'+e.linktarget+'" title="Read full forecast">Full Local Forecast (Yahoo Weather)</a></div>')}else b='<div class="weatherItem '+m+'">',b+='<div class="weatherError">City not found</div>';b+="</div>";m="odd"==m?"even":"odd";f.append(b)},v=function(f){d=new Date;return r=new Date(d.toDateString()+" "+f)}})}})(jQuery);

$(document).ready(function () {

	$('#weatherSearch').submit( function(e) {
		e.preventDefault();
		weatherGeocode('weatherLocation','weatherList');
	});

	function showLocation(address,woeid) {

		$('#weatherReport').empty();

		$('#weatherReport').weatherfeed([woeid],{
		unit: 'f',
		image: true,
		country: true,
		highlow: true,
		wind: true,
		humidity: true,
		visibility: true,
		sunrise: true,
		sunset: true,
		forecast: true,
		link: true,
		refresh: 1,
		woeid: true
		
		});
	}

	function weatherGeocode(search,output) {

		var status;
		var results;
		var html = '';
		var msg = '';

		// Set document elements
		var search = document.getElementById(search).value;
		var output = document.getElementById(output);

		if (search) {

			output.innerHTML = '';

			// Cache results for an hour to prevent overuse
			now = new Date();

			// Create Yahoo Weather feed API address
			var query = 'select * from geo.places where text="'+ search +'"';
			var api = 'http://query.yahooapis.com/v1/public/yql?q='+ encodeURIComponent(query) +'&rnd='+ now.getFullYear() + now.getMonth() + now.getDay() + now.getHours() +'&format=json&callback=?';

			// Send request
			$.ajax({
				type: 'GET',
				url: api,
				dataType: 'json',
				success: function(data) {

					if (data.query.count > 0 ) {						

						html = '<span>'+ data.query.count +' location';

						if (data.query.count > 1) html = html + 's';
						html = html + ' found:</span><ul>';

						// List multiple returns
						if (data.query.count > 1) {
							for (var i=0; i<data.query.count; i++) {
								html = html + '<li>'+ _getWeatherAddress(data.query.results.place[i]) +'</li>';
							}
						} else {
							html = html + '<li>'+ _getWeatherAddress(data.query.results.place) +'</li>';
						}
  	
						html = html + '</ul>';

						output.innerHTML = html;

						// Bind callback links
						$("a.weatherAddress").unbind('click');
						$("a.weatherAddress").click(function(e) {
							e.preventDefault();

							var address = $(this).text();
							var weoid = $(this).attr('rel');

							showLocation(address,weoid);
						}); 

					} else {
						output.innerHTML = 'The location could not be found';
					}
				},
				error: function(data) {
					output.innerHTML = 'An error has occurred';
				}
			});

		} else {

			// No search given
			output.innerHTML = 'Please enter a location or partial address';
		}
	}

	function _getWeatherAddress(data) {

		// Get address
		var address = data.name;
		if (data.admin2) address += ', ' + data.admin2.content;
		if (data.admin1) address += ', ' + data.admin1.content;
		address += ', ' + data.country.content;

		// Get WEOID
		var woeid = data.woeid;

		return '<a class="weatherAddress" href="#" rel="'+ woeid +'" title="Click for to see a weather report">'+ address +'</a> <small>('+ woeid +')</small>';
	}
});
