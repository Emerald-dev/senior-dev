<?php
// The connection object for the database
function getDBConnection()
{
    return mysqli_connect("localhost", "root", "Justdoit1!", "rapids");
}

?>
