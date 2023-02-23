<?php 
function fb_vid_comments($vid_url) {

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






// Select the first article tag
$article = $xpath->query('//article')->item(0);

// Select the footer tag inside the first article tag
$footer = $xpath->query('.//footer', $article)->item(0);

// Select the second div tag inside the footer tag
$second_div = $xpath->query('.//div[2]', $footer)->item(0);

// Select all a tags inside the second div tag
$a_tags = $xpath->query('.//a', $second_div);

// Loop through the a tags and find the one with innerText containing "Comments"
$matching_a_tag = null;
foreach ($a_tags as $a_tag) {
    if (strpos($a_tag->textContent, 'Comments') !== false) {
        $matching_a_tag = $a_tag;
        break;
    }
}

// Get the innerHTML of the matching a tag
if ($matching_a_tag) {
    $innerHTML = '';
    foreach ($matching_a_tag->childNodes as $node) {
        $innerHTML .= $dom->saveHTML($node);
    }
    
    // Output the innerHTML of the matching a tag
    $numericValue = preg_replace("/[^0-9]/", "", $innerHTML); // Extract numeric value using regex
    $formattedValue = number_format($numericValue); // Format numeric value with commas
    echo $formattedValue . " (Without Replies)"; // Output: 17,677

    
} else {
    echo 'No comments found';
}

// Close curl session
curl_close($ch);


} else {
    return "Please use `https://fb.watch/XXX` type of url to see the details";
}
}
?>