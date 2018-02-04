<?php
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
// start
echo("<form action='./singleConfirm.php' method='post'>");
$action = $_POST['action'];
$object = $_POST['object'];
echo("<input type='radio' name='action' value='$action' checked> $action </br>");
echo("<input type='radio' name='object' value='$object' checked> $object </br>");
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
echo("<input type='radio' name='namefield' value='$namefield' checked> $namefield </br>");
echo("Which existing " . $object . " do you want to edit? </br>");
while($row = $currentResults->fetch_assoc())
{
    echo("<input type='radio' name='updatingObject' value='{$row[$namefield]}'> {$row[$namefield]} </br>");
}
echo("</br></br>");
if($action == "delete")
{
    echo("<input type='radio' name='fieldSet' value='deleting' checked> the selected user will be deleted</br>");
}
// end
echo("<input type='submit' value='submit'>");
echo("</form>");
?>
