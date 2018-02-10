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
        if(gettype($row) == "array"){
            foreach ($row as $item){
                $temp = explode(", ",$item);
                foreach ($temp as $filter){
                    $filterArray[] = $filter;
                }
            }
        }elseif(gettype($row) == "string"){
            $filterArray[] = $row;
        }
    }
    return array_unique($filterArray);
}
