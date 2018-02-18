<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
// start
echo("<form action='./multiObjectEdit.php' method='post'>");
$action = $_POST['action'];
$object = $_POST['object'];
echo("<input type='radio' name='action' value='$action' checked hidden>");
echo("<input type='radio' name='object' value='$object' checked hidden>");
$namefield = "page";
$fetchCurrent = "select " . $namefield . " from " . $object;
$currentResults = performActionOnDB($fetchCurrent);
echo("<input type='radio' name='namefield' value='$namefield' checked hidden>");
echo("<h3>Which " . $object . " do you want to ".$action."? </h3>");
echo("<input type='radio' name='updatingPage' value='Home'> Home </br>");
echo("<input type='radio' name='updatingPage' value='Tombstones_&_Natural_History'> Tombstones & Natural History </br>");
echo("<input type='radio' name='updatingPage' value='Nearby_Historical_Trails'> Nearby Historical Trails </br>");
echo("<input type='radio' name='updatingPage' value='About_Us'> About Us </br>");
echo("</br>");
// end
echo("<input type='submit' value='Continue to $action'>");
echo("</form>");

echo("<form action='./cmsForm.php' method='post'><br />");
echo("<input type='submit' value='Cancel'>");
echo("</form>");
include 'footer.php';
?>
