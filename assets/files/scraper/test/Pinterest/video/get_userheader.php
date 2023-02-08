<?php
function get_userheader($username) {

$data = file_get_contents("https://www.pinterest.com/$username/");
preg_match('/<script type="application\/ld\+json">\s*({.*})\s*<\/script>/s', $data, $matches);

$json_string = $matches[1];

$pattern = '/"name":"([^"]+)","mainEntityOfPage":{"@type":"ProfilePage","@id":"([^"]+)"},"image":{"@type":"ImageObject","contentUrl":"([^"]+)"},"description":"([^"]+)"/';

preg_match($pattern, $json_string, $matches);

if (!empty($matches)) {
  $values = array(
    'name' => $matches[1],
    'profile_link' => $matches[2],
    'profile_pic' => $matches[3],
    'bio' => $matches[4]
  );
    return $values;
} else {
  return "No matches found.";
}
}