<?php 
function suggested_video($username) {
$data = file_get_contents("https://www.pinterest.com/$username");

preg_match_all("/https:\/\/v\.pinimg\.com\/videos\/[^\"\']+\.mp4/", $data, $matches);
$mp4_links = $matches[0];

$new_array = array();
foreach ($mp4_links as $link) {
    $parts = explode('/', $link);
    $key = $parts[7] . '/' . $parts[8];
    if (!isset($new_array[$key])) {
        $new_array[$key] = $link;
    }
}

    return array_values($new_array);
 }