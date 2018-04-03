<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");

// this page is the creaton form for a new user or pin


echo("<form action='./singleConfirm.php' method='post'>");
$action = $_POST['action'];
$object = $_POST['object'];
echo("<input type='radio' name='action' value='$action' checked hidden>");
echo("<input type='radio' name='object' value='$object' checked hidden>");
$tableFields = getTableFields($object);
$tableFieldsStr = "";
foreach($tableFields as $fieldStr)
{
    $tableFieldsStr = $tableFieldsStr . "-" . $fieldStr;
}
$tableFieldsStr = substr($tableFieldsStr, 1);
echo("<input type='radio' name='fieldSet' value='$tableFieldsStr' checked hidden>");

$characters = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// this for loop goes through all of the checks for data type and max length of field for users and pins
// so that a user cant break the DB entering info when they go to create a user or a pin
foreach($tableFields as $field)
{
	$maxlength = 10000;
	if($field == "username")
	{
		$maxlength = 20;
	}
	else if($field == "email")
	{
		$maxlength = 40;
	}
	else if ($field == "name")
	{
		$maxlength = 30;
	}
	else if ($field == "summary" || $field == "filters")
	{
		$maxlength = 255;
	}
	else if ($field == "content" || $field == "image")
	{
		$maxlength = 16777215;
	}
			
    if($field == "id")
    {
        echo("<input type='text' name='$field' value='' hidden>");
    }
    else if($field == "salt")
    {
        $saltval = '';
        $max = strlen($characters) - 1;
        for ($i = 0; $i < 10; $i++) 
        {
            $saltval .= $characters[mt_rand(0, $max)];
        }
        echo("<input type='text' name='$field' value='$saltval' hidden>");
    }
    else if($field == "email")
    {
        echo("$field </br>");
        echo("<input type='email' name='$field' value='' maxlength='$maxlength' required>");
        echo("<br/>");
    }
    else if($field == "lat" || $field == "lon")
    {
        echo("$field </br>");
        echo("<input type='decimal' name='$field' value='' maxlength='$maxlength' required>");
        echo("<br/>");
    }
	else if($field == "content")
	{
		echo("$field </br>");
		echo("<textarea name='$field' maxlength='$maxlength'></textarea>");
		echo("<br/>");
	}
	else if($field == "name" || $field == "username" || $field == "password")
    {
        echo("$field </br>");
        echo("<input type='text' name='$field' value='' maxlength='$maxlength' required>");
        echo("<br/>"); 
    }
    else if($field == "createPrivilege")
    {
        echo("$field </br>");
        echo("<input type='radio' name='$field' value=0 maxlength='$maxlegnth' required> No" );
        echo("<input type='radio' name='$field' value=1 maxlength='$maxlength' required> Yes");
        echo("<br/>");
    }
    else
    {
        echo("$field </br>");
        echo("<input type='text' name='$field' value='' maxlength='$maxlength'>");
        echo("<br/>"); 
    }
}
// 
echo("<br /><input type='submit' value='Create'>");
echo("</form>");

// cancel button to go back to the main menu
echo("<form action='./cmsForm.php' method='post'><br />");
echo("<input type='submit' value='Cancel'>");
echo("</form>");
include 'footer.php';
?>
