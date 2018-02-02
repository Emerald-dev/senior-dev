<?php
require_once("dbapi.php");


echo("<html>");
echo("<body>");
echo("<p>");
$result = getPinData();
echo("start");
while ( $rows = $result->fetch_assoc() )
{
   print_r($rows);
}
echo("end");
echo("</p>");
echo("</body>");
echo("</html>");


?>
