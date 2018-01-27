<?php

require_once('dbfetchInfo.php');

function getTombstoneData()
{
    // get info about the table
    $sql = "select * from tombstones";

    // query stuff
    $result = performActionOnDB($sql);
}


?>
