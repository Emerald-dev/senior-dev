<?php

require_once('dbfetchInfo.php');

$password = "SillyRabbitTrixR4K1dz!!";

function getPinData()
{
	$sql = "SELECT *FROM pins";
  $result = mysql_query($sql);

}

function getUser($username){
      $sql = "SELECT * FROM user WHERE 'username' = '$username' ";
      $result =mysql_query($sql);
      return $result;
}

 function getContent($page){
        $sql = "SELECT * FROM Content WHERE 'page' = '$page'";
        $esult = mysql_query($sql);
        return $result;
}

?>
