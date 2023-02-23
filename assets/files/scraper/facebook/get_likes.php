<?php 
function fb_vid_likes($vid_url) {

if (strpos($vid_url, "https://fb.watch") !== false) {

    $cookies = fb_cookie();
// Set user agent
$user_agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0';

$vid_link = $vid_url;
$general_url = get_final_url($vid_link, $cookies, $user_agent);


$url = mbasic_url($general_url);
// Initialize curl session
$ch = curl_init();

// Set curl options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);


// Execute curl request
$html = curl_exec($ch);
// Suppress warning messages
error_reporting(E_ERROR | E_PARSE);


// Initialize DOMDocument
$dom = new DOMDocument();
// Load HTML string into DOMDocument
$dom->loadHTML($html);
// Initialize DOMXPath
$xpath = new DOMXPath($dom);

// Select the first article tag
$article = $xpath->query('//article')->item(0);

// Select the footer tag inside the first article tag
$footer = $xpath->query('.//footer', $article)->item(0);

// Select the second div tag inside the footer tag
$second_div = $xpath->query('.//div[2]', $footer)->item(0);

// Select the first span tag inside the second div tag
$first_span = $xpath->query('.//span[1]', $second_div)->item(0);

// Select the first a tag inside the first span tag
$first_a = $xpath->query('.//a[1]', $first_span)->item(0);

// Get the inner text of the first a tag
$innerText = $first_a->nodeValue;

// Output the inner text of the first a tag
return $innerText;
// Close curl session
curl_close($ch);

} else {
    return "Please use `https://fb.watch/XXX` type of url to see the details";
}
}
?>