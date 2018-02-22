<?php

require_once("dbparams.php");


/**
  * performs an action on the DB
  **/

function performActionOnDB($sql)
{

    // create connection
    $conn = getDBConnection();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // get info about the table
        if (!$result = $conn->query($sql)) {
        // comment out error messages when it is time to put to prod
        echo "Error: Our query failed to execute: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $conn->errno . "\n";
        echo "Error: " . $conn->error . "\n";
        exit;
    }

    //check results
    if ($result->num_rows === 0) {
        echo("No resuls found");
        exit;
    }
    return $result;
}

function performActionOnDBLogin($sql)
{

    // create connection
    $conn = getDBConnection();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // get info about the table
        if (!$result = $conn->query($sql)) {
        // comment out error messages when it is time to put to prod
        echo "Error: Our query failed to execute: \n";
        echo "Query: " . $sql . "\n";
        echo "Errno: " . $conn->errno . "\n";
        echo "Error: " . $conn->error . "\n";
        exit;
    }

    //check results
    if ($result->num_rows === 0) {
        echo("No resuls found");
    }
    return $result;
}


?>

