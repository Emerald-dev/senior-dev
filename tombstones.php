 <?php
	$page = 'tombstones';
	$name = 'Tombstones_&_Natural_History';
	include 'assets/php/header.php';
?>

<?php
	require_once("assets/php/dbAPI.php");
	require_once("assets/php/fillPageContent.php");
	require_once("assets/php/getAllTombstones.php");
	include 'assets/php/footer.php';
?>