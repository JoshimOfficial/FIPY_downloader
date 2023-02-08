<?php
session_start();
ob_start();

$data = file_get_contents("https://www.pinterest.com/pin/638455684693534018/");

$dom = new DOMDocument();
@$dom->loadHTML($data);

$xpath = new DOMXPath($dom);
$nodeList = $xpath->query('//div[@class="tBJ dyH iFc sAJ O2T zDA IZT swG"]');

if ($nodeList->length > 0) {
    $followers = $nodeList->item(0)->nodeValue;
    echo $followers;
}
