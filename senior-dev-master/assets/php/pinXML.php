<?php

require_once("dbAPI.php");
//Create XML file
$dom = new DOMDocument("1.0");

$dom->formatOutput = true;

$node = $dom->createElement("pins");
$parnode = $dom->appendChild($node);

$result = getPinData();

$fieldArray = array();

	while ($tableRow = $result->fetch_assoc()) {
		$node = $dom->createElement("pin");
		$fieldArray['lat'] = $tableRow['lat'];
		$fieldArray['lon'] = $tableRow['lon'];
		$fieldArray['filters'] = $tableRow['filters'];
		$fieldArray['image'] = $tableRow['image'];
		$fieldArray['name'] = $tableRow['name'];
		$fieldArray['summary'] = $tableRow['summary'];
		$fieldArray['content'] = $tableRow['content'];
		
			foreach($fieldArray as $key => $value) {
				$newnode = $parnode->appendChild($node);
				$newnode->setAttribute($key,$value);
				}
    }
	
echo $dom->save("pins.xml");

?>