 <?php
	
	require_once("cleanXML.php");
	
	$result = getContent($name);
	$fieldArray = array();
	
	$dom = new DOMDocument;
	$dom->loadXml('<div class="content"></div>');
	$body = $dom->documentElement;
	
	$supported_image = array(
		'gif',
		'jpg',
		'jpeg',
		'png'
	);
	
	
		while ($tableRow = $result->fetch_assoc()) {
		array_push($fieldArray, $tableRow['dataType']);
		array_push($fieldArray, $tableRow['text']);
		}
		
		for($i = 0; $i<count($fieldArray); $i+=2) {
			$cursor = $i+1;
			$clean1 = cleanXML($fieldArray[$i]);
			$clean2 = cleanXML($fieldArray[$cursor]);
			$template = $dom->createDocumentFragment();
			
			switch ($clean1) {
				case 'Image':
					$template->appendXML("<img src='{$clean2}' alt='{$name}'/>");
					break;
				case 'Link':
					$template->appendXML("<a href='{$clean2}'>{$clean2}</a>");
					break;
				case 'Large_Title':
					$template->appendXML("<h1>{$clean2}</h1>");
					break;
				case 'Medium_Title':
					$template->appendXML("<h2>{$clean2}</h2>");
					break;
				case 'Small_Title':
					$template->appendXML("<h2>{$clean2}</h2>");
					break;
				case 'Paragraph':
					$template->appendXML("<p>{$clean2}</p>");
					break;
				default:
					$template->appendXML("<p>{$clean2}</p>");
					break;
			}
			
			$body->appendChild($template);
		}
   
	echo $dom->saveXml();
	
	?>