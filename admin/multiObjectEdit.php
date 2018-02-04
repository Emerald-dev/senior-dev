<?php
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
// start
$action = $_POST['action'];
$object = $_POST['object'];
$updatingPage = $_POST['updatingPage'];
$namefield = $_POST['namefield'];
echo("<input type='radio' name='action' value='$action' checked> $action </br>");
echo("<input type='radio' name='object' value='$object' checked> $object </br>");
echo("<input type='radio' name='updatingPage' value='$updatingPage' checked> $updatingPage </br>");
echo("<input type='radio' name='namefield' value='$namefield' checked> $namefield </br>");
$getContent = 'select id,dataType,text from content where page ="' . $updatingPage . '"';
$pageSections = performActionOnDB($getContent);

$submitAction = "";
if($action == "update")
{
    $submitAction = "./multiObjectUpdate.php";
    
}
else if($action == "delete")
{
    $submitAction = "./multiObjectDelete.php";
}

while($row = $pageSections->fetch_assoc())
{
    echo("<form action='$submitAction' method='post'>");
    echo("<input type='text' name='action' value='$action' hidden>");
    echo("<input type='text' name='object' value='$object' hidden>");
    echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
    echo("<input type='text' name='namefield' value='$namefield' hidden>");
    echo("<input type='text' name='id_field' value='{$row['id']}' hidden>");
    echo("<input type='text' name='dataType' value='{$row['dataType']}'></br>");
    echo("<input type='text' name='text_field' value='{$row['text']}'></br>");
    echo("<input type='submit' value='$action'>");
    echo("</form>");
    echo("</br></br>");
}
echo("<a href='./cmsForm.php'>Done</a>");
?>
