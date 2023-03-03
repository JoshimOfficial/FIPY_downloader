<?php
function reel_src($reel_url) {
    $url = 'https://snapinsta.io/api/ajaxSearch/instagram';
$data = array(
    'q' => $reel_url,
    'vt' => 'facebook'
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_USERAGENT, ' Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36');

$response = curl_exec($ch);

curl_close($ch);
$array_reels = json_decode(($response),true);


if (array_key_exists('data', $array_reels)) {
    $html = $array_reels['data'];
    $dom = new DOMDocument();
    $dom->loadHTML($html, LIBXML_NOERROR | LIBXML_NOWARNING);
    $xpath = new DOMXPath($dom);
    $a_tags = $xpath->query('//a');
    if ($a_tags->length > 0) {
        $first_a_tag = $a_tags->item(0);
        $href_value = $first_a_tag->getAttribute('href');
        
            // Set the URL of the video to download
$cdn_link = $href_value;

// Get the contents of the video
$video = file_get_contents($cdn_link);

// Set the file name to save the video
function randomFile_name($length = 100) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$file_name = randomFile_name().".mp4";

// Set headers to force download
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $file_name . '"');
header('Content-Length: ' . strlen($video));

// Output the video contents
echo $video;

    } else {
        echo "Sorry video couldn't be found.";
    }
} else {
    echo "Sorry video couldn't be found";
}
}
?>
