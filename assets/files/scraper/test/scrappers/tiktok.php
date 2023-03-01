<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ssstik.io/en");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36");
$data = curl_exec($ch);
curl_close($ch);

// Extract the value of `tt` using regular expressions
$pattern = '/tt:\'([^\']+)\'/';
preg_match($pattern, $data, $matches);
$tt =  $matches[1];


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://ssstik.io/abc?url=dl");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.110 Safari/537.36");
curl_setopt($ch, CURLOPT_POST, true);
$data = array(
    'id' => 'https://www.tiktok.com/@sumonaislam01/video/7198493024446385409?is_from_webapp=1&sender_device=pc',
    'locale' => 'en',
    'tt' => $tt,
    'server' => 'Joshim'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
