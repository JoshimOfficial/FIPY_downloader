<?php
header("Content-type:application/json");
$url = 'https://ssyoutube.com/api/convert';
$videoUrl = 'https://www.youtube.com/watch?v=LfqQ7v0sprY';

$userAgent = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.96 Safari/537.36';

$postData = array(
    'url' => $videoUrl,
    'format' => 'mp4'
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
} else {
    print_r(json_decode($response));
}

curl_close($ch);

?>
