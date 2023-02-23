<?php 
function fb_description($vid_url) {

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

// Check for curl errors
if (curl_error($ch)) {
    die('Curl error: ' . curl_error($ch));
}

// Load the HTML response into a DOMDocument object
$dom = new DOMDocument();
@$dom->loadHTML($html);

// Use DOMXPath to search for the story_body_container div
$xpath = new DOMXPath($dom);
$story_body_container = $xpath->query("//div[@class='story_body_container']")->item(0);

// Use DOMXPath to search for the first child div of story_body_container
$first_child_div = null;
if ($story_body_container) {
    $first_child_div = $xpath->query("./div", $story_body_container)->item(0);
}

// Get the innerHTML of the first child div
$innerHTML = '';
if ($first_child_div) {
    $innerHTML = $dom->saveHTML($first_child_div);
}

echo  $innerHTML;

// Close curl session
curl_close($ch);

} else {
    return "Please use `https://fb.watch/XXX` type of url to see the details";
}
}
?>