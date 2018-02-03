<?php
/**
 * Created by PhpStorm.
 * User: Claire
 * Date: 2/2/2018
 * Time: 11:32 PM
 */

require_once("dbapi.php");
//Create XML file
$dom = new DOMDocument("1.0");
$node = $dom->createElement("pin");
$parnode = $dom->appendChild($node);

//
header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = getPinData()){
    // Add to XML document node
    $node = $dom->createElement("pin");
    $newnode = $parnode->appendChild($node);
    $newnode->setAttribute("lat",$row['lat']);
    $newnode->setAttribute("lon",$row['lon']);
    $newnode->setAttribute("filters", $row['filters']);
    $newnode->setAttribute("image", $row['image']);
    $newnode->setAttribute("name", $row['name']);
    $newnode->setAttribute("summary", $row['summary']);
    $newnode->setAttribute("content", $row['content']);
}

echo $dom->saveXML();

?>