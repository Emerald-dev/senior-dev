<?php
//getting the data out of your tables
require_once('dbessential.php');
//selecting data from pins table
function getPinData()
{
   $sql = "SELECT * FROM pins;";
   return  performActionOnDB($sql);

}
//selecting the data from users table and accepting the variable $username
function getUser($username){
   $sql = 'SELECT * FROM users WHERE username = "' . $username . '"';
   return  performActionOnDB($sql);
}
//selecting the data from the content table and accepting the variable $page
 function getContent($page){
   $sql = 'SELECT * FROM content WHERE page = "' . $page . '"';
   return  performActionOnDB($sql);
}
//selecting the data for text from the content table and accepting the variable $page 
 function getPageTitle($page){
   $sql = 'SELECT text FROM content WHERE page = "' . $page . '" AND dataType = "Large_Title"';
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
