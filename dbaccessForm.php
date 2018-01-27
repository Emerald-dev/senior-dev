<?php
// This is a query builder for the DB. anything the user might want to do, this should build
// the right db query to do it. 
// NOTE: this is the flow of the file, it doesnt actually work yet. missing all human interaction code


require_once("dbfetchInfo.php");

// TODO: should pull objects from db directly instead of using manually configured array


// you must use an action on an object
$actions = array("create", "update", "delete");
$objects = array("users", "flora", "tombstone", "general_content", "related_destination");

if(isset($_POST['fullQuery']))
{
    echo("<form action='/dbfetchInfo.php' metho='post'>");
}
else
{
    echo("<form action='/dbaccessForm.php' metho='post'>");
}

if(!isset($_POST['action']) || !isset($_POST['object']))
{
    echo("What do you want to do?");
    echo("<input type='radio' name='action' value='create'> Create");
    echo("<input type='radio' name='action' value='update'> Update");
    echo("<input type='radio' name='action' value='delete'> Delete");
    echo("<br/>");
    echo("<br/>");
    echo("<input type='radio' name='object' value='users'> users");
    echo("<input type='radio' name='object' value='flora'> flora");
    echo("<input type='radio' name='object' value='tombstone'> tombstone");
    echo("<input type='radio' name='object' value='general_content'> general content");
    echo("<input type='radio' name='object' value='related_destination'> realated destination");
    echo("<br/>");
    echo("<br/>");
}


if(isset($_POST['action']) && isset($_POST['object']) && !isset($_POST['fieldSet']))
{
    $action = $_POST['action'];
    $object = $_POST['object'];
    echo("<input type='radio' name='action' value='$action' checked> $action");
    echo("<input type='radio' name='object' value='$object' checked> $object");

    $selectedAction = $_POST['action']; // human interaction to select action
    $selectedObject = $_POST['object']; // human interaction to select object
    $tableFields = getTableFields($selectedObject);
    echo("<input type='text' value='$tableFields' readonly");
    foreach($tableFields as $field)
    {
        echo("$field <br />");
        echo("<input type='text' name='$field'>");
        echo("<br />");
    }
}

if(isset($_POST['fieldSet']))
{
    $fieldset = $_POST['fieldSet'];
    $selectedAction = $_POST['action']; // human interaction to select action
    $selectedObject = $_POST['object']; // human interaction to select object

    //populate form here with table fields
    $builtQuery = "";
    if($selectedAction == "create")
    {
        $builtQuery = "Insert into " + $selectedObject + " where ";
    }
    if($selectedAction == "update")
    {
        $builtQuery = "Update " + $selectedObject + " set ";
    }
    if($selectedAction == "delete")
    {
        $builtQuery = "Delete from " + $selectedObject + " where ";
    }
    foreach($fieldset as $field)
    {
        $builtQuery = $builtQuery + " " + $field + "=" $_POST[$field] + " ";
    }

    echo("<input type='text' name='fullQuery' value="$builtQuery" readonly);
}

echo("<input type='submit' value='submit'>");
echo("</form>");

?>
