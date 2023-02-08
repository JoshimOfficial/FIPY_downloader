<?php 

function get_username($video_link) {
    

$data = file_get_contents($video_link);
preg_match_all('/<a\s+class="[^"]*"\s+href="([^"]+)"[^>]*>/', $data, $matches);

$links = array_unique($matches[1]);

$get_username = array_values(array_filter($links, function($link) {
    return strpos($link, '/ideas/') === false && strpos($link, '/videos/') === false;
}));

    return $get_username;
}