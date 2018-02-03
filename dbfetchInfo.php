<?php
require_once("dbessential.php");

/**
  * returns the fields of a table
  **/
function getTableFields($queryTable)
{
    // get info about the table
    $sql = "describe $queryTable";

    // query stuff
    $result = performActionOnDB($sql);

    // get the data we want and return
    $fieldArray = array();
    while ($tableRow = $result->fetch_assoc()) {
       array_push($fieldArray, $tableRow['Field']);
    }
    return $fieldArray;
}
?>
