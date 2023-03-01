<?php
header("Content-type:application/json");

$url = 'https://facebook-video-downloader.fly.dev/app/main.php';
$data = array(
    'url' => 'https://fb.watch/iPfAGwPCx9/'
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36');

$response = curl_exec($ch);

curl_close($ch);

$object = json_decode($response);

$array = json_decode(json_encode($object), true);

print_r($array["links"]);

?>
