<?php
include("dbparams.php");
require_once("dbfetchimage.php");

    $page= $_POST['page']; 
    $img = $_POST['Text'];
  
    
 $soq = "INSERT INTO content (page,DataType,Text) VALUES ('$page','Image','$img')";
 
 ?>
