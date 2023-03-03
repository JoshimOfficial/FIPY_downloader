<?php
    function yt_thumb($vid_link) {

    // Set the URL and payload
    $url = 'https://save-from.net/api/convert';
    $payload = json_encode(array(
        'url' => $vid_link
    ));
    
    // Initialize cURL
    $ch = curl_init();
    
    // Set the cURL options
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($payload)
    ));
    curl_setopt($ch, CURLOPT_USERAGENT, ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36');
    
    // Execute the cURL request
    $response = curl_exec($ch);
    
    // Close cURL
    curl_close($ch);
    
    $links_as_array = json_decode($response,true);

    $img_src = $links_as_array["thumb"];
        $data = array(
          'thumbnail' => $img_src,
        );
        
          return $data;
        }
