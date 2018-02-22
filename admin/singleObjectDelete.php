<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
// start
echo("<form action='./singleConfirm.php' method='post'>");
$action = $_POST['action'];
$object = $_POST['object'];
echo("<input type='radio' name='action' value='$action' checked hidden>");
echo("<input type='radio' name='object' value='$object' checked hidden>");
$namefield = "";
if($object == "users")
{
    $namefield = "username";
}
else if($object == "pins")
{
    $namefield = "name";
}
$fetchCurrent = "select " . $namefield . " from " . $object;
$currentResults = performActionOnDB($fetchCurrent);
echo("<input type='radio' name='namefield' value='$namefield' checked hidden>");
echo("<h3>Which existing " . $object . " do you want to delete? </h3>");
while($row = $currentResults->fetch_assoc())
{
    echo("<input type='radio' name='updatingObject' value='{$row[$namefield]}' required> {$row[$namefield]} </br>");
}
echo("</br></br>");
if($action == "delete")
{
    echo("<input type='radio' name='fieldSet' value='deleting' checked hidden>");
	echo("<p style='color:red;'>WARNING: You are about to permanently delete an item.</p>");
}
// end
echo("<input type='submit' value='Delete'>");
echo("</form>");

echo("<form action='./cmsForm.php' method='post'><br />");
echo("<input type='submit' value='Cancel'>");
echo("</form>");
include 'footer.php';
?>
