<?php

require_once('dbessential.php');

function getPinData()
{
   $sql = "SELECT * FROM pins;";
   return  performActionOnDB($sql);

}

function getUser($username){
   $sql = 'SELECT * FROM users WHERE username = "' . $username . '"';
   return  performActionOnDB($sql);
}

 function getContent($page){
   $sql = 'SELECT * FROM Content WHERE page = "' . $page . '"';
   return  performActionOnDB($sql);
}


/**
 * Returns all of the unique filters from the pins table to be used for the map
 */
function getFilters(){
    $sql = "SELECT DISTINCT filters FROM pins";
    $result = performActionOnDB($sql);

    $filterArray = array();

    while($row = $result->fetch_assoc())
    {
        $temp = explode(',',$row);
        foreach ($temp as $filter){
            array_push($filterArray,$filter);
        }
    }
    return array_unique($filterArray);
}

/**
 * Returns the pins based on the filter information
 */
function getFilteredPins(){

}
?>
