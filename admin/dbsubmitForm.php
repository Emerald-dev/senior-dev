<?php

// This file creates a connection with the database and performs a database operation (action is passed in as 'fullQuery'.
// After the operation resolves, prints if it was successful or an error

// this file does this only for users and pins

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

echo("<div class='button'><a href='./cmsForm.php'>Back</a></div>");
include 'footer.php';
?>
