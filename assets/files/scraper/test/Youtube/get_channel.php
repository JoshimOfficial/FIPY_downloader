<?php
function yt_channel($vid_link) {
$data = file_get_contents($vid_link);

preg_match_all('/browseEndpoint.*?canonicalBaseUrl":"(.*?)"/', $data, $matches);

$urls = array_values(array_unique($matches[1]));
return $urls;
}
?>