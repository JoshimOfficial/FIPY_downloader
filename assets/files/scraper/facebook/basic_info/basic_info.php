<?php
function vid_info($vid_url) {

// Set user agent
$user_agent = 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:59.0) Gecko/20100101 Firefox/59.0';
$cookies = fb_cookie();

$vid_link = $vid_url;
$general_url = get_final_url($vid_link, $cookies, $user_agent);

$url = mbasic_url($general_url);

$_SESSION["mbasic_decode_url"] = $url;




    $url = 'https://facebook-video-downloader.fly.dev/app/main.php';
    $data = array(
        'url' => $vid_url
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

   return $array;


}
?>












<?php
// function vid_info($vid_url) {

//     $url = 'https://facebook-video-downloader.fly.dev/app/main.php';
//     $data = array(
//         'url' => $vid_url
//     );
    
//     $ch = curl_init($url);
    
//     curl_setopt($ch, CURLOPT_POST, 1);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_USERAGENT, ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36');
    
//     $response = curl_exec($ch);
    
//     curl_close($ch);
    
//     $object = json_decode($response);
    
//     $array = json_decode(json_encode($object), true);
    
//    return $array["links"];
// }
?>