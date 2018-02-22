<?php
include 'header.php';
// requires
require_once("../assets/php/auth_login_helper.php");
require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");
// start
echo("<form action='./dbsubmitForm.php' method='post'>");

    $fieldsetStr = $_POST['fieldSet'];
    $selectedAction = $_POST['action']; // human interaction to select action
    $selectedObject = $_POST['object']; // human interaction to select object
    $updateField = "";
    $itemToUpdate = "";
    if(isset($_POST['updatingObject']) && isset($_POST['namefield']))
    {
        $itemToUpdate = $_POST['updatingObject'];
        $updateField = $_POST['namefield'];
    }
    $fieldset = explode("-", $fieldsetStr);

    //populate form here with table fields
    $builtQuery = "";
    if($selectedAction == "create")
    {
        $builtQuery = "Insert into " . $selectedObject . " (";
        foreach($fieldset as $field)
        {
            $builtQuery = $builtQuery . $field . ", ";
        }
        $builtQuery = substr($builtQuery, 0, -2);
        $builtQuery = $builtQuery . ") values (";
        foreach($fieldset as $field)
        {
            $postvar = $_POST[$field];
            if($field == "password" && isset($_POST['salt']))
            {
                $postvar = filter_var($postvar, FILTER_SANITIZE_STRING);
                $postvar = getHashedPass($postvar, $_POST["salt"]);
            }
            if(!ctype_digit($postvar))
            {
                $postvar = filter_var($postvar, FILTER_SANITIZE_STRING);
                $postvar = '"' . $postvar . '"';
            }
            $builtQuery = $builtQuery . $postvar . ", ";
        }
        $builtQuery = substr($builtQuery, 0, -2);
        $builtQuery = $builtQuery . ")";
    }
    if($selectedAction == "update")
    {
        $builtQuery = "Update " . $selectedObject . " set ";
        foreach($fieldset as $field)
        {
            $postvar = $_POST[$field];
            if($field == "password" && isset($_POST['salt']))
            {
                $postvar = filter_var($postvar, FILTER_SANITIZE_STRING);
                $postvar = getHashedPass($postvar, $_POST["salt"]);
            }
            if(!ctype_digit($postvar))
            {
                $postvar = filter_var($postvar, FILTER_SANITIZE_STRING);
                $postvar = $field . '="' . $postvar . '"';
            }
            else
            {
                $postvar = $field . '=' . $postvar;
            }
            $builtQuery = $builtQuery . $postvar  . ",";
        }
        $builtQuery = substr($builtQuery, 0, -1);
        $builtQuery = $builtQuery . " where "  . $updateField . '="' . $itemToUpdate . '"';
    }
    if($selectedAction == "delete")
    {
        $builtQuery = "Delete from " . $selectedObject . " where " . $updateField . '="' . $itemToUpdate . '"';
    }
    echo("<input type='radio' name='fullQuery' value='$builtQuery' checked hidden>");


// end
echo("<input type='submit' value='Submit ".$selectedAction."'> <br />");
echo("</form>");

echo("<form action='./cmsForm.php' method='post'>");
echo("<br /><input type='submit' value='Cancel'>");
echo("</form>");
include 'footer.php';
?>

