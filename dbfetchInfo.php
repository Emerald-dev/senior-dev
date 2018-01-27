
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
        print_r("$tableRow");
	    array_push($fieldArray, $tableRow);	
    }
    return $fieldArray;
}

/**
  * performs an action on the DB
  **/

function performActionOnDB($builtQuery);

    // create connection
    $conn = mysqli_connect($servername, $username, $password);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // get info about the table
        if (!$result = $mysqli->query($sql)) {
        // comment out error messages when it is time to put to prod
        echo "Error: Our query failed to execute: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
    }

    //check results
    if ($result->num_rows === 0) {
        echo("No match for table $queryTable");
        exit;
    }
    return $result;
?>
