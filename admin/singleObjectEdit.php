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
    $updatingObject = $_POST['updatingObject'];
    $namefield = $_POST['namefield'];
    echo("<input type='radio' name='action' value='$action' checked hidden>");
    echo("<input type='radio' name='object' value='$object' checked hidden>");
    echo("<input type='radio' name='updatingObject' value='$updatingObject' checked hidden>");
    echo("<input type='radio' name='namefield' value='$namefield' checked hidden>");
    $tableFields = getTableFields($object);
    $tableFieldsStr = "";
    foreach($tableFields as $fieldStr)
    {
        $tableFieldsStr = $tableFieldsStr . "-" . $fieldStr;
    }
    $tableFieldsStr = substr($tableFieldsStr, 1);
    echo("<input type='radio' name='fieldSet' value='$tableFieldsStr' checked hidden>");
    $fetchAll = "select * from ". $object. " where "  . $namefield . '="' . $updatingObject . '"';
    $allResults = performActionOnDB($fetchAll);
    $row = $allResults->fetch_assoc();
    foreach($tableFields as $field)
    {
        if($field == "id" || $field == "salt")
        {
            echo("<input type='text' name='$field' value='{$row[$field]}' readonly hidden>");
        }
        else if($field == "password")
        {
            echo("$field </br>");
            echo("<input type='text' name='$field' value=''>");
            echo("<br/>");
        }
        else
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
            echo("$field </br>");
            if($field == "email")
            {
                echo("<input type='email' name='$field' value='{$row[$field]}' maxlength='$maxlength' required>");
            }
            else if ($field == "image")
            {
                echo("<input type='url' name='$field' value='{$row[$field]}' maxlength='$maxlength'>");

            }
            else if($field == "lat" || $field == "long")
            {
                echo("<input type='number' name='$field' value='{$row[$field]}' maxlength='$maxlength' required>");
            }
			else if($field == "password" || $field == "username")
            {
                echo("<input type='text' name='$field' value='{$row[$field]}' maxlength='$maxlength' required>");

            }
			else if($field == "content")
            {
				echo("<textarea name='$field' maxlength='$maxlength'>{$row[$field]}</textarea></br>");

            }
            else
            {
                echo("<input type='text' name='$field' value='{$row[$field]}' maxlength='$maxlength'>");
            }
            echo("<br/>");
        }
    }


// end
echo("<br /><input type='submit' value='Submit Changes'>");
echo("</form>");

echo("<form action='./cmsForm.php' method='post'><br />");
echo("<input type='submit' value='Cancel'>");
echo("</form>");
include 'footer.php';
?>

