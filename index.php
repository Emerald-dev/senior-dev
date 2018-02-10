 <?php
	$page = 'home';
	include 'assets/php/header.php';
?>

<h1>Home</h1>
<?php
    require_once("assets/php/pinXML.php");
?>
        <div id="filters">
            <?php
                require_once("assets/php/dbAPI.php");

                $filters = getFilters();

                foreach ($filters as $filter){
                    echo "<div class='filter'>";
                    echo "<input type=\"checkbox\" name='$filter' value='$filter' checked='checked' onclick='filterPins()'>";
                    echo "<label for='$filter'>$filter</label>";
                    echo "</div>";
                }
            ?>
        </div>
		<div id="map"></div>
		<script src="assets/js/loadPinMap.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJM57hL-l7y1cu1B94q8y4nTfOrkbgTI&callback=initMap" async defer></script>
        <div id="readmore"></div>
<?php
	include 'assets/php/footer.php';
?>