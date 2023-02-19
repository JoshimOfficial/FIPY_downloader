<?php
$data = file_get_contents('https://www.worldometers.info/world-population/');
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($data);
$xpath = new DOMXPath($doc);
$population = $xpath->query('//div[@class="maincounter-number"]//span')->item(0)->nodeValue;
echo "Current world population is: " . trim($population);
?>