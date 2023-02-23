<?php
function vid_info($vid_url) {

// Set user agent
$user_agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0';
$cookies = fb_cookie();

$vid_link = $vid_url;
$general_url = get_final_url($vid_link, $cookies, $user_agent);

$url = mbasic_url($general_url);

$_SESSION["mbasic_decode_url"] = $url;

// Initialize curl session
$ch = curl_init();

// Set curl options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_COOKIE, implode('; ', $cookies));
curl_setopt($ch, CURLOPT_USERAGENT, $user_agent);

// Execute curl request
$html = curl_exec($ch);

// Close curl session
curl_close($ch);

// Extract links
$links = array();
preg_match_all('/video_redirect\/\?src=https%3A%2F%2Fscontent[^\'"&]+/', $html, $matches);
if (!empty($matches[0])) {
    foreach ($matches[0] as $match) {
        $link = urldecode(substr($match, 18));
        if (strpos($link, 'c=') === 0) {
            $link = substr($link, 2);
        }
        $links[] = $link;
    }
}
// Output links
return $links;
}
?>