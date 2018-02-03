<html>
	<head>
		<title>Simple Map<title>
		<meta name="viewport" content="initial-scale=1.0" charset="utf-8" />
		<style>
			#map {
				height: 100%;
			}
			html, body {
				height: 100%;
				margin: 0;
				padding: 0;
			}
		</style>
	</head>
	<body>
		<?php
			require_once("pinXML.php");
		?>
		<div id="map"></div>
		<script src="loadPinMap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJM57hL-l7y1cu1B94q8y4nTfOrkbgTI&callback=initMap" async defer></script>
	</body>
</html>