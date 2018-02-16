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
    $updatingObject = $_POST['updatingObject'];
    $namefield = $_POST['namefield'];
    echo("<input type='radio' name='action' value='$action' checked hidden></br>");
    echo("<input type='radio' name='object' value='$object' checked hidden></br>");
    echo("<input type='radio' name='updatingObject' value='$updatingObject' checked hidden></br>");
    echo("<input type='radio' name='namefield' value='$namefield' checked hidden></br>");
    $tableFields = getTableFields($object);
    $tableFieldsStr = "";
    foreach($tableFields as $fieldStr)
    {
        $tableFieldsStr = $tableFieldsStr . "-" . $fieldStr;
    }
    $tableFieldsStr = substr($tableFieldsStr, 1);
    echo("<input type='radio' name='fieldSet' value='$tableFieldsStr' checked hidden></br>");
    $fetchAll = "select * from ". $object. " where "  . $namefield . '="' . $updatingObject . '"';
    $allResults = performActionOnDB($fetchAll);
    $row = $allResults->fetch_assoc();
    echo("</br></br>");
    foreach($tableFields as $field)
    {
        echo("$field </br>");
        echo("<input type='text' name='$field' value='{$row[$field]}'>");
        echo("<br/>");
    }


// end
echo("<input type='submit' value='submit'>");
echo("</form>");

echo("<form action='./cmsForm.php' method='post'>");
echo("<input type='submit' value='Cancel and go back'>");
echo("</form>");

?>

