 <?php
	$page = 'about';
	$name = 'About_Us';
	include 'assets/php/header.php';
?>

<h1>About Us</h1>

<?php
	require_once("assets/php/dbAPI.php");
	require_once("assets/php/fillPageContent.php");
	include 'assets/php/footer.php';
?>