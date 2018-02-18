<?php
require_once("../assets/php/dbparams.php");
include 'header.php';
$sql = $_POST['fullQuery'];


// create connection
$conn = getDBConnection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);

if($conn->affected_rows < 1)
{
	echo("<p>Your action was unsuccessful, something went wrong. <br />".$conn->error."</p>");
}
else
{
    echo("<p>Action completed successfully!</p>");
}

echo("<a href='./cmsForm.php'>return to admin select page </a>");
include 'footer.php';
?>
