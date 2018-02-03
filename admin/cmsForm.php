<?php
// This is a query builder for the DB. anything the user might want to do, this should build
// the right db query to do it.
// NOTE: this is the flow of the file, it doesn't actually work yet. missing all human interaction code

require_once("../assets/php/dbessential.php");
require_once("../assets/php/dbfetchInfo.php");
require_once("../assets/php/dbAPI.php");

// TODO: should pull objects from db directly instead of using manually configured array

// redirect if they aren't logged
if(!isset($_COOKIE['username'])){
	header('Location: ' . "login.php");
}

// you must use an action on an object

if(isset($_POST['fieldSet']))
{
    echo("<form action='dbsubmitForm.php' method='post'>");
}
else
{
    echo("<form action='cmsForm.php' method='post'>");
}

if(!isset($_POST['action']) || !isset($_POST['object']))
{
    echo("Select the item you would like to change: </br>");
	
	// allow them to edit users if they have permission to 
	$currentUser = $_COOKIE['username'];
	echo("username: $currentUser");
	$userData = getUser($currentUser);
	if ($userData->num_rows > 0) {
		while($row = $userData->fetch_assoc()) {
			if($row["createPrivilege"] == true){
				echo("<input type='radio' name='object' value='users'> Users </br>");
			}
		}
	}

    echo("<input type='radio' name='object' value='content'> Page Content </br>");
    echo("<input type='radio' name='object' value='pins'> Map Pins </br>");
    echo("<br/>");
    echo("<br/>");
	
	echo("Select the action you would like to take: </br>");
	echo("Select the action you would like to take:</br>");
	echo("<input type='radio' name='action' value='create'> Create </br>");
	echo("<input type='radio' name='action' value='update'> Update </br>");
	echo("<input type='radio' name='action' value='delete'> Delete </br>");
}


// if a page and action is selected, show the table attributes
if(isset($_POST['action']) && isset($_POST['object']) && !isset($_POST['fieldSet']))
{
    $action = $_POST['action'];
    $object = $_POST['object'];
    echo("<input type='radio' name='action' value='$action' checked> $action </br>");
    echo("<input type='radio' name='object' value='$object' checked> $object </br>");

    $selectedAction = $_POST['action']; // human interaction to select action
    $selectedObject = $_POST['object']; // human interaction to select object
    $tableFields = getTableFields($selectedObject);
    $tableFieldsStr = "";
	$index = 0;
    foreach($tableFields as $fieldStr)
    {
		// don't show the id
		if(index != 0){
			$tableFieldsStr = $tableFieldsStr . "-" . $fieldStr;
		}
        $index++;
    }
    $tableFieldsStr = substr($tableFieldsStr, 1);
    echo("<input type='radio' name='fieldSet' value='$tableFieldsStr' checked> $tableFieldsStr </br>");
    echo("</br></br>");
    foreach($tableFields as $field)
    {
        echo("$field <br />");
        echo("<input type='text' name='$field'>");
        echo("<br/>");
    }
}

// build the query from user selection
if(isset($_POST['fieldSet']))
{
    $fieldsetStr = $_POST['fieldSet'];
    $selectedAction = $_POST['action']; // human interaction to select action
    $selectedObject = $_POST['object']; // human interaction to select object
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
        $builtQuery = $builtQuery + ") values(";
        foreach($fieldset as $field)
        {
            $builtQuery = $builtQuery . $_POST[$field] . ", ";
        }
        $builtQuery = substr($builtQuery, 0, -1);
        $builtQuery = $builtQuery . ");";
    }
    if($selectedAction == "update")
    {
        $builtQuery = "Update " . $selectedObject . " set ";
        foreach($fieldset as $field)
        {
            $builtQuery = $builtQuery . " " . $field . "=" . $_POST[$field] . ",";
        }
        $builtQuery = substr($builtQuery, 0, -1);
        $builtQuery = $builtQuery + " where ";
    }
    if($selectedAction == "delete")
    {
        $builtQuery = "Delete from " . $selectedObject . " where ";
        foreach($fieldset as $field)
        {
            $builtQuery = $builtQuery . " " . $field . "=" . $_POST[$field] . " and";
        }
        $builtQuery = substr($builtQuery, 0, -3);
        $builtQuery = $builtQuery + ";";
    }
    echo("<input type='radio' name='fullQuery' value='$builtQuery' checked>$builtQuery</br>");
}

echo("<input type='submit' value='submit'>");
echo("</form>");

?>

