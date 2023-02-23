<?php
function vid_uploader($vid_link , $cookies) {

$user_agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0';
$url = $vid_link;

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

// Send cURL request
$response = curl_exec($ch);
// Close cURL
curl_close($ch);

// Extract the first link using regular expressions
// Search for first <a> tag inside <header>

$video_uploader = "";

if (preg_match('/<article[^>]*>\s*<header[^>]*>\s*<h3[^>]*>\s*<span[^>]*>\s*<strong[^>]*>\s*(<a[^>]*>.*?<\/a>)/is', $response, $match)) {
    $a_tag = $match[1];
    $video_uploader = $a_tag;
}

if(strlen($video_uploader) === 0 ){
    if (preg_match('/<header[^>]*>\s*<h3[^>]*>\s*<span[^>]*>\s*<strong[^>]*>\s*(<a[^>]*>.*?<\/a>)/is', $response, $match)) {
        $a_tag = $match[1];
        $video_uploader = $a_tag;
    }
    
}

if(strlen($video_uploader) === 0) {
//If the video title or description was edited.
if (preg_match('/<header>(.*?)<strong>.*?(<a[^>]*>.*?<\/a>)*?<\/strong>/', $response, $match)) {
    $a_tag = $match[2];
    $video_uploader = $a_tag;
}
} 


if(strlen($video_uploader) === 0) {
    if(preg_match('/<header[^>]*>\s*<h3[^>]*>\s*<strong[^>]*>\s*(<a[^>]*>.*?<\/a>)/is', $response, $match)) {
        $a_tag = $match[1];
        $video_uploader = $a_tag;
    }
    
}

$video_uploader = preg_replace('/<a\s+href="((?!https:\/\/facebook\.com).+?)"/', '<a href="https://facebook.com$1"', $video_uploader);

$matches = array();
preg_match('/^<a href="([^"]+\?)[^"]*"[^>]*>([^<]+)<\/a>$/', $video_uploader, $matches);

if (!empty($matches)) {
    $video_uploader = sprintf('<a href="%s">%s</a>', rtrim($matches[1], '?'), $matches[2]);
}

return $video_uploader;


}