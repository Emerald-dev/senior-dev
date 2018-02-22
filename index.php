 <?php
	$page = 'home';
	$name = 'Home';
	include 'assets/php/header.php';
?>

<?php
	require_once("assets/php/fillPageContent.php");
	require_once("assets/php/dbAPI.php");
    require_once("assets/php/pinXML.php");
?>

<div class="container">
  <div class="row">
       <div class="col-lg-12">
     <div class="button-group">
        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Filter</button>
  <ul id="filters" class="dropdown-menu">
	<?php
		$filters = getFilters();
		foreach ($filters as $filter){
			echo "<li class='filter'>";
			echo "<input type=\"checkbox\" name='$filter' value='$filter' checked='checked' onclick='filterPins()' class='dropdownmenu'>";
			echo "<label for='$filter'>$filter</label>";
			echo "</li>";
		}
	?>
            </ul>
          </div>
        </div>
      </div>
    </div>
	<div id="map"></div>
	<script src="assets/js/loadPinMap.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJM57hL-l7y1cu1B94q8y4nTfOrkbgTI&callback=initMap" async defer></script>
	<div id="readmore"></div>
<?php
	include 'assets/php/footer.php';
?>
