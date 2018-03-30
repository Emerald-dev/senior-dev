<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
// start
echo("<form action='./multiObjectConfirm.php' method='post'>");

$action = $_POST['action'];
$object = $_POST['object'];
$updatingPage = $_POST['updatingPage'];
$namefield = $_POST['namefield'];
$dataType = $_POST['dataType'];
$text_field = $_POST['text_field'];
$text_field = str_replace('"', "'", $text_field);
$id_field = $_POST['id_field'];
//populate form here with table fields
$builtQuery = "delete from content where id=$id_field";
// builds the DB query for page content deletion, and displays the changes to the user to confirm it is what they want to do
echo("<input type='text' name='action' value='$action' hidden>");
echo("<input type='text' name='object' value='$object' hidden>");
echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
echo("<input type='text' name='namefield' value='$namefield' hidden>");
echo("<input type='radio' name='fullQuery' value='$builtQuery' checked hidden>");
// end
echo("<input type='submit' value='Confirm Delete'>");
echo("</form>");
// option to cancel the deletion and go back to the editing page
echo("<form action='./multiObjectEdit.php' method='post'>");
echo("<input type='text' name='action' value='$action' hidden>");
echo("<input type='text' name='object' value='$object' hidden>");
echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
echo("<input type='text' name='namefield' value='$namefield' hidden>");
echo("<br /><input type='submit' value='Cancel Delete'>");
echo("</form>");
include 'footer.php';

?>
