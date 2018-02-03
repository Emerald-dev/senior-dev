<?php
require_once("dbparams.php");

echo("<html>");
echo("<body>");
echo("<p>");

$sql = $_POST['fullQuery'];

// create connection
$conn = getDBConnection();

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
echo("</body>");
echo("</html>");

?>
