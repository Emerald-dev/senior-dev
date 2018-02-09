 <?php
	$page = 'nearbyhis';
	$name = 'Nearby_Historical_Trails';
	include 'assets/php/header.php';
	
?>
<h1>Nearby Historical Trails</h1>
<?php
	require_once("assets/php/dbapi.php");
	require_once("assets/php/fillPageContent.php");
	
	include 'assets/php/footer.php';
?>