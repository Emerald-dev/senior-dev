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
echo("<input type='radio' name='action' value='$action' checked hidden></br>");
echo("<input type='radio' name='object' value='$object' checked hidden></br>");
$tableFields = getTableFields($object);
$tableFieldsStr = "";
foreach($tableFields as $fieldStr)
{
    $tableFieldsStr = $tableFieldsStr . "-" . $fieldStr;
}
$tableFieldsStr = substr($tableFieldsStr, 1);
echo("<input type='radio' name='fieldSet' value='$tableFieldsStr' checked hidden></br>");
echo("</br></br>");
foreach($tableFields as $field)
{
    if($field == "id" || $field == "salt")
    {
            echo("<input type='text' name='$field' value='' hidden>");
    }
    else
    {
        echo("$field </br>");
        echo("<input type='text' name='$field' value=''>");
        echo("<br/>"); 
    }
}
// end
echo("<input type='submit' value='submit'>");
echo("</form>");

echo("<form action='./cmsForm.php' method='post'>");
echo("<input type='submit' value='Cancel and go back'>");
echo("</form>");

?>
