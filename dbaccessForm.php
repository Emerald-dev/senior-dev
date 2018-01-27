<?php
// This is a query builder for the DB. anything the user might want to do, this should build
// the right db query to do it. 
// NOTE: this is the flow of the file, it doesnt actually work yet. missing all human interaction code


require_once("dbfetchInfo.php");

// TODO: should pull objects from db directly instead of using manually configured array


// you must use an action on an object
$actions = array("create", "update", "delete");
$objects = array("users", "flora", "tombstone", "general_content", "related_destination");


$selectedAction = ""; // human interaction to select action
$selectedObject = ""; // human interaction to select object

$tableFields = getTableFields($selectedObject);

//populate form here with table fields

$builtQuery = "";

if($selectedAction == "create")
{
    $builtQuery = "Insert into " + $selectedObject;
}
if($selectedAction == "update")
{
    $builtQuery = "Update " + $selectedObject + " Set";
}
if($selectedAction == "delete")
{
    $builtQuery = "delete from " + $selectedObject;
}

// use populated fields to build rest of query

$result = performActionOnDB($builtQuery);

?>
