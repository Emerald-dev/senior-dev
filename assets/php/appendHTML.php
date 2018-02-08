<?php
function appendHTML(DOMNode $parent, $source) {
    $tmpDoc = new DOMDocument();
    $tmpDoc->loadHTML($source);
    foreach ($tmpDoc->getElementsByTagName('body')->item(0)->childNodes as $node) {
        $importedNode = $parent->ownerDocument->importNode($node, TRUE);
		$parent->appendChild($importedNode);
    }
}
?>

