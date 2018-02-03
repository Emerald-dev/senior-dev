var map,currLocation;
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 43.0861, lng: -77.6705},
		zoom: 16
	});
	var infoWindow = new google.maps.InfoWindow;

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			var image = 'images/icons/here.png';
			var beachMarker = new google.maps.Marker({
				position: pos,
				map: map,
				icon: image
			});
			map.setCenter(pos);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}


	downloadUrl('pins.xml', function(data) { //get proper pin xml name.
		var xml = data.responseXML;
		var pins = xml.documentElement.getElementsByTagName('pin');
		Array.prototype.forEach.call(pins, function(pinElem) {
			var point = new google.maps.LatLng(
				parseFloat(pinElem.getAttribute('lat')),
				parseFloat(pinElem.getAttribute('lon')));
			var filters = pinElem.getAttribute('filters');
			var image = pinElem.getAttribute('image');
			var name = pinElem.getAttribute('name');
			var summary = pinElem.getAttribute('summary');
			var content = pinElem.getAttribute('content');


			var infowincontent = document.createElement('div');
			var strong = document.createElement('strong');
			strong.textContent = name;
			infowincontent.appendChild(strong);
			infowincontent.appendChild(document.createElement('br'));

			var text = document.createElement('text');
			text.textContent = content;
			infowincontent.appendChild(text);
			var pin = new google.maps.Marker({
				map: map,
				position: point
			});
			pin.addListener('click', function() {
				infoWindow.setContent(infowincontent);
				infoWindow.open(map, pin);
			});
		});
	});
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
	infoWindow.open(map);
}

function downloadUrl(url,callback) {
	var request = window.ActiveXObject ?
		new ActiveXObject('Microsoft.XMLHTTP') :
		new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			request.onreadystatechange = "";
			callback(request, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}