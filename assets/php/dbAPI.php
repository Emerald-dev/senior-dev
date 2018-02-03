<?php

require_once('dbessential.php');

function getPinData()
{
   $sql = "SELECT * FROM pins;";
   return  performActionOnDB($sql);

}

function getUser($username){
   $sql = "SELECT * FROM users WHERE 'username' = '$username';";
   return  performActionOnDB($sql);
}

 function getContent($page){
   $sql = "SELECT * FROM Content WHERE 'page' = '$page';";
   return  performActionOnDB($sql);
}

?>
