<?php
include 'header.php';
require_once("../assets/php/dbparams.php");

echo("<html>");
echo("<body>");

// This file creates a connection with the database and performs a database operation (action is passed in as 'fullQuery'.
// After the operation resolves, prints if it was successful or an error

// This file does this only for page content creations/changes/deletions

$sql = $_POST['fullQuery'];
$action = $_POST['action'];
$object = $_POST['object'];
$updatingPage = $_POST['updatingPage'];
$namefield = $_POST['namefield'];

// create connection
$conn = getDBConnection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['preQuery']))
{
    $presql = $_POST['preQuery'];
    $resultPre = $conn->query($presql);

    if($conn->affected_rows < 1 && $conn->errno != "0")
    {
		echo("<p>Your action was unsuccessful, something went wrong. <br />".$conn->error."</p>");
    }
    else
    {
		echo("<p>Action completed successfully!</p>");
    }
}


$result = $conn->query($sql);

if($conn->affected_rows < 1 && $conn->errno != "0")
{
    echo("<p>Your action was unsuccessful, something went wrong. <br />".$conn->error."</p>");
}
else
{
    echo("<p>Action completed successfully!</p>");
}

echo("<form action='./multiObjectEdit.php' method='post'>");
echo("<input type='text' name='action' value='$action' hidden>");
echo("<input type='text' name='object' value='$object' hidden>");
echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
echo("<input type='text' name='namefield' value='$namefield' hidden>");
echo("<input type='submit' value='Continue Editing'>");
echo("</form>");

echo("</body>");
echo("</html>");
include 'footer.php';
?>
