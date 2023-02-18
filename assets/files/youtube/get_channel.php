<?php
function yt_channel($vid_link)
{
    $data = file_get_contents($vid_link);
    preg_match_all('/browseEndpoint.*?canonicalBaseUrl":"(.*?)"/', $data, $matches);
    $channels = array_values(array_unique($matches[1]));
    $result = array();


    foreach ($channels as $item) {
        $result[] = ltrim($item, "/");
    }

    if (strpos($result[0], "@") !== false) {
        return ($result);
    } else {
        unset($result[0]);
        return (array_values($result));
    }
}
?>