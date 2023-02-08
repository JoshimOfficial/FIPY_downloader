<?php
function video_size($vid_link) {
$url = $vid_link;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_NOBODY, true);
curl_exec($ch);

$size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
curl_close($ch);

$size_mb = $size / pow(10, 6);

return round($size_mb, 2) ;

}