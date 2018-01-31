<?php

require_once('dbfetchInfo.php');

function getTombstone()
{
  $sql = "SELECT *FROM tombstone";
  $result = mysql_query($sql);

}

function getUser($username){
      $sql = "SELECT * FROM 'user' WHERE 'username' = '$username' ";
      $result =mysql_query($sql);
      return $result;
}
 function getAllDestination(){
        $sql ="SELECT * FROM 'RelatedDestination'";
        $result =mysql_query($sql);
        return $result;

}

 function getContent($page){
        $sql = "SELECT * FROM 'GeneralContent' WHERE 'page' = '$page'";
        $esult = mysql_query($sql);
        return $result;
}




?>
