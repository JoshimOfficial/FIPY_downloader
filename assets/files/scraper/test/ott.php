<?php 

$url = "https://teleflix.com.bd/play/HH-_QZn7GrU/";
$user_agent = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.3";

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_USERAGENT => $user_agent
));

$response = curl_exec($curl);

if ($response === false) {
  echo "Error: " . curl_error($curl);
} else {
  echo $response;
}

curl_close($curl);