/**
 * This file contains the functions and definitions of loading the map and its various map helper functions.
 */
var map,currLocation;
var pinsArray = [];
var userMarker;

/**
 * Map Creation function
 * Called in index.php
 */
function initMap() {
    /**
	 * Creates Basic map component
     * @type {google.maps.Map}
     */
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

    /**
	 * The Info Window displays any errors upon getting the geolocation
     * @type {google.maps.InfoWindow}
     */

	var infoWindow = new google.maps.InfoWindow;

	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			

			userMarker = new google.maps.Marker({
				position: pos,
				map: map,
                icon: {
                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                    scale: 4,
					 strokeColor: 'gold'
                }
			});
			//Changes the orientation of the userMarker if you move
            if (window.DeviceOrientationEvent) {

                window.addEventListener('deviceorientation', function(event) {
                    var alpha = null;
                    //Check for iOS property
                    if (event.webkitCompassHeading) {
                        alpha = event.webkitCompassHeading;
                    }
                    //non iOS
                    else {
                        alpha = event.alpha;
                    }
                    var locationIcon = userMarker.get('icon');
                    locationIcon.rotation = 360 - alpha;
                    userMarker.set('icon', locationIcon);
                }, false);
            }
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}

	var openInfoWindow = null;

    /**
	 * Following function loads in the pin data from the pin.xml file that was created by the pinXML.php file.
     */
	downloadUrl('pins.xml', function(data) { //get proper pin xml name.
		var xml = data.responseXML; //gets the xml
		var pins = xml.documentElement.getElementsByTagName('pin'); //grab all of the pin tags
        /**
		 * For each pin it creates a point that is added to the map.
         */
		Array.prototype.forEach.call(pins, function(pinElem) {
			var point = new google.maps.LatLng(
				parseFloat(pinElem.getAttribute('lat')),
				parseFloat(pinElem.getAttribute('lon')));
			var filters = pinElem.getAttribute('filters').replace(/"/g, "'");
			var image = pinElem.getAttribute('image').replace(/"/g, "'");
			var name = pinElem.getAttribute('name').replace(/"/g, "'");
			var summary = pinElem.getAttribute('summary').replace(/"/g, "'");
			var content = pinElem.getAttribute('content').replace(/"/g, "'");

            /**
			 * Each pin has the content added as a content window
             */
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

			// Pin is created and added to a pin array for later reference.
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

			//Added listener that opens the info windows upon clicking on the pin and closes any other info windows
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
        if(openInfoWindow !== null){
        	openInfoWindow.close();
        }
    });

    //adding additional listener so that the info window closes whenever a filter is clicked
	var filterList = document.getElementsByClassName('filter');
	for(var i =0;i< filterList.length;i++){
        filterList[i].addEventListener("click",function(){
            if(openInfoWindow !== null){
                openInfoWindow.close();
            }
        });
	}
}

/**
 * Update user's location on map every 5 seconds
 */
setInterval(function() {
	// Try HTML5 geolocation.
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var pos = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};

			if (userMarker && userMarker.setMap) {
				userMarker.setMap(null);
			}
  
			userMarker = new google.maps.Marker({
				position: pos,
				map: map,
                icon: {
                    path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW,
                    scale: 4,
					 strokeColor: 'gold'
               }
			});
			//Changes the orientation of the userMarker if you move
            if (window.DeviceOrientationEvent) {

                window.addEventListener('deviceorientation', function(event) {
                    var alpha = null;
                    //Check for iOS property
                    if (event.webkitCompassHeading) {
                        alpha = event.webkitCompassHeading;
                    }
                    //non iOS
                    else {
                        alpha = event.alpha;
                    }
                    var locationIcon = userMarker.get('icon');
                    locationIcon.rotation = 360 - alpha;
                    userMarker.set('icon', locationIcon);
                }, false);
            }
		}, function() {
			handleLocationError(true, infoWindow, map.getCenter());
		});
	} else {
		// Browser doesn't support Geolocation
		handleLocationError(false, infoWindow, map.getCenter());
	}
}, 5000);

/**
 * Function that filters all the pins
 */
function filterPins() {
    var filterTags = document.getElementsByName('filter');
    var filter;
    for (var i = 0, length = filterTags.length; i < length; i++)
    {
        if (filterTags[i].checked)
        {
            filter = filterTags[i].value;
            break;
        }
    }

    for (var j = 0; j < pinsArray.length; j++) {
        var pin = pinsArray[j];
        var pinFilters = pin.filters.split(', ');
		var display = false;
        pinFilters.forEach(function (element) {
            if (filter === element) {
                display = true;
            }else if (filter === "Clear Filters"){
				display = true;
			}
        });
        pin.setVisible(display);
    }
}

//Dynamically created the read me content depending on what is clicked.
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

/**
 * Function that handles location errors depending on the error
 * @param browserHasGeolocation
 * @param infoWindow
 * @param pos
 */
function handleLocationError(browserHasGeolocation, infoWindow, pos) {
	infoWindow.setPosition(pos);
	infoWindow.setContent(browserHasGeolocation ?
		'Error: The Geolocation service failed.' :
		'Error: Your browser doesn\'t support geolocation.');
	infoWindow.open(map);
}

/**
 * helper function that does an ajax call to get the xml file
 * @param url
 * @param callback
 */
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
