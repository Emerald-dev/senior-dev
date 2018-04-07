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


<div id="donate">
	<h2>Donate Now</h2>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

	<!-- Identify your business so that you can collect the payments. -->
	<input type="hidden" name="business"
		value="donations@kcparkfriends.org">

	<!-- Specify a Donate button. -->
	<input type="hidden" name="cmd" value="_donations">

	<!-- Specify details about the contribution -->
	<input type="hidden" name="item_name" value="Friends of the Park">
	<input type="hidden" name="item_number" value="Fall Cleanup Campaign">
	<input type="hidden" name="currency_code" value="USD">

	<!-- Display the payment button. -->
	<input type="image" name="submit"  id="donateb"
	src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
	alt="Donate">
</div>

<div class="filters-row">
	
  <div class="button-group">
	<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">Filter</button>
	<ul id="filters" class="dropdown-menu">
		<li class="filter">
			<input id="checks-clear" type="radio" name="filter" value="Clear Filters" onclick="filterPins()" class="dropdownmenu">
			<label for="checks-clear">Clear Filters</label>
		</li>
		<?php
			$filters = getFilters();
			  foreach ($filters as $filter){
				   echo "<li class='filter'>";
				  echo "<input type=\"radio\" name='filter' id='$filter' value='$filter' onclick='filterPins()' class='dropdownmenu'>";
					echo "<label for='$filter'>$filter</label>";
					echo "</li>";}
		   ?>
	</ul>
  </div>

</div>
<div id="map"></div>
<script src="assets/js/loadPinMap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlJM57hL-l7y1cu1B94q8y4nTfOrkbgTI&callback=initMap" async defer></script>
<div id="readmore"></div>

<?php
	include 'assets/php/footer.php';
?>
