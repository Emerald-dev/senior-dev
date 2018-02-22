var map,currLocation;
var pinsArray = [];
function initMap() {
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 43.129468, lng: -77.639331},
		zoom: 20,
        mapTypeId: 'satellite',
		disableDefaultUI: true, // a way to quickly hide all controls
		scaleControl: true,
		zoomControl: true,
		zoomControlOptions: {
		  style: google.maps.ZoomControlStyle.LARGE 
		}
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
			var marker = new google.maps.Marker({
				position: pos,
				map: map,
				icon: image
			});
			//The line below sets to the users location by default.
			//map.setCenter(pos);
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}

	var openInfoWindow = null;
	
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
			text.textContent = summary;
			infowincontent.appendChild(text);

			infowincontent.appendChild(document.createElement('br'));

			var link = document.createElement('a');
			link.textContent = "Read more...";
			link.setAttribute('href','#readmore');
			link.setAttribute('onclick','loadPinContent('+ '"'+ name + '"'+','+ '"'+ image + '"'+ ','+ '"'+ content + '"' + ')');
			infowincontent.appendChild(link);

			var image = 'images/icons/pin.png';

			var pin = new google.maps.Marker({
				map: map,
				filters: filters,
				position: point,
				icon: image
			});
            pinsArray.push(pin);
			
			var infowindow = new google.maps.InfoWindow({
				content: infowincontent,
				maxWidth: 250
			});
			
			pin.addListener('click', function() {
				if (openInfoWindow) {
					openInfoWindow.close();
				}
				infowindow.open(map, pin);
				openInfoWindow = infowindow;
			});
		});
	});

	//Creating map listener
    //Clicking on the map closes the info window
    google.maps.event.addListener(map, "click", function(event) {
        openInfoWindow.close();
    });
}

function filterPins() {
    var filters = document.getElementsByClassName('filter');
    var currFilters = [];
    for (var i = 0; i < filters.length; i++) {
        var checkbox = filters[i].firstChild;
        if (checkbox.checked) {
            currFilters.push(checkbox.nextSibling.innerHTML);
        }
    }
    for (var j = 0; j < pinsArray.length; j++) {
        var pin = pinsArray[j];
        var pinFilters = pin.filters.split(', ');
		var display = false;
        pinFilters.forEach(function (element) {
			if (currFilters.includes(element)) {
                display = true;
            } 
        });
		pin.setVisible(display);
    }
}
function loadPinContent(name,imageSrc, content){
	//clear the div in case something is there
    document.getElementById('readmore').innerHTML = "";

    var readmore = document.getElementById('readmore');

    var header = document.createElement('h2');
    header.textContent = name;
    readmore.appendChild(header);
	
	var image = document.createElement('img');
    image.src = imageSrc;
    readmore.appendChild(image);
	
	var pContent = document.createElement('p');
    pContent.textContent = content;
    readmore.appendChild(pContent);
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