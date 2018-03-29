<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
//
echo("<form action='./multiObjectConfirm.php' method='post'>");

$action = $_POST['action'];
$object = $_POST['object'];
$updatingPage = $_POST['updatingPage'];
$namefield = $_POST['namefield'];
$dataType = $_POST['dataType'];
$text_field = $_POST['text_field'];
$id_field = $_POST['id_field'];
//populate form here with table fields
$dataType = filter_var($dataType, FILTER_SANITIZE_STRING);
$text_field = filter_var($text_field, FILTER_SANITIZE_STRING);
$text_field = str_replace('"', "'", $text_field);
// build query to update page content and show the user the changes so they can confirm them 
$builtQuery = "Update " . $object . ' set dataType="' . $dataType  .'",text="' . $text_field . '"';
$builtQuery = $builtQuery . " where id=$id_field";
echo("<input type='text' name='action' value='$action' hidden>");
echo("<input type='text' name='object' value='$object' hidden>");
echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
echo("<input type='text' name='namefield' value='$namefield' hidden>");
echo("<input type='radio' name='fullQuery' value='$builtQuery' checked hidden>");
//
echo("<input type='submit' value='Confirm Edit'>");
echo("</form>");

// cancel button to cancel edit and go back to editing page
echo("<form action='./multiObjectEdit.php' method='post'>");
echo("<input type='text' name='action' value='$action' hidden>");
echo("<input type='text' name='object' value='$object' hidden>");
echo("<input type='text' name='updatingPage' value='$updatingPage' hidden>");
echo("<input type='text' name='namefield' value='$namefield' hidden>");
echo("<br /><input type='submit' value='Cancel'>");
echo("</form>");
include 'footer.php';
?>
