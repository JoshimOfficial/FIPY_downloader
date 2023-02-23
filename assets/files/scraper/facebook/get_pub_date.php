<?php 
function fb_vid_pub_date($vid_url) {

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
// Create a new DOMDocument object
$dom = new DOMDocument();

// Load the HTML string into the DOMDocument object
$dom->loadHTML($html);

// Create a new DOMXPath object
$xpath = new DOMXPath($dom);

// Get the first abbr tag element
$abbr = $xpath->query('//abbr')->item(0);

// Get the innerHTML of the abbr tag
$innerHTML = $dom->saveHTML($abbr);

// Print the innerHTML of the abbr tag
echo $innerHTML;


// Close curl session
curl_close($ch);

} else {
    return "Please use `https://fb.watch/XXX` type of url to see the details";
}
}
?>