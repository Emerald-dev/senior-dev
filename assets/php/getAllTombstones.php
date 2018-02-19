 <?php
	
	require_once("cleanXML.php");
	
	$result = getPinData();
	$fieldArray = array();
	
	$dom = new DOMDocument;
	$dom->loadXml('<div class="content"></div>');
	$body = $dom->documentElement;
	
		while ($tableRow = $result->fetch_assoc()) {
			array_push($fieldArray, $tableRow['name']);
			array_push($fieldArray, $tableRow['image']);
			array_push($fieldArray, $tableRow['content']);
		}
		
		for($i = 0; $i<count($fieldArray); $i+=3) {
			$name = cleanXML($fieldArray[$i]);
			$image = cleanXML($fieldArray[$i+1]);
			$content = cleanXML($fieldArray[$i+2]);
			$template = $dom->createDocumentFragment();
			
			$string = "";
			$string .= "<div class='pins'>";
			$string .= "<h2>{$name}</h2>";
			$string .= "<img src='{$image}' alt='{$image}'/>";
			$string .= "<p>{$content}</p>";
			$string .= "</div>";
			$template->appendXML($string);
					
			
			$body->appendChild($template);
		}
   
	echo $dom->saveXml();
	
?>