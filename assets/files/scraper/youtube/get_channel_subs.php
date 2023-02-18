<?php 
function yt_subs($channel){
    $url = "https://www.youtube.com/$channel/about";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("accept-language: en-US,en;q=0.8"));

$data = curl_exec($ch);
curl_close($ch);
$subs =[];
preg_match('/var ytInitialData = (.+?);/', $data, $matches);
if($matches) {

    $json = json_decode($matches[1], true);
    $subs = [ "subs" => $json["header"]["c4TabbedHeaderRenderer"]["subscriberCountText"]["accessibility"]["accessibilityData"]["label"]];
    return $subs;
}
else {
    $subs =["subs" => "Erorr to find the channel"];
    return $subs;
}

}