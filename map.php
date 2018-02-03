<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<?php
require_once("dbapi.php");
    //Create XML file
    $dom = new DOMDocument("1.0");
    $node = $dom->createElement("pin");
    $parnode = $dom->appendChild($node);

    //
    header("Content-type: text/xml");

    // Iterate through the rows, adding XML nodes for each

    while ($row = getPinData()){
        // Add to XML document node
        $node = $dom->createElement("pin");
        $newnode = $parnode->appendChild($node);
        $newnode->setAttribute("lat",$row['lat']);
        $newnode->setAttribute("lon",$row['lon']);
        $newnode->setAttribute("filters", $row['filters']);
        $newnode->setAttribute("image", $row['image']);
        $newnode->setAttribute("name", $row['name']);
        $newnode->setAttribute("summary", $row['summary']);
        $newnode->setAttribute("content", $row['content']);
    }

    echo $dom->saveXML();

?>
<script type="text/javascript">
    var map,currLocation;
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 43.0861, lng: -77.6705},
            zoom: 16
        });

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
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJM57hL-l7y1cu1B94q8y4nTfOrkbgTI&callback=initMap"
        async defer></script>
</body>
</html>
