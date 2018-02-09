 <?php
	$page = 'home';
	include 'assets/php/header.php';
?>

<h1>Home</h1>
<?php
    require_once("assets/php/pinXML.php");
?>
		<div id="map"></div>
		<script src="assets/js/loadPinMap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJM57hL-l7y1cu1B94q8y4nTfOrkbgTI&callback=initMap" async defer></script>
        <div id="readmore"></div>
<?php
	include 'assets/php/footer.php';
?>