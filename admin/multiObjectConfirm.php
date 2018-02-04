<?php
require_once("../assets/php/dbparams.php");

echo("<html>");
echo("<body>");
echo("<p>");

$sql = $_POST['fullQuery'];
$action = $_POST['action'];
$object = $_POST['object'];
$updatingPage = $_POST['updatingPage'];
$namefield = $_POST['namefield'];

echo($sql);
echo("<br/><br/>");

// create connection
$conn = getDBConnection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query($sql);

if($conn->affected_rows < 1)
{
    echo("database operation failed. something went wrong </br></br>");
    echo "Query: " . $sql . "</br></br>";
    echo "Errno: " . $conn->errno . "</br></br>";
    echo "Error: " . $conn->error . "</br></br>";
}
else
{
    echo("database operation completed successfully");
}
echo("</p>");

echo("<form action='./multiObjectEdit.php' method='post'>");
echo("<input type='text' name='action' value='$action' hidden>");
echo("<input type='text' name='object' value='$object' hidden>");
echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
echo("<input type='text' name='namefield' value='$namefield' hidden>");
echo("<input type='submit' value='Continue Editing'>");
echo("</form>");

echo("</body>");
echo("</html>");

?>
